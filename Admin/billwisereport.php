<?php include 'inc/head.php';
      include 'inc/header.php';
      include 'inc/sidebar.php'; ?>
<?php include '../classes/Product.php'; ?>
<?php include_once '../helpers/Format.php'; ?>
<?php
  $pd = new Product();
  $fm = new Format();
  $db = new Database();
 ?>
<!--main content start-->
<section id="main-content">
  <section class="wrapper">
    <!--overview start-->
    <div class="row">
      <div class="col-lg-12">
        <ol class="breadcrumb">
          <li><i class="fa fa-home"></i><a href="Dashboard.php">Home</a></li>
          <li><i class="fa fa-laptop"></i>Orders</li>
        </ol>
      </div>
    </div>
    <?php
    if (isset($delpro)) {
        echo $delpro;
    }
     ?>

  <div class="row">
    <div class="col-lg-12">
     <section class="panel">
       <header class="panel-heading">
      Today's Orders
       </header>
        <div class="table-responsive">
      <table class="table table-striped table-advance table-hover">
         <tbody>
           <tr>
             <th> Item</th>
             <th> Quantity</th>
             <th> Ordered by</th>
             <th> Address</th>

             <th> Customer ID</th>
             <th> Time</th>
           </tr>
           <?php
           $query = "SELECT b.billId,c.productName as Item, c.quantity as Quantity,b.fname as Buyer,b.lname,b.fulladdress as Address,b.cid,b.sid,b.cdate FROM tbl_bill_details as b, tbl_cart as c
                     WHERE b.sid = c.sId AND cdate>=CURDATE()";
           $inserted_row = $db->select($query);

            if ($inserted_row) {
              $i = 0;
              while ($result = $inserted_row->fetch_assoc()) {
                $i++;
            ?>
            <tr>
             <td><?php echo $result['Item'];?></td>
             <td><?php echo $result['Quantity']?></td>
             <td><?php echo $result['Buyer']?></td>
             <td><?php echo $result['Address']?></td>
               <td><?php echo $result['cid']?></td>

      <div class="btn-group">
      <td> <?php echo $result['cdate']?></td>
      </div>
      </tr>
      <?php } } ?>
      </tbody>
     </table>
   </div>
   </section>
 </div>
</div>
<br />
<hr />
<br />
<div class="row">
  <div class="col-lg-12">
   <section class="panel">
     <header class="panel-heading">
    Bill Wise Report
     </header>
      <div class="table-responsive">
    <table class="table table-striped table-advance table-hover">
       <tbody>
         <tr>
           <th> Ordered by</th>
           <th> Address</th>
           <th> Customer ID</th>
           <th> Time</th>
           <th>Items With Quantity</th>
         </tr>
         <?php
         $query = "SELECT b.cid, b.fname AS Buyer, b.lname, b.fulladdress AS Address, b.billId, b.sid, b.cdate, GROUP_CONCAT(CONCAT(c.productName, ' (', c.quantity, ')') SEPARATOR ', ') AS ItemsWithQuantity FROM tbl_bill_details AS b JOIN tbl_cart AS c ON b.sid = c.sId JOIN tbl_customer AS tc ON tc.id = b.cid GROUP BY b.cid, b.fname, b.lname, b.fulladdress, b.billId, b.sid, b.cdate";
                //   print_r($query);die;
         $inserted_row = $db->select($query);

          if ($inserted_row) {
            $i = 0;
            while ($result = $inserted_row->fetch_assoc()) {
              $i++;
          ?>
          <tr>
           <td><?php echo $result['Buyer']?></td>
           <td><?php echo $result['Address']?></td>
           <td><?php echo $result['cid']?></td>
           <td><?php echo $result['ItemsWithQuantity']?></td>

    <div class="btn-group">
    <td> <?php echo $result['cdate']?></td>
    </div>
    </tr>
    <?php } } ?>
    </tbody>
   </table>
 </div>
 </section>
</div>
</div>
</section>
<!--main content end-->
</section>
<!-- container section start -->

<?php include 'inc/footer.php'; ?>
