
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
   public function productInsert($data, $file){
     $productName = mysqli_real_escape_string($this->db->link, $data['productName']);
     $catId       = mysqli_real_escape_string($this->db->link, $data['catId']);

     $body        = mysqli_real_escape_string($this->db->link, $data['body']);
     $price       = mysqli_real_escape_string($this->db->link, $data['price']);

     $permited   = array('jpg', 'jpeg', 'png', 'gif');
     $file_name  = $file['image']['name'];
     $file_size  = $file['image']['size'];
     $file_temp  = $file['image']['tmp_name'];

     $div = explode('.', $file_name);
     $file_ext = strtolower(end($div));
     $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
     $uploaded_image = "upload/".$unique_image;
     if ($productName == "" || $catId == "" || $price == "" || $file_name == ""){
        $msg = "<div class='alert alert-danger fade in'>
                <button data-dismiss='alert' class='close close-sm' type='button'><i class='icon-remove'></i></button>
                 Field must not be empty !</div>";
        return $msg;
     }elseif (in_array($file_ext, $permited) === false){
       echo "<div class='alert alert-danger fade in'>
               <button data-dismiss='alert' class='close close-sm' type='button'><i class='icon-remove'></i></button>
                You can upload only:- !".implode(',', $permited)."</div>";
    }else {
          move_uploaded_file($file_temp, $uploaded_image);
          $query = "INSERT INTO tbl_product(productName,catId,body,price,image)
                    VALUES('$productName','$catId','$body','$price','$uploaded_image')";
          $inserted_row = $this->db->insert($query);
          if ($inserted_row) {
            $msg = "<div class='alert alert-success fade in'>
                    <button data-dismiss='alert' class='close close-sm' type='button'><i class='icon-remove'></i></button>
                    Product Inserted Sucessfully !!</div>";
            return $msg;
          }else {
            $msg = "<div class='alert alert-danger fade in'>
                    <button data-dismiss='alert' class='close close-sm' type='button'><i class='icon-remove'></i></button>
                    Product Not Inserted !!</div>";
            return $msg;
          }
     }
  }

  public function getAllProduct(){
    $query = "SELECT p.*, c.catName
              FROM tbl_product as p, tbl_category as c
              WHERE p.catId = c.catId
              ORDER BY p.productId DESC";
    $result = $this->db->select($query);
    return $result;
  }
  public function getProById($id){
    $query = "SELECT * FROM tbl_product WHERE productId = '$id'";
    $result = $this->db->select($query);
    return $result;
  }

  public function productUpdate($productN,$catI,$bod,$pric, $file, $id){
    $productName = mysqli_real_escape_string($this->db->link, $productN);
    $catId       = mysqli_real_escape_string($this->db->link, $catI);

    $body        = mysqli_real_escape_string($this->db->link, $bod);
    $price       = mysqli_real_escape_string($this->db->link, $pric);

    $permited   = array('jpg', 'jpeg', 'png', 'gif');
    $file_name  = $file['image']['name'];
    $file_size  = $file['image']['size'];
    $file_temp  = $file['image']['tmp_name'];

    $div = explode('.', $file_name);
    $file_ext = strtolower(end($div));
    $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
    $uploaded_image = "upload/".$unique_image;
    if ($productName == "" || $catId == "" || $price == "" ){
       $msg = "<div class='alert alert-danger fade in'>
               <button data-dismiss='alert' class='close close-sm' type='button'><i class='icon-remove'></i></button>
                Field must not be empty!</div>";
       return $msg;
    }else{
          if (!empty($file_name)) {

              if (in_array($file_ext, $permited) === false){
                  echo "<div class='alert alert-danger fade in'>
                        <button data-dismiss='alert' class='close close-sm' type='button'><i class='icon-remove'></i></button>
                        You can upload only:- !".implode(',', $permited)."</div>";
          }else {
            move_uploaded_file($file_temp, $uploaded_image);
            $query = "UPDATE tbl_product
                      SET
                      productName = '$productName',
                      catId       = '$catId',

                      body        = '$body',
                      Price       = '$price',
                      image       = '$uploaded_image',
                      WHERE productId = '$id'";
         $updated_row = $this->db->update($query);
         if ($updated_row) {
           $msg = "<div class='alert alert-success fade in'>
                   <button data-dismiss='alert' class='close close-sm' type='button'><i class='icon-remove'></i></button>
                   Product Updated Sucessfully !!</div>";
           return $msg;
         }else {
           $msg = "<div class='alert alert-danger fade in'>
                   <button data-dismiss='alert' class='close close-sm' type='button'><i class='icon-remove'></i></button>
                   Product Not Updated !!</div>";
           return $msg;
              }
            }
          }else{
            $query = "UPDATE tbl_product
                      SET
                      productName = '$productName',
                      catId       = '$catId',

                      body        = '$body',
                      Price       = '$price',
                      WHERE productId = '$id'";
            $updated_row = $this->db->update($query);
            if ($updated_row) {
              $msg = "<div class='alert alert-success fade in'>
                      <button data-dismiss='alert' class='close close-sm' type='button'><i class='icon-remove'></i></button>
                      Product Updated Sucessfully !!</div>";
              return $msg;
            }else {
              $msg = "<div class='alert alert-danger fade in'>
                      <button data-dismiss='alert' class='close close-sm' type='button'><i class='icon-remove'></i></button>
                      Product Not Updated !!</div>";
              return $msg;
                 }

                }
          }

      }

      public function delProById($id){
        $query = "SELECT * FROM tbl_product WHERE productId = '$id'";
        $getData = $this->db->select($query);
        if ($getData) {
          while ($delImg = $getData->fetch_assoc()) {
            $dellink = $delImg['image'];
            unlink($dellink);
          }
        }

        $delquery = "DELETE FROM tbl_product WHERE productId = '$id'";
        $deldata = $this->db->delete($delquery);
        if ($deldata) {
          $msg = "<div class='alert alert-success fade in'>
                  <button data-dismiss='alert' class='close close-sm' type='button'><i class='icon-remove'></i></button>
                  Product Deleted Sucessfully !!</div>";
          return $msg;
        }else {
          $msg = "<div class='alert alert-danger fade in'>
                  <button data-dismiss='alert' class='close close-sm' type='button'><i class='icon-remove'></i></button>
                  Product Not Deleted !!</div>";
          return $msg;
             }
      }

    public function getFeaturedProduct(){
      $query = "SELECT * FROM tbl_product ORDER BY productId DESC LIMIT 4";
      $result = $this->db->select($query);
      return $result;
    }
    public function getNewProduct(){
      $query = "SELECT * FROM tbl_product ORDER BY productId DESC LIMIT 4";
      $result = $this->db->select($query);
      return $result;

    }
    public function getSingleProduct($id){
      $query = "SELECT p.*, c.catName
                FROM tbl_product as p, tbl_category as c
                WHERE p.catId = c.catId AND p.productId = '$id'";
      $result = $this->db->select($query);
      return $result;

    }

    public function productByCat($id){
      $catId   = mysqli_real_escape_string($this->db->link, $id);
      $query  = "SELECT * FROM tbl_product WHERE catId = '$catId'";
      $result = $this->db->select($query);
      return $result;
    }

}

?>
