<?php
$host = "localhost"; $user = "root"; $pass = ""; $db = "mahi_family_db";
$conn = new mysqli($host, $user, $pass, $db);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'] ?? "";
    $name = $conn->real_escape_string($_POST['name']);
    $birthdate = $conn->real_escape_string($_POST['birthdate']);
    $adress = $conn->real_escape_string($_POST['adress']);
    $phonenumber = $conn->real_escape_string($_POST['phonenumber']);
    $email = $conn->real_escape_string($_POST['email']); // New column

    if (!empty($id)) {
        // Update existing record
        $sql = "UPDATE birthdays SET 
                name='$name', 
                birthdate='$birthdate', 
                adress='$adress', 
                phonenumber='$phonenumber', 
                email='$email' 
                WHERE id='$id'";
    } else {
        // Insert new record
        $sql = "INSERT INTO birthdays (name, birthdate, adress, phonenumber, email) 
                VALUES ('$name', '$birthdate', '$adress', '$phonenumber', '$email')";
    }

    $conn->query($sql);
    header("Location: index.php");
    exit();
}
?>