<?php
$host = "localhost"; $user = "root"; $pass = ""; $db = "mahi_family_db";
$conn = new mysqli($host, $user, $pass, $db);
$sql = "SELECT id, name, birthdate, adress, phonenumber, emailadress FROM birthdays";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
    <title>Homepagina</title>
</head>
<body>
    <div class="container">
        <h1>Homepagina</h1>
        <a href="edit.php">+ Nieuw Toevoegen</a>
        <table class="birthday-table">
            <thead>
                <tr>
                    <th>NAAM</th><th>GEBOORTEDATUM</th><th>ADRES</th><th>TELEFOON</th><th>EMAIL ADRES</th><th>ACTIES</th>
                </tr>
            </thead>
            <tbody>
                <?php while($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['birthdate']; ?></td>
                    <td><?php echo $row['adress']; ?></td>
                    <td><?php echo $row['phonenumber']; ?></td>
                    <td><?php echo $row['emailadress']; ?></td>
                    <td>
                        <a href="edit.php?id=<?php echo $row['id']; ?>" class="btn-edit">Edit</a>
                        <a href="delete.php?id=<?php echo $row['id']; ?>" class="btn-delete">Delete</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</body>
</html>