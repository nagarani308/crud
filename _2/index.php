
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

if(sizeof($_POST) > 0){
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
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Student Form</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: #f3f4f6;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
    }

    .form-container {
      background: #ffffff;
      padding: 25px 35px;
      border-radius: 12px;
      box-shadow: 0 6px 12px rgba(0,0,0,0.1);
      width: 350px;
    }

    h2 {
      text-align: center;
      margin-bottom: 20px;
      color: #333;
    }

    label {
      display: block;
      margin-bottom: 5px;
      font-weight: bold;
      color: #444;
    }
    input[type="text"],
    input[type="number"] {
      width: 100%;
      padding: 10px;
      margin-bottom: 15px;
      border: 1px solid #ccc;
      border-radius: 6px;
      box-sizing: border-box;
      transition: 0.3s;
    }

    input:focus {
      border-color: #4cafef;
      outline: none;
      box-shadow: 0 0 5px rgba(76, 175, 239, 0.5);
    }

    button {
      width: 100%;
      padding: 10px;
      background: #4cafef;
      color: white;
      border: none;
      border-radius: 6px;
      cursor: pointer;
      font-size: 16px;
      transition: background 0.3s;
    }

    button:hover {
      background: #3a8dd9;
    }
  </style>
</head>
<body>
  <div class="form-container">
    <h2>Student Registration</h2>
    <form action="#" method="POST">
      <label for="name">Name:</label>
      <input type="text" id="name" name="name" required>

      <label for="roll">Roll:</label>
      <input type="number" id="roll" name="roll" required>

      <label for="class">Class:</label>
      <input type="text" id="class" name="class" required>

      <label for="class">Message:</label>
      <textarea rows="4" cols="45" id="msg" name="msg"></textarea>

      <button type="submit">Submit</button>
    </form>
  </div>
</body>
</html>