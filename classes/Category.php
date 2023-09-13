<?php
include_once '../lib/Database.php';
include_once '../helpers/Format.php';
?>
<?php
class Category
{
  private $db;
  private $fm;

  public function __construct()
  {
    $this->db = new Database();
    $this->fm = new Format();
  }
  public function catInsert($catName)
  {
    $catName = $this->fm->validation($catName);
    $catName = mysqli_real_escape_string($this->db->link, $catName);

    if (empty($catName)) {

     $msg = "<div class='alert alert-danger fade in'>
             <button data-dismiss='alert' class='close close-sm' type='button'><i class='icon-remove'></i></button>
             Category field must not be empty !</div>";
     return $msg;
   }else {
      $query = "INSERT INTO tbl_category(catName) VALUES ('$catName')";
      $catinsert = $this->db->insert($query);
      if ($catinsert) {
        $msg = "<div class='alert alert-success fade in'>
                <button data-dismiss='alert' class='close close-sm' type='button'><i class='icon-remove'></i></button>
                Category Inserted Sucessfully !!</div>";
        return $msg;
      }else {
        $msg = "<div class='alert alert-danger fade in'>
                <button data-dismiss='alert' class='close close-sm' type='button'><i class='icon-remove'></i></button>
                Category  Not Inserted !!</div>";
        return $msg;
      }
   }

  }
  public function getAllCat() {
    $query = "SELECT * FROM tbl_category Order by catId DESC";
    $result = $this->db->select($query);
    return $result;

  }

  public function getCatById($id) {
    $query = "SELECT * FROM tbl_category WHERE  catId = '$id'";
    $result = $this->db->select($query);
    return $result;
  }

  public function catUpdate($catName, $id){
    $catName = $this->fm->validation($catName);
    $catName = mysqli_real_escape_string($this->db->link, $catName);
    $id      = mysqli_real_escape_string($this->db->link, $id);

    if (empty($catName)) {

     $msg = "<div class='alert alert-danger fade in'>
             <button data-dismiss='alert' class='close close-sm' type='button'><i class='icon-remove'></i></button>
             Category field must not be empty !</div>";
     return $msg;
   }else {
     $query = "UPDATE tbl_category
               SET
               catName = '$catName'
               WHERE catId = '$id'";
            $updated_row = $this->db->update($query);
            if ($updated_row) {
              $msg = "<div class='alert alert-success fade in'>
                      <button data-dismiss='alert' class='close close-sm' type='button'><i class='icon-remove'></i></button>
                      Category Updated Sucessfully !!</div>";
              return $msg;
            }else {
              $msg = "<div class='alert alert-danger fade in'>
                      <button data-dismiss='alert' class='close close-sm' type='button'><i class='icon-remove'></i></button>
                      Category Not Updated !!</div>";
              return $msg;

            }
          }
        }

       public function delCatById($id){
         $query = "DELETE FROM tbl_category WHERE catId = '$id'";
         $deldata = $this->db->delete($query);
         if ($deldata) {
           $msg = "<div class='alert alert-success fade in'>
                   <button data-dismiss='alert' class='close close-sm' type='button'><i class='icon-remove'></i></button>
                   Category Deleted Sucessfully !!</div>";
           return $msg;
         }else {
           $msg = "<div class='alert alert-danger fade in'>
                   <button data-dismiss='alert' class='close close-sm' type='button'><i class='icon-remove'></i></button>
                   Category Not Deleted !!</div>";
           return $msg;
              }

         }


    }


 ?>
