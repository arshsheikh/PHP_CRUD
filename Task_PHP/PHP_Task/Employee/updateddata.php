<!DOCTYPE html>
<html lang="en">
<!-- <?php
    require_once "conn.php";
    if(isset($_POST["name"]) && isset($_POST["salary"]) && isset($_POST["dateofbirth"]) && isset($_POST["company"])){
        $name = $_POST['name'];
        $salary = $_POST['salary'];
        $dateofbirth = $_POST['dateofbirth'];
        $company = $_POST['company'];
        $sql = "UPDATE `employee` SET `Name`= '$name', `Salary`= '$salary', `Date_of_birth` = '$dateofbirth', `Company` ='$company'  WHERE id= ".$_GET["id"];
        if (mysqli_query($conn, $sql)) {
            header("location: index.php");
        } else {
            echo "Something went wrong. Please try again later.";
        }
    }
?> -->
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP - MYSQL - CRUD</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2"
        crossorigin="anonymous">
    </script> -->
   

</head>

<body>
    <section>
        <h1 style="text-align: center;margin: 50px 0;">Update Data</h1>
        <div class="container">
            <?php 
                require_once "conn.php";
                $sql_query = "SELECT * FROM employee WHERE id = ".$_GET["id"];
                if ($result = $conn ->query($sql_query)) {
                    while ($row = $result -> fetch_assoc()) { 
                        $Id = $row['Id'];
                        $Name = $row['Name'];
                        $salary = $row['Salary'];
                        $dateofbirth = $row['Date_of_birth'];
                        $company = $row['Company'];
            ?>
                            <form action="updateddata.php?id=<?php echo $Id; ?>" method="post" id='form'>
                                <div class="row">
                                    <div class="form-group col-lg-4">
                                        <label for="">Employee Name</label>
                                        <input type="text" name="name" id="name" class="form-control" value="<?php echo $Name ?>" required>
                                    </div>
                                    <div class="form-group  col-lg-3">
                                        <label for="">Salary</label>
                                        <input type="text" name="salary" id="salary" class="form-control" value="<?php echo $salary ?>"required>
                                    </div>
                                    <div class="form-group  col-lg-3">
                                        <label for="">Date of Birth</label>
                                        <input type="date" name="dateofbirth" id="dateofbirth" class="form-control" value="<?php echo $dateofbirth ?>"required>
                                    </div>
                                    <div class="form-group  col-lg-3">
                                        <label for="">Company Name</label>
                                        <input type="text" name="company" id="company" class="form-control" value="<?php echo $company ?>"required>
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
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const form = document.getElementById('form');
        const nameInput = document.getElementById('name');
        const salaryInput = document.getElementById('salary');
        const dobInput = document.getElementById('dateofbirth');
        const companyInput = document.getElementById('company');

        form.addEventListener('submit', function(e) {
            let messages = [];

            if (nameInput.value === '' || nameInput.value === null) {
                messages.push('Employee Name is required');
            }

            // Assuming you want to validate salary within a specific range
            const salaryMin = 10000;
            const salaryMax = 50000;
            if (salaryInput.value < salaryMin || salaryInput.value > salaryMax) {
                messages.push('Salary must be between ' + salaryMin + ' and ' + salaryMax);
            }

            if (dobInput.value === '' || dobInput.value === null) {
                messages.push('Date of Birth is required');
            }

            if (companyInput.value === '' || companyInput.value === null) {
                messages.push('Company Name is required');
            }

            if (messages.length > 0) {
                e.preventDefault();
                const errorElement = document.createElement('div');
                errorElement.classList.add('login-error');
                errorElement.innerText = messages.join(', ');
                form.appendChild(errorElement);
            }
        });
    });
</script>
</body>

</html>
