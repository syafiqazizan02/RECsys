<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">
  <ul class="app-menu">
    <li><a style="color:white;" class="app-menu__item" onclick="dashboard();"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Dashboard</span></a></li>
    <li class="treeview"><a style="color:white;" class="app-menu__item"  data-toggle="treeview"><i class="app-menu__icon fa fa-laptop"></i><span class="app-menu__label">Account</span><i class="treeview-indicator fa fa-angle-right"></i></a>
      <ul class="treeview-menu">
        <li><a style="color:white;" class="treeview-item" onclick="qrcode();">&nbsp;&nbsp;<i class="icon fa fa-circle-o"></i>My QRcode</a></li>
        <li><a style="color:white;" class="treeview-item" onclick="profile();">&nbsp;&nbsp;<i class="icon fa fa-circle-o"></i>My Profile</a></li>
      </ul>
    </li>
    <li class="treeview"><a style="color:white;" class="app-menu__item" data-toggle="treeview"><i class="app-menu__icon fa fa-laptop"></i><span class="app-menu__label">Transaction</span><i class="treeview-indicator fa fa-angle-right"></i></a>
      <ul class="treeview-menu">
        <li><a style="color:white;" class="treeview-item" onclick="reserve();">&nbsp;&nbsp;<i class="icon fa fa-circle-o"></i>Queue Facilities</a></li>
        <li><a style="color:white;" class="treeview-item" onclick="used();">&nbsp;&nbsp;<i class="icon fa fa-circle-o"></i>Manage Facilities</a></li>
        <li><a style="color:white;" class="treeview-item" onclick="review();">&nbsp;&nbsp;<i class="icon fa fa-circle-o"></i>Review Facilities</a></li>
        <li><a style="color:white;" class="treeview-item" onclick="history();">&nbsp;&nbsp;<i class="icon fa fa-circle-o"></i>History Facilities</a></li>
      </ul>
    </li>
     <li><a style="color:white;" class="app-menu__item" onclick="logout();"><i class="app-menu__icon fa fa-laptop"></i><span class="app-menu__label">Sign Out</span></a></li>
  </ul>
</aside>
