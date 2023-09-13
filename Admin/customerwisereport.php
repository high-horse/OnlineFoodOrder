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

<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
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
  <div class="col-lg-12">
   <section class="panel">
     <header class="panel-heading">
    Customer Wise Report
     </header>
      <div class="table-responsive">
<table id="customerwisetable" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th>S.N</th>
                <th>Customer Name</th>
                <th>Ordered Quantity</th>
                <th>Most Ordered</th>
                <th>Ordered Date</th>
                <th>Total Order Cost</th>
            </tr>
        </thead>
        <tbody id = "tbody">
        <tr>
                <td>Ashton Cox</td>
                <td>Junior Technical Author</td>
                <td>San Francisco</td>
                <td>66</td>
                <td>2009-01-12</td>
                <td>$86,000</td>
            </tr>
            <tr>
                <td>Cedric Kelly</td>
                <td>Senior Javascript Developer</td>
                <td>Edinburgh</td>
                <td>22</td>
                <td>2012-03-29</td>
                <td>$433,060</td>
            </tr>
</tbody>
</table>
 </div>
 </section>
</div>
</section>
<!--main content end-->
</section>
<script src = "https://code.jquery.com/jquery-3.7.0.js"></script>
<script src = "https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src = "https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
<script>
$(document).ready(function() {
    new DataTable('#customerwisetable');
});


    </script>









<?php include 'inc/footer.php'; ?>