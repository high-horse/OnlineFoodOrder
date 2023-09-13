<?php
  include '../lib/Session.php';
  Session::init();
  include '../lib/Database.php';
  include '../helpers/Format.php';

  spl_autoload_register(function($class){
    include_once "../classes/".$class.".php";
   });
   $db  = new Database();
   $fm  = new Format();
   $pd  = new Product();
   $cat = new Category();
   $ct  = new Cart();
   $cmr = new Customer();
?>
<!DOCTYPE html>
<html>
<head>
<title>twakka Cafe</title>

<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); }
  </script>
<!--//tags -->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link rel="stylesheet" type="text/css" href="css/jquery-ui.css">
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/font-awesome.css" rel="stylesheet">
<link href="css/easy-responsive-tabs.css" rel='stylesheet' type='text/css'/>
<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" />
<link href="css/carts.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="css/checkout.css">
<!-- //for bootstrap working -->
<link href="https://fonts.googleapis.com/css?family=Concert+One" rel="stylesheet">

</head>
<body>

  <!-- header -->
  <div class="header" id="home">
  	<div class="container">
  		<ul>
	       <li><i class="fa fa-envelope-o" aria-hidden="true"></i> <a href="mailto:info@example.com">twakka@gmail.com</a></li>
  			<li><i class="fa fa-cart-arrow-down" aria-hidden="true"></i><a href="carts.php">Cart
  			<span style="color:#00e6ac;">
  				<?php
            $getData = $ct->checkCartTable();
            if ($getData) {
              $qty = Session::get("qty");
              $sum = Session::get("sum");
              echo "<span style='color:darkorange;'>(".$qty. ")</span></a>";

            }else {
              echo "<span style='color:darkorange;'>(Empty)</span></a>";
            }

  				 ?>
  			</span></li>
        <li> <a href="registration.php"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Sign Up </a></li>
        <?php
          if (isset($_GET['cid'])) {
            $delData = $ct->delCustomerCart();
            Session::destroy();
          }

         ?>


        <?php
            $login = Session::get("cuslogin");
              if ($login == False) {  ?>
                 <li> <a href="login.php"><i class="fa fa-unlock-alt" aria-hidden="true"></i> Sign In </a></li>
            <?php }else{?>
              <li> <a href="?cid=<?php Session::get('cmrId')?>"><i class="fa fa-unlock-alt" aria-hidden="true"></i> Logout </a></li>
            <?php } ?>
  		</ul>
  	</div>
  </div>
  <!-- //header -->
  <!-- header-bot -->
  <div class="header-bot">
  	<div class="header-bot_inner_wthreeinfo_header_mid">
  		<div class="col-md-4 header-middle">
  			<form action="search.php" method="post" name="formSearch">
          <table style="width:80%;">
            <tr>
            <td style="width:50px;margin:0px;">
              <input type="search" name="search" placeholder="Search here..." required="" style="width:100%;"/>
            <input type="hidden" id="action1_1" name="action1" value="1"/></td>
            <td style="width:15px;margin:0px;padding-left:10px;" align="left">
              <input type="submit" name="srch" value="" style="width:90%;"/>
            </td>
            </tr>
        </table>
  			</form>
  		</div>
  		<!-- header-bot -->
  			<div class="col-md-4 logo_agile">
  				<h1><a href="index.php"><span style="background-color:#111;border-radius:10px;">twakka</span><span style="color:darkorange;background-color:#fff;">Cafe</span></a></h1>
  			</div>
          <!-- header-bot -->
  		<div class="col-md-4 agileits-social top_content">
  		</div>
  		<div class="clearfix"></div>
  	</div>
  </div>
  <!-- //header-bot -->
  <!-- banner -->
  <div class="ban-top">
  	<div class="container">
  		<div class="top_nav_left">
  			<nav class="navbar navbar-default">
  			  <div class="container-fluid">
  				<!-- Brand and toggle get grouped for better mobile display -->
  				<div class="navbar-header">
  				  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
  					<span class="sr-only">Toggle navigation</span>
  					<span class="icon-bar"></span>
  					<span class="icon-bar"></span>
  					<span class="icon-bar"></span>
  				  </button>
  				</div>
  				<!-- Collect the nav links, forms, and other content for toggling -->
  				<div class="collapse navbar-collapse menu--shylock" id="bs-example-navbar-collapse-1">
  				  <ul class="nav navbar-nav menu__list">
  					<li class="active menu__item menu__item--current"><a class="menu__link" href="index.php">Home <span class="sr-only">(current)</span></a></li>
  					<li class="dropdown menu__item">
  						<a href="#" class="dropdown-toggle menu__link" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Menu <span class="caret"></span></a>
  							<ul class="dropdown-menu multi-column columns-3">

  								<div class="agile_inner_drop_nav_info">
  									<div class="col-sm-6 multi-gd-img" style="width:20%;">
  										<ul class="multi-column-dropdown">
                        <?php
                            $getCat = $cat->getAllCat();
                            if ($getCat) {
                              while ($result = $getCat->fetch_assoc()) {

                        ?>

  											<li><a href="productbycat.php?catId=<?php echo $result['catId'];?>"> <?php echo $result['catName']; ?></a></li>
                          <?php }} ?>

  										</ul>
  									</div>
                    <div class="col-sm-6 multi-gd-img1 multi-gd-text" style="width:70%;">
  										<img src="images/slider/bg3.jpg" alt=" "/>
  									</div>
  									<div class="clearfix"></div>

  								</div>

  							</ul>
  					</li>
  					<li class=" menu__item"><a class="menu__link" href="#contact">About</a></li>

            <?php
                $chkCart = $ct->checkCartTable();
                if ($chkCart) { ?>
                    <li class=" menu__item"><a class="menu__link" href="carts.php">Cart</a></li>
                    <li class=" menu__item"><a class="menu__link" href="payment.php">Payment</a></li>

               <?php  }?>

            <?php
                $login = Session::get("cuslogin");
                if ($login == true) {?>
                  <li class=" menu__item"><a class="menu__link" href="profile.php">Profile</a></li>
              <?php  }
             ?>

  					<li class=" menu__item"><a class="menu__link" href="#contact">Contact</a></li>
  				  </ul>
  				</div>
  			  </div>
  			</nav>
  		</div>

  		<div class="clearfix"></div>
  	</div>
  </div>
  <!-- //banner-top -->
