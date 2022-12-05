<?php 

if(isset($_GET['delete_category'])){
    $delete_category=$_GET['delete_category'];
    //echo $delete_id;

    //delete query

    $delete_category="Delete from `categories` where category_id=$delete_category";
    $result_category=mysqli_query($conn,$delete_category);
    if($result_category){
        echo "<script>alert('Product deleted succesfully')</script>";
        echo "<script>window.open('./index.php','_self')</script>";
    }
}
?>