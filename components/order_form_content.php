<?php
if (isset($_POST['order'])) {
    $item_name = $_POST['item_name'];
    $item_id = $_POST['item_id'];
    $customer = $_POST['customer'];
    $quantity = $_POST['quantity'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $payment = $_POST['payment'];
    $address = $_POST['address'];
    $email_copy = $_POST['email_copy'];

    if ($email_copy == 'checked' && $email != '') {
        // Email Order Copy
        require './phpmailer/PHPMailerAutoload.php';
        $mail = new PHPMailer();
        $mail->IsSmtp();
        $mail->SMTPDebug = 0;
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = 'ssl';
        $mail->Host = "smtp.gmail.com";
        $mail->Port = 465; // or 587
        $mail->IsHTML(true);
        $mail->Username = "mowais.work@gmail.com"; //gmail account
        $mail->Password = "******"; // account password
        $mail->SetFrom('Foodpoint@Nexratech.com');
        $mail->AddAddress($email);
        $mail->Subject = 'Food Point | Order Copy';
        $mail->Body = '<body><div style="width:600px;height:auto; margin:10px auto; border:1px solid rgb(0, 153, 255);"><div style="text-align:center;color:rgb(0, 183, 255);font-weight:bold;"><h1>Food Point Order Copy</h1> </div>
        <hr style="width: 300px;">
        <div style="margin: auto; padding: 30px;">
            <fieldset style="color: gray; border: 1px solid rgb(0, 153, 255); border-radius: 10px;">
                <legend><h3>Name</h3></legend>
                '.$item_name.'
            </fieldset>
            <fieldset style="color: gray; border: 1px solid rgb(0, 153, 255); border-radius: 10px;">
                <legend><h3>Qauntity</h3></legend>
                '.$quantity.'
            </fieldset>
            <fieldset style="color: gray; border: 1px solid rgb(0, 153, 255); border-radius: 10px;">
                <legend><h3>Customer Name</h3></legend>
                '.$customer.'
            </fieldset>
            <fieldset style="color: gray; border: 1px solid rgb(0, 153, 255); border-radius: 10px;">
                <legend><h3>Phone</h3></legend>
                '.$phone.'
            </fieldset>
            <fieldset style="color: gray; border: 1px solid rgb(0, 153, 255); border-radius: 10px;">
                <legend><h3>Email Address</h3></legend>
                '.$email.' 
            </fieldset>
            <fieldset style="color: gray; border: 1px solid rgb(0, 153, 255); border-radius: 10px;">
                <legend><h3>Payment Method</h3></legend>
                '.$payment.'
            </fieldset>
            <fieldset style="color: gray; border: 1px solid rgb(0, 153, 255); border-radius: 10px;">
                <legend><h3>Delivery</h3></legend>
                '.$address.'
            </fieldset>

            <p style="text-align: center;">All Right Reserved By <a href="https://nexratech.com">NexraTech</a></p>

        </div>
    </div>
</body>';
        
        // Server Order Process

        $date = Date('d-m-Y');
        $query = "INSERT INTO fp_orders(Item_Name,Item_id,Customer,Quantity,Phone,Email,Payment,Address,Order_Date)values('$item_name','$item_id','$customer','$quantity','$phone','$email','$payment','$address','$date')";
        $exec = mysqli_query($connect, $query);
        $sql = "SELECT * FROM fp_items WHERE ID = '$item_id'";
        $run = mysqli_query($connect, $sql);
        $total_order_data = mysqli_fetch_assoc($run);
        $total_order = $total_order_data['Total_Orders'] + 1;
        $order_query = "UPDATE fp_items SET Total_Orders = '$total_order' WHERE ID = '$item_id'";
        $order_sql = mysqli_query($connect, $order_query);   

        if ($exec && $mail->Send()) {
            $alert = '<script> swal({
                        text: "Order Placed Email Send to ' . $email . '",
                        icon: "success",
                    }).then((result)=>{
                        location="./order.php";
                    });</script>';
        } elseif ($exec && !$mail->Send()) {
            $alert = '<script> swal({
                                text: "Order Placed But Email Copy Sending Failed",
                                icon: "success",
                            }).then((result)=>{
                                location="./order.php";
                            });</script>';
        }
    } elseif ($email_copy == 'checked' && $email == '') {
        $alert = '<script> swal({
                    text: "Please Enter Your Email Address For Order Copy",
                    icon: "warning",
                });</script>';
    } elseif ($email_copy != 'checked') {
                // Server Order Process
                $date = Date('d-m-Y');
                $query = "INSERT INTO fp_orders(Item_Name,Item_id,Customer,Quantity,Phone,Email,Payment,Address,Order_Date)values('$item_name','$item_id','$customer','$quantity','$phone','$email','$payment','$address','$date')";
                $exec = mysqli_query($connect, $query);
                $sql = "SELECT * FROM fp_items WHERE ID = '$item_id'";
                $run = mysqli_query($connect, $sql);
                $total_order_data = mysqli_fetch_assoc($run);
                $total_order = $total_order_data['Total_Orders'] + 1;
                $order_query = "UPDATE fp_items SET Total_Orders = '$total_order' WHERE ID = '$item_id'";
                $order_sql = mysqli_query($connect, $order_query);   
                if($exec){
                    $alert = '<script> swal({
                    title: "Order Placed",
                    text:"Your Order has been Placed askjfhakfj",
                    icon: "success",
                    }).then((result)=>{
                    location="./order.php";
                    });</script>';
                }
            }
}
?>
<div class="col-md-12">
    <div class="row">
    <?php echo $alert;?>
        <div class="order float-left" style="margin: 20px auto; max-width: 800px; flex:30%;">
            <h2><i class="fa fa-shopping-cart"></i> Order</h2>
            <hr class="heading_line">

            <form action="" method="POST">
                <div class="form-group">
                    <div class="row">
                        <div class="col">
                            <label for="item name">Item Name</label>
                            <input type="text" name="item_name" class="form-control" value="<?php echo $_GET['name']; ?>" readonly required>
                        </div>
                        <div class="col">
                            <label for="item id">Item ID</label>
                            <input type="text" name="item_id" class="form-control" value="<?php echo $_GET['id']; ?>" readonly required>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col">
                            <label for="customer">Customer Name</label>
                            <input type="text" name="customer" class="form-control" placeholder="Customer Name" required />
                        </div>
                        <div class="col">
                            <label for="item id">Quantity</label>
                            <input type="number" name="quantity" class="form-control" placeholder="e.g(1 or 2 or 100)" required>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col">
                            <label for="phone">Phone Number</label>
                            <input type="text" name="phone" class="form-control" placeholder="Phone Number" required />
                        </div>
                        <div class="col">
                            <label for="email">Email Address <small>(optional)</small></label>
                            <input type="email" name="email" class="form-control" placeholder="name@example.com">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="address">Select Payment Method</label>
                    <select name="payment" class="form-control" id="payment" required>
                        <option value="">Select Method</option>
                        <option value="Cash On Delivery">Cash on Delivery</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="payment">Delivery Address </label>
                    <textarea name="address" id="address" cols="30" rows="5" class="form-control" placeholder="Delivery Address" required></textarea>
                </div>
                <div class="form-group form-check">
                    <input type="checkbox" name="email_copy" value="checked" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Email me a Copy of This Order Form</label>
                </div>
                <button type="submit" name="order" class="btn btn-warning text-white"><i class="fa fa-send"></i> Order Now</button>
            </form>

        </div>
    </div>
</div>