<?php
require_once('connect.php');
?>

<!--HTML-->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/MIGHTY-MIIGHT-MOTOR/css/UserManagementInterface.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css" />
    <title>User Management</title>
</head>

<body>
    <div class="d-flex justify-content-center mt-4">
        <h1>User Management</h1>
    </div>
    <div class="d-flex justify-content-center"><button type="button" class="btn btn-success my-2"><a
                class="text-light text-decoration-none mr-5"
                href="/MIGHTY-MIIGHT-MOTOR/admin/CreateUserInterface.php">ADD
                USER</a></button></div>
    <table class="table-light h-100 d-inlineflex justify-content-center mt-5" id="table1">
        <thead>
            <tr class="text-center text-dark">
                <th>ID</th>
                <th>First Name</th>
                <th>Middle Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Username</th>
                <th>Password</th>
                <th></th>
            </tr>

        </thead>

        <tbody id="display" class="text-center">
            <?php
            $query = "Select * from user";
            $result = mysqli_query($conn, $query);

            //to display the data from database
            if ($result) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $id = $row['user_id']; //$id is variable name lng to store the data $row['user_id'] to fetch data from database row user_id
                    $firstname = $row['fname']; //$firstname is variable name lng to store the data $row['fname'] to fetch data from database row fname
                    $middlename = $row['mname']; //$middlename is variable name lng to store the data $row['mname'] to fetch data from database row mname
                    $lastname = $row['lname']; //$lastname is variable name lng to store the data $row['lname'] to fetch data from database row lname
                    $email = $row['email']; //same sa uban
                    $username = $row['username'];
                    $password = $row['password'];

                    //below diha nila e ang data na fetch sa database, ma display sa td using the variable name inside sa while loop
                    //sa button part mapansin nimo ang a href nako kay naay php?updateid='.$id.' para mag determine nato sa url sa website na same id ba ang ge click
                    echo '<tr>
            <th>' . $id . '</th> 
            <td>' . $firstname . '</td>
            <td>' . $middlename . '</td>
            <td>' . $lastname . '</td>
            <td>' . $email . '</td>
            <td>' . $username . '</td>
            <td>' . $password . '</td>
            <td>
            <button class="btn btn-secondary mr-1 "><a href="/MIGHTY-MIIGHT-MOTOR/admin/updateuser.php?updateid=' . $id . '" class="text-decoration-none text-light">Update</a></button>
            <button class="btn btn-danger mr-1"><a href="/MIGHTY-MIIGHT-MOTOR/admin/deleteuser.php?deleteid=' . $id . '" class="text-decoration-none text-light">Delete</a></button>
            </td>
        </tr>';
                }
            }
            ?>
        </tbody>

        <script type="text/javascript" src="fetch.js"></script>
</body>

</html>