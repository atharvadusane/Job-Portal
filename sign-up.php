<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Sign Up</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <style>
        body {
            padding: 15px;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        form {
            width: 100%;
            max-width: 330px;
            padding: 15px;
            margin: auto;
            text-align: center;
        }

        form img {
            width: 72px;
            height: 72px;
            margin-bottom: 20px;
        }

        form input {
            margin-bottom: 10px;
        }
    </style>
</head>

<body>
    <form class="form-signin" method="POST">
        <img src="https://getbootstrap.com/docs/4.0/assets/brand/bootstrap-solid.svg" alt="" class="mb-4">
        <h1 class="h3 mb-3 font-weight-normal">Please sign up</h1>
        <input type="email" id="inputEmail" class="form-control" name="email" placeholder="Email address" required autofocus>
        <input type="password" id="inputPassword" class="form-control" name="password" placeholder="Password" required>
        <input type="text" id="first_name" class="form-control" name="first_name" placeholder="First Name" required>
        <input type="text" id="last_name" class="form-control" name="last_name" placeholder="Last Name" required>
        <input type="number" id="mob_no" class="form-control" name="mob_no" placeholder="Mob. No." required>
        <input type="date" id="dob" class="form-control" name="dob" placeholder="DOB" required>
        <input type="submit" class="btn btn-lg btn-primary btn-block" name="submit" value="Sign Up">
        <a href="job-post.php">Already have Account</a>
        <p class="mt-5 mb-3 text-muted">&copy; 2017-2018</p>
    </form>

</body>

</html>

<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include('connection/db.php');

if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $dob = $_POST['dob'];
    $mob_no = $_POST['mob_no'];

    $query = mysqli_query($conn, "INSERT INTO jobseeker (email, password, first_name, last_name, dob, mob_no) VALUES ('$email', '$password', '$first_name', '$last_name', '$dob', '$mob_no')");

    if($query){
        echo "<script>alert('Now you can login')</script>";
        header('location:job-post.php');
        exit(); // Ensure script execution stops after redirection
    } else{
        echo "<script>alert('Connection failed, Try again')</script>";
        echo mysqli_error($conn); // Output any MySQL errors
    }
}
?>
