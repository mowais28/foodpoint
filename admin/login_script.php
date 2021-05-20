<?php
error_reporting(0);
require '../config/database_configration.php';
if(isset($_POST['email']) && isset($_POST['password'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    if($email == '' || $password == ''){
        echo '<script> swal({
            title: "Field Required",
            icon: "warning",
            button: "Ok",
          });</script>';
    }
    else{
        $query = "SELECT * FROM fp_users WHERE Email_Address = '$email'";
        $sql = mysqli_query($connect,$query);
        $row = mysqli_num_rows($sql);
        if($row > 0){
            $user_data = mysqli_fetch_assoc($sql);
            if($user_data['Email_Address'] === $email && password_verify($password,$user_data['Password']) && $user_data['Status'] == 1){
                session_start();
                $_SESSION['email'] = $user_data['Email_Address'];
                $_SESSION['name'] = $user_data['Name'];
                echo '<script>location="./dashboard.php"</script>';
            }
            else if($user_data['Email_Address'] === $email && password_verify($password,$user_data['Password']) && $user_data['Status'] == 0){
                echo '<script> swal({
                    title: "User Blocked",
                    icon: "info",
                    button: "Ok",
                  });</script>';                        
            }
            else{
                echo '<script> swal({
                    title: "Invalid Credentials",
                    icon: "error",
                    button: "Ok",
                  });</script>';                        
            }
        }
        else{
            echo '<script> swal({
                title: "Invalid Credentials",
                icon: "error",
                button: "Ok",
              });</script>';                        
        }
    }
}

?>