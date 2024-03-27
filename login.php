<?php
    session_start();

    include("connectdb.php");

    if($_SERVER['REQUEST_METHOD']=='POST')
    {
      $gmail = $_POST['gmail'];
      $password = $_POST['password'];

       if(!empty($email) && !empty($password) && !is_numeric($gmail))
       {
          $query="select * from form where email = '$gmail' limit 1";
          $result = mysqli_query($con, $query);


      if($result)
        {

            if($result && mysqli_num_rows($result) > 0)
            {
             $user_data = mysqli_fetch_assoc($result);

             if($user_data['password'] == $password)
             {
                header("Location: profile.php");
                exit(); 
             }
            }
        }
          echo "<script type='text/javascript'> alert('Wrong email or password')</script>";
        }
        else{
        echo "<script type='text/javascript'> alert('Please enter email and password')</script>";
        } 
        
    } 


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Dealership Login</title>
    <link rel="stylesheet" href="dealership.css">
</head>
<body>
        <nav>
            <ul>
                <li><a href="dealership.html">Home</a></li>
                <li><a href="cars for sale.html">Cars for Sale</a></li>
                <li><a href="sell your car.html">Sell Your Car</a></li>
                <li><a href="contact.html">Contact Us</a></li>
            </ul>
        </nav>
    <div class="container">
        <div class="login-container">
            <h1>Car Dealership</h1>
            <h2>Login</h2>
            <form action="login.php" method="post" class="login-form">
                <div class="form-group">
                    <label for="username">Username:</label>
                    <input type="text" id="username" name="username" required>
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <button type="submit" class="button">Log In</button>
            </form>
        </div>
    </div>
</body>
</html>