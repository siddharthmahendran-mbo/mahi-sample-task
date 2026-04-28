<?php
$host = "localhost"; $user = "root"; $pass = ""; $db = "mahi_family_db";
$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) { die("Connection failed: " . $conn->connect_error); }

// Step 1: Define the SQL string
$sql = "SELECT id, name, birthdate, adress FROM birthdays";

// Step 2: Execute the query
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
    <div class="container">
        <h1>Homepagina</h1>
        <p>Deze gegevens komen rechtstreeks uit de MySQL database.</p>
        <a href="edit.php" class="btn-add">+ Nieuw Toevoegen</a>

        <table border="1" style="width:100%; margin-top:20px; border-collapse: collapse;">
            <thead>
                <tr style="background-color: #f2f2f2; text-align: left;">
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
                        <a href="edit.php?id=<?php echo $row['id']; ?>" class="btn-edit">Edit</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
<?php $conn->close(); ?>