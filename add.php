<?php
$conn = new mysqli("localhost", "root", "", "nagarani_school_db");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name  = $_POST['name'];
    $roll  = $_POST['roll'];
    $class = $_POST['class'];

    // Duplicate check
    $check = $conn->query("SELECT * FROM students WHERE name='$name' AND roll='$roll' AND class='$class'");
    if ($check->num_rows > 0) {
        echo "<p style='color:red;'>⚠ Student already exists!</p>";
    } else {
        $sql = "INSERT INTO students (name, roll, class) VALUES ('$name', '$roll', '$class')";
        if ($conn->query($sql)) {
            header("Location: index.php");
            exit;
        } else {
            echo "Error: " . $conn->error;
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Add Student</title>
</head>
<body>
  <h2>Add Student</h2>
  <form method="POST">
    Name: <input type="text" name="name" required><br><br>
    Roll: <input type="number" name="roll" required><br><br>
    Class: <input type="text" name="class" required><br><br>
    <button type="submit">Save</button>
  </form>
  <br>
  <a href="index.php">⬅ Back to List</a>
</body>
</html>