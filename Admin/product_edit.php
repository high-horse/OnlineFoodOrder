<?php include 'inc/head.php';
      include 'inc/header.php';
      include 'inc/sidebar.php'; ?>
<?php include '../classes/Product.php'; ?>
<?php include '../classes/Category.php'; ?>
<?php
    if (!isset($_GET['proid']) || $_GET['proid'] == NULL) {
      echo "<script>window.location = 'display_product.php'; </script>";
    }else {
      $id = preg_replace('/[^-a-zA-Z0-9_]/','', $_GET['proid']);
    }

   $pd = new Product();
   if (isset($_SERVER['REQUEST_METHOD']) == 'POST' && isset($_POST["update"])) {
      $productName = $_POST['productName'];
      $catId = $_POST['catId'];
      $body = $_POST['body'];
      $price = $_POST['price'];
      $updateProduct = $pd->productUpdate($productName,$catId,$body,$price, $_FILES, $id);
      
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
          <li><i class="fa fa-laptop"></i>Update Product</li>
        </ol>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-10">
        <section class="panel">
          <header class="panel-heading">
          Update Product
          </header>
          <div class="panel-body">
            <?php
             if (isset($updateProduct)) {
                  echo $updateProduct;
             }
             ?>

             <?php
              $getPro = $pd->getProById($id);
              if ($getPro) {
                while ($value = $getPro->fetch_assoc()) {
              ?>

            <form class="form-horizontal" action="" method="post" name="updateForm" enctype="multipart/form-data">
              <div class="form-group">
                <label class="col-sm-2 control-label">Product Name</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="productName" value="<?php echo $value['productName']?>">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-lg-2">Category</label>
                <div class="col-lg-10">
                  <select class="form-control m-bot15" name="catId">
                    <option> Select Category </option>
                    <?php
                      $cat = new Category();
                      $getCat = $cat->getAllCat();
                      if ($getCat) {
                        while ($result = $getCat->fetch_assoc() ) {
                    ?>
                    <option
                    <?php
                    if ($value['catId'] == $result['catId']) {?>
                      selected = "selected"
                    <?php } ?>
                    value="<?php echo $result['catId'];?>"><?php echo $result['catName'];?></option>
                    <?php }} ?>
                  </select>
                </div>
              </div>

            

              <div class="form-group">
                <label class="control-label col-sm-2">Description</label>
                <div class="col-sm-10">
                  <textarea class="form-control ckeditor" name="body" rows="6">
                  <?php echo $value['body'];?>
                  </textarea>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Product Price</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="price" value="<?php echo $value['price'];?> ">
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Upload Product Image</label>
                <div class="col-sm-10">
                  <img src="<?php echo $value['image'];?>" height="300px" width="300px" /><br/>
                  <input type="file" class="form-control" name="image">
                </div>
              </div>


                <div class="form-group">
                  <div class="col-lg-offset-2 col-lg-10">
                   <input type="submit" name="update"  class="btn btn-primary" value="Update Product"/>
                 </div>
               </div>

                </form>
              <?php } } ?>
              </div>
            </section>
          </div>
        </div>



  </section>
<!--main content end-->
</section>
<!-- container section start -->

<?php include 'inc/footer.php'; ?>
