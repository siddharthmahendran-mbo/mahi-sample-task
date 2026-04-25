<?php
// Connect to the database
$host = "localhost";
$user = "root"; 
$pass = ""; 
$db   = "mahi_family_db";
$conn = new mysqli($host, $user, $pass, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Initializing variables for the form
$id = "";
$name = "";
$birthdate = "";
$pageTitle = "Nieuw Lid Toevoegen";

// Check if we are editing an existing record or creating a new one
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];
    $pageTitle = "Lid Bewerken";

    // Fetch existing data for the selected ID
    $sql = "SELECT name, birthdate FROM birthdays WHERE id = " . $conn->real_escape_string($id);
    $result = $conn->query($sql);

    // Populate variables if record found
    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $name = $row['name'];
        $birthdate = $row['birthdate'];
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
        <span class="logo"> < > MVC Basics (Database Version)</span>
    </div>

    <div class="container">
        <h1><?php echo $pageTitle; ?></h1>
        <p>Pas de gegevens aan en klik op opslaan.</p>

        <form action="process.php" method="POST">
            <input type="text" name="id" value="<?php echo htmlspecialchars($id); ?>">

            <div class="form-group">
                <label for="name">Naam:</label>
                <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($name); ?>" required>
            </div>

            <div class="form-group">
                <label for="birthdate">Geboortedatum:</label>
                <input type="date" id="birthdate" name="birthdate" value="<?php echo htmlspecialchars($birthdate); ?>" required>
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