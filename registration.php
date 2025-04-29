<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $dept = $_POST['dept'];
    $year = $_POST['year'];
    $roll = trim($_POST['number']);

    $errors = [];

    // Name validation
    if (empty($name) || !preg_match("/^[a-zA-Z ]*$/", $name)) {
        $errors[] = "Invalid name. Only letters and spaces allowed.";
    }

    // Email validation
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format.";
    }

    // Department and year validation
    if (empty($dept)) {
        $errors[] = "Department is required.";
    }

    if (empty($year)) {
        $errors[] = "Year is required.";
    }

    // Roll number validation
    if (empty($roll) || !preg_match("/^[0-9]+$/", $roll)) {
        $errors[] = "Roll number must be numeric.";
    }

    // Show results
    if (empty($errors)) {
        echo "<h3>Registration Successful</h3>";
        echo "Name: $name<br>";
        echo "Email: $email<br>";
        echo "Department: $dept<br>";
        echo "Year: $year<br>";
        echo "Roll Number: $roll<br>";
    } else {
        echo "<h3>Errors:</h3>";
        foreach ($errors as $error) {
            echo "<p style='color:red;'>$error</p>";
        }
    }
} else {
    echo "Invalid request.";
}
?>
