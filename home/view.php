<?php
require('../db.php');
include("../auth.php");
include("../index.html");
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Home - Registered Websites</title>
    <link rel="stylesheet" href="../css/style.css" />
</head>

<body>
    <div class="formhome">
        <h2>Last 10 checked website entry's</h2>
        <table width="100%" border="1" style="border-collapse:collapse;">
            <thead>
                <tr>
                    <th><strong>No.</strong></th>
                    <th><strong>Status</strong></th>
                    <th><strong>Name</strong></th>
                    <th><strong>URL</strong></th>
                    <th><strong>Logdate</strong></th>
                </tr>
            </thead>
            <tbody>
                <?php
                $count = 1;
                $sel_query = "SELECT log.statusid, website.name, website.url, log.logdate FROM website INNER JOIN log WHERE log.websiteid = website.id  \n" .  "ORDER BY log.logdate, log.statusid LIMIT 10;";
                $result = mysqli_query($con, $sel_query);
                while ($row = mysqli_fetch_assoc($result)) { ?>
                    <tr>
                        <td>
                            <?php echo $count; ?>
                        </td>
                        <td>
                            <?php if ($row["statusid"]) : ?>
                                <img src="../images/ok.jpg" />
                            <?php else : ?>
                                <img src="../images/alert.jpg" />
                            <?php endif; ?>
                        </td>
                        <td><?php echo $row["name"]; ?></td>
                        <td><?php echo $row["url"]; ?></td>
                        <td><?php echo $row["logdate"]; ?></td>


                    </tr>
                <?php $count++;
                } ?>
            </tbody>
        </table>
    </div>

    </main>
</body>

</html>