<?php
error_reporting(0);
require '../config/meta__info.php';
require '../config/database_configration.php';
if (file_exists(dirname(__FILE__) . "./admin_component/security.php")) {
  include_once dirname(__FILE__) . "./admin_component/security.php";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $_INFO['title']; ?> | Orders </title>
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
      <div class="table_data">
        <h2><i class="fa fa-shopping-cart mb-2"></i> Total Order's</h2>
        <table class="table table-striped text-center">
          <thead>
            <tr>
              <th scope="col">Item ID</th>
              <th scope="col">Item Name</th>
              <th scope="col">Quantity</th>
              <th scope="col">Action</th>
            </tr>
          </thead>

          <tbody>
          <?php
                    $query = "SELECT * FROM fp_orders";
                    $exec = mysqli_query($connect,$query);
                    while($data = mysqli_fetch_assoc($exec)){
                        echo '<tr>
                        <th scope="row">'.$data['Item_id'].'</th>
                        <td>'.$data['Item_Name'].'</td>
                        <td>'.$data['Quantity'].'</td>
                        <td><a href="view_order.php?name='.$data['Item_Name'].'&id='.$data['Item_id'].'&cus='.$data['Customer'].'&quantity='.$data['Quantity'].'&phone='.$data['Phone'].'&email='.$data['Email'].'&payment='.$data['Payment'].'&address='.$data['Address'].'" class="btn btn-primary text-white"><i class="fa fa-eye"></i> View Order</a></td>
                      </tr>';
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