<?php
$host = "localhost"; $user = "root"; $pass = ""; $db = "mahi_family_db";
$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) { die("Connection failed: " . $conn->connect_error); }

$sql = "SELECT id, name, birthdate, adress FROM birthdays";
$result = $conn->query($sql); 
?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>Homepagina</title>
</head>
<body>
    <div class="nav-bar">
        <span class="logo"> < > MVC Basics (Database Version) </span>
    </div>

    <div class="container">
        <h1>Homepagina</h1>
        <p>Deze gegevens komen rechtstreeks uit de MySQL database.</p>
        
        <a href="edit.php" class="btn-add">+ Nieuw Toevoegen</a>

        <table class="data-table">
            <thead>
                <tr>
                    <th>NAAM</th>
                    <th>GEBOORTEDATUM</th>
                    <th>ADRES</th>
                    <th>ACTIES</th>
                </tr>
            </thead>
            <tbody>
                <?php while($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['name']); ?></td>
                    <td><?php echo htmlspecialchars($row['birthdate']); ?></td>
                    <td><?php echo htmlspecialchars($row['adress'] ?? ''); ?></td>
                    <td>
                        <div class="action-buttons">
                            <a href="edit.php?id=<?php echo $row['id']; ?>" class="btn-edit">Edit</a>
                            <span class="divider">|</span>
                            <a href="delete.php?id=<?php echo $row['id']; ?>" class="btn-delete">Delete</a>
                        </div>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</body>
</html>