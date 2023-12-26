<?php
    require_once "conn.php";
    if(isset($_POST['submit'])){
        $name = $_POST['name'];
        $address = $_POST['address'];


        if($name != "" && $address != ""){
            $sql = "INSERT INTO company (`Company_name`, `Address`) VALUES ('$name', '$address')";
            if (mysqli_query($conn, $sql)) {
                header("location: index.php");
            } else {
                 echo "Something went wrong. Please try again later.";
            }
        }else{
            echo "Company Name and Address cannot be empty!";
        }
    }
?>