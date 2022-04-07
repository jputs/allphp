<?php
require('../db.php');
include("../auth.php");
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>View Records</title>
    <link rel="stylesheet" href="../css/style.css" />
</head>

<body>
    <div class="form">
        <p><a href="index.php">Home</a>
            | <a href="insert.php">Insert New Record</a>
            | <a href="../logout.php">Logout</a></p>
        <h2>View Records</h2>
        <table width="100%" border="1" style="border-collapse:collapse;">
            <thead>
                <tr>
                    <th><strong>Id</strong></th>
                    <th><strong>Website ID</strong></th>
                    <th><strong>Name</strong></th>
                    <th><strong>Status</strong></th>
                    <th><strong>Logdate</strong></th>
                    <!--<th><strong>Edit</strong></th> -->
                    <th><strong>Delete</strong></th>
                </tr>
            </thead>
            <tbody>
                <?php
                $count = 1;
                //$sel_query = "Select * from log ORDER BY id desc;";
                $sel_query = "SELECT log.logid, log.websiteid, website.name, log.statusid, log.logdate FROM log INNER JOIN  website ON log.websiteid=website.id";
                $result = mysqli_query($con, $sel_query);
                while ($row = mysqli_fetch_assoc($result)) { ?>
                    <tr>
                        <td align="center"><?php echo $count; ?></td>
                        <td align="center"><?php echo $row["logid"]; ?></td>
                        <td align="center"><?php echo $row["name"]; ?></td>
                        <td align="center"><?php echo $row["statusid"]; ?></td>
                        <td align="center"><?php echo $row["logdate"]; ?></td>
                        <!--<td align="center">
                            <a href="edit.php?id=<?php echo $row["logid"]; ?>">Edit</a>
                        </td> -->
                        <td align="center">
                            <a href="delete.php?id=<?php echo $row["logid"]; ?>">Delete</a>
                        </td>
                    </tr>
                <?php $count++;
                } ?>
            </tbody>
        </table>
    </div>
</body>

</html>