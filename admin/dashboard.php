<?php
error_reporting(0);
require '../config/meta__info.php';
require '../config/database_configration.php';
if (file_exists(dirname(__FILE__) . "./admin_component/security.php")) {
  include_once dirname(__FILE__) . "./admin_component/security.php";
}
$query = "SELECT * FROM fp_orders";
$exec = mysqli_query($connect,$query);
$total_order = mysqli_num_rows($exec);
// Item Available
$items = "SELECT * FROM fp_items";
$item_exec = mysqli_query($connect,$items);
$total_item = mysqli_num_rows($item_exec);
// Today Order 
$date = Date('d-m-Y');
$today_order = "SELECT * FROM fp_orders WHERE Order_Date = '$date'";
$today_order_exec = mysqli_query($connect,$today_order);
$today_order_rows = mysqli_num_rows($today_order_exec);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $_INFO['title']; ?> | Dashboard </title>
  <meta name="title" content="<?php echo $_INFO['title']; ?>">
  <meta name="description" content="<?php echo $_INFO['meta description']; ?>">
  <meta name="keywords" content="<?php echo $_INFO['meta tags']; ?>">
  <link rel="stylesheet" href="../vendor/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="../vendor/fontawesome/font-awesome.min.css">
  <link rel="stylesheet" href="../vendor/swiperjs/swiper-bundle.min.css">
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
      <div class="greeting">
        <img src="../assets/img/admin.png" alt="Admin">
        <h3> Hi <?php echo $_SESSION['name'];?></h3>
        <p>Hope You Doing Very Well.</p>
      </div>
      <div class="order_info">
        <div class="col-md-3 float-left"><i class="fa fa-qrcode"></i> <span>Today Order <?php echo $today_order_rows; ?></span></div>
        <div class="col-md-3 float-left"><i class="fa fa-shopping-cart"></i><span>Tatal Order <?php echo $total_order?></span></div>
        <div class="col-md-3 float-left"><i class="fa fa-check-circle"></i><span> Availble Items <?php echo $total_item?></span></div>
      </div>

      <div class="table_data">
        <h2><i class="fa fa-shopping-cart mb-2"></i> Today Order's</h2>
        <a href="orders.php" class="float-right"><i class="fa fa-arrow-right"></i> View All</a>
        <table class="table table-striped text-center">
          <thead>
            <tr>
              <th scope="col">Order ID</th>
              <th scope="col">Item Name</th>
              <th scope="col">Quantity</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
            if($today_order_rows > 0){
              while($order_data = mysqli_fetch_assoc($today_order_exec)){
                echo '                
                <tr>
                  <th scope="row">'.$order_data['ID'].'</th>
                  <td>'.$order_data['Item_Name'].'</td>
                  <td>1</td>
                  <td><a href="view_order.php?name='.$order_data['Item_Name'].'&id='.$order_data['Item_id'].'&cus='.$order_data['Customer'].'&quantity='.$order_data['Quantity'].'&phone='.$order_data['Phone'].'&email='.$order_data['Email'].'&payment='.$order_data['Payment'].'&address='.$order_data['Address'].'" class="btn btn-primary text-white"><i class="fa fa-eye"></i> View Order</a></td>
                  </tr>
                  ';
                }
              }else{
                echo "<tr><td colspan='4'>No Order Today</td></tr>"; 
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
</body>

</html>