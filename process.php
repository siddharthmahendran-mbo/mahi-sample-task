<?php
$host = "localhost"; $user = "root"; $pass = ""; $db = "mahi_family_db";
$conn = new mysqli($host, $user, $pass, $db);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'] ?? "";
    $name = $conn->real_escape_string($_POST['name']);
    $birthdate = $conn->real_escape_string($_POST['birthdate']);
    $adress = $conn->real_escape_string($_POST['adress']);

    if (!empty($id)) {
        // UPDATE existing
        $sql = "UPDATE birthdays SET name='$name', birthdate='$birthdate', adress='$adress' WHERE id='$id'";
    } else {
        // INSERT new
        $sql = "INSERT INTO birthdays (name, birthdate, adress) VALUES ('$name', '$birthdate', '$adress')";
    }

    if ($conn->query($sql)) {
        header("Location: index.php");
        exit();
    } else {
        die("Error: " . $conn->error);
    }
}
$conn->close();
?>