<?php


$servername = "localhost";
$username   = "root";
$password   = "";
$dbname     = "nagarani_nagarani_school_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Collect form data
$name  = $_POST['name'];
$roll  = $_POST['roll'];
$class = $_POST['class'];
$mssg  = $_POST['msg'];

// Step 1: Check if student already exists
$check_sql = "SELECT * FROM students WHERE name='$name' AND roll='$roll' AND class='$class'";
$result = $conn->query($check_sql);

if ($result->num_rows > 0) {
    // Duplicate found
    echo "<h3 style='color:red; text-align:center;'>⚠️ Student already exists with same Name, Roll, and Class!</h3>";
} else {
    // Step 2: Insert new student
    $sql = "INSERT INTO students (name, roll, class, message) VALUES ('$name', '$roll', '$class', '$mssg')";

    if ($conn->query($sql) === TRUE) {
        echo "<h3 style='color:green; text-align:center;'>New student record created successfully!</h3>";
    } else {
        echo "<h3 style='color:red; text-align:center;'>Error: " . $conn->error . "</h3>";
    }
}

$conn->close();
?>