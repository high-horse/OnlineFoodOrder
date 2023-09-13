<?php include 'inc/head.php';
      include 'inc/header.php';
      include 'inc/sidebar.php'; ?>
<?php include '../classes/Product.php'; ?>
<?php include_once '../helpers/Format.php'; ?>
<?php
  $pd = new Product();
  $fm = new Format();
 ?>
 <?php
 if (isset($_GET['delpro'])) {
     $id = preg_replace('/[^-a-zA-Z0-9_]/','', $_GET['delpro']);
     $delpro = $pd->delProById($id);
 }

 ?>
<!--main content start-->
<section id="main-content">
  <section class="wrapper">
    <!--overview start-->
    <div class="row">
      <div class="col-lg-12">
        <ol class="breadcrumb">
          <li><i class="fa fa-home"></i><a href="Dashboard.php">Home</a></li>
          <li><i class="fa fa-laptop"></i>Display Product</li>
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
      Product List
       </header>
        <div class="table-responsive">
      <table class="table table-striped table-advance table-hover">
         <tbody>
           <tr>
             <th> Serial Number</th>
             <th> Product Name</th>
             <th> Category Name</th>
             <th> Prdouct Price</th>
             <th><i class="icon_cogs"></i> Action</th>
           </tr>
           <?php
            $getPd = $pd->getAllProduct();
            if ($getPd) {
              $i = 0;
              while ($result = $getPd->fetch_assoc()) {
                $i++;
            ?>
            <tr>
             <td><?php echo $i;?></td>
             <td><?php echo $result['productName']?></td>
             <td><?php echo $result['catName']?></td>
             <td>Rs.<?php echo $result['price']?></td>

      <div class="btn-group">
      <td> Edit<a class="btn btn-primary" href="product_edit.php?proid=<?php echo $result['productId'];?>"><i class="icon_plus_alt2"></i></a>
      Delete<a class="btn btn-danger" onclick="return confirm('Are you sure to delete')" href="?delpro=<?php echo $result['productId'];?>"><i class="icon_close_alt2"></i></a></td>
      </div>
      </tr>
      <?php } } ?>
      </tbody>
     </table>
   </div>
   </section>
 </div>
</div>
<!-- page end-->
</section>
<!--main content end-->
</section>
<!-- container section start -->

<?php include 'inc/footer.php'; ?>
