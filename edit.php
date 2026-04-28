<?php
// 1. Database Connection
$host = "localhost";
$user = "root"; 
$pass = ""; 
$db   = "mahi_family_db";
$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// 2. Initialize variables (Prevents "Undefined variable" errors)
$id = "";
$name = "";
$birthdate = "";
$adress = ""; 
$pageTitle = "Nieuw Lid Toevoegen";

// 3. Logic for Editing
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];
    $pageTitle = "Lid Bewerken";

    // Escape the ID for safety
    $safe_id = $conn->real_escape_string($id);
    $sql = "SELECT name, birthdate, adress FROM birthdays WHERE id = '$safe_id'";
    $result = $conn->query($sql);

    if ($result && $result->num_rows == 1) {
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

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title><?php echo $pageTitle; ?></title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="nav-bar">
        <span class="logo"> < > MVC Basics </span>
    </div>

    <div class="container">
        <h1><?php echo $pageTitle; ?></h1>
        <p>Pas de gegevens aan en klik op opslaan.</p>

        <form action="process.php" method="POST">
            <input type="hidden" name="id" value="<?php echo htmlspecialchars((string)$id); ?>">

            <div class="form-group">
                <label for="name">Naam:</label>
                <input type="text" id="name" name="name" value="<?php echo htmlspecialchars((string)$name); ?>" required>
            </div>

            <div class="form-group">
                <label for="birthdate">Geboortedatum:</label>
                <input type="date" id="birthdate" name="birthdate" value="<?php echo htmlspecialchars((string)$birthdate); ?>" required>
            </div>

            <div class="form-group">
                <label for="Adress">Adres:</label>
                <input type="text" id="Adress" name="adress" value="<?php echo htmlspecialchars((string)$adress); ?>" required>
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