<?php
include 'process.php'; // Ensure connection is available
$result = $conn->query("SELECT * FROM birthdays");
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <link rel="stylesheet" href="style.css">
    <title>MVC Basics</title>
</head>
<body>
    <h2>Homepagina</h2>
    <p>Deze gegevens komen rechtstreeks uit de MySQL database.</p>
    <a href="edit.php">+ Nieuw Toevoegen</a>

    <table>
        <thead>
            <tr>
                <th>NAAM</th>
                <th>GEBOORTEDATUM</th>
                <th>ADRES</th>
                <th>TELEFOON</th>
                <th>EMAIL</th> <!-- New Header -->
                <th>ACTIES</th>
            </tr>
        </thead>
        <tbody>
            <?php while($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['birthdate']; ?></td>
                <td><?php echo $row['adress']; ?></td>
                <td><?php echo $row['phonenumber']; ?></td>
                <td><?php echo $row['email']; ?></td> <!-- New Data -->
                <td>
                    <a href="edit.php?id=<?php echo $row['id']; ?>" class="btn-edit">Edit</a>
                    <a href="delete.php?id=<?php echo $row['id']; ?>" class="btn-delete">Delete</a>
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</body>
</html>