<?php
$conn = new mysqli("localhost", "root", "", "nagarani_school_db");
$id = $_GET['id'];

$result = $conn->query("SELECT * FROM students WHERE id=$id");
$row = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html>
<head>
  <title>View Student</title>
</head>
<body>
  <h2>Student Details</h2>
  <p><b>ID:</b> <?= $row['id'] ?></p>
  <p><b>Name:</b> <?= $row['name'] ?></p>
  <p><b>Roll:</b> <?= $row['roll'] ?></p>
  <p><b>Class:</b> <?= $row['class'] ?></p>
  <br>
  <a href="index.php">⬅ Back to List</a>
</body>
</html>