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
                        <b>Discount Setup</b>
                    </header>
                    <div class="table-responsive">
                        <table class="table table-striped table-advance table-hover" id="orderReport">
                            <thead>
                                <tr>
                                    <th>Item</th>
                                    <th>Discount</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <?php
                            $query = "select * from tbl_product ";
                            $inserted_row = $db->select($query);

                            if ($inserted_row) {
                                $i = 0;
                                while ($result = $inserted_row->fetch_assoc()) {
                                    $i++;
                                }
                            }
                            ?>
                            <tbody>
                                <tr>
                                    <td>
                                        <select name="product[]" class="form-control">
                                            <?php foreach ($inserted_row as $row) { ?>
                                                <option value="<?php echo $row['productId']; ?>"><?php echo $row['productName']; ?></option>
                                            <?php } ?>
                                            <!-- Add more options if needed -->
                                        </select>
                                    </td>
                                    <td><input type="number" name="discount[]" class="form-control"></td>
                                    <td><button class="add-button btn btn-primary btn-lg">Add</button></td>
                                </tr>
                                <!-- Add more rows if needed -->
                            </tbody>
                        </table>
                    </div>
                </section>
            </div>
        </div>
        <br />
        <hr />
        <br />
        <div class="table-responsive">
            <table class="table table-striped table-advance table-hover" id="discount_table">
                <thead>
                    <tr>
                        <td>Product ID</td>
                        <td>Item</td>
                        <td>Discount</td>
                        <td>Action</td>
                    </tr>
                </thead>
                <tbody id="discount_table_body">

                </tbody>
            </table>
        </div>
    </section>
    <!--main content end-->
</section>
<!-- container section start -->

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const addButtons = document.querySelectorAll(".add-button");
        addButtons.forEach(function(button) {
            button.addEventListener("click", function() {
                const row = button.parentElement.parentElement;
                const selectedOption = row.querySelector("select[name='product[]']");
                const selectedProductId = selectedOption.value;
                const selectedProduct = selectedOption.options[selectedOption.selectedIndex].textContent;

                const discountInput = row.querySelector("input[name='discount[]']");
                const discountValue = discountInput.value;

                console.log("Selected Product ID:", selectedProductId, selectedProduct);
                console.log("Discount Value:", discountValue);

                let tbody = document.getElementById('discount_table_body')

                let html = `
                    <tr>
                        <td>${selectedProductId}</td>
                        <td>${selectedProduct}</td>
                        <td>${discountValue}</td>
                        <td><a href="#" id="${selectedProductId}" class="btn btn-danger">Delete</a></td>
                    </tr>
                `;

                tbody.insertAdjacentHTML('beforeend', html);

                const data = {
                    selectedProductId: selectedProductId,
                    selectedProduct: selectedProduct,
                    discountValue: discountValue
                };

                fetch('../classes/Discount.php', {
                        method: 'POST',
                        body: JSON.stringify(data),
                        headers: {
                            'Content-Type': 'application/json'
                        }
                    })
                    .then(response => response.json())
                    .then(result => {
                        console.log('Response:', result);
                    })
                    .catch(error => {
                        console.error('Error:', error);
                    });

            });
        });
    });
</script>


<?php include 'inc/footer.php'; ?>