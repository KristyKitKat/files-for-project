<?php
include 'configs.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Movies</title>
    <link rel="stylesheet" href="includes/styles.css">
</head>

<body>
    <h2> List of actual movies</h2>
        <div>
            <table border="1" cellspacing="0" cellpadding="5">
                <tr>
                    <th>Name</th>
                    <th>Main Actor</th>
                    <th>Genre</th>
                </tr>
                <?php
                $sql = 'SELECT * FROM movies_trailer ORDER BY `name` ASC';
                $results = $conn->query($sql);

                if ($results->num_rows == 0)
                    echo '<tr><td colspan="7" align="center">No results</td></tr>';

                while ($row = $results->fetch_assoc()) {
                ?>
                    <tr>
                        <td><?php echo $row['name'] ?></td>
                        <td><?= $row['actor'] ?></td>
                        <td><?php echo $row['genre'] ?></td>
                    </tr>
                <?php
                }
                ?>
            </table>
        </div>
            <br><br>
            Go back <a href="not_admin.php">admin_page</a>

</body>

</html>