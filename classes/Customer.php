<?php
include_once '../lib/Database.php';
include_once '../helpers/Format.php';
?>
<?php
class Customer
{
  private $db;
  private $fm;

  public function __construct()
  {
    $this->db = new Database();
    $this->fm = new Format();
  }

      public function customerRegistration($data){
      $name        = mysqli_real_escape_string($this->db->link, $data['name']);
      $country     = mysqli_real_escape_string($this->db->link, $data['country']);
      $phone       = mysqli_real_escape_string($this->db->link, $data['phone']);
      $email       = mysqli_real_escape_string($this->db->link, $data['email']);
      $pass        = mysqli_real_escape_string($this->db->link, md5($data['pass']));

      if ($name == "" || $country == "" || $phone == "" || $email == "" || $pass == ""){
         $msg = "<div class='alert alert-danger fade in'>
                 <button data-dismiss='alert' class='close close-sm' type='button'><i class='icon-remove'></i></button>
                  Field must not be empty !</div>";
         return $msg;
  }
  $mailquery = "SELECT * FROM tbl_customer WHERE email='$email' LIMIT 1";
  $mailchk   = $this->db->select($mailquery);
  if ($mailchk != false) {
    $msg = "<div class='alert alert-danger fade in'>
            <button data-dismiss='alert' class='close close-sm' type='button'><i class='icon-remove'></i></button>
             Email already Exist !</div>";
    return $msg;
  }else {
    $query = "INSERT INTO tbl_customer(name,country,phone,email,pass)
              VALUES('$name','$country','$phone','$email','$pass')";
    $inserted_row = $this->db->insert($query);
    if ($inserted_row) {
      $msg = "<div class='alert alert-success fade in'>
              <button data-dismiss='alert' class='close close-sm' type='button'><i class='icon-remove'></i></button>
              Registration Sucessfully !!</div>";
      return $msg;
    }else {
      $msg = "<div class='alert alert-danger fade in'>
              <button data-dismiss='alert' class='close close-sm' type='button'><i class='icon-remove'></i></button>
              Registration not Sucessfully  !!</div>";
      return $msg;
    }
  }
}

    public function customerLogin($data){
      $email  = mysqli_real_escape_string($this->db->link, $data['email']);
      $pass   = mysqli_real_escape_string($this->db->link, md5($data['pass']));
      if (empty($email) || empty($pass)) {
        $msg = "<div class='alert alert-danger fade in'>
                <button data-dismiss='alert' class='close close-sm' type='button'><i class='icon-remove'></i></button>
                Field must not be empty !!</div>";
        return $msg;
      }

      $query = "SELECT * FROM tbl_customer WHERE email = '$email' AND pass = '$pass'";
      $result = $this->db->select($query);
      if ($result != false) {
          $value = $result->fetch_assoc();
          Session::set("cuslogin", true);
          Session::set("cmrId", $value['id']);
          Session::set("cmrName", $value['name']);
          echo "<script>window.location = 'carts.php'; </script>";
      }else {
        $msg = "<div class='alert alert-danger fade in'>
                <button data-dismiss='alert' class='close close-sm' type='button'><i class='icon-remove'></i></button>
                Email Or Password not match !!</div>";
        return $msg;
      }

    }

    public function getCustomerData($id){
      $query = "SELECT * FROM tbl_customer WHERE id = '$id' ";
      $result = $this->db->select($query);
      return $result;
    }

    public function customerUpdate($data, $cmrId){
      $name        = mysqli_real_escape_string($this->db->link, $data['name']);
      $country     = mysqli_real_escape_string($this->db->link, $data['country']);
      $phone       = mysqli_real_escape_string($this->db->link, $data['phone']);
      $email       = mysqli_real_escape_string($this->db->link, $data['email']);
      $pass        = mysqli_real_escape_string($this->db->link, md5($data['pass']));

      if ($name == "" || $country == "" || $phone == "" || $email == "" || $pass == ""){
         $msg = "<div class='col-md-8'><div class='alert alert-danger fade in'>
                 <button data-dismiss='alert' class='close close-sm' type='button'><i class='icon-remove'></i></button>
                  Field must not be empty !</div></div>";
         return $msg;
  }else {
              $query = "UPDATE tbl_customer
                        SET
                        name    = '$name',
                        country = '$country',
                        phone   = '$phone',
                        email   = '$email',
                        pass    = '$pass'
                        WHERE id = '$cmrId'";
                     $updated_row = $this->db->update($query);
                     if ($updated_row) {
                       $msg = "<div class='col-md-8'>
                               <div class='alert alert-success fade in'>
                               <button data-dismiss='alert' class='close close-sm' type='button'><i class='icon-remove'></i></button>
                               Customer Data Updated Sucessfully !!</div></div>";
                       return $msg;
                     }else {
                       $msg = "<div class='col-md-8'><div class='alert alert-danger fade in'>
                               <button data-dismiss='alert' class='close close-sm' type='button'><i class='icon-remove'></i></button>
                               Customer Data Not Updated !!</div></div>";
                       return $msg;

                     }
                   }
                 }


                       public function customerBilling($data){
                       $fname        = mysqli_real_escape_string($this->db->link, $data['fname']);
                       $lname        = mysqli_real_escape_string($this->db->link, $data['lname']);
                       $fulladdress  = mysqli_real_escape_string($this->db->link, $data['fulladdress']);
                       $note        = mysqli_real_escape_string($this->db->link, $data['note']);


                       if ($fname == "" || $fulladdress == "" ){
                          $msg = "<div class='alert alert-danger fade in'>
                                  <button data-dismiss='alert' class='close close-sm' type='button'><i class='icon-remove'></i></button>
                                   Field must not be empty !</div>";
                          return $msg;
                   }
                   spl_autoload_register(function($class){
                     include_once "classes/".$class.".php";
                    });
                    $ct = new  Cart();
                    $cmr = new Customer();
                    $sesid = Session::get("cmrId");
                    $cid = 0;
                    $gdata =$cmr->getCustomerData($sesid);
                    if ($gdata) {
                      while ($result = $gdata->fetch_assoc()) {
                        $cid=$result["id"];
                        break;
                      }
                    }
                   $getPro = $ct->getCartProduct();
                   if ($getPro) {
                     $sum = 0;
                     $qty = 0;
                     $sid="0";
                     while ($result = $getPro->fetch_assoc()) {
                       $sid = $result["sId"];
                       $query = "INSERT INTO tbl_bill_details(fname,lname,fulladdress,note,sid,cid,cdate)
                                 VALUES('$fname','$lname','$fulladdress','$note','$sid',$cid,NOW())";
                       $inserted_row = $this->db->insert($query);
                       if ($inserted_row) {
                         $msg = "<div class='alert alert-success fade in'>
                                 <button data-dismiss='alert' class='close close-sm' type='button'><i class='icon-remove'></i></button>
                                 Order has been placed !!</div>";
                         return $msg;
                       }else {
                         $msg = "<div class='alert alert-danger fade in'>
                                 <button data-dismiss='alert' class='close close-sm' type='button'><i class='icon-remove'></i></button>
                                 Order not accepted !!</div>";
                         return $msg;
                       }
                     }
                   }

                 }

}

?>
