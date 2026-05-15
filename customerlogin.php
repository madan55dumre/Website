<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "customers";

$conn = new mysqli($servername, $username, $password, $dbname);

// check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

# ===================== SIGNUP =====================
if(isset($_POST['signup'])){

    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "INSERT INTO customers (name,email,password)
            VALUES ('$name','$email','$password')";

    if($conn->query($sql) === TRUE){

        echo "
        <!DOCTYPE html>
        <html>
        <head>
            <title>Signup</title>
            <meta http-equiv='refresh' content='1;url=appointment.html'>

            <style>
                body{
                    margin:10px;
                    font-family:Arial;
                }
                .msg{
                    color:green;
                    font-weight:bold;
                    font-size:18px;
                }
            </style>
        </head>

        <body>
            <div class='msg'>Signup Successful!</div>
        </body>
        </html>
        ";

    } else {
        echo "Error: " . $conn->error;
    }
}

# ===================== LOGIN =====================
if(isset($_POST['login'])){

    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM customers 
            WHERE email='$email' AND password='$password'";

    $result = $conn->query($sql);

    if($result->num_rows > 0){

        // remember me cookie
        if(isset($_POST['remember'])){
            setcookie("remember_email", $email, time() + (7 * 24 * 60 * 60));
        } else {
            setcookie("remember_email", "", time() - 3600);
        }

        echo "
        <!DOCTYPE html>
        <html>
        <head>
            <title>Login</title>
            <meta http-equiv='refresh' content='1;url=appointment.html'>

            <style>
                body{
                    margin:10px;
                    font-family:Arial;
                }
                .msg{
                    color:green;
                    font-weight:bold;
                    font-size:18px;
                }
            </style>
        </head>

        <body>
            <div class='msg'>Login Successful!</div>
        </body>
        </html>
        ";

    } else {
        echo "Invalid Email or Password";
    }
}

$conn->close();

?>