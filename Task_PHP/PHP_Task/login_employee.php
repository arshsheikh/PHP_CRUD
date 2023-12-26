<?php
session_start();

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Check if the provided credentials are valid
    if ($username === "admin" && $password === "admin") {
        $_SESSION["authenticated"] = true;
        header("Location: http://localhost:81/WEB_Technology/Employee/index.php");

    } else {
        $loginError = "Invalid username or password";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login to Access Employee Database</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: pink;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .login-container {
            background-color: goldenrod;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
            width: 400px;
        }
        .login-title {
            font-size: 24px;
            font-weight: bold;
            text-align: center;
            margin-bottom: 20px;
        }
        .login-error {
            color: red;
            margin-top: 10px;
        }
        .login-input {
            padding: 10px;
            margin: 10px 0;
            width: 100%;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }
        .btn {
            padding: 12px 30px;
            font-size: 18px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            background-color: purple;
            color: yellowgreen;
            transition: background-color 0.3s ease;
            text-align: center;
            text-decoration: none;
            display: block;
            margin: 20px auto 0;
        }
        .btn:hover {
            background-color: red;
        }
    </style>
<body>
    <div class="login-container">
        <h2>Login to Access Employee Database</h2>
        <?php if (isset($loginError)) { ?>
            <p class="login-error"><?php echo $loginError; ?></p>
        <?php } ?>
        <form method="post" action="">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required><br>
            <br><br>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required><br>
           <br>
 <input type="submit" value="Login" class="btn">
        </form>
    </div>
</body>
</html>
