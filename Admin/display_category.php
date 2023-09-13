' <?php include 'inc/head.php';
      include 'inc/header.php';
      include 'inc/sidebar.php'; ?>
<?php include '../classes/Category.php'; ?>
<?php
$cat = new Category();
if (isset($_GET['delcat'])) {
    $id = preg_replace('/[^-a-zA-Z0-9_]/','', $_GET['delcat']);
  $delCat = $cat->delCatById($id);
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
                <li><i class="fa fa-laptop"></i>Display Category</li>
              </ol>
            </div>
          </div>

          <?php
          if (isset($delCat)) {
            echo $delCat;
          }
           ?>

          <div class="row">
          <div class="col-lg-12">
           <section class="panel">
             <header class="panel-heading">
             Category List
             </header>
              <div class="table-responsive">
            <table class="table table-striped table-advance table-hover">
               <tbody>
                 <tr>
                   <th>Serial Number</th>
                   <th> Category Name</th>
                   <th><i class="icon_cogs"></i> Action</th>
                 </tr>
                 <?php
                      $getCat = $cat->getAllCat();
                      if ($getCat) {
                        $i=0;
                        while($result = $getCat->fetch_assoc()){
                          $i++;
                    ?>
                 <tr>
                   <td><?php echo $i;?></td>
                   <td><?php echo $result['catName'];?></td>

                     <div class="btn-group">
                      <td> Edit<a class="btn btn-primary" href="category_edit.php?catid=<?php echo $result['catId'];?>"><i class="icon_plus_alt2"></i></a>
                       Delete<a class="btn btn-danger" onclick="return confirm('Are you sure to delete')" href="?delcat=<?php echo $result['catId'];?>"><i class="icon_close_alt2"></i></a></td>
                     </div>
                   </tr>
                <?php }} ?>
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
