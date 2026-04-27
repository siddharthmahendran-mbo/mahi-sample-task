INSERT INTO birthdays (name, birthdate, address) VALUES 
('Ramya', '1982-03-26', '123 Maple St, New York'),
('Mahi', '1983-05-29', '456 Oak Ave, London'),
('Sid', '2009-07-30', '789 Pine Rd, Sydney'),
('Samar', '2015-08-10', '321 Elm Blvd, Tokyo');

<table border="1">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Birthdate</th>
            <th>Address</th> <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php while($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['birthdate']; ?></td>
                <td><?php echo $row['address']; ?></td> <td>
                    <a href="edit.php?id=<?php echo $row['id']; ?>">Edit</a>
                    <a href="delete.php?id=<?php echo $row['id']; ?>">Delete</a>
                </td>
            </tr>
        <?php endwhile; ?>
    </tbody>
</table>
