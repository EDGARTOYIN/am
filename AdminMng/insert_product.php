<?php

include('../Includes/conection/connect.php'); //conexion con la database
if (isset($_POST['insert_product'])) { //si el boton submit es presionado

    $product_title = $_POST['product-title'];
    $product_description = $_POST['product-description'];
    $product_keyword = $_POST['product_keyword'];
    $product_categories = $_POST['product_categories'];
    $product_topics = $_POST['product_topics'];
    $product_price = $_POST['product_price'];
    $product_status = 'true';

    // imagenes
    $product_image = $_FILES['product_image']['name'];

    //img temp
    $temp_image = $_FILES['product_image']['tmp_name'];

    // si algo llega estar vacio, se enviara una alerta
    if (
        $product_title == '' or $product_description == '' or  $product_keyword == ''
        or $product_categories == '' or $product_topics == '' or $product_price == '' or $product_image == '' 
    ) {

        echo "<script>alert('You did not fill all the parameters')</script>";
        exit();
    } else {
        move_uploaded_file($temp_image, "./product_images/$product_image");

        //insert query
        $insert_product = "insert into `products` (product_title,product_description,product_keywords,category_id,topics_id,product_image,product_price,date,status) values ('$product_title','$product_description','$product_keyword','$product_categories','$product_topics','$product_image','$product_price',NOW(),'$product_status')";
        $result_query = mysqli_query($conn, $insert_product);
        if ($result_query) {
            echo "<script>alert('product inserted!')</script>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert products by Admin</title>
    <script src="https://kit.fontawesome.com/d9de7fd168.js" crossorigin="anonymous"></script>
    <!-- BOOTSRAP CDN LINK -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <!-- css link -->
    <link rel="stylesheet" href="styles.css">
</head>

<body class="bg-light">

    <div class="container mt-3">
        <h1 class="text-center">Insert product</h1>
        <!-- form de insercion de productos -->
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="form-outline mb-4 w-50 m-auto">
                <!-- titulo del producto -->
                <label for="product-title" class="form-label">
                    Product title
                </label>
                <input class="form-control" type="text" name="product-title" required id="product-title" placeholder="Enter product title" autocomplete="off">
            </div>

            <!-- descripcion del producto -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product-description" class="form-label">
                    Product description
                </label>
                <input class="form-control" type="text" name="product-description" required id="product-description" placeholder="Enter product description" autocomplete="off">
            </div>


            <!-- Palabra clave del producto -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_keyword" class="form-label">
                    keyword product
                </label>
                <input class="form-control" type="text" name="product_keyword" required id="product_keyword" placeholder="Enter product keyword" autocomplete="off">
            </div>


            <!-- categorias -->
            <div class="form-outline mb-4 w-50 m-auto">
                <select name="product_categories" id="" class="form-select" required>
                    <option value="">Select category</option>
                    <?php
                    $select_query = "Select * from `categories`";
                    $result_query = mysqli_query($conn, $select_query);
                    while ($row = mysqli_fetch_assoc($result_query)) {
                        $category_title = $row['category_title'];
                        $category_id = $row['category_id'];
                        echo "<option value='$category_id'>$category_title</option>";
                    }
                    ?>


                </select>
            </div>

            <!-- topicos -->
            <div class="form-outline mb-4 w-50 m-auto">
                <select name="product_topics" id="" class="form-select">
                    <option value="">Select topic</option>
                    <?php
                    $select_query = "Select * from `topics`";
                    $result_query = mysqli_query($conn, $select_query);
                    while ($row = mysqli_fetch_assoc($result_query)) {
                        $topics_title = $row['topics_title'];
                        $topics_id = $row['topics_id'];
                        echo "<option value='$topics_id'>$topics_title</option>";
                    }
                    ?>

                </select>
            </div>


            <!-- imagenes del producto -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image" class="form-label">
                    Product image
                </label>
                <input class="form-control" type="file" name="product_image" required id="product_image" placeholder="Enter image for the product" autocomplete="off">
            </div>

            <!-- Price -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_price" class="form-label">
                    product price
                </label>
                <input class="form-control" type="text" name="product_price" required id="product_price" placeholder="Enter price for the product" autocomplete="off">
            </div>

            <!-- submit--->
            <div class="form-outline mb-4 w-50 m-auto">
                <input class="form-control bg-dark text-light" type="submit" name="insert_product" value="Insert the product">
            </div>

        </form>
    </div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

</body>

</html>