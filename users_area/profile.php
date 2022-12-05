<?php
include("../includes/conection/connect.php");
include("../functions/common.php");
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome <?php echo $_SESSION['username'] ?></title>
    <!-- fontawesome CDN link -->
    <script src="https://kit.fontawesome.com/d9de7fd168.js" crossorigin="anonymous"></script>
    <!-- BOOTSRAP CDN LINK -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <!-- archivo de estilos -->
    <link rel="stylesheet" href="style.css">
    <style>
        .profile_img{
        width: 90%;
        margin:auto;
        display:block;
        /* height: 100%; */
        object-fit:contain;
    }
    .edit_img{
        width: 100px;
        height: 100px;
        object-fit:contain;
    }
    </style>
</head>

<body>

    <div class="container-fluid p-0">
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
                            <li class="nav-item">
                                <a class="nav-link" href="../display_all.php">Products</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="http://18.118.154.227/">Free Course</a>
                            </li>
                        </ul>
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link" href="profile.php">My Account</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="../cart.php"><i class="fa-solid fa-cart-shopping"></i> <sup>
                                    <?php cart_item(); ?></sup></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Total Price: <?php total_cart_price(); ?></a>
                            </li>
                        </ul>

                        <form class="d-flex" role="search" action="../search_product.php" method="get">
                            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
                            <!-- -->
                            <input type="submit" value="Search" class="btn btn-dark" name="search_data_product">
                        </form>
                    </div>
                </div>
            </nav>
            <!-- calling cart funtion -->
            <?php cart(); ?>

            <!-- Fourth child-->
            <div class="row">
                <div class="col-md-2">
            <u1 class="navbar-nav subh-bg-color text-center" style="height:100vh">
            <li class="nav-item bg-success">
                    <a class="nav-link text-light" href="profile.php"><h4>Your Profile</h4></a>
                </li>

                <?php
$username=$_SESSION['username'];
$user_image="Select * from `user_table` where user_name='$username'";
$user_image=mysqli_query($conn,$user_image);
$row_image=mysqli_fetch_array($user_image);
$user_image=$row_image['user_image'];
echo "<li class='nav-item'>
<img src='./user_images/$user_image' alt='' class='profile_img my-4'>
</li>";   

?>
                <li class="nav-item">
                    <a class="nav-link text-light" href="profile.php">Pending Orders</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light" href="profile.php?edit_account">Edit Account</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light" href="profile.php?my_orders">My Orders</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light" href="profile.php?delete_account">Delete Account</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light" href="logout.php">Logout</a>
                </li>
                    </u1>
                </div>
                <div class="col-md-10 text-center">
                    <?php get_user_order_details(); 
                    if(isset($_GET['edit_account'])){
                        include('edit_account.php');
                    }
                    if(isset($_GET['my_orders'])){
                        include('user_orders.php');
                    }
                    if(isset($_GET['delete_account'])){
                        include('delete_account.php');
                    }
                    ?>
                </div>
            </div>

        </header>
        <!-- Include footer   -->
        <?php include("../includes\conection/footer.php") ?>
    </div>










    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

</body>

</html>