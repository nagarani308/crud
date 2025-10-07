<?php
$conn = new mysqli("localhost", "root", "", "nagarani_school_db");
$id = $_GET['id'];

$sql = "DELETE FROM students WHERE id=$id";
if ($conn->query($sql)) {
    header("Location: index.php");
} else {
    echo "Error: " . $conn->error;
}
?>