<?php
// // Initialize the session
// session_start();

// // Check if the user is already logged in, if yes then redirect him to welcome page
// if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
//     header("location: UserManagementInterface.php");
//     exit;
// }

// require_once "connectlogin.php";

// // Define variables and initialize with empty values
// $username = $password = "";
// $username_err = $password_err = $login_err = "";

// // Processing form data when form is submitted
// if ($_SERVER["REQUEST_METHOD"] == "POST") {

//     // Check if username is empty
//     if (empty(trim($_POST["username"]))) {
//         $username_err = "Please enter username.";
//     } else {
//         $username = trim($_POST["username"]);
//     }

//     // Check if password is empty
//     if (empty(trim($_POST["password"]))) {
//         $password_err = "Please enter your password.";
//     } else {
//         $password = trim($_POST["password"]);
//     }

//     // Validate credentials
//     if (empty($username_err) && empty($password_err)) {
//         // Prepare a select statement
//         $sql = "SELECT username, password FROM user WHERE username = ?";

//         if ($stmt = mysqli_prepare($link, $sql)) {
//             // Bind variables to the prepared statement as parameters
//             mysqli_stmt_bind_param($stmt, "s", $param_username);

//             // Set parameters
//             $param_username = $username;

//             // Attempt to execute the prepared statement
//             if (mysqli_stmt_execute($stmt)) {
//                 // Store result
//                 mysqli_stmt_store_result($stmt);

//                 // Check if username exists, if yes then verify password
//                 if (mysqli_stmt_num_rows($stmt) == 1) {
//                     // Bind result variables
//                     mysqli_stmt_bind_result($stmt, $username, $hashed_password);
//                     if (mysqli_stmt_fetch($stmt)) {
//                         if (password_verify($password, $hashed_password)) {
//                             // Password is correct, so start a new session
//                             session_start();

//                             // Store data in session variables
//                             $_SESSION["loggedin"] = true;
//                             $_SESSION[" id"] = $id;
//                             $_SESSION["username"] = $username;

//                             // Redirect user to welcome page
//                             header("location: UserManagementInterface.php");
//                         } else {
//                             // Password is not valid, display a generic error message
//                             $login_err = "Invalid password.";
//                         }
//                     }
//                 } else {
//                     // Username doesn't exist, display a generic error message
//                     $login_err = "Invalid username or password.";
//                 }
//             } else {
//                 echo "Something went wrong. Please try again later.";
//             }

//             // Close statement
//             mysqli_stmt_close($stmt);
//         }
//     }

//     // Close connection
//     mysqli_close($link);
// }
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
    <section>
        <header>
            <a href="/MIGHTY-MIIGHT-MOTOR/index.html"><img src="/MIGHTY-MIIGHT-MOTOR/img/logo.jpg" class="logo"
                    alt="Mighty_Might_Motor" /></a>
            <ul>
                <li><a href="/MIGHTY-MIIGHT-MOTOR/index.html">Home</a></li>
            </ul>
        </header>
        <div class="wrapper">
            <?php
            if (!empty($login_err)) {
                echo '<div class="alert alert-danger">' . $login_err . '</div>';
            }
            ?>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <h2 class="d-flex justify-content-center">Login</h2>
                <div class="pt-2 g-col-6">
                    <label>Username</label>
                    <input type="text" name="username"
                        class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>"
                        value="<?php echo $username; ?>">
                    <span class="invalid-feedback">
                        <?php echo $username_err; ?>
                    </span>
                </div>
                <div class="pt-2 g-col-6">
                    <label>Password</label>
                    <input type="password" name="password"
                        class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>">
                    <span class="invalid-feedback">
                        <?php echo $password_err; ?>
                    </span>
                </div>
                <div class="form-group mt-3 mb-3 d-flex justify-content-center">
                    <input type="submit" class="btn btn-primary" value="Login">
                </div>
                <p>Don't have an account? <a href="CreateUserInterface.php">Create an Account.</a></p>
            </form>
        </div>
    </section>

</html>