<?php
include 'connectlogin.php';

if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (empty($username)) {
        header("location: loginuser.php?error=Username is required");
    } else if (empty($password)) {
        header("location: login.php?error=Password is required");
    } else {
        $stmt = $conn->prepare("SELECT * FROM user WHERE username=?");
        $stmt->execute([$username]);

        if ($stmt->rowCount() === 1) {

        } else {
            header("Location : login.php?error=Incorrect Username or Password!");
        }
    }
}
?>