<?php
include("../includes/conection/connect.php");
include("../functions/common.php");
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin management</title>
    <!-- fontawesome CDN link -->
    <script src="https://kit.fontawesome.com/d9de7fd168.js" crossorigin="anonymous"></script>
    <!-- BOOTSRAP CDN LINK -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <!-- css link -->
    <link rel="stylesheet" href="styles.css">
    
</head>

<style>

.product_img{
    width: 100px;
    object-fit:contain;

}
</style>

<body>


    <div class="container-fluid p-0">
        <header>
            <nav class="navbar navbar-expand-lg text-bg-dark bg-dark ">
                <div class="container-fluid">
                    <h1><i><a href="index.php" class="nav-link">Amala network</a></i></h1>
                    <nav class="navbar navbar-expand-lg ">
                        <ul class="navbar-nav ">
                            <li class="nav-item"><a href="#"></a>Welcome guest</li>
                        </ul>
                    </nav>
                </div>
            </nav>
            <div class="subh-bg-color text-bg-dark">
                <h4 class="text-center p-3">Management product details</h4>
            </div>
        </header>

        <main>
            <section class="row p-2 subh-bg-color text-center ">

                <div class="col-md-3 bg-dark text-bg-dark">
                    <div class="m-2">
                        <h5>Insert operations</h5>
                        <div class=" text-center mt-2">
                            <button class="btn btn-primary btn-sm custom"><a href="insert_product.php" class="nav-link my-1">Insert products</a></button>
                        </div>
                        <div class=" text-center mt-2">
                            <button class="btn btn-primary btn-sm custom"><a href="index.php?insert_topics" class="nav-link my-1">Insert topics</a></button>
                        </div>
                        <div class=" text-center mt-2">
                            <button class="btn btn-primary btn-sm custom"><a href="index.php?insert_categories" class="nav-link my-1">Insert categories</a></button>
                        </div>

                    </div>
                </div>

                <div class="col-md-3 bg-dark text-bg-dark">
                    <div class="m-2">
                        <h5>View products</h5>
                        <div class="text-center mt-2">
                            <button class="btn btn-primary btn-sm custom"><a href="index.php?view_categories" class="nav-link my-1">View categories</a></button>
                        </div>
                        <div class=" text-center mt-2">
                            <button class="btn btn-primary btn-sm custom"><a href="index.php?view_products" class="nav-link my-1">View products</a></button>
                        </div>
                        <div class=" text-center mt-2">
                            <button class="btn btn-primary btn-sm custom"><a href="index.php?view_topics" class="nav-link my-1">View topics</a></button>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 bg-dark text-bg-dark">
                    <div class="m-2">
                        <h5>Orders</h5>
                        <div class=" text-center mt-2">
                            <button class="btn btn-primary btn-sm custom"><a href="index.php?list_orders" class="nav-link my-1">All orders</a></button>
                        </div>
                        <div class=" text-center mt-2">
                            <button class="btn btn-primary btn-sm custom"><a href="index.php?list_payments" class="nav-link my-1">All payments</a></button>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 bg-dark text-bg-dark">
                    <div class="m-2">
                        <h5>User related</h5>
                        <div class=" text-center mt-2">
                            <button class="btn btn-primary btn-sm custom"><a href="index.php?list_users" class="nav-link my-1">List users</a></button>
                        </div>
                        <div class=" text-center mt-2">
                            <button class="btn btn-primary btn-sm custom"><a href="#" class="nav-link my-1">Log out</a></button>
                        </div>
                    </div>
                </div>

            </section>


            <section class="container my-5">
                <?php
                if (isset($_GET['insert_categories'])) { //si esta variable esta activa, se hace un include a ese archivo

                    include('insert_categories.php');
                }
                if (isset($_GET['insert_topics'])) { //si esta variable esta activa, se hace un include a ese archivo

                    include('insert_topics.php');
                }
                if (isset($_GET['view_products'])) { //si esta variable esta activa, se hace un include a ese archivo

                    include('view_products.php');
                }
                if (isset($_GET['edit_products'])) { //si esta variable esta activa, se hace un include a ese archivo

                    include('edit_products.php');
                }
                if (isset($_GET['delete_product'])) { //si esta variable esta activa, se hace un include a ese archivo

                    include('delete_product.php');
                }
                if (isset($_GET['view_categories'])) { //si esta variable esta activa, se hace un include a ese archivo

                    include('view_categories.php');
                }
                if (isset($_GET['view_topics'])) { //si esta variable esta activa, se hace un include a ese archivo

                    include('view_topics.php');
                }
                if (isset($_GET['edit_category'])) { //si esta variable esta activa, se hace un include a ese archivo

                    include('edit_category.php');
                }
                if (isset($_GET['edit_topics'])) { //si esta variable esta activa, se hace un include a ese archivo

                    include('edit_topics.php');
                }
                if (isset($_GET['delete_category'])) { //si esta variable esta activa, se hace un include a ese archivo

                    include('delete_category.php');
                }
                if (isset($_GET['delete_topics'])) { //si esta variable esta activa, se hace un include a ese archivo

                    include('delete_topics.php');
                }
                if (isset($_GET['list_orders'])) { //si esta variable esta activa, se hace un include a ese archivo

                    include('list_orders.php');
                }
                if (isset($_GET['list_payments'])) { //si esta variable esta activa, se hace un include a ese archivo

                    include('list_payments.php');
                }
                if (isset($_GET['list_users'])) { //si esta variable esta activa, se hace un include a ese archivo

                    include('list_users.php');
                }

                ?>
            </section>




        </main>

        <footer></footer>
        <?php include("../includes\conection/footer.php") ?>
    </div>





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>

</html>