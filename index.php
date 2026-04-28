<?php
// 1. Connect to the database
$host = "localhost";
$user = "root"; 
$pass = ""; 
$db   = "mahi_family_db";

$conn = new mysqli($host, $user, $pass, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// 2. Get the id, names, dates, and address
// Added 'address' to the SELECT statement
$query = "SELECT id, name, birthdate, adress FROM birthdays";
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
                    <th>Adres</th> 
                    <th>Acties</th> 
                </tr>
            </thead>
            <tbody>
                <?php
                // 3. Loop through the data and create the rows
                if ($result && $result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($row["name"]) . "</td>";
                        echo "<td>" . htmlspecialchars($row["birthdate"]) . "</td>";
                        echo "<td>" . htmlspecialchars($row["address"] ?? '') . "</td>";
                        echo "<td>
                                <a href='edit.php?id=" . $row['id'] . "' class='btn-edit'>Edit</a> 
                                | 
                                <a href='delete.php?id=" . $row['id'] . "' class='btn-delete' onclick='return confirm(\"Are you sure you want to delete " . htmlspecialchars($row['name']) . "?\")'>Delete</a>
                              </td>";
                        echo "</tr>";
                    }
                } else {
                    // colspan is now 4 because we have 4 columns
                    echo "<tr><td colspan='4'>Geen gegevens gevonden</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

</body>
</html>
<?php $conn->close(); ?>