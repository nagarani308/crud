<?php
$conn = new mysqli("localhost", "root", "", "nagarani_school_db");
$id = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name  = $_POST['name'];
    $roll  = $_POST['roll'];
    $class = $_POST['class'];

    $sql = "UPDATE students SET name='$name', roll='$roll', class='$class' WHERE id=$id";
    if ($conn->query($sql)) {
        header("Location: index.php");
        exit;
    } else {
        echo "Error: " . $conn->error;
    }
}

$result = $conn->query("SELECT * FROM students WHERE id=$id");
$row = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html>
<head>
  <title>Edit Student</title>
</head>
<body>
  <h2>Edit Student</h2>
  <form method="POST">
    Name: <input type="text" name="name" value="<?= $row['name'] ?>" required><br><br>
    Roll: <input type="number" name="roll" value="<?= $row['roll'] ?>" required><br><br>
    Class: <input type="text" name="class" value="<?= $row['class'] ?>" required><br><br>
    <button type="submit">Update</button>
  </form>
  <br>
  <a href="index.php">⬅ Back to List</a>
</body>
</html>