<?php
session_start();

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Database connection details
    $servername = "localhost";
    $username = "your_username";
    $password = "your_password";
    $dbname = "your_database";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Retrieve username and password from the form
    $username = $_POST['username'];
    $password = $_POST['password'];

    // SQL query to check if the provided credentials are valid
    $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = $conn->query($sql);

    // If the query returns a row, the credentials are valid
    if ($result->num_rows > 0) {
        // Set session variables
        $_SESSION['username'] = $username;
        // Redirect to the homepage or any other page after successful login
        header("Location: homepage.php");
    } else {
        // Redirect back to the login page with an error message
        header("Location: dealership.html?error=Invalid username or password");
    }

    // Close the database connection
    $conn->close();
}
?>
