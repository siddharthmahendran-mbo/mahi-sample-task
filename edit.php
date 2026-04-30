<?php
// Database connection
$conn = new mysqli("localhost", "root", "", "mahi_family_db");

$id = $_GET['id'] ?? '';
$name = $birthdate = $adress = $phonenumber = $email = "";

if ($id) {
    $res = $conn->query("SELECT * FROM birthdays WHERE id=$id");
    $row = $res->fetch_assoc();
    extract($row); // Populates variables with database values
}
?>

<form action="process.php" method="POST">
    <input type="hidden" name="id" value="<?php echo $id; ?>">
    
    <label>Naam:</label>
    <input type="text" name="name" value="<?php echo $name; ?>" required>
    
    <label>Geboortedatum:</label>
    <input type="date" name="birthdate" value="<?php echo $birthdate; ?>" required>
    
    <label>Adres:</label>
    <input type="text" name="adress" value="<?php echo $adress; ?>" required>
    
    <label>Telefoon:</label>
    <input type="text" name="phonenumber" value="<?php echo $phonenumber; ?>" required>
    
    <label>Email Adress:</label>
    <input type="email" name="email" value="<?php echo $email; ?>" required>
    
    <button type="submit">Opslaan</button>
</form>