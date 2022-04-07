<?php
//include auth.php file on all secure pages
$_SERVER['SERVER_NAME'] . "/allphp/sites";

include("auth.php");
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Welcome Home</title>
    <link rel="stylesheet" href="./css/style.css" />
</head>

<body>
    <div class="form">
        <p>Welcome <?php echo $_SESSION['username']; ?>!</p>
        <p>This is secure area.</p>
        <p><a href="dashboard.php">Dashboard</a></p>
        <a href="logout.php">Logout</a>
    </div>
</body>

</html>

<!-- https://www.allphptricks.com/insert-view-edit-and-delete-record-from-database-using-php-and-mysqli/ -->