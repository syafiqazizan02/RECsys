<?php include "header.php"; ?>
<?php include "navbar.php"; ?>
<?php include "sidebar.php"; ?>
<?php include "dbconnection.php"; ?>
<?php include "reporting_rating_fetch.php"; ?>

<body class="app sidebar-mini rtl">

  <main class="app-content">
    <div class="app-title">
      <div>
        <h4>REPORTING</h4><small><span id="date_time"></span></small>
      </div>
      <ul class="app-breadcrumb breadcrumb side">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item">Reporting</li>
        <li class="breadcrumb-item active">Customer Rating</li>
      </ul>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="bs-component">
          <div class="card">
            <h5 class="card-header">Customer Rating</h5>
            <div class="card-body">
              <div class="row">
                <div class="col-md-2">
                  &nbsp;&nbsp;
                </div>
                <div class="col-md-8">
                  <canvas id="myChart" style="position: relative; height:80vh; width:10vw;"></canvas>
                </div>
                <div class="col-md-2">
                  &nbsp;&nbsp;
                </div>
              </div>
            </div>
            <div class="card-footer">
              &nbsp;&nbsp;
            </div>
          </div>
        </div>
      </main>
      <script>
      var ctx = document.getElementById("myChart").getContext("2d");

      var data = {
        labels: [<?php echo label(); ?>],
        datasets: [
          {
            label: "1 Star",
            backgroundColor: 'transparent',
            borderColor: "rgba(179,181,198,1)",
            pointBackgroundColor: "rgba(179,181,198,1)",
            pointBorderColor: "rgba(179,181,198,1)",
            pointHoverBackgroundColor: "rgba(179,181,198,1)",
            pointHoverBorderColor: "rgba(179,181,198,1)",
            data: [<?php echo star1(); ?>]
          },
          {
            label: "2 Star",
            backgroundColor: 'transparent',
            borderColor: "rgba(255, 99, 132,1)",
            pointBackgroundColor: "rgba(255, 99, 132,1)",
            pointBorderColor: "rgba(255, 99, 132,1)",
            pointHoverBackgroundColor: "rgba(255, 99, 132,1)",
            pointHoverBorderColor: "rgba(255, 99, 132,1)",
            data: [<?php echo star2(); ?>]
          },
          {
            label: "3 Star",
            backgroundColor: 'transparent',
            borderColor: "rgba(54, 162, 235,1)",
            pointBackgroundColor: "rgba(54, 162, 235,1)",
            pointBorderColor: "rgba(54, 162, 235,1)",
            pointHoverBackgroundColor: "rgba(54, 162, 235,1)",
            pointHoverBorderColor: "rgba(54, 162, 235,1)",
            data: [<?php echo star3(); ?>]
          },
          {
            label: "4 Star",
            backgroundColor: 'transparent',
            borderColor: "rgba(153, 102, 255,1)",
            pointBackgroundColor: "rgba(153, 102, 255,1)",
            pointBorderColor: "rgba(153, 102, 255,1)",
            pointHoverBackgroundColor: "rgba(153, 102, 255,1)",
            pointHoverBorderColor: "rgba(153, 102, 255,1)",
            data: [<?php echo star4(); ?>]
          },
          {
            label: "5 Star",
            backgroundColor: 'transparent',
            borderColor: "rgba(255, 206, 86,1)",
            pointBackgroundColor: "rgba(255, 206, 86,1)",
            pointBorderColor:"rgba(255, 206, 86,1)",
            pointHoverBackgroundColor: "rgba(255, 206, 86,1)",
            pointHoverBorderColor: "rgba(255, 206, 86,1)",
            data: [<?php echo star5(); ?>]
          },
        ]
      };

      var myChart = new Chart(ctx, {
        type: 'radar',
        data: data,
        options: {
          scale: {
            ticks: {
              beginAtZero: true,
              stepSize: 5.0,
            }
          },
          legend:{
            display: true,
            position: 'bottom',
            labels: {
              fontSize: 10}
            }
          }
        });
      </script>

      <?php include "footer.php"; ?>

    </body>
    </html>
