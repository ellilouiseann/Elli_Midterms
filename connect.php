<?php
$connect = mysqli_connect("localhost", "root", "", "mydbs");
if (mysqli_connect_errno()){
    echo "Failed to connect to my SQL: ". mysqli_connect_errno(); 
}
?>