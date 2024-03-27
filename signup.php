<?php
//insert data from user to database
include 'connectdb.php';
if($_SERVER['REQUEST_METHOD']=='POST'){
    //pick data user has entered
    $username=$_POST['username'];
    $password= password_hash($_POST['password'], PASSWORD_DEFAULT);
    $dateOfBirth=$_POST['dateOfBirth'];
    $phoneNumber=$_POST['phoneNumber'];
    $gmail=$_POST['gmail'];
    //query to insert data into database
    $sql = "INSERT INTO clients(username, password, dateOfBirth, phoneNumber) VALUES('$username','$password',$dateOfBirth,$phoneNumber)";
//execute query
$result=mysqli_query($connect,$sql);
if(!empty($gmail) && !empty($password) && !is_numeric($gmail))
{
    $query = "insert into form (username,email, password,dateofBirth,phoneNumber) values ('$username',
    '$password','$dateOfBirth','$phoneNumber','$gmail')";
    

    echo"<script type='text/javascript'> alert('Successfully registered')</script>";
}
 else{
    echo"<script type='text/javascript'> alert('Please Enter some Valid Information')</script>";
}


}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Log in</title>
    <link rel="stylesheet" type="text/css" href="">
</head>
<body>
<div id="form">
        <form name="registrationForm" onsubmit="return validateForm()" method="POST">
            <input type="text" name="username" id="username" placeholder="Enter Username" required> <br>
            <input type="password" name="password" id="password" placeholder="Enter password" required><br>
            <input type="password" name="confirmPassword" id="confirmPassword" placeholder="Confirm password" required><br>
            <input type="date" name="dateOfBirth" id="dateOfBirth" required><br>
            <input type="tel" name="phoneNumber" id="phoneNumber" placeholder="Enter phone number" required><br>
            <input type="text" name="gmail" id="gmail" placeholder="Enter Email" required> <br>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        <p>Already have an account? <a href="login.php">Login here</a></p>
    </div>
    <script src="sign up.js"></script>
</body>
</html>