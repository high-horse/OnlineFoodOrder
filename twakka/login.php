<?php include 'inc/head.php'; ?>
<?php
    $login = Session::get("cuslogin");
      if ($login == true) {
        echo "<script>window.location = 'order.php'; </script>";
      }

 ?>
 <div class="sale-w3ls" style="min-height:250px;">
   <div class="container">

      <ul class="w3_short">
        <br/>
        <h3 class="wthree_text_info" style="color:darkorange;">LOGIN<span></span></h3>
       <li><a href="index.php" style="color:darkorange;">Home</a><i>|</i></li>
       <li>Login</li>
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
            if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {
                  $custLogin = $cmr->customerLogin($_POST);
                }
            ?>
        <div class="modal-body modal-body-sub_agile">
         <div class="col-md-8 modal_body_left modal_body_left1">
           <?php
             if (isset($custLogin)) {
               echo $custLogin;
             }
            ?>
         <h3 class="agileinfo_sign">Login In</h3>
            <form action="#" method="post">
           <div class="styled-input agile-styled-input-top">
             <input type="email" name="email" required="">
             <label>Email</label>
             <span></span>
           </div>
           <div class="styled-input">
             <input type="password" name="pass" required="">
             <label>Password</label>
             <span></span>
           </div><br/>
           <input type="submit" name="login" value="Sign In">
         </form>
                <div class="clearfix"></div>
                <br/>
                <p> Don't have an account?<a href="registration.php" style="color:red;"> Click Here</a></p>

         </div>
         <div class="col-md-4 modal_body_right modal_body_right1">
         </div>
         <div class="clearfix"></div>
       </div>
     </div>
     <!-- //Modal content-->

</div>



 </div>
 </div>

<?php include 'inc/footer.php'; ?>
