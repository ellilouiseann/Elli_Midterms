<?php

$name = $address = $email = $section = $contact = "";
$nameErr = $addressErr = $emailErr = $sectionErr = $contactErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty ($_POST["name"])) {
        $nameErr = "Name is required!";
    } else {
        $name = $_POST["name"];
    }

    if (empty ($_POST["address"])) {
        $addressErr = "Address is required!";
    } else {
        $address = $_POST["address"];
    }

    if (empty ($_POST["email"])) {
        $emailErr = "Email is required!";
    } else {
        $email = $_POST["email"];
    }

    if (empty ($_POST["section"])) {
        $sectionErr = "Section is required!";
    } else {
        $section = $_POST["section"];
    }

    if (empty ($_POST["contact"])) {
        $contactErr = "Contact is required!";
    } else {
        $contact = $_POST["contact"];
    }
}

?>

<style>
.error { 
     color:red;
}
   
</style>

<form method="POST" action="<?php htmlspecialchars ("PHP_SELF"); ?>">

<input type="text" name= "name" value="<?php echo $name; ?>"> <br>
<span class="error"><?php echo $nameErr; ?> </span> <br>

<input type="text" name= "address" value="<?php echo $address; ?>"> <br>
<span class="error"><?php echo $addressErr; ?> </span> <br>

<input type="text" name= "email" value="<?php echo $email; ?>"> <br>
<span class="error"><?php echo $emailErr; ?> </span> <br>

<input type="text" name= "section" value="<?php echo $section; ?>"> <br>
<span class="error"><?php echo $sectionErr; ?> </span> <br>

<input type="text" name= "contact" value="<?php echo $contact; ?>"> <br>
<span class="error"><?php echo $contactErr; ?> </span> <br>

<input type="submit" name="Submit">

</form>

<hr>

<?php

include("connect.php"); 
if ($name && $address && $email && $section && $contact) {
    $query = mysqli_query($connect, "INSERT INTO myinfo(name, address, email, section, contact) VALUES('$name','$address','$email', '$section', '$contact') "); 
    echo "<script language= 'javascript'>alert('New Record has been inserted!')</script>"; 
    echo "<script>window.location.href='index.php';</script>";
}

$view_query = mysqli_query($connect, "SELECT * FROM myinfo"); 
echo "<table border='1' width='50%'>"; 
echo"<tr>   
<td>Name</td> 
<td>Address</td> 
<td>Email</td>
<td>Section</td> 
<td>Contact</td> 
</tr>"; 

while($row = mysqli_fetch_assoc($view_query)){
$db_name = $row["name"]; 
$db_address = $row["address"]; 
$db_email = $row["email"];  
$db_section = $row["section"];
$db_contact = $row["contact"];

echo"<tr>   
<td>$db_name</td> 
<td>$db_address</td> 
<td>$db_email</td>
<td>$db_section</td>  
<td>$db_contact</td> 
</tr>"; 
}
echo "</table>"; 
     ?>