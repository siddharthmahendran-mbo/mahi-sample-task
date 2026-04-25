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

// Check if an ID is provided in the URL query parameters
if (isset($_GET['id']) && !empty($_GET['id'])) {
    // Sanitize the ID to prevent injection
    $id = $conn->real_escape_string($_GET['id']);

    // SQL query to delete the selected record
    $sql = "DELETE FROM birthdays WHERE id = '$id'";

    if ($conn->query($sql) === TRUE) {
        $message = "Lid succesvol verwijderd.";
    } else {
        $message = "Error bij verwijderen: " . $conn->error;
    }
} else {
    $message = "Geen geldig ID gevonden.";
}

$conn->close();

// Redirect back to main page with a status message
header("Location: index.php?msg=" . urlencode($message));
exit();
?>