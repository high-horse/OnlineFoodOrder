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
        <h3 class="wthree_text_info" style="color:#00cc99;">CHECKOUT<span></span></h3>
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



             <div class="col-md-9" id="checkout">

                 <div class="box">
                     <form method="post" action="payment3.php">
                         <h1>Checkout</h1>
                        <br/>
                         <ul class="nav nav-pills nav-justified">
                             <li><a href="payment.php"><i class="fa fa-map-marker"></i><br>Billing Details</a>
                             </li>
                          
                             <li class="active"><a href="#"><i class="fa fa-eye"></i><br>Order Review</a>
                             </li>
                         </ul>

                         <div class="content">
                                   <div class="row">


                                       <div class="col-sm-12">
                                           <div class="box payment-method">

                                               <h4>Thank You for Order</h4>

                                               <p></p>


                                           </div>
                                       </div>
                                   </div>
                                   <!-- /.row -->

                               </div>
                               <!-- /.content -->

                         <div class="box-footer">
                             <div class="pull-left">
                                 <a href="payment.php" class="btn btn-default"><i class="fa fa-chevron-left"></i> Back to Billing details</a>
                             </div>
                             <div class="pull-right">
                                 <button type="submit" class="btn btn-primary">Continue to Delivery Method <i class="fa fa-chevron-right"></i>
                                 </button>
                             </div>
                         </div>
                     </form>
                 </div>
                 <!-- /.box -->


             </div>
             <!-- /.col-md-9 -->

             <div class="col-md-3">

                 <div class="box" id="order-summary">
                     <div class="box-header">
                         <h3>Order summary</h3>
                     </div>
                      <p class="text-muted">Cash on Delivery *</p>

                     <p class="text-muted" style="color:red;">
                      Note : If the purchase is less than NRs 1000 delivery charge of NRs 150 will be charged .</p>
                      <br/>
                      <div class="box-header">
                        <p class="text-muted"><i class="fa fa-check-circle" style="color: #00cc00"></i> Half Strik Helmets </p>
                      </div>
                     <div class="table">
                         <table class="table">
                             <tbody>
                                 <tr>
                                     <td>Order subtotal</td>
                                     <th>446.00</th>
                                 </tr>

                                 <tr>
                                     <td>charge  *</td>
                                     <th>0.00</th>
                                 </tr>
                                 <tr class="total">
                                     <td>Total</td>
                                     <th>456.00</th>
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
