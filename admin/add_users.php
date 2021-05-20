<?php
error_reporting(0);
$alert = '';
require '../config/meta__info.php';
require '../config/database_configration.php';
session_start();
if (file_exists(dirname(__FILE__) . "./admin_component/security.php")) {
  include_once dirname(__FILE__) . "./admin_component/security.php";
}
if(isset($_POST['submit'])){
  $name = $_POST['username'];
  $email = $_POST['admin_email'];
  $password = $_POST['password'];
  $check = "SELECT * FROM fp_users WHERE Email_Address = '$email'";
  $sql = mysqli_query($connect,$check);
  $check_row = mysqli_num_rows($sql);
  if($check_row > 0)
  {
    $alert = '<script> swal({
      title: "Email Already Exists",
      text:"The Email your Entered For Admin is Already Exist In Database",
      icon: "error",
      }).then((result)=>{
      location="./users.php";
      });</script>';
  }
  else{
    $password_hash = password_hash($password,PASSWORD_DEFAULT);
    $query = "INSERT INTO fp_users(Email_Address,Name,Password,Status)values('$email','$name','$password_hash','0')";
    $exec = mysqli_query($connect,$query);
    if($exec)
    {
      $alert = '<script> swal({
        title: "User Added",
        text:"User With the name '.$name.' is Added Successfuly",
        icon: "success",
        }).then((result)=>{
            location="./users.php";
        });</script>';
    }
    else{
      $alert = '<script> swal({
        title: "Failed",
        text:"Failed to Added User For Please Server or try later",
        icon: "error",
        }).then((result)=>{
            location="./users.php";
        });</script>';
    }

  }
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $_INFO['title']; ?> | Add User </title>
  <meta name="title" content="<?php echo $_INFO['title']; ?>">
  <meta name="description" content="<?php echo $_INFO['meta description']; ?>">
  <meta name="keywords" content="<?php echo $_INFO['meta tags']; ?>">
  <link rel="stylesheet" href="../vendor/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="../vendor/fontawesome/font-awesome.min.css">
  <link rel="stylesheet" href="../vendor/swiperjs/swiper-bundle.min.css">
  <script src="../vendor/jquery/alert.js"></script>
  <link rel="stylesheet" href="../assets/css/admin.css">
</head>

<body>

  <?php

  if (file_exists(dirname(__FILE__) . "./admin_component/header.php")) {
    include_once dirname(__FILE__) . "./admin_component/header.php";
  }
  ?>

  <div class="col-md-12">
    <div class="row m-2">
      <div style="margin: 20px auto; max-width: 800px; flex:30%;">
      <?php echo $alert;?>
        <form action="" method="POST">
          <div class="form-group">
            <div class="row">
              <div class="col">
                <label for="user name">User Name</label>
                <input type="text" name="username" class="form-control" placeholder="User Name"required>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="row">
              <div class="col">
                <label for="email">Email Address</label>
                <input type="email" name="admin_email" class="form-control" placeholder="Email Address"required />
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" class="form-control" placeholder="Password (min 6)" minlength="6"required>
          </div>
          <button type="submit" name="submit" class="btn btn-primary text-white" style="width:100%;"><i class="fa fa-check"></i> Add User</button>
        </form>
      </div>
    </div>
  </div>












  <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
  <script src="../vendor/bootstrap/js/popper.min.js"></script>
  <script src="../vendor/fontawesome/font-awesome.js"></script>
  <script src="../vendor/swiperjs/swiper-bundle.min.js"></script>
  <script src="../assets/js/slider.js"></script>
</body>

</html>