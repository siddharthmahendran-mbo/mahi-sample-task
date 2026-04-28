<?php
$host = "localhost"; $user = "root"; $pass = ""; $db = "mahi_family_db";
$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) { die("Connection failed: " . $conn->connect_error); }

$id = ""; $name = ""; $birthdate = ""; $adress = ""; 
$pageTitle = "Lid Toevoegen";

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];
    $pageTitle = "Lid Bewerken";
    $safe_id = $conn->real_escape_string($id);
    $sql = "SELECT name, birthdate, adress FROM birthdays WHERE id = '$safe_id'";
    $result = $conn->query($sql);
    if ($result && $result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $name = $row['name'];
        $birthdate = $row['birthdate'];
        $adress = $row['adress'] ?? ""; 
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style.css">
    <title><?php echo $pageTitle; ?></title>
</head>
<body>
    <div class="container">
        <h1><?php echo $pageTitle; ?></h1>
        <form action="process.php" method="POST">
            <input type="hidden" name="id" value="<?php echo htmlspecialchars((string)$id); ?>">
            <label>Naam:</label>
            <input type="text" name="name" value="<?php echo htmlspecialchars((string)$name); ?>" required><br>
            <label>Geboortedatum:</label>
            <input type="date" name="birthdate" value="<?php echo htmlspecialchars((string)$birthdate); ?>" required><br>
            <label>Adres:</label>
            <input type="text" name="adress" value="<?php echo htmlspecialchars((string)$adress); ?>" required><br>
            <button type="submit">Opslaan</button>
            <a href="index.php">Terug</a>
        </form>
    </div>
</body>
</html>
<?php $conn->close(); ?>