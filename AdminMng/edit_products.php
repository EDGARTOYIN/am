<?php
if(isset($_GET['edit_products'])){
    $edit_id=$_GET['edit_products'];
    //echo $edit_id;

    $get_data="Select * from `products` where product_id=$edit_id";
    $result=mysqli_query($conn,$get_data);
    $row=mysqli_fetch_assoc($result);
    $product_title=$row['product_title'];
    //echo $product_title;
    $product_description=$row['product_description'];
    $product_keywords=$row['product_keywords'];
    $category_id=$row['category_id'];
    $topics_id=$row['topics_id'];
    $product_image=$row['product_image'];
    $product_image2=$row['product_image2'];
    $product_image3=$row['product_image3'];
    $product_price=$row['product_price'];
    
    //fetching category name
    $select_category="Select * from `categories` where category_id=$category_id";
    $result_category=mysqli_query($conn,$select_category);
    $row_category=mysqli_fetch_assoc($result_category);
    $category_title=$row_category['category_title'];
    //echo $category_title;

    //fetching topics name
    $select_topics="Select * from `topics` where topics_id=$topics_id";
    $result_topics=mysqli_query($conn,$select_topics);
    $row_topics=mysqli_fetch_assoc($result_topics);
    $topics_title=$row_topics['topics_title'];
    //echo $topics_title;

}



?>

<div class="container mt-5">
    <h1 class="text-center">Edit Product</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_title" class="form-label">Product Title</label>
            <input type="text" id="product_title" value="<?php echo $product_title?>" name="product_title" class="form-control"
            required="required">
        </div>

       <div class="form-outline w-50 m-auto mb-4">
            <label for="product_description" class="form-label">Product Description</label>
            <input type="text" id="product_description"value="<?php echo $product_description?>" name="product_description" class="form-control"
            required="required">
        </div>

        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_keywords" class="form-label">Product Keywords</label>
            <input type="text" id="product_keywords"value="<?php echo $product_keywords?>" name="product_keywords" class="form-control"
            required="required">
        </div>

        <div class="form-outline w-50 m-auto mb-4">
        <label for="category_id" class="form-label">Product Categories</label>
            <select name="category_id" class="form-select">
            <option value="<?php echo $category_title?>"><?php echo $category_title?></option>
                <?php
                $select_category_all="Select * from `categories`";
                $result_category_all=mysqli_query($conn,$select_category_all);
                while($row_category_all=mysqli_fetch_assoc($result_category_all)){
                    $category_title=$row_category_all['category_title'];
                    $category_id=$row_category_all['category_id'];
                    echo "<option value='$category_id'>$category_title</option>";
                };
                
                
                ?>
            </select>
        </div>

        <div class="form-outline w-50 m-auto mb-4">
        <label for="topics_id" class="form-label">Topic Id</label>
            <select name="topics_id" class="form-select">
            <option value="<?php echo $topics_title?>"><?php echo $topics_title?></option>
                <?php
                $select_topics_all="Select * from `topics`";
                $result_topics_all=mysqli_query($conn,$select_topics_all);
                while($row_topics_all=mysqli_fetch_assoc($result_topics_all)){
                    $topics_title=$row_topics_all['topics_title'];
                    $topics_id=$row_topics_all['topics_id'];
                    echo "<option value='$topics_id'>$topics_title</option>";
                };
                
                
                ?>
                
            </select>
        </div>

        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_image" class="form-label">Product Image1</label>
            <div class="d-flex">
            <input type="file" id="product_image" name="product_image" class="form-control w-90 m-auto"
            required="required">
            <img src="./product_images/<?php echo $product_image?>" class="product_img">
            </div>
            
        </div>

        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_image2" class="form-label">Product Image2</label>
            <div class="d-flex">
            <input type="file" id="product_image2" name="product_image2" class="form-control w-90 m-auto"
            required="required">
            <img src="./product_images/<?php echo $product_image2?>" class="product_img">
            </div>
            
        </div>

        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_image3" class="form-label">Product Image3</label>
            <div class="d-flex">
            <input type="file" id="product_image3" name="product_image3" class="form-control w-90 m-auto"
            required="required">
            <img src="./product_images/<?php echo $product_image3?>" class="product_img">
            </div>
            
        </div>

        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_price" class="form-label">Product Price</label>
            <input type="text" id="product_price" value="<?php echo $product_price?>" name="product_price" class="form-control"
            required="required">
        </div>
        <div class="text-center">
            <input type="submit" name="edit_product" value="Update product" class="btn btn-info px-3 mb-3">
        </div>

    </form>
</div>


<!--Editing-->
<?php
if(isset($_POST['edit_product'])){
    $product_title=$_POST['product_title'];
    $product_description=$_POST['product_description'];
    $product_keywords=$_POST['product_keywords'];
    $category_id=$_POST['category_id'];
    $topics_id=$_POST['topics_id'];
    $product_price=$_POST['product_price'];

    $product_image=$_FILES['product_image']['name'];
    $product_image2=$_FILES['product_image2']['name'];
    $product_image3=$_FILES['product_image3']['name'];

    $temp_image=$_FILES['product_image']['tmp_name'];
    $temp_image2=$_FILES['product_image2']['tmp_name'];
    $temp_image3=$_FILES['product_image3']['tmp_name'];

    //checking for fields empty

    if($product_title=='' or $product_description=='' or $product_keywords=='' or
    $category_id=='' or $topics_id=='' or $product_image=='' or $product_image2=='' or
    $product_image3=='' or $product_price==''){
        echo "<script>alert('Please fill all teh fields and continue the process')</script>";

    }else{
        move_uploaded_file($temp_image,"./product_images/$product_image");
        move_uploaded_file($temp_image2,"./product_images/$product_image2");
        move_uploaded_file($temp_image3,"./product_images/$product_image3");

        //query to update products
        $update_product="update `products` set product_title='$product_title',
        product_description='$product_description', product_keywords='$product_keywords',
        category_id='$category_id', topics_id='$topics_id', product_image='$product_image',
        product_image2='$product_image2', product_image3='$product_image3', 
        product_price='$product_price',date=NOW() where product_id=$edit_id";
        $result_update=mysqli_query($conn,$update_product);
        if($result_update){
            echo "<script>alert('Product updated succesfully')</script>";
            echo "<script>window.open('./index.php','_self')</script>";
        }
    }


}
?>