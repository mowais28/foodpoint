<?php
error_reporting(0);
$alert = '';
require '../config/meta__info.php';
require '../config/database_configration.php';
session_start();
if (file_exists(dirname(__FILE__) . "./admin_component/security.php")) {
  include_once dirname(__FILE__) . "./admin_component/security.php";
}
  if(isset($_GET['delete'])){
  $user_id = $_GET['delete'];
  $query = "DELETE FROM fp_users WHERE ID = '$user_id'";
  $exec = mysqli_query($connect,$query);
  if($exec)
  {
    $alert = '<script> swal({
      title: "User Deleted",
      text:"User Deleted Successfuly",
      icon: "success",
    }).then((result)=>{
        location="./users.php";
    });</script>';
  }
  else{
    $alert = '<script> swal({
      title: "Failed to Delete",
      text:"Fail to delete Try Later or Check Server",
      icon: "error",
      }).then((result)=>{
          location="./users.php";
      });</script>';
  }
}
elseif(isset($_GET['status']) && isset($_GET['id'])){
  $status = $_GET['status'];
  $user_id = $_GET['id'];
  $query = "UPDATE fp_users SET Status = '$status' WHERE ID = '$user_id'";
  $exec = mysqli_query($connect,$query);
  if($exec && $status == '1')
  {
    $alert = '<script> swal({
      title: "User UnBlocked",
      text:"User Account Has been Activated",
      icon: "success",
    }).then((result)=>{
        location="./users.php";
    });</script>';
  }
  else if($exec && $status == '0'){
    $alert = '<script> swal({
      title: "User Blocked",
      text:"User Account Has been Blocked",
      icon: "success",
    }).then((result)=>{
        location="./users.php";
    });</script>';
  }
  else{
    $alert = '<script> swal({
      title: "Operation Failed",
      text:"Operation Fail Try Later or Check Server",
      icon: "error",
      }).then((result)=>{
          location="./users.php";
      });</script>';
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $_INFO['title']; ?> | Manage User </title>
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
    <?php echo $alert;?>
    <a href="./add_users.php" class="btn btn-primary"><i class="fa fa-plus"></i> Add Users</a>
    <div class="table_data m-2">
        <h2><i class="fa fa-users mb-2"></i> Admin / users</h2>
        <table class="table table-striped text-center">
          <thead>
            <tr>
              <th scope="col">User Name</th>
              <th scope="col">EmailAddress</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>


          <?php
          $query = "SELECT * FROM fp_users";
          $exec = mysqli_query($connect,$query);
          while($data = mysqli_fetch_assoc($exec)){
            if($data['Status'] == 1)
            {
                $status = '<a href="users.php?status=0&id='.$data['ID'].'"class="btn btn-success" title="Click To Block This Account"><i class="fa fa-unlock"></i></a>';
            }
            else
            {
                $status = '<a href="users.php?status=1&id='.$data['ID'].'"class="btn btn-danger" title="Click To UnBlock This Account"><i class="fa fa-lock"></i></a>';
            }
            echo '
            <tr>
            <td>'.$data['Name'].'</td>
            <td>'.$data['Email_Address'].'</td>
            <td><button class="btn btn-danger delete_user text-white" value="'.$data['ID'].'"><i class="fa fa-trash-alt"></i></button>
            <a href="changepassword.php?email='.$data['Email_Address'].'&id='.$data['ID'].'" title="Change Password" class="btn btn-primary text-white"><i class="fa fa-key"></i></a>
            '.$status.'
            </td>
            </tr>
            ';
          }

          
          ?>




          </tbody>
        </table>
      </div>
    </div>
  </div>












  <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
  <script src="../vendor/bootstrap/js/popper.min.js"></script>
  <script src="../vendor/fontawesome/font-awesome.js"></script>
  <script src="../vendor/swiperjs/swiper-bundle.min.js"></script>
  <script src="../assets/js/slider.js"></script>
  <script src="../vendor//jquery/jquery-3.2.1.min.js"></script>
  <script src="../assets/js/users_script.js"></script>
</body>

</html>