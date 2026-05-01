<?php
$host = "localhost"; $user = "root"; $pass = ""; $db = "mahi_family_db";
$conn = new mysqli($host, $user, $pass, $db);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'] ?? "";
    $name = $conn->real_escape_string($_POST['name']);
    $birthdate = $conn->real_escape_string($_POST['birthdate']);
    $adress = $conn->real_escape_string($_POST['adress']);
    $phonenumber = $conn->real_escape_string($_POST['phonenumber']);
    $emailadress = $conn->real_escape_string($_POST['emailadress']);

    if (!empty($id)) {
        // ADDED: emailadress='$emailadress'
        $sql = "UPDATE birthdays SET name='$name', birthdate='$birthdate', adress='$adress', phonenumber='$phonenumber', emailadress='$emailadress' WHERE id='$id'";
    } else {
        // ADDED: emailadress in columns and '$emailadress' in values
        $sql = "INSERT INTO birthdays (name, birthdate, adress, phonenumber, emailadress) VALUES ('$name', '$birthdate', '$adress', '$phonenumber', '$emailadress')";
    }

    $conn->query($sql);
    header("Location: index.php");
    exit();
}
?>