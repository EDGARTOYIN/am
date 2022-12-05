<?php 

if(isset($_GET['delete_topics'])){
    $delete_topics=$_GET['delete_topics'];
    //echo $delete_id;

    //delete query

    $delete_topics="Delete from `topics` where topics_id=$delete_topics";
    $result_topics=mysqli_query($conn,$delete_topics);
    if($result_topics){
        echo "<script>alert('Topic deleted succesfully')</script>";
        echo "<script>window.open('./index.php?view_topics','_self')</script>";
    }
}
?>