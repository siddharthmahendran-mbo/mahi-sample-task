<?php
$host = "localhost";
$user = "root"; 
$pass = ""; 
$db   = "mahi_family_db";
$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Capture and sanitize POST data
$id = $_POST['id'] ?? "";
$name = $conn->real_escape_string($_POST['name'] ?? "");
$birthdate = $conn->real_escape_string($_POST['birthdate'] ?? "");
$adress = $conn->real_escape_string($_POST['adress'] ?? ""); 

if (!empty($id)) {
    // UPDATE existing record
    $sql = "UPDATE birthdays SET name = '$name', birthdate = '$birthdate', adress = '$adress' WHERE id = '$id'";
    $message = "Lid succesvol bijgewerkt.";
} else {
    // INSERT new record
    $sql = "INSERT INTO birthdays (name, birthdate, adress) VALUES ('$name', '$birthdate', '$adress')";
    $message = "Lid succesvol toegevoegd.";
}

if ($conn->query($sql) === TRUE) {
    header("Location: index.php?msg=" . urlencode($message));
    exit();
} else {
    die("Error: " . $conn->error);
}

$conn->close();
?>