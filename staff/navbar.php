<?php include "session.php"; ?>
<?php include "identification.php"; ?>

<header class="app-header">
  <a class="app-header__logo" href="dashboard.php">RECsystem</a>
  <a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
  <ul class="app-nav">
    <li class="dropdown"><a class="app-nav__item"  style="color:white;font-weight:bold;"><?php echo staff(); ?></a>
    </li>
    <li class="dropdown"><a href="chatting_panel.php" class="app-nav__item"  style="color:white;font-weight:bold; text-decoration:none;"><i class='fa fa-inbox fa-sm'></i>&nbsp;<small id="unseen_message"></small></a>
    </li>
    <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><i class="fa fa-user fa-lg"></i></a>
      <ul class="dropdown-menu settings-menu dropdown-menu-right">
        <li><a class="dropdown-item" href="account_profile.php"><i class="fa fa-user fa-lg"></i> Profile</a></li>
        <li><a class="dropdown-item" href="chatting_panel.php"><i class="fa fa-envelope fa-lg"></i> Message</a></li>
        <li><a class="dropdown-item" href="../logout.php"><i class="fa fa-sign-out fa-lg"></i> Logout</a></li>
      </ul>
    </li>
  </ul>
</header>
