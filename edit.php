<?php
$host = "localhost"; $user = "root"; $pass = ""; $db = "mahi_family_db";
$conn = new mysqli($host, $user, $pass, $db);

$id = ""; $name = ""; $birthdate = ""; $adress = ""; $phonenumber = "";

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $conn->real_escape_string($_GET['id']);
    $res = $conn->query("SELECT * FROM birthdays WHERE id = '$id'");
    if ($row = $res->fetch_assoc()) {
        $name = $row['name'];
        $birthdate = $row['birthdate'];
        $adress = $row['adress'];
        $phonenumber = $row['phonenumber'];
    }
}
?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <link rel="stylesheet" href="style.css">
    <title>Lid Bewerken</title>
</head>
<body>
    <div class="nav-bar"><span class="logo"> < > MVC Basics </span></div>
    <div class="container">
        <h1>Lid Bewerken</h1>
        <form action="process.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <div class="form-group">
                <label>Naam:</label><br>
                <input type="text" name="name" value="<?php echo htmlspecialchars($name); ?>" required>
            </div>
            <div class="form-group">
                <label>Geboortedatum:</label><br>
                <input type="date" name="birthdate" value="<?php echo htmlspecialchars($birthdate); ?>" required>
            </div>
            <div class="form-group">
                <label>Adres:</label><br>
                <input type="text" name="adress" value="<?php echo htmlspecialchars($adress); ?>" required>
            </div>
            <div class="form-group">
                <label>Telefoonnummer:</label><br>
                <input type="text" name="phonenumber" value="<?php echo htmlspecialchars($phonenumber); ?>" required>
            </div>
            <button type="submit" class="btn-edit">Opslaan</button>
            <a href="index.php">Annuleren</a>
        </form>
    </div>
</body>
</html>