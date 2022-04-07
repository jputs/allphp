<?php
require('../db.php');
include("../auth.php");
include("../index.html");
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Users- View Users</title>
    <link rel="stylesheet" href="../css/style.css" />
</head>

<body>
    <div class="formhome">
        <p><a href="../registration.php">Add user</a>
        <div class="usermsge"> *BE CAREFULL: If you are going to add a new user you will be logged out first! </div>
        </p>
        <h2>View Users</h2>
        <table width="100%" border="1" style="border-collapse:collapse;">
            <thead>
                <tr>
                    <th><strong>S.No</strong></th>
                    <th><strong>Username</strong></th>
                    <th><strong>Email</strong></th>
                    <th><strong>Edit</strong></th>
                    <th><strong>Delete</strong></th>
                </tr>
            </thead>
            <tbody>
                <?php
                $count = 1;
                $sel_query = "Select * from users ORDER BY id asc;";
                $result = mysqli_query($con, $sel_query);
                while ($row = mysqli_fetch_assoc($result)) { ?>
                    <tr>
                        <td><?php echo $count; ?></td>
                        <td> <?php echo $row["username"]; ?></td>
                        <td> <?php echo $row["email"]; ?></td>
                        <td> <a href="edit.php?id=<?php echo $row["id"]; ?>">Edit</a>
                        </td>
                        <td> <a href="delete.php?id=<?php echo $row["id"]; ?>">Delete</a>
                        </td>
                    </tr>
                <?php $count++;
                } ?>
            </tbody>
        </table>
    </div>
</body>

</html>