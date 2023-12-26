<!DOCTYPE html>
<html lang="en">
<?php
    require_once "conn.php";
    if(isset($_POST["name"]) && isset($_POST["address"])){
        $name = $_POST['name'];
        $address = $_POST['address'];
        $sql = "UPDATE company SET `Company_name`= '$name', `Address`= '$address'  WHERE id= ".$_GET["id"];
        if (mysqli_query($conn, $sql)) {
            header("location: index.php");
        } else {
            echo "Something went wrong. Please try again later.";
        }
    }
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP - MYSQL - CRUD</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2"
        crossorigin="anonymous"></script>
</head>

<body>
    <section>
        <h1 style="text-align: center;margin: 50px 0;">Update Data</h1>
        <div class="container">
            <?php 
                require_once "conn.php";
                $sql_query = "SELECT * FROM company WHERE id = ".$_GET["id"];
                if ($result = $conn ->query($sql_query)) {
                    while ($row = $result -> fetch_assoc()) { 
                        $Id = $row['Id'];
                        $Name = $row['Company_name'];
                        $Address = $row['Address'];
            ?>
                            <form action="updatedata.php?id=<?php echo $Id; ?>" method="post">
                                <div class="row">
                                    <div class="form-group col-lg-4">
                                        <label for="">Company Name</label>
                                        <input type="text" name="name" id="name" class="form-control" value="<?php echo $Name ?>" required>
                                    </div>
                                    <div class="form-group  col-lg-3">
                                        <label for="">Address</label>
                                        <input type="text" name="address" id="address" class="form-control" value="<?php echo $Address ?>"required>
                                    </div>
                                    <div class="form-group col-lg-2" style="display: grid;align-items:  flex-end;">
                                        <input type="submit" name="submit" id="submit" class="btn btn-primary">
                                    </div>
                                    <div> <a href="index.php" class="btn btn-danger">Cancel</a></div>
                                </div>
                            </form>
            <?php 
                    }
                }
            ?>
        </div>
    </section>
</body>

</html>

