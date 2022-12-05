<h3 class="text-center text-succes">All Topics</h3>
<table class="table table-bordered mt-5">
    <thead class="bg-dark text-light">
        <tr class="text-center">
            <th>Serial Number</th>
            <th>Topics Title</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody class="bg-secondary text-light">
        <?php
        $select_cat="Select * from `topics`";
        $result=mysqli_query($conn,$select_cat);
        $number=0;
        while($row=mysqli_fetch_assoc($result)){
            $topics_id=$row['topics_id'];
            $topics_title=$row['topics_title'];
            $number++;
       
        
        ?>

    <tr class="text-center">
        <td><?php echo $number;?></td>
        <td><?php echo $topics_title;?></td>
        <td><a href='index.php?edit_topics=<?php echo $topics_id?>' class='text-light'><i class='fa-solid fa-pen-to-square'></i></a></td>
<td><a href='index.php?delete_topics=<?php echo $topics_id?>' type="button" class="text-light" data-toggle="modal" data-target="#exampleModal"><i class='fa-solid fa-trash'></i></a></td>
    </tr>
<?php
        }?>
    </tbody>
</table>



<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
       <h4>Are you sure you want to delete this?</h4>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" 
        data-dismiss="modal"><a href="./index.php?view_topics" 
        class="text-light text-decoration-none">No</a></button>
        <button type="button" class="btn btn-primary"><a href='index.php?delete_topics=<?php echo $topics_id?>' 
        class="text-light text-decoration-none">Yes</a></button>
      </div>
    </div>
  </div>
</div>