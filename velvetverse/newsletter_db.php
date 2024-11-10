<?php

$servername = "localhost";
$username = "root";              
$password = "";                 
$dbname = "newsletter_db";       


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email_address = $conn->real_escape_string($_POST['email_address']);

    $sql = "INSERT INTO subscribers (email_address) VALUES ('$email_address')";

    if ($conn->query($sql) === TRUE) {
        header("Location: subscribed.html");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
