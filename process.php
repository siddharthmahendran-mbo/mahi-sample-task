<?php
$host = "localhost"; $user = "root"; $pass = ""; $db = "mahi_family_db";
$conn = new mysqli($host, $user, $pass, $db);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'] ?? "";
    $name = $conn->real_escape_string($_POST['name']);
    $birthdate = $conn->real_escape_string($_POST['birthdate']);
    $adress = $conn->real_escape_string($_POST['adress']);
    $phonenumber = $conn->real_escape_string($_POST['phonenumber']);

    if (!empty($id)) {
        $sql = "UPDATE birthdays SET name='$name', birthdate='$birthdate', adress='$adress', phonenumber='$phonenumber' WHERE id='$id'";
    } else {
        $sql = "INSERT INTO birthdays (name, birthdate, adress, phonenumber) VALUES ('$name', '$birthdate', '$adress', '$phonenumber')";
    }

    $conn->query($sql);
    header("Location: index.php");
    exit();
}
?>