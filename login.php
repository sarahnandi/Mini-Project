<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);


$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "bank_db";

$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    echo "Database connected successfully.";
}



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $account_number = $_POST['account-number'];
    $contact = $_POST['contact'];
    $password = $_POST['password'];

    
    $stmt = $conn->prepare("SELECT * FROM users WHERE Name=? AND Account_number=? AND (Email=? OR Mobile_Number=?)");
    $stmt->bind_param("ssss", $name, $account_number, $contact, $contact);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        
        if (password_verify($password, $user['Password'])) {
            
            $_SESSION['user'] = $user;
            header("Location: user_profile.php");
            exit();
        } else {
            echo "Invalid password.";
        }
    } else {
        echo "No user found.";
    }


    $stmt->close();
}

$conn->close();
?>
