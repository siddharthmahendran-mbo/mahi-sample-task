<?php
$host = "localhost"; $user = "root"; $pass = ""; $db = "mahi_family_db";
$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) { die("Connection failed: " . $conn->connect_error); }

// Define query with both adress and phonenumber
$sql = "SELECT id, name, birthdate, adress, phonenumber FROM birthdays";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Family Overzicht</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="nav-bar">
        <span class="logo"> < > MVC Basics (Database Version)</span>
    </div>

    <div class="container">
        <h1>Homepagina</h1>
        <p>Deze gegevens komen rechtstreeks uit de MySQL database.</p>
        <a href="edit.php" class="btn-add" style="margin-bottom: 15px; display: inline-block;">+ Nieuw Toevoegen</a>

        <table class="birthday-table">
            <thead>
                <tr>
                    <th>Naam</th>
                    <th>Geboortedatum</th>
                    <th>Adres</th>
                    <th>Telefoon</th>
                    <th>Acties</th>
                </tr>
            </thead>
            <tbody>
                <?php while($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo htmlspecialchars($row["name"]); ?></td>
                    <td><?php echo htmlspecialchars($row["birthdate"]); ?></td>
                    <td><?php echo htmlspecialchars($row["adress"] ?? ''); ?></td>
                    <td><?php echo htmlspecialchars($row["phonenumber"] ?? ''); ?></td>
                    <td>
                        <a href="edit.php?id=<?php echo $row['id']; ?>" class="btn-edit">Edit</a> | 
                        <a href="delete.php?id=<?php echo $row['id']; ?>" class="btn-delete" onclick="return confirm('Zeker weten?')">Delete</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</body>
</html>