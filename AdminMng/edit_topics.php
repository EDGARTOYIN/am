<?php
if(isset($_GET['edit_topics'])){
    $edit_topics=$_GET['edit_topics'];
    //echo $edit_category;

    $get_topics="Select * from `topics` where topics_id=$edit_topics";
    $result=mysqli_query($conn,$get_topics);
    $row=mysqli_fetch_assoc($result);
    $topics_title=$row['topics_title'];
    //echo $category_title;
}

if(isset($_POST['edit_topics'])){
    $topics_title=$_POST['topics_title'];
    $update_query="update `topics` set topics_title='$topics_title' where
    topics_id=$edit_topics ";
    $result_topics=mysqli_query($conn,$update_query);
    if($result_topics){
        echo "<script>alert('Topics has been updated successfully')</script>";
        echo "<script>window.open('./index.php?view_topics','_self')</script>";
    }

}




?>




<div class="container mt-3">
    <h1 class="text-center">Edit Topics</h1>
    <form action="" method="post" class="text-center">
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="topics_title" class="form-label">Topics Title</label>
            <input type="text" name="topics_title" id="topics_title" class="form-control"
            required="required" value='<?php echo $topics_title;?>'>
        </div>
        <input type="submit" value="Update Topics" class="btn btn-info px-3 mb-3" name="edit_topics">
    </form>
</div>