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
// We use the ?? "" (null coalescing operator) to prevent "Undefined index" errors
$id = $_POST['id'] ?? "";
$name = $conn->real_escape_string($_POST['name'] ?? "");
$birthdate = $conn->real_escape_string($_POST['birthdate'] ?? "");
$adress = $conn->real_escape_string($_POST['adress'] ?? ""); // ADDED THIS

if (empty($id)) {
    // 1. Updated INSERT query to include 'adress'
    $sql = "INSERT INTO birthdays (name, birthdate, adress) VALUES ('$name', '$birthdate', '$adress')";
    $message = "Lid succesvol toegevoegd.";
} else {
    // 2. Updated UPDATE query to include 'adress'
    $id = $conn->real_escape_string($id);
    $sql = "UPDATE birthdays SET name = '$name', birthdate = '$birthdate', adress = '$adress' WHERE id = '$id'";
    $message = "Lid succesvol bijgewerkt.";
}

// Execute the query
if ($conn->query($sql) === TRUE) {
    // Redirect back to main page on success
    header("Location: index.php?msg=" . urlencode($message));
    exit();
} else {
    // Display error message on failure
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>