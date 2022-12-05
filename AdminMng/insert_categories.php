<!-- FORM para insertar categorias, se hace un include al la pagina index -->
<?php
include("../Includes/conection/connect.php"); //conexion con la base de datos
if (isset($_POST['insert_cat'])) { //name atribute del input, revisa si se envio algo


    //select data from database
    $category_name = $_POST['cat_title']; //se guarda el valor enviado. "name = cat_title nombre del input donde se guardo"
    $select_query = "Select * from `categories` where category_title='$category_name'"; // con esta query nos aseguramos que no insertamos datos repetidos
    $result_verify = mysqli_query($conn, $select_query); //ejecutamos la query
    $number_values = mysqli_num_rows($result_verify); // guardamos el numero de rows devueltas por la query

    if ($number_values > 0) { //si retorna un valor , quiere decir que esta categoria ya existe en la base de datos
        echo "<script>alert('This category is already here')</script>";
    } else {
        // si el valor no existe en la base de datos, se inserta
        $insert_query = "insert into `categories` (category_title) values ('$category_name')";
        $result = mysqli_query($conn, $insert_query);

        if ($result) {
            echo "<script>alert('Category has been added')</script>";
        } //si la query resulto existosa

    }
}
?>


<h2 class="text-center">Insert a category</h2>
<form action="" method="POST" class="mb-2">

    <div class="input-group mb-2 w-90">
        <span class="input-group-text bg-dark text-bg-dark" id="basic-addon1"><i class="fa-solid fa-table-cells"></i></span>
        <input type="text" class="form-control" name="cat_title" placeholder="Insert categories" aria-label="categories" aria-describedby="basic-addon1">
    </div>

    <div class="input-group w-10 mb-2 m-auto">
        <input type="submit" class="bg-dark text-bg-dark p-2 border-0 rounded-2 my-2" name="insert_cat" value="Insert category" aria-label="Username" aria-describedby="basic-addon1">
        <!-- <button class="bg-dark text-bg-dark p-2 border-0 rounded-2 my-2 ">Insert categories</button> -->
    </div>
</form>