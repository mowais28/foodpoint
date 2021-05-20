<?php
error_reporting(0);
$alert = '';
require '../config/meta__info.php';
require '../config/database_configration.php';
if (file_exists(dirname(__FILE__) . "./admin_component/security.php")) {
  include_once dirname(__FILE__) . "./admin_component/security.php";
}
if(isset($_GET['delete_item'])){
    $item_id = $_GET['delete_item'];
    $query = "DELETE FROM fp_items WHERE ID = '$item_id'";
    $exec = mysqli_query($connect,$query);
    if($exec)
    {
      $alert = '<script> swal({
        title: "Item Removed",
        text:"Item Removed Successfuly",
        icon: "success",
      }).then((result)=>{
          location="./manage_order.php";
      });</script>';
    }
    else{
      $alert = '<script> swal({
        title: "Failed to Delete",
        text:"Fail to delete Try Later or Check Server",
        icon: "error",
        }).then((result)=>{
            location="./manage_order.php";
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
  <title><?php echo $_INFO['title']; ?> | Manage Order </title>
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
    <a href="./add_item.php" class="btn btn-primary"><i class="fa fa-plus"></i> Add Items</a>
    <div class="order">
            <h2><i class="fa fa-shopping-cart"></i> Availble Item On Our Stores</h2>
            <hr class="heading_line" style="width: 200px; background:black;">
            <div class="food_items">
                
                
                <?php
                    $query = "SELECT * FROM fp_items";
                    $exec = mysqli_query($connect,$query);
                    while($data = mysqli_fetch_assoc($exec)){
                        echo '
                        <div class="card float-left" style="width: 18rem;">
                        <img class="card-img-top" src="./Item_Images/'.$data['Img'].'" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">'.$data['Item_Title'].'</h5>
                            <p>Rs.'.$data['Price'].' <span class="float-right">Total Orders > '.$data['Total_Orders'].'</span></p>
                            <a href="update_item.php?name='.$data['Item_Title'].'&id='.$data['ID'].'&img='.$data['Img'].'&price='.$data['Price'].'"><button class="btn btn-primary text-white"><i class="fa fa-info"></i> Update</button></a>
                            <button class="btn btn-danger text-white float-right item_del" value="'.$data['ID'].'"><i class="fa fa-trash-alt"></i> Delete</button>
                        </div>
                        </div>
    
                        ';
                    }
                ?>
            </div>
        </div>


    </div>
  </div>










  <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
  <script src="../vendor/bootstrap/js/popper.min.js"></script>
  <script src="../vendor/fontawesome/font-awesome.js"></script>
  <script src="../vendor/swiperjs/swiper-bundle.min.js"></script>
  <script src="../assets/js/slider.js"></script>
  <script src="../vendor/jquery/jquery-3.2.1.min.js"></script>p
  <script src="../assets/js/item_script.js"></script>p
</body>

</html>