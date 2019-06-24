<?php include "header.php"; ?>
<?php include "navbar.php"; ?>
<?php include "sidebar.php"; ?>
<?php include "dbconnection.php"; ?>

<body class="app sidebar-mini rtl">
  <main class="app-content">
    <div class="app-title">
      <div>
        <h4>MAINTENANCE</h4><span id="date_time"></span></small>
      </div>
      <?php include "chatting_seen_notification.php"; ?>
      <ul class="app-breadcrumb breadcrumb side">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item">Maintenance</li>
        <li class="breadcrumb-item active">Manage Kayak</li>
      </ul>
    </div>
    <?php include "maintenance_kayak_bar.php"; ?>
    <div class="row">
      <div class="col-md-12">
        <div class="bs-component">
          <div class="card">
            <h5 class="card-header">Manage Kayak</h5>
            <div class="card-body">
              <div class="bs-component">
                <ul class="nav nav-tabs">
                  <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#home">List Kayak</a></li>
                  <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#profile">New Kayak</a></li>
                </ul>
                <div class="tab-content" id="myTabContent">
                  <div class="tab-pane fade active show" id="home"><br/>
                    <?php include "garage_kayak_view_list.php"; ?>
                  </div>
                  <div class="tab-pane fade" id="profile"><br/>
                    <?php include "garage_kayak_view_form.php"; ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="card-footer">
              &nbsp;&nbsp;
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>

  <?php include "footer.php"; ?>

</body>
</html>
