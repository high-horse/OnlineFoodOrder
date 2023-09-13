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
                        <b>All Recent Orders</b>
                    </header>
                    <div class="table-responsive">
                        <table class="table table-striped table-advance table-hover" id="orderReport">
                            <thead>
                                <tr>
                                    <th> Item</th>
                                    <th> Quantity</th>
                                    <th> Ordered by</th>
                                    <th> Phone</th>
                                    <th> Customer ID</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $query = "SELECT c.*, o.* FROM tbl_customer c JOIN tbl_cart o ON c.id = o.customer_id; ";
                                // $query = "SELECT b.billId,c.productName as Item, c.quantity as Quantity,b.fname as Buyer,b.lname,b.fulladdress as Address,b.cid,b.sid,b.cdate FROM tbl_bill_details as b, tbl_cart as c
                                //  WHERE b.sid = c.sId ";
                                // --  AND cdate>=CURDATE()";
                                $inserted_row = $db->select($query);

                                if ($inserted_row) {
                                    $i = 0;
                                    while ($result = $inserted_row->fetch_assoc()) {
                                        $i++;
                                ?>
                                        <tr>
                                            <td><?php echo $result['productName']; ?></td>
                                            <td><?php echo $result['quantity'] ?></td>
                                            <td><?php echo $result['name'] ?></td>
                                            <td><?php echo $result['phone'] ?></td>
                                            <td><?php echo $result['id'] ?></td>
                                        </tr>
                                <?php }
                                } ?>
                            </tbody>
                        </table>
                    </div>
                </section>
            </div>
        </div>
        <br />
        <hr />
        <br />
    </section>
    <!--main content end-->
</section>
<!-- container section start -->

<style>
    #orderReport_filter {
        text-align: left !important;
        /* Align the search input to the left */
    }

    .dt-buttons {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
        justify-content: flex-end;
    }

    .buttons-copy,
    .buttons-excel,
    .buttons-pdf {
        background-color: #007bff;
        color: #fff;
        border: none;
        padding: 6px 12px;
        /* Adjust padding to make buttons smaller */
        border-radius: 4px;
        cursor: pointer;
        font-size: 14px;
        /* Adjust font size to make buttons smaller */
    }

    .buttons-copy:hover,
    .buttons-excel:hover,
    .buttons-pdf:hover {
        background-color: #0056b3;
    }
</style>

<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js"></script>
<script>
    $(document).ready(function() {
        new DataTable('#orderReport', {
            dom: 'Bfrtip',
            buttons: [
                'copy', 'excel', 'pdf'
            ]
        });
    });
</script>

<?php include 'inc/footer.php'; ?>