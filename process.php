<?php
$host = "localhost"; $user = "root"; $pass = ""; $db = "mahi_family_db";
$conn = new mysqli($host, $user, $pass, $db);

$id = $_POST['id'] ?? "";
$name = $conn->real_escape_string($_POST['name']);
$birthdate = $conn->real_escape_string($_POST['birthdate']);
$adress = $conn->real_escape_string($_POST['adress']);

if (!empty($id)) {
    $sql = "UPDATE birthdays SET name='$name', birthdate='$birthdate', adress='$adress' WHERE id='$id'";
} else {
    $sql = "INSERT INTO birthdays (name, birthdate, adress) VALUES ('$name', '$birthdate', '$adress')";
}

if ($conn->query($sql) === TRUE) {
    header("Location: index.php");
} else {
    echo "Error: " . $conn->error;
}
$conn->close();
?>