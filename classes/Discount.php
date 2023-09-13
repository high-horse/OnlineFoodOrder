
<?php
include_once '../lib/Database.php';
include_once '../helpers/Format.php';
?>
<?php
class Product
{
    private $db;
    private $fm;

    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }

    public function saveDiscount($data)
    {
        echo 123;
        die;
        // Extract the data sent via POST request
        $selectedProductId = $data['selectedProductId'];
        $selectedProduct = $data['selectedProduct'];
        $discountValue = $data['discountValue'];

        $sql = "INSERT INTO tbl_discount (product_id, product_name, discount_value) VALUES ('$selectedProductId', '$selectedProduct', '$discountValue')";

        $catinsert = $this->db->insert($sql);
        if ($catinsert) {
            $msg = "<div class='alert alert-success fade in'>
                  <button data-dismiss='alert' class='close close-sm' type='button'><i class='icon-remove'></i></button>
                  Category Inserted Sucessfully !!</div>";
            return $msg;
        } else {
            $msg = "<div class='alert alert-danger fade in'>
                  <button data-dismiss='alert' class='close close-sm' type='button'><i class='icon-remove'></i></button>
                  Category  Not Inserted !!</div>";
            return $msg;
        }
    }


}

?>
