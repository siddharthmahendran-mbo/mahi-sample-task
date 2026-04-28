<?php
// Database Connection
$host = "localhost";
$user = "root"; 
$pass = ""; 
$db   = "mahi_family_db";
$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Initializing variables so they exist for the HTML below
$id = "";
$name = "";
$birthdate = "";
$adress = ""; 
$pageTitle = "Nieuw Lid Toevoegen";

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];
    $pageTitle = "Lid Bewerken";

    $safe_id = $conn->real_escape_string($id);
    $sql = "SELECT name, birthdate, adress FROM birthdays WHERE id = '$safe_id'";
    $result = $conn->query($sql);

    if ($result && $result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $name = $row['name'] ?? "";
        $birthdate = $row['birthdate'] ?? "";
        $adress = $row['adress'] ?? ""; 
    } else {
        echo "Lid niet gevonden.";
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title><?php echo $pageTitle; ?></title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="nav-bar">
        <span class="logo">MVC Basics</span>
    </div>

    <div class="container">
        <h1><?php echo $pageTitle; ?></h1>
        <form action="process.php" method="POST">
            <input type="hidden" name="id" value="<?php echo htmlspecialchars((string)$id); ?>">

            <div class="form-group">
                <label>Naam:</label>
                <input type="text" name="name" value="<?php echo htmlspecialchars((string)$name); ?>" required>
            </div>

            <div class="form-group">
                <label>Geboortedatum:</label>
                <input type="date" name="birthdate" value="<?php echo htmlspecialchars((string)$birthdate); ?>" required>
            </div>

            <div class="form-group">
                <label>Adres:</label>
                <input type="text" name="adress" value="<?php echo htmlspecialchars((string)$adress); ?>" required>
            </div>

            <div class="form-group">
                <button type="submit" class="btn-submit">Opslaan</button>
                <a href="index.php" class="btn-cancel">Annuleren</a>
            </div>
        </form>
    </div>
</body>
</html>
<?php $conn->close(); ?>