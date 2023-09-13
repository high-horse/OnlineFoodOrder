<?php include 'inc/head.php'; ?>
<div class="sale-w3ls" style="min-height:250px;">
	<div class="container">

		 <ul class="w3_short">
			 <br/>
			 <h3 class="wthree_text_info" style="color:darkorange;">Registration<span></span></h3>
			<li><a href="index.php" style="color:darkorange;">Home</a><i>|</i></li>
			<li>Registration</li>
		</ul>
	</div>
</div>
<!-- banner-bootom-w3-agileits -->
 <div class="banner-bootom-w3-agileits">
 <div class="container">

   <div class="modal-dialog">
				<!-- Modal content-->
				<div class="modal-content">


         <?php

         if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['register'])) {
           $customerReg = $cmr->customerRegistration($_POST);
         }
         ?>


           <div class="modal-body modal-body-sub_agile">
           <div class="col-md-8 modal_body_left modal_body_left1">
             <?php
               if (isset($customerReg)) {
                 echo $customerReg;
               }

              ?>
           <h3 class="agileinfo_sign">Sign Up</span></h3>
            <form action="#" method="post">
             <div class="styled-input agile-styled-input-top">
               <input type="text" name="name" required="">
               <label>Name</label>
               <span></span>
             </div>
             <div class="styled-input">
               <input type="text" name="country" required="">
               <label>Country</label>
               <span></span>
             </div>
             <div class="styled-input">
               <input type="text" name="phone" required="">
               <label>Phone</label>
               <span></span>
             </div>
             <div class="styled-input">
               <input type="email" name="email" required="">
               <label>Email</label>
               <span></span>
             </div>

             <div class="styled-input">
               <input type="password" name="pass" required="">
               <label>Password</label>
               <span></span>
             </div>

             <input type="submit"  name="register" value="Sign Up">
           </form>

           <div class="clearfix"></div>


           </div>
           <div class="col-md-4 modal_body_right modal_body_right1">
						</div>

           <div class="clearfix"></div>
         </div>

       <!-- //Modal content-->
     </div>
     </div>


 </div>
 </div>

<?php include 'inc/footer.php'; ?>
