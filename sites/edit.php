<?php
require('../db.php');
include("../auth.php");
include("../index.html");
$id = $_REQUEST['id'];
$query = "SELECT * from website where id='" . $id . "'";
$result = mysqli_query($con, $query) or die(mysqli_error());
$row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Update Record</title>
    <link rel="stylesheet" href="css/style.css" />
</head>

<body>
    <div class="form">
        <p><a href="dashboard.php">Dashboard</a>
            | <a href="insert.php">Insert New Record</a>
            | <a href="logout.php">Logout</a></p>
        <h1>Update Record</h1>
        <?php
        $status = "";
        if (isset($_POST['new']) && $_POST['new'] == 1) {
            $id = $_POST['id'];
            $trn_date = date("Y-m-d H:i:s");
            $name = $_POST['name'];
            $url = $_POST['url'];
            $interval = $_POST['interval'];
            $timeout = $_POST['timeout'];
            $email = $_POST['email'];
            $submittedby = $_SESSION["username"];
            $update = "update website set name='$name', url='$url', `interval`='$interval', timeout='$timeout', email='$email'
                       where id=$id ";
            mysqli_query($con, $update) or die(mysqli_error());
            $status = "Record Updated Successfully. </br></br>
                <a href='view.php'>View Updated Record</a>";
            echo '<p style="color:#FF0000;">' . $status . '</p>';
        } else {
        ?>
            <div>
                <form name="form" method="post" action="">
                    <input type="hidden" name="new" value="1" />
                    <input name="id" type="hidden" value="<?php echo $row['id']; ?>" />
                    <p><input type="text" name="name" placeholder="Enter Name" required value="<?php echo $row['name']; ?>" /></p>
                    <p><input type="text" name="url" placeholder="Enter URL" required value="<?php echo $row['url']; ?>" /></p>
                    <p><input type="text" name="interval" placeholder="Enter Interval" required value="<?php echo $row['interval']; ?>" /></p>
                    <p><input type="text" name="timeout" placeholder="Enter Timeout" required value="<?php echo $row['timeout']; ?>" /></p>
                    <p><input type="text" name="email" placeholder="Enter Email" required value="<?php echo $row['email']; ?>" /></p>
                    <p><input name="submit" type="submit" value="Update" /></p>
                </form>
            <?php } ?>
            </div>
    </div>
</body>

</html>