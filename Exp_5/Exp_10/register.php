<?php
include_once 'db.php'; // This should contain your DB connection

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name     = trim($_POST['name']);
    $email    = trim($_POST['email']);
    $prn      = trim($_POST['prn']);
    $contact  = trim($_POST['contact']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO students (name, email, prn, contact, password) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("sssss", $name, $email, $prn, $contact, $password);
        if ($stmt->execute()) {
            echo "<script>alert('Student registered successfully!'); window.location.href='wc.html';</script>";
        } else {
            echo "Error during registration: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "Database error: " . $conn->error;
    }

    $conn->close();
}
?>
