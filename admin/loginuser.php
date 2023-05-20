<?php
//require_once('connect.php');


if ($_POST) {
    $host = "localhost";
    $user = "root";
    $pass = "";
    $db = "auth";

    $username = $_POST['username'];
    $password = $_POST['password'];

    $conn = mysqli_connect($host, $user, $pass, $db);
    $query = "Select * from user where username='$username' and password='$password'";
    $result = mysqli_query($conn, $query);
    $count = mysqli_num_rows($result);

    if ($count === 0) {
        session_start();
        $_SESSION['auth'] = 'true';
        // header('location:UserManagementInterface.php');
    } else {
        echo '<script>alert("Wrong Credentials")</script>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="/MIGHTY-MIIGHT-MOTOR/css/login_interface.css" />
    <link rel="shortcut icon" type="image/x-icon" href="/MIGHTY-MIIGHT-MOTOR/img/head-icon.ico" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" />

    <title>Login</title>
</head>

<body>
    <!--NAVIGATION SECTION-->
    <header>
        <ul>
            <li><a href="/MIGHTY-MIIGHT-MOTOR/index.html">Back To Home</a></li>
        </ul>
    </header>
    <main class="pt-5 text-center text-bg-light">
        <form action="UserManagementInterface.php" method="POST">
            <h3 class="link-dark mb-5 text-light">LOGIN</h3>
            <div id="error-msg" class="alert alert-danger alert-dismissible fade  visually-hidden" role="alert">
                <i>Invalid Username or Password!</i>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <input type="username" id="user" name="user" placeholder="Username" class="form-control" />
            <input type="password" id="pass" name="pwd" placeholder="Password" class="form-control" />
            <button type="submit" id="btn-submit" class="btn btn-light btn-medium d-grid gap-2 col-6 mx-auto"
                name="login">
                Login
                <button type="register" id="btn-register" class="registerButton">
                    <a href="/MIGHTY-MIIGHT-MOTOR/admin/CreateUserInterface.php">
                        Create an Account
                    </a>
                </button>
        </form>
    </main>
</body>

</html>