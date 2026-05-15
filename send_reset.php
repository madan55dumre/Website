<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "customers";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$email = $_POST['email'];

// check if email exists
$sql = "SELECT * FROM customers WHERE email='$email'";
$result = $conn->query($sql);

if($result->num_rows > 0){

    // generate reset link (simple version)
    $reset_link = "http://localhost/myproject/reset_password.php?email=".$email;

    // send email
    $subject = "Password Reset Link";
    $message = "Click this link to reset your password: ".$reset_link;
    $headers = "From: no-reply@yourwebsite.com";

    mail($email, $subject, $message, $headers);

    echo "Reset link sent to your email.";

} else {
    echo "Email not found!";
}

$conn->close();

?>