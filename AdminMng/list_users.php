<h3 class="text-center text-sucess">All Users</h3>
<table class="table table-bordered mt-5">
    <thead class="bg-dark text-light">

    <?php
    $get_users="Select * from `user_table`";
    $result=mysqli_query($conn,$get_users);
    $row_count=mysqli_num_rows($result);
    
        
    
    
    if($row_count==0){
        echo "<h2 class='text-danger text-center mt-5'>No users found</h2>";
    }else{
        echo "<tr>
    <th>Serial Number</th>
    <th>Name</th>
    <th>Email</th>
    <th>Image</th>
    <th>Address</th>
    <th>Mobile</th>
    <th>Delete</th>
    </tr>
    </thead>
    <tbody class='bg-secondary text-light'>";
        $number=0;
        while($row_data=mysqli_fetch_assoc($result)){
            $user_name=$row_data['user_name'];
            $user_email=$row_data['user_email'];
            $user_image=$row_data['user_image'];
            $user_address=$row_data['user_address'];
            $user_mobile=$row_data['user_mobile'];
            
            $number++;
            echo " <tr>
            <td>$number</td>
            <td>$user_name</td>
            <td>$user_email</td>
            <td><img src='../users_area/user_images/$user_image' 
            alt='$user_name' class='product_img'/></td>
            <td>$user_address</td>
            <td>$user_mobile</td>
            
            <td><a href='' class='text-light'><i class='fa-solid fa-trash'></i></a></td>
        </tr>";
        }
    }
    
    ?>
        
        
    </tbody>
</table>