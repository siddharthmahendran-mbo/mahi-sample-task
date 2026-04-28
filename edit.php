<?php
$host = "localhost"; $user = "root"; $pass = ""; $db = "mahi_family_db";
$conn = new mysqli($host, $user, $pass, $db);

$id = ""; $name = ""; $birthdate = ""; $adress = "";

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $conn->real_escape_string($_GET['id']);
    $res = $conn->query("SELECT name, birthdate, adress FROM birthdays WHERE id = '$id'");
    
    if ($row = $res->fetch_assoc()) {
        $name = $row['name'];
        $birthdate = $row['birthdate'];
        $adress = $row['adress']; 
    }
}
?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>Lid Bewerken</title>
</head>
<body>
    <div class="nav-bar">
        <span class="logo"> < > MVC Basics </span>
    </div>

    <div class="container">
        <h1>Lid Bewerken</h1>
        <form action="process.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $id; ?>">

            <div class="form-group">
                <label>Naam:</label>
                <input type="text" name="name" value="<?php echo htmlspecialchars($name); ?>" required>
            </div>

            <div class="form-group">
                <label>Geboortedatum:</label>
                <input type="date" name="birthdate" value="<?php echo htmlspecialchars($birthdate); ?>" required>
            </div>

            <div class="form-group">
                <label>Adres:</label>
                <input type="text" name="adress" value="<?php echo htmlspecialchars($adress); ?>" required>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn-submit">Opslaan</button>
                <a href="index.php" class="btn-cancel">Annuleren</a>
            </div>
        </form>
    </div>
</body>
</html>