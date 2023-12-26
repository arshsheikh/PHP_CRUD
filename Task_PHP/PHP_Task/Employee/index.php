<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP website</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
        }

        h1 {
            text-align: center;
            margin: 50px 0;
            color: #333;
        }

        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
        }

        .form-group {
            margin-bottom: 20px;
        }

        .btn-primary {
            margin-right: 10px;
        }

        .btn-secondary {
            margin-left: 10px;
        }

        .login-error {
            color: #ff3333;
            margin-top: 10px;
        }

        .table {
            margin-top: 50px;
        }

        .table-dark {
            background-color: #333;
            color: #fff;
        }

        .trow {
            background-color: #444;
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <section>
        <h1 style="text-align: center; margin: 50px 0;">Employee Database</h1>
        <div class="container">
            <form action="adddata.php" method="post" id="form">
                <div class="row">
                    <div class="form-group col-lg-4">
                        <label for="name">Employee Name</label>
                        <input type="text" name="name" id="name" class="form-control" required>
                    </div>
                    <div class="form-group col-lg-3">
                        <label for="salary">Salary</label>
                        <input type="number" name="salary" id="salary" class="form-control" required>
                    </div>
                    <div class="form-group col-lg-3">
                        <label for="dateofbirth">Date of Birth</label>
                        <input type="date" name="dateofbirth" id="dateofbirth" class="form-control" required>
                    </div>
                    <div class="form-group col-lg-3">
                        <label for="company">Company Name</label>
                        <input type="text" name="company" id="company" class="form-control" required>
                    </div>
                    <div class="form-group col-lg-2" style="display: grid; align-items: flex-end;">
                        <input type="submit" name="submit" id="submit" class="btn btn-primary">
                    </div>
                    <div>
                    <button type="button" class="btn btn-secondary" id="cancel">Cancel</button>
                    </div>
                </div>
                <div id="form-errors" class="login-error"></div>
            </form>
        </div>
    </section>
    <section style="margin: 50px 0;">
        <div class="container">
            <table class="table table-dark">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Name</th>
                        <th scope="col">Salary</th>
                        <th scope="col">Date of Birth</th>
                        <th scope="col">Company</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- PHP code to fetch and display employee data -->
                    <?php 
                        require_once "conn.php";
                        $sql_query = "SELECT * FROM employee";
                        if ($result = $conn ->query($sql_query)) {
                            while ($row = $result -> fetch_assoc()) { 
                                $Id = $row['Id'];
                                $Name = $row['Name'];
                                $salary = $row['Salary'];
                                $dateofbirth = $row['Date_of_birth'];
                                $company = $row['Company'];
                    ?>
                    
                    <tr class="trow">
                        <td><?php echo $Id; ?></td>
                        <td><?php echo $Name; ?></td>
                        <td><?php echo $salary; ?></td>
                        <td><?php echo $dateofbirth; ?></td>
                        <td><?php echo $company; ?></td>
                        <td><a href="updateddata.php?id=<?php echo $Id; ?>" class="btn btn-primary">Edit</a></td>
                        <td><a href="deletedata.php?id=<?php echo $Id; ?>" class="btn btn-danger">Delete</a></td>
                    </tr>

                    <?php
                            } 
                        } 
                    ?>
                </tbody>
            </table>
        </div>
    </section>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const form = document.getElementById('form');
            const nameInput = document.getElementById('name');
            const salaryInput = document.getElementById('salary');
            const dobInput = document.getElementById('dateofbirth');
            const companyInput = document.getElementById('company');
            const cancelBtn = document.getElementById('cancel');
            const errorElement = document.getElementById('form-errors');

            form.addEventListener('submit', function (e) {
                let messages = [];

                if (nameInput.value.trim() === '') {
                    messages.push('Employee Name is required');
                }

                const salaryMin = 10000;
                const salaryMax = 50000;
                const salaryValue = parseFloat(salaryInput.value);
                if (isNaN(salaryValue) || salaryValue < salaryMin || salaryValue > salaryMax) {
                    messages.push('Salary must be between ' + salaryMin + ' and ' + salaryMax);
                }

                if (dobInput.value === '' || dobInput.value === null) {
                    messages.push('Date of Birth is required');
                }

                if (companyInput.value.trim() === '') {
                    messages.push('Company Name is required');
                }

                if (messages.length > 0) {
                    e.preventDefault();
                    errorElement.innerHTML = '<div class="alert alert-danger" role="alert">' +
                        messages.join('<br>') + '</div>';
                }
            });

            cancelBtn.addEventListener('click', function () {
                window.location.href = 'index.php';
            });
        });
    </script>
</body>

</html>
