<?php
error_reporting(0);
$alert = '';
require '../config/meta__info.php';
if (file_exists(dirname(__FILE__) . "./admin_component/security.php")) {
    include_once dirname(__FILE__) . "./admin_component/security.php";
  }
if(isset($_POST['complete'])){
    if(!$_GET['email']){
        $alert = '<script> swal({
            text: "Unable to Send Email. Email Not Found",
            icon: "warning",
        }).then((result)=>{
            location="./orders.php";
        });</script>';
    }
    else{
        require '../phpmailer/PHPMailerAutoload.php';
        $mail = new PHPMailer();
        $mail->IsSmtp();
        $mail->SMTPDebug = 0;
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = 'ssl';
        $mail->Host = "smtp.gmail.com";
        $mail->Port = 465; // or 587
        $mail->IsHTML(true);
        $mail->Username = "mowais.work@gmail.com";
        $mail->Password = "dontopen";
        $mail->SetFrom('Foodpoint@Nexratech.com');
        $mail->AddAddress($_GET['email']);
        $mail->Subject = 'Food Point | Order Completed';
        $mail->Body = '<body><div style="width:600px;height:auto; margin:10px auto; border:1px solid rgb(0, 153, 255);"><div style="text-align:center;color:rgb(0, 183, 255);font-weight:bold;"><h2>Food Point </h2> </div>
        <hr style="width: 300px;">
        <div style="margin: auto; padding: 30px; color: gray;">
            <div style="border: 1px solid rgb(0, 153, 255); color:white;background: rgb(0, 183, 255); padding: 10px;border-radius: 5px;text-align: center;">Your Order has been Completed</div>
            <p>Hi '.$_GET['cus'].'</p>
            <p>Your Order '.$_GET['name'].' has been Completed. Hope You Enjoyed The Dish we will Waiting for your Next Order. </p>
            <p>Thank you <br> Food Point</p>
            <p style="text-align: center;">All Right Reserved By <a href="https://nexratech.com">NexraTech</a></p>
    
        </div>
    </div>
    </body>';
        if ($mail->Send()) {
            $alert = '<script> swal({
                        text: "Email Send to '.$_GET['email'].'",
                        icon: "success",
                    }).then((result)=>{
                        location="./orders.php";
                    });</script>';
        } elseif (!$mail->Send()) {
            $alert = '<script> swal({
                                text: "Fail to send email try Again or check",
                                icon: "success",
                            }).then((result)=>{
                                location="./order.php";
                            });</script>';
        }

    }
}
if(isset($_POST['cancel'])){
    if(!$_GET['email']){
        $alert = '<script> swal({
            text: "Unable to Send Email. Email Not Found",
            icon: "warning",
        }).then((result)=>{
            location="./orders.php";
        });</script>';
    }
    else{
        require '../phpmailer/PHPMailerAutoload.php';
        $mail = new PHPMailer();
        $mail->IsSmtp();
        $mail->SMTPDebug = 0;
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = 'ssl';
        $mail->Host = "smtp.gmail.com";
        $mail->Port = 465; // or 587
        $mail->IsHTML(true);
        $mail->Username = "mowais.work@gmail.com";
        $mail->Password = "dontopen";
        $mail->SetFrom('Foodpoint@Nexratech.com');
        $mail->AddAddress($_GET['email']);
        $mail->Subject = 'Food Point | Order Cancel';
        $mail->Body = '<body><div style="width:600px;height:auto; margin:10px auto; border:1px solid rgb(0, 153, 255);"><div style="text-align:center;color:rgb(0, 183, 255);font-weight:bold;"><h2>Food Point </h2> </div>
        <hr style="width: 300px;">
        <div style="margin: auto; padding: 30px; color: gray;">
        <div style="border: 1px solid rgb(255, 0, 0); color:white;background: rgb(255, 0, 0); padding: 10px;border-radius: 5px;text-align: center;">Your Order Cancel</div>
            <p>Hi '.$_GET['cus'].'</p>
            <p>Your Order '.$_GET['name'].' has been Cancel. <br> Sorry for This Inconvenience Please Try to Order Again thank you.</p>
            <p>Thank you <br> Food Point</p>
            <p style="text-align: center;">All Right Reserved By <a href="https://nexratech.com">NexraTech</a></p>
    
        </div>
    </div>
    </body>';
        if ($mail->Send()) {
            $alert = '<script> swal({
                        text: "Email Send to '.$_GET['email'].'",
                        icon: "success",
                    }).then((result)=>{
                        location="./orders.php";
                    });</script>';
        } elseif (!$mail->Send()) {
            $alert = '<script> swal({
                                text: "Fail to send email try Again or check",
                                icon: "success",
                            }).then((result)=>{
                                location="./order.php";
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
    <title><?php echo $_INFO['title']; ?> | View Order </title>
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
        <?php echo $alert;?>
        <div class="row m-2">
            <div style="margin: 20px auto; max-width: 800px; flex:30%;">

                <form action="" method="POST">
                    <div class="form-group">
                        <div class="row">
                            <div class="col">
                                <label for="item name">Item Name</label>
                                <input type="text" name="item_name" class="form-control" value="<?php echo $_GET['name']?>" readonly>
                            </div>
                            <div class="col">
                                <label for="item id">Item ID</label>
                                <input type="text" name="item_id" class="form-control" value="<?php echo $_GET['id']?>" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col">
                                <label for="customer">Customer Name</label>
                                <input type="text" name="customer" class="form-control" value="<?php echo $_GET['cus']?>" readonly/>
                            </div>
                            <div class="col">
                                <label for="item id">Quantity</label>
                                <input type="number" name="quantity" class="form-control" value="<?php echo $_GET['quantity']?>"readonly>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col">
                                <label for="phone">Phone Number</label>
                                <input type="text" name="phone" class="form-control" value="<?php echo $_GET['phone']?>" readonly/>
                            </div>
                            <div class="col">
                                <label for="email">Email Address <small>(optional)</small></label>
                                <input type="email" name="quantity" class="form-control" value="<?php echo $_GET['email']?>"readonly>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="address">Select Payment Method</label>
                        <input type="text" name="payment" class="form-control" value="<?php echo $_GET['payment']?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="payment">Delivery Address </label>
                        <textarea name="address" id="address" cols="30" rows="5" class="form-control" readonly><?php echo $_GET['address']?></textarea>
                    </div>

                    <button type="submit" name="complete" class="btn btn-primary text-white" style="width:48%;"><i class="fa fa-check-circle"></i> Complete</button>
                    <button type="submit" name="cancel" class="btn btn-danger text-white" style="width:48%;"><i class="fa fa-times-circle"></i> Cancel</button>
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