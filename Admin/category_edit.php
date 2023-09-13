<?php include 'inc/head.php';
      include 'inc/header.php';
      include 'inc/sidebar.php'; ?>
<?php include '../classes/Category.php'; ?>
<?php

    if (!isset($_GET['catid']) || $_GET['catid'] == NULL) {
      echo "<script>window.location = 'display_category.php'; </script>";
    }else {
      $id = preg_replace('/[^-a-zA-Z0-9_]/','', $_GET['catid']);
    }
    $cat = new Category();
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $catName = $_POST['catName'];

    $updateCat = $cat->catUpdate($catName, $id);
}
?>

      <!--main content start-->
      <section id="main-content">
        <section class="wrapper">
          <!--overview start-->
          <div class="row">
            <div class="col-lg-12">
              <ol class="breadcrumb">
                <li><i class="fa fa-home"></i><a href="">Home</a></li>
                <li><i class="fa fa-laptop"></i>Update Category</li>
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
                    if (isset($updateCat)) {
                      echo $updateCat;
                    }
                    ?>
                  <?php
                    $getCat = $cat->getCatById($id);
                    if ($getCat) {
                        while ($result = $getCat->fetch_assoc()) {
                  ?>
                  <form action="" method="post">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Add Category</label>
                      <input type="text"  name="catName" class="form-control" value="<?php echo $result['catName'];?>">
                    </div>
                  <button type="submit" class="btn btn-primary" name="submit">Save</button>
                  </form>
                  <?php }} ?>
                </div>
              </section>
            </div>

      </section>
      <!--main content end-->
    </section>
    <!-- container section start -->



  <?php include 'inc/footer.php'; ?>
