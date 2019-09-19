<?php include "header.php"; ?>
<?php include "navbar.php"; ?>
<?php include "sidebar.php"; ?>
<?php include "dbconnection.php"; ?>

<body class="app sidebar-mini rtl">
  <main class="app-content">
    <div class="app-title">
      <div>
        <h4>MESSAGE</h4><small><span id="date_time"></span></small>
      </div>
      <?php include "chatting_seen_notification.php"; ?>
      <ul class="app-breadcrumb breadcrumb side">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item">Message</li>
        <li class="breadcrumb-item active">View Messages</li>
      </ul>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="bs-component">
          <div class="card">
            <h5 class="card-header">View Messages</h5>
            <div class="card-body">
              <div id="user_details"></div>
              <div id="user_model_details"></div>
            </div>
            <div class="card-footer">
              &nbsp;&nbsp;
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</main>

<?php include "footer.php"; ?>

</body>
</html>
