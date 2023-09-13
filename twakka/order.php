<?php include 'inc/head.php'; ?>
<?php
    $login = Session::get("cuslogin");
      if ($login == false) {
        echo "<script>window.location = 'login.php'; </script>";
      }

 ?>
<div class="page-head_agile_info_w3l">
		<div class="container">

			<!--/w3_short-->
				 <div class="services-breadcrumb">
						<div class="agile_inner_breadcrumb">

						   <ul class="w3_short">
								<li><a href="index.php">Home</a><i>|</i></li>
								<li>Single Page</li>
							</ul>
						 </div>
				</div>
	   <!--//w3_short-->
	</div>
</div>


  


<?php include 'inc/footer.php'; ?>
