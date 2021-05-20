<?php
error_reporting(0);
$alert = '';
require '../config/meta__info.php';
require '../config/database_configration.php';
session_start();
if (file_exists(dirname(__FILE__) . "./admin_component/security.php")) {
    include_once dirname(__FILE__) . "./admin_component/security.php";
  }
if(isset($_POST['update'])){

    $item_id = $_GET['id'];
    $item_name = $_POST['item_name'];
    $price = $_POST['price'];
    $img_name = $_FILES['img']['name'];
    $img_tmp = $_FILES['img']['tmp_name'];
    $rand = Date('Ydm-hms');
    $directory = './Item_Images';
    move_uploaded_file($img_tmp,"$directory/$rand-$img_name");
    $query = "UPDATE fp_items SET Item_Title = '$item_name',Price = '$price',Img = '$rand-$img_name' WHERE ID = '$item_id'";
    $exec = mysqli_query($connect,$query);
    if($exec){
        $alert = '<script> swal({
            title: "Item Updated",
            text:"Item updated Successfuly",
            icon: "success",
        }).then((result)=>{
            location="./manage_order.php";
        });</script>';
    }
    else{
        $alert = '<script> swal({
            title: "Failed To update",
            text:"Something is Wrong Please Try Later",
            icon: "error",
        }).then((result)=>{
            location="./add_item.php";
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
    <title><?php echo $_INFO['title']; ?> | Add Items </title>
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
        <?php echo $alert ;?>
            <div style="margin: 20px auto; max-width: 800px; flex:30%;">

                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <div class="row">
                            <div class="col">
                                <label for="item name">Item Name</label>
                                <input type="text" name="item_name" class="form-control" value="<?php echo $_GET['name'];?>"required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col">
                                <label for="price">Price</label>
                                <input type="number" name="price" class="form-control" placeholder="Price" value="<?php echo $_GET['price'];?>"required/>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="img">Item Title Image</label>
                        <input type="file" name="img" class="form-control-file" id="img" accept=".png,.jpg,.jpeg"required>
                    </div>
                    <button type="submit" name="update" class="btn btn-primary text-white" style="width:100%;"><i class="fa fa-check"></i> Update Item</button>
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