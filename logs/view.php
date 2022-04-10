<?php
require('../db.php');
include("../auth.php");
include("../index.html");
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Log - View Log</title>
    <link rel="stylesheet" href="../css/style.css" />
</head>

<body>
    <div class="formhome">
        <h2>View Log</h2>
        <table width="100%" border="1" style="border-collapse:collapse;">
            <thead>
                <tr>
                    <th><strong>Id</strong></th>
                    <th><strong>Status</strong></th>
                    <th><strong>Name</strong></th>
                    <th><strong>Website ID</strong></th>
                    <th><strong>Logdate</strong></th>
                    <th><strong>Delete</strong></th>
                </tr>
            </thead>
            <tbody>
                <?php
                $count = 1;
                //$sel_query = "Select * from log ORDER BY id desc;";
                $sel_query = "SELECT log.logid, log.websiteid, website.name, log.statusid, log.logdate FROM log INNER JOIN  website ON log.websiteid=website.id ORDER BY log.logdate DESC";
                $result = mysqli_query($con, $sel_query);
                while ($row = mysqli_fetch_assoc($result)) { ?>
                    <tr>
                        <td><?php echo $row["logid"]; ?></td>
                        <td>
                            <?php if ($row["statusid"]) : ?>
                                <img src="../images/ok.jpg" />
                            <?php else : ?>
                                <img src="../images/Alert.png" />
                            <?php endif; ?>
                        </td>
                        <td><?php echo $row["name"]; ?></td>
                        <td><?php echo $row["websiteid"]; ?></td>


                        <td><?php echo $row["logdate"]; ?></td>
                        <!--<td align="center">
                            <a href="edit.php?id=<?php echo $row["logid"]; ?>">Edit</a>
                        </td> -->
                        <td>
                            <a href="delete.php?id=<?php echo $row["logid"]; ?>">Delete</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

    </div>
</body>

</html>