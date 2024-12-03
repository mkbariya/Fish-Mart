<?php
include('config.php');
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $repeat_password = $_POST['repeat_password'];
    $email = $_POST['email'];
    $firstname = $_POST['first_name']; // Update to match your form field name
    $lastname = $_POST['last_name']; // Update to match your form field name

    // Check if passwords match
    if ($password === $repeat_password) {
        // Hash the password
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);

        // Prepare and execute the insert query
        $stmt = $conn->prepare("INSERT INTO users (username, password, email, firstname, lastname) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $username, $hashed_password, $email, $firstname, $lastname);

        if ($stmt->execute()) {
            // Set session variables for first name and last name
            $_SESSION['firstname'] = $firstname;
            $_SESSION['lastname'] = $lastname;

            
            // Registration successful, redirect to profile page
            header('Location: profile.php');
            echo var_dump($_SESSION);
            exit();
        } else {
            // Error occurred while executing the query
            echo "Error: " . $stmt->error;
        }

        // Close the statement
        $stmt->close();
    } else {
        // Passwords do not match
        echo "Passwords do not match.";
    }
}
?>
