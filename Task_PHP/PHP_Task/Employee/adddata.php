<?php
    require_once "conn.php";
    if(isset($_POST['submit'])){
        $name = $_POST['name'];
        $Salary = $_POST['salary'];
        $dateofbirth = $_POST['dateofbirth'];
        $company = $_POST['company'];

        if($name != "" && $Salary != "" && $dateofbirth != "" && $company != ""){
            $sql = "INSERT INTO employee (`Name`, `Salary`, `Date_of_birth`, `Company`) VALUES ('$name', '$Salary', '$dateofbirth', '$company')";
            if (mysqli_query($conn, $sql)) {
                header("location:index.php");
            } else {
                 echo "Something went wrong. Please try again later.";
            }
        }else{
            echo "Fields cannot be empty!";
        }
    }
?>