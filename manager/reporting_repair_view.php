<?php include "header.php"; ?>
<?php include "navbar.php"; ?>
<?php include "sidebar.php"; ?>
<?php include "dbconnection.php"; ?>

<body class="app sidebar-mini rtl">

  <main class="app-content">
    <div class="app-title">
      <div>
        <h4>REPORTING</h4><small><span id="date_time"></span></small>
      </div>
      <ul class="app-breadcrumb breadcrumb side">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item">Reporting</li>
        <li class="breadcrumb-item active">Cost Repaired</li>
      </ul>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="bs-component">
          <div class="card">
            <h5 class="card-header">Cost Repaired</h5>
            <div class="card-body">
              <div class="row">
                <div class="col-lg-10">
                </div>
                <div class="col-lg-2">
                  <select id="year_choosen" name="year_choosen" class="form-control" onchange="//showHint(this.value)" required="">
                    <option>Select Year</option>
                    <?php
                    $sql = 'SELECT YEAR(done_cat_date) FROM `damage_category`
                    GROUP BY YEAR(done_cat_date) ORDER BY YEAR(done_cat_date) DESC';
                    $result = $conn->query($sql);

                    while($row = $result->fetch_assoc()){
                      echo '<option value="'.$row['YEAR(done_cat_date)'].'">'.$row['YEAR(done_cat_date)'].'</option>';
                    }
                    ?>
                  </select><br>
                </div>
                <div class="col-md-12">
                  <div id="chart"><canvas id="cost-repaired" style="position: relative; height:60vh; width:10vw;"></canvas></div>
                </div>
              </div>
            </div>
            <div class="card-footer">
              &nbsp;&nbsp;
            </div>
          </div>
        </div>
      </main>

      <?php include "footer.php"; ?>

      <script type="text/javascript">
      $(document).ready(function(){
        $('#year_choosen').change(function(){
          $('#cost-repaired').remove();
          $('#chart').append('<canvas id="cost-repaired"></canvas>');
          var year = $("#year_choosen").val();
          var data;
          if(year){
            $.ajax({
              type:'POST',
              url:'reporting_repair_fetch.php',
              dataType:"JSON",
              data:{year:year},
              cache: false,
              success:function(data){
                data=data;
                var ctx = document.getElementById("cost-repaired");
                var myChart = new Chart( ctx, {
                  type: 'bar',
                  data: {
                    labels: data.labels,
                    type: 'line',
                    defaultFontFamily: 'Segoe UI',
                    datasets:
                    [{
                      label: "Water Game",
                      data:data.datasets1.data,
                      backgroundColor: "transparent",
                      borderColor: "rgba(0,0,0,0.5)",
                      borderWidth: 3,
                      pointBackgroundColor: "rgba(0,0,0,0.5)",
                    },
                    {
                      label: "Extreme Game",
                      data:data.datasets2.data,
                      backgroundColor: 'transparent',
                      borderColor: 'rgba(128,128,0, 0.5)',
                      borderWidth: 2,
                      pointBackgroundColor: 'rgba(128,128,0, 0.5)',
                    }]
                  }
                  ,
                  options: {
                    scales: {
                      scales:{
                        yAxes: [{
                          beginAtZero: true,
                          scaleLabel: {
                            display: true,
                            labelString: 'Label',
                            fontColor: "rgba(0,0,0,0.5)"
                          }
                        }],
                        xAxes: [{
                          autoskip: true,
                          maxTicketsLimit: 20,
                          scaleLabel: {
                            display: true,
                            labelString: 'Label',
                            fontColor: "rgba(0,0,0,0.5)"
                          }
                        }]
                      }
                    },
                    tooltips: {
                      callbacks: {
                        label: function(tooltipItem, data) {
                          var label = data.datasets[tooltipItem.datasetIndex].label || '';

                          if (label) {
                            label += ': RM ';
                          }
                          label += Math.round(tooltipItem.yLabel * 100) / 100;
                          return label;
                        }
                      }
                    },
                    legend:{
                      display: true,
                      position: 'bottom',
                      padding: 30,
                      labels: {
                        fontSize: 10}
                      },
                      title: {
                        display: true,
                        text: 'Facilities Cost Repaired',
                        fontSize: 16,
                      }
                    }
                  });
                },
                error:function(data){
                  var ctx = document.getElementById("cost-repaired");
                }
              });
            }else{
              $('#year_choosen').html('<option value="">Failed!</option>');
            }
          });
        });
        </script>

      </body>
      </html>
