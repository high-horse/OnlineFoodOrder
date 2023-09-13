<?php include 'inc/head.php';
      include 'inc/header.php';
      include 'inc/sidebar.php'; ?>
<?php include '../classes/Category.php'; ?>
<?php
$cat = new Category();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $catName = $_POST['catName'];

  $insertCat = $cat->catInsert($catName);
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
                <li><i class="fa fa-laptop"></i>Add Category</li>
              </ol>
            </div>
          </div>

          <div class="row">
            <div class="col-lg-10">
              <section class="panel">
                <header class="panel-heading">
                Add Category
                </header>
                <div class="panel-body">
                  <?php
                    if (isset($insertCat)) {
                      echo $insertCat;
                    }
                    ?>
                  <form action="add_category.php" method="post">
                    <div class="form-group">
                      <label >Add Category</label>
                      <input type="text"  name="catName" class="form-control" placeholder="Enter Category Name...">
                    </div>
                  <button type="submit" class="btn btn-primary" name="submit">Save</button>
                  </form>
                </div>
              </section>
            </div>

      </section>
      <!--main content end-->
    </section>
    <!-- container section start -->



  <?php include 'inc/footer.php'; ?>
