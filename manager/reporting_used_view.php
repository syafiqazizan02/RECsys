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
        <li class="breadcrumb-item active">Highest Used</li>
      </ul>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="bs-component">
          <div class="card">
            <h5 class="card-header">Highest Used</h5>
            <div class="card-body">
              <div class="row">
                <div class="col-lg-10">
                </div>
                <div class="col-lg-2">
                  <select id="year_choosen" name="year_choosen" class="form-control" onchange="//showHint(this.value)" required="">
                    <option>Select Year</option>
                    <?php
                    $sql = 'SELECT YEAR(start_date) FROM  `used_start`
                    JOIN  `used_list` ON `used_list`.start_id = `used_start`.start_id
                    GROUP BY YEAR(start_date) ORDER BY YEAR(start_date) DESC';
                    $result = $conn->query($sql);

                    while($row = $result->fetch_assoc()){
                      echo '<option value="'.$row['YEAR(start_date)'].'">'.$row['YEAR(start_date)'].'</option>';
                    }
                    ?>
                  </select><br>
                </div>
                <div class="col-md-12">
                  <div id="chart"><canvas id="highest-used" style="position: relative; height:60vh; width:10vw;"></canvas></div>
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
          $('#highest-used').remove();
          $('#chart').append('<canvas id="highest-used"></canvas>');
          var year = $("#year_choosen").val();
          var data;
          if(year){
            $.ajax({
              type:'POST',
              url:'reporting_used_fetch.php',
              dataType:"JSON",
              data:{year:year},
              cache: false,
              success:function(data){
                data=data;
                var ctx = document.getElementById("highest-used");
                var myChart = new Chart( ctx, {
                  type: 'line',
                  data: {
                    labels: data.labels,
                    type: 'line',
                    defaultFontFamily: 'Segoe UI',
                    datasets:
                    [{
                      label: "Paddle Boat",
                      data:data.datasets1.data,
                      backgroundColor: 'transparent',
                      borderColor: 'rgba(255,99,132, 1)',
                      borderWidth: 3,
                      pointBackgroundColor: 'rgba(255,99,132, 1)',
                    },
                    {
                      label: "Electric Boat",
                      data:data.datasets2.data,
                      backgroundColor: 'transparent',
                      borderColor: 'rgba(205,133,63, 1)',
                      borderWidth: 3,
                      pointBackgroundColor: 'rgba(205,133,63, 1)',
                    },
                    {
                      label: "Kayak",
                      data:data.datasets3.data,
                      backgroundColor: 'transparent',
                      borderColor: 'rgba(38, 194, 129, 1)',
                      borderWidth: 3,
                      pointBackgroundColor: 'rgba(38, 194, 129, 1)',
                    },
                    {
                      label: "Flying Fox",
                      data:data.datasets4.data,
                      backgroundColor: 'transparent',
                      borderColor: 'rgba(153, 102, 255,1)',
                      borderWidth: 3,
                      pointBackgroundColor: 'rgba(153, 102, 255,1)',
                    },
                    {
                      label: "Wall Climbing",
                      data:data.datasets5.data,
                      backgroundColor: 'transparent',
                      borderColor: 'rgba(255, 206, 86, 1)',
                      borderWidth: 3,
                      pointBackgroundColor: 'rgba(255, 206, 86, 1)',
                    },
                    {
                      label: "Paintball Shooting",
                      data:data.datasets6.data,
                      backgroundColor: 'transparent',
                      borderColor: 'rgba(179,181,198, 1)',
                      borderWidth: 3,
                      pointBackgroundColor: 'rgba(179,181,198, 1)',
                    },
                    {
                      label: "Archey Target",
                      data:data.datasets7.data,
                      backgroundColor: 'transparent',
                      borderColor: 'rgba(54, 162, 235, 1)',
                      borderWidth: 3,
                      pointBackgroundColor: 'rgba(54, 162, 235, 1)',
                    },
                    {
                      label: "Trampoline Jump",
                      data:data.datasets8.data,
                      backgroundColor: 'transparent',
                      borderColor: 'rgba(0,0,0, 0.8)',
                      borderWidth: 3,
                      pointBackgroundColor: 'rgba(0,0,0, 0.8)',
                    },
                    {
                      label: "Space Ball",
                      data:data.datasets9.data,
                      backgroundColor: 'transparent',
                      borderColor: 'rgba(128,128,0, 0.7)',
                      borderWidth: 3,
                      pointBackgroundColor: 'rgba(128,128,0, 0.7)',
                    }]
                  }
                  ,
                  options: {
                    scales: {
                      scales:{
                        yAxes: [{
                          beginAtZero: true
                        }],
                        xAxes: [{
                          autoskip: true,
                          maxTicketsLimit: 20
                        }]
                      }
                    },
                    tooltips:{
                      mode: 'index'
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
                        text: 'Facilities Highest Used',
                        fontSize: 16,
                      }
                    }
                  });
                },
                error:function(data){
                  var ctx = document.getElementById("highest-used");
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
