<?php 
include('../Includes/conection/connect.php');
include('../functions/common.php');
@session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User-Login</title>
    <!-- BOOTSTRAP CSS LINK -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container-fluid my-3">
        <h2 class="text-center">User Login</h2>
        <div class="row d-flex aling-items-center justify-content-center">
            <div class="col-lg-12 col-xl-6">
                <form action="" method="post">
                    <!-- Username field -->
                    <div class="form-outline mb-4">
                        <label for="user_username" class="form-label">Username</label>
                        <input type="text" id="user_name" class="form-control" placeholder="enter your username" autocomplete="off" 
                        required="required" name="user_username">
                    </div>
                    <!-- password field -->
                    <div class="form-outline mb-4">
                        <label for="user_password" class="form-label">User password</label>
                        <input type="password" id="user_password" class="form-control" placeholder="enter your password" autocomplete="off" 
                        required="required" name="user_password">
                    </div>

                    <div class="mt-4 pt-2">
                        <input type="submit" value="Login" class="bg-info py-2 px-3 border-0" name="user_login">
                        <p class="small fw-bold mt-2 pt-1">Don't have account? <a href="user_registration.php" class=text-danger>Register</a></p>
                    </div>



                </form>
            </div>
        </div>

    </div>
    
</body>
</html>

<?php

if(isset($_POST['user_login'])){
    $user_username=$_POST['user_username'];
    $user_password=$_POST['user_password'];

    $select_query="Select * from `user_table` where user_name='$user_username'";
    $result=mysqli_query($conn,$select_query);
    $row_count=mysqli_num_rows($result);
    $row_data=mysqli_fetch_assoc($result);
    $user_ip=getIPAddress();

    //Cart item
    $select_query_cart="Select * from `cart_details` where ip_address='$user_ip'";   
    $select_cart=mysqli_query($conn,$select_query_cart);
    $row_count_cart=mysqli_num_rows($select_cart);
    if($row_count>0){
        $_SESSION['username']=$user_username;
        if(password_verify($user_password,$row_data['user_password'])){
            //echo "<script>alert('Login Successfully')</script>";
            if($row_count==1 and $row_count_cart==0){
                $_SESSION['username']=$user_username;
                echo "<script>alert('Login Successfully')</script>";
                echo "<script>window.open('profile.php','_self')</script>"; 
            }else{
                $_SESSION['username']=$user_username;
                echo "<script>alert('Login Successfully')</script>";
                echo "<script>window.open('./checkout.php','_self')</script>"; 
            } 
        }else{
            echo "<script>alert('invalid Credentials')</script>"; 
        }

    }else{
        echo "<script>alert('invalid Credentials')</script>";
    }
}

?>