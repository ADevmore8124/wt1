<?php include "inc/dbinfo1.inc.php"; ?>
<html>
<head>
  <title>Student Exam Registration</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #eef2f7;
      padding: 40px;
    }
    .container {
      background-color: #fff;
      max-width: 600px;
      margin: auto;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }
    input[type="text"],
    input[type="email"],
    input[type="date"] {
      width: 100%;
      padding: 10px;
      margin: 10px 0 20px;
      border: 1px solid #ccc;
      border-radius: 6px;
    }
    input[type="submit"] {
      background-color: #007bff;
      color: white;
      padding: 12px 20px;
      border: none;
      border-radius: 6px;
      width: 100%;
      cursor: pointer;
    }
    input[type="submit"]:hover {
      background-color: #0056b3;
    }
    table {
      margin-top: 40px;
      border-collapse: collapse;
      width: 100%;
    }
    th, td {
      border: 1px solid #999;
      padding: 10px;
      text-align: center;
    }
    h2 {
      text-align: center;
      color: #333;
    }
  </style>
</head>
<body>
<div class="container">
<h2>Student Exam Registration</h2>

<?php
  $connection = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD);
  if (mysqli_connect_errno()) echo "Failed to connect to MySQL: " . mysqli_connect_error();

  $database = mysqli_select_db($connection, DB_DATABASE);

  VerifyStudentsTable($connection, DB_DATABASE);

  // Form submission
  // $name = htmlentities($_POST['name']);
  // $email = htmlentities($_POST['email']);
  // $course = htmlentities($_POST['course']);
  // $exam_date = htmlentities($_POST['exam_date']);

  // if ($name || $email || $course || $exam_date) {
  //   AddStudent($connection, $name, $email, $course, $exam_date);
  //   echo "<p style='color: green; font-weight: bold;'>Registration successful!</p>";
  // }

  if (isset($_POST['name'], $_POST['email'], $_POST['course'], $_POST['exam_date'])) {
    $name = htmlentities($_POST['name']);
    $email = htmlentities($_POST['email']);
    $course = htmlentities($_POST['course']);
    $exam_date = htmlentities($_POST['exam_date']);
  
    AddStudent($connection, $name, $email, $course, $exam_date);
    echo "<p style='color: green; font-weight: bold;'>Registration successful!</p>";
  }
  
?>

<form action="<?php echo $_SERVER['SCRIPT_NAME'] ?>" method="POST">
  <label>Full Name</label>
  <input type="text" name="name" required>

  <label>Email Address</label>
  <input type="email" name="email" required>

  <label>Course Name</label>
  <input type="text" name="course" required>

  <label>Exam Date</label>
  <input type="date" name="exam_date" required>

  <input type="submit" value="Register">
</form>

<h3>Registered Students</h3>
<table>
  <tr>
    <th>ID</th>
    <th>Name</th>
    <th>Email</th>
    <th>Course</th>
    <th>Exam Date</th>
  </tr>

<?php
$result = mysqli_query($connection, "SELECT * FROM students");

while($data = mysqli_fetch_assoc($result)) {
  echo "<tr>";
  echo "<td>{$data['id']}</td>";
  echo "<td>{$data['name']}</td>";
  echo "<td>{$data['email']}</td>";
  echo "<td>{$data['course']}</td>";
  echo "<td>{$data['exam_date']}</td>";
  echo "</tr>";
}
mysqli_free_result($result);
mysqli_close($connection);
?>
</table>
</div>
</body>
</html>

<?php
function AddStudent($connection, $name, $email, $course, $exam_date) {
  $n = mysqli_real_escape_string($connection, $name);
  $e = mysqli_real_escape_string($connection, $email);
  $c = mysqli_real_escape_string($connection, $course);
  $d = mysqli_real_escape_string($connection, $exam_date);

  $query = "INSERT INTO students (name, email, course, exam_date) VALUES ('$n', '$e', '$c', '$d')";
  if(!mysqli_query($connection, $query)) echo "<p style='color:red;'>Error adding student data.</p>";
}

function VerifyStudentsTable($connection, $dbName) {
  if (!TableExists("students", $connection, $dbName)) {
    $query = "CREATE TABLE students (
      id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
      name VARCHAR(100),
      email VARCHAR(100),
      course VARCHAR(100),
      exam_date DATE,
      created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )";
    if (!mysqli_query($connection, $query)) echo "<p>Error creating table.</p>";
  }
}

function TableExists($tableName, $connection, $dbName) {
  $t = mysqli_real_escape_string($connection, $tableName);
  $d = mysqli_real_escape_string($connection, $dbName);
  $check = mysqli_query($connection,
    "SELECT TABLE_NAME FROM information_schema.TABLES WHERE TABLE_NAME = '$t' AND TABLE_SCHEMA = '$d'");
  return mysqli_num_rows($check) > 0;
}
?>