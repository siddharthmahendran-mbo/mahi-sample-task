<?php

$host = "localhost";
$user = "root"; 
$pass = ""; 
$db   = "mahi_family_db";
$conn = new mysqli($host, $user, $pass, $db);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$id = "";
$name = "";
$birthdate = "";
$adress = ""; 
$pageTitle = "Nieuw Lid Toevoegen";

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];
    $pageTitle = "Lid Bewerken";

    
    $sql = "SELECT name, birthdate, adress FROM birthdays WHERE id = " . $conn->real_escape_string($id);
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $name = $row['name'];
        $birthdate = $row['birthdate'];
        $adress = $row['adress'] ?? ""; 
    } else {
        echo "Lid niet gevonden.";
        exit;
    }
}
?>

<div class="form-group">
    <label for="Adress">Adres:</label>
    <input type="text" id="Adress" name="adress" value="<?php echo htmlspecialchars((string)$adress); ?>" required>
</div>