<?php
error_reporting(0);
$alert = '';
require '../config/meta__info.php';
require '../config/database_configration.php';
session_start();
if (file_exists(dirname(__FILE__) . "./admin_component/security.php")) {
    include_once dirname(__FILE__) . "./admin_component/security.php";
  }
if (isset($_POST['submit'])) {
    $user_id = $_GET['id'];
    $user_email = $_GET['email'];
    $password = $_POST['passwd'];
    $npassword = $_POST['npasswd'];
    if ($password != $npassword) {
        $alert = '<script> swal({
      title: "Password Not Same",
      icon: "warning",
      });</script>';
    } else {
        $query = "UPDATE fp_users SET Password = '$password' WHERE ID = '$user_id'";
        $exec = mysqli_query($connect, $query);
        if ($exec) {
            $alert = '<script> swal({
            title: "Password Updated",
            text:"' . $user_email . ' Password has been updated",
            icon: "success",
            }).then((result)=>{
                location="./users.php";
            });</script>';
        } else {
            $alert = '<script> swal({
              title: "Failed",
              text:"Failed to Update the password Please check Server or try later",
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
                <?php echo $alert; ?>
                <form action="" method="POST">
                    <div class="form-group">
                        <div class="row">
                            <div class="col">
                                <label for="user name">New Password</label>
                                <input type="password" name="passwd" class="form-control" placeholder="New Password" minlength="6" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col">
                                <label for="npasswd">Confirm Password</label>
                                <input type="password" name="npasswd" class="form-control" placeholder="Confirm Password" minlength="6" required />
                            </div>
                        </div>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary text-white" style="width:100%;"><i class="fa fa-unlock"></i> Updated Password</button>
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