<?php
// 1. Connect to the database
$host = "localhost";
$user = "root"; 
$pass = ""; 
$db   = "mahi_family_db";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// CHANGE 1: Add 'address' to your SQL query string
$sql = "SELECT id, name, birthdate, address FROM birthdays"; 
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
        
        <a href="edit.php" class="btn btn-primary" style="margin-bottom: 15px; display: inline-block;">+ Nieuw Toevoegen</a>

        <table class="birthday-table">
            <thead>
                <tr>
                    <th>Naam</th>
                    <th>Geboortedatum</th>
                    <th>Adres</th> <th>Acties</th> 
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>" . htmlspecialchars($row["name"]) . "</td>
                                <td>" . htmlspecialchars($row["birthdate"]) . "</td>
                                <td>" . htmlspecialchars($row["address"]) . "</td> <td>
                                    <a href='edit.php?id=" . $row['id'] . "' class='btn-edit'>Edit</a> 
                                    | 
                                    <a href='delete.php?id=" . $row['id'] . "' class='btn-delete' onclick='return confirm(\"Are you sure that you " . htmlspecialchars($row['name']) . " will you like to delete?\")'>Delete</a>
                                </td>
                              </tr>";
                    }
                } else {
                    // Update colspan to 4 because we added a column
                    echo "<tr><td colspan='4'>Geen gegevens gevonden</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

</body>
</html>
<?php $conn->close(); ?>