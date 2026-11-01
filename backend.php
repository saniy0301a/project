<?php
// Database connection details
$host = "localhost";
$username = "root";
$password = "";
$dbname = "student_registration";

// Establish connection to the database
$conn = new mysqli($host, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process form data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $studentName = $conn->real_escape_string($_POST["studentName"]);
    $age = (int)$_POST["age"];
    $gender = $conn->real_escape_string($_POST["gender"]);
    $parentEmail = $conn->real_escape_string($_POST["parentEmail"]);
    $classLevel = $conn->real_escape_string($_POST["classLevel"]);

    // Insert data into database
    $sql = "INSERT INTO students (studentName, age, gender, parentEmail, classLevel) 
            VALUES ('$studentName', $age, '$gender', '$parentEmail', '$classLevel')";

    if ($conn->query($sql) === TRUE) {
        echo "Registration successful!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the connection
$conn->close();
?>
