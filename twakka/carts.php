<?php include 'inc/head.php'; ?>
<div class="sale-w3ls" style="min-height:200px;">
  <div class="container">

     <ul class="w3_short">
       <br/>
       <h3 class="wthree_text_info" style="color:darkorange;">CART<span></span></h3>
      <li><a href="index.php">Home</a><i>|</i></li>
      <li>Cart</li>
    </ul>
  </div>
</div>

<?php
    if (isset($_GET['delpro'])) {
      $delId = preg_replace('/[^-a-zA-Z0-9_]/','', $_GET['delpro']);
      $delProduct = $ct->delProductByCart($delId);
    }

?>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $cartId     = $_POST['cartId'];
    $quantity   = $_POST['quantity'];
    $updateCart = $ct->updateCartQuantity($cartId, $quantity);
    if ($quantity <=0) {
      $delProduct = $ct->delProductByCart($cartId);
    }
  }

 ?>
 <?php
    if (!isset($_GET['id'])) {
      echo "<meta http-equiv='refresh' content='0;URL=?id=live'";
    }


  ?>
<!-- cart section-->

<div class="cart1">
    <div class="container">

    <div class="col-md-9 cart1-items">
      <?php
          if (isset($updateCart)) {
            echo $updateCart;
          }

          if (isset($delProduct)) {
            echo $delProduct;
          }
      ?>

      <div class="cart1-header">
        <?php
        $getPro = $ct->getCartProduct();
        if ($getPro) {
          $sum = 0;
          $qty = 0;
          while ($result = $getPro->fetch_assoc()) {

         ?>
         <div class="cart1-sec">
           <div class="cart1-item cyc">
              <img src="../admin/<?php echo $result['image'];?>"/>
           </div>
            <div class="cart1-item-info">
              <h3><?php echo $result['productName'];?></h3>
              <br/>
              <h5>Unit Price :: Rs. <?php echo $result['price'];?></h5>
              <form action="#" method="post">
              <p class="qty">Qty ::</p>
              <input type="hidden" name="cartId" value="<?php echo $result['cartId'];?>" style="width:130px; height:30px" class="form-control input-small">
              <input type="number" name="quantity" value="<?php echo $result['quantity'];?>" style="width:130px; height:30px" class="form-control input-small">
              <p class="qty"><input type="submit" class="btn btn-success btn-sm" name="submit" value="Update Quantity"></p>
            </form>
              </div>
              <div class="clearfix"></div>

           <div class="delivery">
             <p>Total Price :: Rs.
             <?php
             $total = $result['price'] * $result['quantity'];
             echo $total;
             ?></p>
             <span><a onclick="return confirm('Are You Sure To Delete !');" href="?delpro=<?php echo $result['cartId'];?>">Remove from Cart</a></span>
              <div class="clearfix"></div>
               </div>
         </div>
         <?php
            $qty = $qty + $result['quantity'];
            $sum = $sum + $total;
            Session::set("qty", $qty);
            Session::set("sum", $sum);
         ?>
       <?php } } ?>
      </div>



    <div class="col-md-3 cart1-total">
      <a class="continue" href="menu.php?#all" style="width:250px; height:40px">ORDER OTHER</a>

      <?php
      $getData = $ct->checkCartTable();
      if ($getData) {
      ?>
      <div class="price-details">
        <h3>Price Details</h3>
        <span>Total</span>
        <span class="total">Rs.<?php echo $sum;?></span>
        <span>Discount</span>
        <span class="total">---</span>
        <span>Charges</span>
        <span class="total">10%</span>
        <div class="clearfix"></div>
      </div>
      <h4 class="last-price">TOTAL</h4>
      <span class="total final">
      Rs.<?php
      $vat = $sum * 0.1;
      $gtotal = $sum + $vat;
      echo $gtotal;
      ?>
      </span>

      <div class="clearfix"></div>
      <a class="order" href="payment.php" style="width:250px; height:60px">PROCEED TO CHECKOUT </a>
      <div class="total-item">

      </div>

    <?php }else {

          echo "<script>window.location = 'index.php'; </script>";
    }?>
     </div>
  </div>
</div>
</div>
<?php include 'inc/footer.php'; ?>
