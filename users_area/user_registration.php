<?php 
include('../Includes/conection/connect.php');
include('../functions/common.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User-Registration</title>
    <!-- BOOTSRAP CDN LINK -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>

<body>
<header>

<!-- navigation bar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid ">
        <a class="navbar-brand logo" href="../index.php"><i>Amala network</i></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="../index.php">Home</a>
                </li>
</header>
    <div class="container-fluid my-3">
    
        <h2 class="text-center">New User Registration</h2>
        <div class="row d-flex aling-items-center justify-content-center">
            <div class="col-lg-12 col-xl-6">
                <form action="" method="post" enctype="multipart/form-data">
                    <!-- Username field -->
                    <div class="form-outline mb-4">
                        <label for="user_username" class="form-label">Username</label>
                        <input type="text" id="user_name" class="form-control" placeholder="enter your username" 
                        autocomplete="off" 
                        required="required" name="user_username">
                    </div>
                    <!-- email field -->
                    <div class="form-outline mb-4">
                        <label for="user_email" class="form-label">Email</label>
                        <input type="email" id="user_email" class="form-control" placeholder="enter your email" 
                        autocomplete="off" 
                        required="required" name="user_email">
                    </div>
                    <!-- image field -->
                    <div class="form-outline mb-4">
                        <label for="user_image" class="form-label">User Image</label>
                        <input type="file" id="user_image" class="form-control" placeholder="enter your image" 
                        autocomplete="off" 
                        required="required" name="user_image">
                    </div>
                    <!-- password field -->
                    <div class="form-outline mb-4">
                        <label for="user_password" class="form-label">User password</label>
                        <input type="password" id="user_password" class="form-control" placeholder="enter your password" 
                        autocomplete="off" 
                        required="required" name="user_password">
                    </div>
                    <!-- confirm password field -->
                    <div class="form-outline mb-4">
                        <label for="conf_user_password" class="form-label">Confirm password</label>
                        <input type="password" id="conf_user_password" class="form-control" placeholder="confirm your password" autocomplete="off" 
                        required="required" name="conf_user_password">
                    </div>
                    <!-- address field -->
                    <div class="form-outline mb-4">
                        <label for="user_address" class="form-label">Address</label>
                        <input type="text" id="user_address" class="form-control" placeholder="enter your address" autocomplete="off" 
                        required="required" name="user_address">
                    </div>
                    <!-- contact field -->
                    <div class="form-outline mb-4">
                        <label for="user_contact" class="form-label">Contact</label>
                        <input type="text" id="user_contact" class="form-control" placeholder="enter your mobile number" autocomplete="off" 
                        required="required" name="user_contact">
                    </div>
                    <div class="mt-4 pt-2">
                        <input type="submit" value="Register" class="bg-info py-2 px-3 border-0" name="user_register">
                        <p class="small fw-bold mt-2 pt-1">Already have a an account? <a href="user_login.php" class=text-danger>Login</a></p>
                    </div>
                </form>
            </div>
        </div>

    </div>
    
</body>
</html>

<!-- php code -->
<?php 

if(isset($_POST['user_register'])){
    $user_username=$_POST['user_username'];
    $user_email=$_POST['user_email'];
    $user_password=$_POST['user_password'];
    $hash_password=password_hash($user_password,PASSWORD_DEFAULT);
    $conf_user_password=$_POST['conf_user_password'];
    $user_address=$_POST['user_address'];
    $user_contact=$_POST['user_contact'];
    $user_image=$_FILES['user_image']['name'];
    $user_image_tmp=$_FILES['user_image']['tmp_name'];
    $user_ip=getIPAddress();

// select query
 $select_query="Select * from `user_table` where user_name='$user_username' or user_email='$user_email'";
 $result=mysqli_query($conn,$select_query);
 $rows_count=mysqli_num_rows($result);
 if($rows_count>0){
     echo "<script>alert('Username and email already exist')</script>";
 }elseif($user_password!=$conf_user_password){
     echo "<script>alert('Password do not match')</script>";
 }else{
     // insert query
 move_uploaded_file($user_image_tmp,"./user_images/$user_image");
 $insert_query="insert into `user_table` (user_name,user_email,user_password,user_image,user_ip,
 user_address,user_mobile)
 values ('$user_username','$user_email','$hash_password','$user_image','$user_ip',
 '$user_address','$user_contact')";
 $sql_execute=mysqli_query($conn,$insert_query);
 if($sql_execute){
          echo "<script>alert('Data inserted successfully')</script>";
      }else{
          die(mysqli_error($conn));
          }
 }

//Seleccionar elementos del carrito
 $select_cart_items="Select * from `cart_details` where ip_address='$user_ip'";
 $result_cart=mysqli_query($conn,$select_cart_items);
 $rows_count=mysqli_num_rows($result_cart);
 if($rows_count>0){
    $_SESSION['username']=$user_username;
    echo "<script>alert('You have items in your cart')</script>";  
    echo "<script>window.open('checkout.php','_self')</script>";
 }else{
    echo "<script>window.open('../index.php','_self')</script>";
 }
 }



// insert query
//  move_uploaded_file($user_image_tmp,"./user_images/$user_image");
//  $insert_query="insert into `user_table` (user_name,user_email,user_password,user_image,user_ip,user_address,user_mobile)
//  values ('$user_username','$user_email','$user_password','$user_image','$user_ip','$user_address','$user_contact')";
//  $sql_execute=mysqli_query($conn,$insert_query);
//  if($sql_execute){
//      echo "<script>alert('Data inserted successfully')</script>";
//  }else{
//      die(mysqli_error($conn));
//      }

    
?>