<?php
$connections = mysqli_connect("localhost", "root", "", "mydb");
if (mysqli_connect_errno()){
    echo "Failed to connect to my SQL: ". mysqli_connect_errno(); 
}
?>