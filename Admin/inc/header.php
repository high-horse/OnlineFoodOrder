<?php
include '../lib/Session.php';
Session::checkSession();

 ?>
  <!-- container section start -->
  <section id="container" class="">
    <header class="header dark-bg">
      <div class="toggle-nav">
        <div class="icon-reorder tooltips" data-original-title="Toggle Navigation" data-placement="bottom"><i class="icon_menu"></i></div>
      </div>

      <!--logo start-->
      <a href="Dashboard.php" class="logo"> <span class="lite">twakka Cafe</span></a>
      <!--logo end-->
      <div class="top-nav notification-row">
        <!-- notificatoin dropdown start-->
        <!-- user login dropdown start-->
          <li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="profile-ava">
                                <img alt="" src="img/admin.png" style="width:30px;">
                            </span>
                    <?php
                    if (isset($_GET['action']) && $_GET['action'] == "logout") {
                      Session::destroy();
                    }
                     ?>
                            <span class="username"><?php echo Session::get('adminUser');?></span>
                            <b class="caret"></b>
            </a>
            <ul class="dropdown-menu extended logout">
              <div class="log-arrow-up"></div>
              <li>
                <a href="?action=logout"><i class="icon_key_alt"></i> Log Out</a>
              </li>

            </ul>
          </li>
          <!-- user login dropdown end -->
        </div>
    </header>
    <!--header end-->
