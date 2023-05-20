<?php
require_once('connect.php');

if (isset($_POST['submit'])) {
    $firstname = $_POST['firstname']; //With Dollar sign is variable name [inside sa brackets is the name element sa table header(th)]
    $middlename = $_POST['middlename'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "Insert into user (fname, mname, lname, email, username, password) values('$firstname', '$middlename', '$lastname', '$email', '$username', '$password')"; //fname, mname etc. table name sa database nako na
    $result = mysqli_query($conn, $query);

    if ($result) {
        //echo "User Added Successfully!";
        header('location:UserManagementInterface.php'); //after click submit button redirect sa UserManageInterface
    } else {
        die(mysqli_error($conn)); //fails if no connection from database
    }
}


// $fname = $_GET['firstname'];
// $mname = $_GET['middlename'];
// $lname = $_GET['lastname'];
// $email = $_GET['email'];
// $username = $_GET['username'];
// $password = $_GET['password'];

// $fetched = array();
// $query = "Insert into user (fname, mname, lname, email, username, password) VALUES ('$fname', '$mname', '$lname', '$email', '$username', '$password')";
// $result = mysqli_query($conn, $query);

// if ($result) {
//     array_push($fetched, array('result' => "Success"));
// } else {
//     array_push($fetched, array('result' => "Saving user failed, Try again!"));
// }
// echo json_encode($fetched);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="shortcut icon" type="image/x-icon" href="/MIGHTY-MIIGHT-MOTOR/img/head-icon.ico" />
    <link rel="stylesheet" href="/MIGHTY-MIIGHT-MOTOR/css/CreateUserInterface.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" />

    <script type="text/javascript" src="/MIGHTY-MIIGHT-MOTOR/scripts/CreateUser.js"></script>

    <title>Sign up</title>
</head>

<body>
    <section>
        <header>
            <a href="/MIGHTY-MIIGHT-MOTOR/index.html"><img src="/MIGHTY-MIIGHT-MOTOR/img/logo.jpg" class="logo"
                    alt="Mighty_Might_Motor" /></a>
            <ul>
                <li><a href="/MIGHTY-MIIGHT-MOTOR/index.html">Home</a></li>
                <li><a href="#">Products</a></li>
                <li><a href="#">Shop</a></li>
            </ul>
        </header>
        <!--CONTENTS-->
        <div class="contents">
            <form method="post">
                <h1>Create an Account</h1>
                <div class="grid gap-3">
                    <div class="pt-5 g-col-6">
                        <input type="text" id="fname" name="firstname" placeholder="First Name" class="form-control"
                            maxlength="50" />
                    </div>
                    <div class="pt-4 g-col-6">
                        <input type="text" id="mname" name="middlename" placeholder="Middle Name" class="form-control"
                            maxlength="50" />
                    </div>
                    <div class="pt-4 g-col-6">
                        <input type="text" id="lname" name="lastname" placeholder="Last Name" class="form-control"
                            maxlength="50" />
                    </div>
                    <div class="pt-4 g-col-6">
                        <input type="text" id="email" name="email" placeholder="Email" class="form-control"
                            maxlength="50" />
                    </div>
                    <br />
                    <hr />
                    <div class="pt-4 g-col-6">
                        <input type="username" id="user" name="username" placeholder="Username" class="form-control"
                            maxlength="50" />
                    </div>
                    <div class="pt-4 g-col-6">
                        <input type="password" id="pwd" name="password" placeholder="Password" class="form-control"
                            maxlength="50" />
                    </div>
                </div>
                <div class="d-flex justify-content-center">
                    <button class="btn btn-primary mt-4" id="btnsubmit" name="submit">
                        Submit
                    </button>
                </div>
            </form>

            <div id="insresult"></div>
        </div>
    </section>
</body>

</html>