<?php
$conn = mysqli_connect('localhost', 'root', '', 'amala_store');

if (!$conn) {
    die(mysqli_error($conn));
}else{
    //  echo "connect";
}
