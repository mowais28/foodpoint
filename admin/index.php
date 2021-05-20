<?php
require '../config/meta__info.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $_INFO['title']; ?></title>
    <meta name="title" content="<?php echo $_INFO['title']; ?>">
    <meta name="description" content="<?php echo $_INFO['meta description']; ?>">
    <meta name="keywords" content="<?php echo $_INFO['meta tags']; ?>">
    <link rel="stylesheet" href="../vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../vendor/fontawesome/font-awesome.min.css">
    <link rel="stylesheet" href="../vendor/swiperjs/swiper-bundle.min.css">
    <link rel="stylesheet" href="../assets/css/admin.css">
    <script src="../vendor/bootstrap/js/alert.js"></script>
</head>

<body>

    <div class="container">
    <div class="msg_box"></div>
        <div class="login_box">
            <h2><i class="fa fa-arrow-right"></i> Login To  Admin </h2>
            <form action="" method="POST" id="login_data" onsubmit="return loginData();"> 
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" name="email" class="form-control inp_style" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" name="password" class="form-control inp_style" id="exampleInputPassword1" placeholder="Password">
                    <label style="float: right;"><a href="javascript:void(0)" data-toggle="modal" data-target="#forget"  class="text-warning">Forget Password</a></label>
                </div>
                <button type="submit" name="login" class="btn btn-warning loading text-white">
                <i class="fa fa-send"></i> Submit                
                </button>
            </form>
        </div>
    </div>



    <!-- ******************************************* -->
    <!-- ******************************************* -->
    <!-- ******************************************* -->
    <div class="modal fade" id="forget" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            ...
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
        </div>
        </div>
    </div>
    </div>



    <script src="../vendor/fontawesome/font-awesome.js"></script>
    <script src="../vendor/swiperjs/swiper-bundle.min.js"></script>
    <script src="../assets/js/slider.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="../vendor/bootstrap/js/popper.min.js"></script>
    <script src="../vendor/jquery/jquery-3.2.1.min.js"></script>
    <script src="../assets/js/login_script.js"></script>
</body>

</html>