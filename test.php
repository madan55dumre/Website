<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $patient = $_POST['patient'];
    $date = $_POST['date'];
    $time = $_POST['time'];

    $sql = "INSERT INTO appointment (patient, date, time)
            VALUES ('$patient', '$date', '$time')";

    if ($conn->query($sql) === TRUE) {
        echo "Appointment Saved Successfully ✅";
    } else {
        echo "Error: " . $conn->error;
    }
}

$conn->close();
?>