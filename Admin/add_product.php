<?php include 'inc/head.php';
      include 'inc/header.php';
      include 'inc/sidebar.php'; ?>
<?php include '../classes/Product.php'; ?>
<?php include '../classes/Category.php'; ?>

<?php
$pd = new Product();
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
  $insertProduct = $pd->productInsert($_POST, $_FILES);
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
          <li><i class="fa fa-laptop"></i>Add Product</li>
        </ol>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-10">
        <section class="panel">
          <header class="panel-heading">
          Add New Product
          </header>
          <div class="panel-body">
            <?php
             if (isset($insertProduct)) {
               echo $insertProduct;
             }

             ?>
            <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
              <div class="form-group">
                <label class="col-sm-2 control-label">Product Name</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="productName">
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
                    <option value="<?php echo $result['catId']?>"><?php echo $result['catName']?></option>
                    <?php }} ?>
                  </select>
                </div>
              </div>

              <?php /* <div class="form-group">
                <label class="control-label col-lg-2">Brand</label>
                <div class="col-lg-10">
                  <select class="form-control m-bot15" name="brandId">
                    <option>Select Brand</option>
                    <?php
                      $brand = new Brand();
                      $getBrand = $brand->getAllBrand();
                      if ($getBrand) {
                        while ($result = $getBrand->fetch_assoc() ) {
                    ?>
                    <option value="<?php echo $result['brandId']?>"><?php echo $result['brandName']?></option>
                    <?php }} ?>
                  </select>
                </div>
              </div>*/?>


              <div class="form-group">
                <label class="control-label col-sm-2">Description</label>
                <div class="col-sm-10">
                  <textarea class="form-control ckeditor" name="body" rows="6"></textarea>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Product Price</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="price">
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Upload Product Image</label>
                <div class="col-sm-10">
                  <input type="file" class="form-control" name="image">
                </div>
              </div>

<?php /*
              <div class="form-group">
                <label class="control-label col-lg-2">Product Type</label>
                <div class="col-lg-10">
                  <select class="form-control m-bot15" name="type">
                    <option value="0">Featured</option>
                  <option value="1">General</option></select>
                </div>
*/?>

                <div class="form-group">
                  <div class="col-lg-offset-2 col-lg-10">

                   <input type="submit" name="submit"  class="btn btn-primary" value="Add Product"/>
                 </div>
               </div>

                </form>
              </div>
            </section>
          </div>
        </div>



  </section>
<!--main content end-->
</section>
<!-- container section start -->

<?php include 'inc/footer.php'; ?>
