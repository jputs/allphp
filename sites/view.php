<?php
require('../db.php');
include("../auth.php");
include("../index.html");
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>View Records</title>
    <link rel="stylesheet" href="../css/style.css" />
</head>

<body>
    <div class="formhome">
        <p><a href="insert.php">Add Website</a></p>
        <h2>Registered Websites</h2>
        <table width="100%" border="1" style="border-collapse:collapse;">
            <thead>
                <tr>
                    <th><strong>S.No</strong></th>
                    <th><strong>Name</strong></th>
                    <th><strong>URL</strong></th>
                    <th><strong>Interval</strong></th>
                    <th><strong>Timeout</strong></th>
                    <th><strong>Email</strong></th>
                    <th><strong>Edit</strong></th>
                    <th><strong>Delete</strong></th>
                </tr>
            </thead>
            <tbody>
                <?php
                $count = 1;
                $sel_query = "Select * from website ORDER BY id desc;";
                $result = mysqli_query($con, $sel_query);
                while ($row = mysqli_fetch_assoc($result)) { ?>
                    <tr>
                        <td align="center"><?php echo $count; ?></td>
                        <td align="center"><?php echo $row["name"]; ?></td>
                        <td><?php echo $row["url"]; ?></td>
                        <td><?php echo $row["interval"]; ?></td>
                        <td><?php echo $row["timeout"]; ?></td>
                        <td><?php echo $row["email"]; ?></td>
                        <td>
                            <a href="edit.php?id=<?php echo $row["id"]; ?>">Edit</a>
                        </td>
                        <td>
                            <a href="delete.php?id=<?php echo $row["id"]; ?>">Delete</a>
                        </td>
                    </tr>
                <?php $count++;
                } ?>
            </tbody>
        </table>
    </div>

    </main>
</body>

</html>