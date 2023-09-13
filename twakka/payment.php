<?php include 'inc/head.php'; ?>

<?php
    $login = Session::get("cuslogin");
      if ($login == false) {
        echo "<script>window.location = 'login.php'; </script>";
      }

 ?>
 <div class="sale-w3ls" style="min-height:200px;">
   <div class="container">

      <ul class="w3_short">
        <br/>
        <h3 class="wthree_text_info" style="color:darkorange;">CHECKOUT<span></span></h3>
       <li><a href="index.php">Home</a><i>|</i></li>
       <li>Checkout</li>
     </ul>
   </div>
 </div>


   <!-- /new_arrivals -->
 	<div class="new_arrivals_agile_w3ls_info">


      <div id="all">

     <div id="content">
         <div class="container">

                    <?php
                    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['Billing'])) {
                      $customerBill = $cmr->customerBilling($_POST);
                    }
                    ?>

             <div class="col-md-9" id="checkout">


                 <div class="box">
                   <?php
     									 $id = Session::get("cmrId");
     									 $getdata =$cmr->getCustomerData($id);
     									 if ($getdata) {
     										 while ($result = $getdata->fetch_assoc()) {
     							 ?>
                     <form method="post" action="#">
                         <h1>Checkout</h1>
                        <br/>
                         <ul class="nav nav-pills nav-justified" style="border:1px solid darkorange;">
                             <li class="active"><a href="#" style="background-color:darkorange;"><i class="fa fa-map-marker"></i><br>Billing Details</a>
                             </li>


                             <li class="disabled"><a href=""><i class="fa fa-eye"></i><br>Order Review</a>
                             </li>
                         </ul>

                         <div class="content">
                           <?php
                             if (isset($customerBill)) {
                               echo $customerBill;
                             }

                            ?>
                             <div class="row">
                               <div class="col-sm-6">
                                         <div class="form-group">
                                             <label for="firstname">Firstname  *</label>
                                             <input type="text" class="form-control" name="fname">
                                         </div>
                                     </div>
                                     <div class="col-sm-6">
                                         <div class="form-group">
                                             <label for="lastname">Lastname  *</label>
                                             <input type="text" class="form-control" name="lname">
                                         </div>
                                     </div>
                                     <div class="col-sm-6">
                                         <div class="form-group">
                                             <label for="lastname">Address  *</label>
                                             <input type="text" class="form-control" name="fulladdress">
                                         </div>
                                     </div>
                                 </div>
                                 <div class="row">

                                     <div class="col-sm-6 col-md-3">
                                         <div class="form-group">
                                             <label for="disabledInput">Country</label>
                                             <input class="form-control" id="disabledInput" type="text"  name="country" value="<?php echo $result['country'];?>" disabled>
                                         </div>
                                     </div>

                                     <div class="col-sm-6">
                                         <div class="form-group">
                                             <label  for="disabledInput">Phone *</label>
                                             <input class="form-control" id="disabledInput" type="text"  name="phone"  value="<?php echo $result['phone'];?>" disabled>
                                         </div>
                                     </div>
                                     <div class="col-sm-6">
                                         <div class="form-group">
                                             <label for="disabledInput">Email address *</label>
                                             <input class="form-control" id="disabledInput" type="text" name="email"  value="<?php echo $result['email'];?>" disabled>
                                         </div>
                                     </div>
                             </div>
                             <!-- /.row -->

                              <div class="row">
                                  <div class="col-sm-12">
                                    <div class="form-group">
                                      <label for="comment">Note *<span style="color:red">(Special Note While Delivery)</span></label>
                                      <textarea class="form-control" rows="5" id="comment" name="note"></textarea>
                                    </div>
                                      </div>
                              </div>
                              </div>

                              <div class="row">


                                  <div class="col-sm-12">
                                      <div class="box payment-method">

                                          <h4>PAYMENT METHOD</h4><br/>

                                          <p>Cash on delivery (COD) </p>
                                          <p>Paypal </p>

                                          <div class="box-footer text-left">
                                              <input type="radio" name="payment" value="payment3">
                                          <label> I’ve read and accept the <a href="terms.php" style="color:darkorange;"> terms & conditions</label>

                                          </di  v>
                                      </div>
                                  </div>
                              </div>
                              <!-- /.row -->

                         <div class="box-footer">
                             <div class="pull-left">
                                 <a href="carts.php" class="btn btn-default"><i class="fa fa-chevron-left"></i> Back to Cart</a>
                             </div>
                             <div class="pull-right">
                                 <button type="submit" id="cont" name="Billing" class="btn btn-primary" style="background-color:darkorange;border:0px;">Continue with COD <i class="fa fa-chevron-right"></i>
                                 </button>
                                 <button type="button" id="btnCheckout" name="Billing" class="btn btn-success ">Continue with Paypal <i class="fa fa-chevron-right"></i>
                                 </button>
                             </div>
                         </div>
                     </form>
                      <?php }} ?>
                 </div>
                 <!-- /.box -->

</div>
             </div>
             <!-- /.col-md-9 -->

             <div class="col-md-3">

                 <div class="box" id="order-summary">
                     <div class="box-header">
                         <h3>Order summary</h3>
                     </div>
                     <p class="text-muted" style="color:red; height:200px;">
                      Note : <br />
                      <span style="font-size:10px;">(For cash on delivery)</span><br />
                      Delivery charge <span style="font-size:24px;">Rs.150</span>
                      <br/>
                      <br />
                      <span style="font-size:10px;">(For online payment)</span><br />
                      Delivery charge <span style="font-size:24px;">FREE</span></p>
                      <div class="box-header">
                        <p class="text-muted">
                          <?php
                          $getPro = $ct->getCartProduct();
                          if ($getPro) {
                            $sum = 0;
                            $qty = 0;
                            $subTtl=0;
                            while ($result = $getPro->fetch_assoc()) {
                           ?>
                          <i class="fa fa-check-circle" style="color: #00cc00"></i>
                           <?php echo $result['productName']."<br />";

                           $subTtl +=$result['price'];}}?></p>
                      </div>
                     <div class="table">
                         <table class="table">
                             <tbody>
                                 <tr>
                                     <td>Order subtotal</td>
                                     <th>Rs.<?php echo $subTtl+(0.1*$subTtl);?></th>
                                 </tr>

                                 <tr>
                                     <td>charge  *<br />
                                     <span style="font-size:12px;color:Blue;">(online payment)</span></td>
                                     <th>Rs.150.00<br /><span style="font-size:12px;color:Blue;">(0.00)</span></th>
                                 </tr>
                                 <tr class="total">
                                     <td>Total<br />
                                     <span style="font-size:12px;color:Blue;">(online payment)</span></td>
                                     <th>Rs.<span id="total_payment"><?php echo $subTtl+(0.1*$subTtl)+150;?></span> /-<br />
                                     <span style="font-size:12px;color:Blue;">(<?php echo $subTtl+(0.1*$subTtl);?>/-)</span></th>
                                 </tr>
                             </tbody>
                         </table>
                     </div>

                 </div>

             </div>
             <!-- /.col-md-3 -->

         </div>
         <!-- /.container -->

     </div>
     <!-- /#content -->
   </div>


 		</div>
 	<!-- //new_arrivals -->


<?php include 'inc/footer.php'; ?>
