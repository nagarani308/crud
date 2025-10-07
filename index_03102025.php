<?php
$conn = new mysqli("localhost", "root", "", "nagarani_school_db");
if ($conn->connect_error) { die("Connection failed: " . $conn->connect_error); }

$result = $conn->query("SELECT * FROM students");
?>
<!DOCTYPE html>
<html>
<head>
  <title>Student List</title>
  <style>
    body { font-family: Arial; margin: 20px; }
    table { border-collapse: collapse; width: 80%; }
    th, td { border: 1px solid #ccc; padding: 8px; text-align: center; }
    th { background: #f4f4f4; }
    a { text-decoration: none; padding: 4px 8px; border-radius: 4px; }
    .btn { background: #007bff; color: white; }
    .btn-red { background: #dc3545; color: white; }
    .btn-green { background: #28a745; color: white; }
  </style>
</head>
<body>
  <h2>Student List</h2>
  <a href="add.php" class="btn-green">➕ Add New Student</a>
  <br><br>
  <table>
    <tr>
      <th>ID</th>
      <!-- <th>Name</th> //Note: Commneted on 03-10-2025 -->
      <th>Full Name</th>
      <th>Roll</th>
      <th>Class</th>
      <th>Actions</th>
    </tr>
    <?php while($row = $result->fetch_assoc()) { ?>
      <tr>
        <td><?= $row['id'] ?></td>
        <td><?= $row['name'] ?></td>
        <td><?= $row['roll'] ?></td>
        <td><?= $row['class'] ?></td>
        <td>
          <a href="view.php?id=<?= $row['id'] ?>" class="btn">👁 View</a>
          <a href="edit.php?id=<?= $row['id'] ?>" class="btn">✏ Edit</a>
          <a href="delete.php?id=<?= $row['id'] ?>" class="btn-red" onclick="return confirm('Are you sure?');">🗑 Delete</a>
        </td>
      </tr>
    <?php } ?>
  </table>
</body>
</html>