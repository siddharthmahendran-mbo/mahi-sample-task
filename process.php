<?php
// Connect to the database
$host = "localhost";
$user = "root"; 
$pass = ""; 
$db   = "mahi_family_db";
$conn = new mysqli($host, $user, $pass, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get data from the form via POST method
$id = $_POST['id'];
// Use mysqli_real_escape_string to sanitize input and prevent SQL injection
$name = $conn->real_escape_string($_POST['name']);
$birthdate = $conn->real_escape_string($_POST['birthdate']);

if (empty($id)) {
    // No ID present? Perform a NEW record INSERT query
    $sql = "INSERT INTO birthdays (name, birthdate) VALUES ('$name', '$birthdate')";
    $message = "Lid succesvol toegevoegd.";
} else {
    // ID present? Perform an EXISTING record UPDATE query
    $id = $conn->real_escape_string($id);
    $sql = "UPDATE birthdays SET name = '$name', birthdate = '$birthdate' WHERE id = '$id'";
    $message = "Lid succesvol bijgewerkt.";
}

// Execute the query
if ($conn->query($sql) === TRUE) {
    // Redirect back to main page on success, with a message query parameter
    header("Location: index.php?msg=" . urlencode($message));
    exit();
} else {
    // Display error message on failure
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>