<?php include 'inc/head.php'; ?>
<?php
    $login = Session::get("cuslogin");
      if ($login == false) {
        echo "<script>window.location = 'login.php'; </script>";
      }

 ?>
 <?php
  $cmrId = Session::get("cmrId");
  if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
			 $updateCmr = $cmr->customerUpdate($_POST, $cmrId);
		 }
 ?>

<div class="page-head_agile_info_w3l">
		<div class="container">

			<!--/w3_short-->
				 <div class="services-breadcrumb">
						<div class="agile_inner_breadcrumb">
                 		  <h3 class="wthree_text_info">Account Setting</h3>
						   <ul class="w3_short">
								<li><a href="index.php">Home</a><i>|</i></li>
								<li>Profile</li>
							</ul>
						 </div>
				</div>
	   <!--//w3_short-->
	</div>
</div>

<!-- banner-bootom-w3-agileits -->
 <div class="banner-bootom-w3-agileits">
 <div class="container">
   <!-- faq-banner -->
   	<div class="faq">
      <div class="container">
   			<div class="panel-group w3l_panel_group_faq" id="accordion" role="tablist" aria-multiselectable="true">
   			  <div class="panel panel-default">
   				<div class="panel-heading" role="tab" id="headingOne">
   				  <h4 class="panel-title asd">
   					<a style="background:#222;margin-left:-15px;padding:5px;color:#fff;border-radius:5px;" class="pa_italic" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
   					   Personal Details
   					</a>
   				  </h4>
   				</div>
   				<div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
   				  <div class="panel-body panel_text">
              <?php
                if (isset($updateCmr)) {
                    echo $updateCmr;
                }
               ?>

							<div class="modal-body modal-body-sub_agile">
							<div class="col-md-8 modal_body_left modal_body_left1">
							<?php
									 $id = Session::get("cmrId");
									 $getdata =$cmr->getCustomerData($id);
									 if ($getdata) {
										 while ($result = $getdata->fetch_assoc()) {
							 ?>
						<form action="#" method="post">

						 <div class="styled-input agile-styled-input-top">

							 <input type="text" name="name" value="<?php echo $result['name'];?>" >
							 <label>Name</label>
							 <span></span>
						 </div>
						 <div class="styled-input">
							 <input type="email" name="email" value="<?php echo $result['email'];?>" >
							 <label>Email</label>
							 <span></span>
						 </div>
						 <div class="styled-input">
							 <input type="password" name="pass" value="<?php echo $result['pass'];?>" >
							 <label>Password</label>
							 <span></span>
						 </div>

						 <div class="styled-input">
							 <input type="text" name="phone" value="<?php echo $result['phone'];?>" >
							 <label>Phoe Number</label>
							 <span></span>
						 </div>
						 <div class="styled-input">
							 <input type="text" name="country" value="<?php echo $result['country'];?>" >
							 <label>Country</label>
               <br/>
							 <span><a href="#collapseOne"> Edit </a></span>
						 </div>
						 <br/>
						   <input type="submit" name="submit" value="Save">
					 </form>
				 <?php }} ?>
					 <div class="clearfix"></div>
				 </div>
			 </div>
			 <!-- end of form-->
   				  </div>
   				</div>
   			  </div>
				</div>
			</div>
   			  <div class="panel panel-default">
   				<div class="panel-heading" role="tab" id="headingTwo">
   				  <h4 class="panel-title asd">
   					<a style="background:#222;padding:5px;color:#fff;border-radius:5px;" class="pa_italic collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
   					 Order
   					</a>
   				  </h4>
   				</div>
   				<div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
   				   <div class="panel-body panel_text">

   				  </div>
   				</div>
   			  </div>
   			  <div class="panel panel-default">
   				<div class="panel-heading" role="tab" id="headingThree">
   				  <h4 class="panel-title asd">
   					<a style="background:#222;padding:5px;color:#fff;border-radius:5px;" class="pa_italic collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
							Return / Exchange
   					</a>
   				  </h4>
   				</div>
   				<div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
   				   <div class="panel-body panel_text">

        		</div>
   				  </div>
   				</div>
   			  </div>

   			</div>
   			</div>
   	</div>
   <!-- //faq-banner -->

</div>
</div>

<?php include 'inc/footer.php'; ?>
