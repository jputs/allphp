<?php
require('../db.php');
include("../auth.php");
include("../index.html");
$id = $_REQUEST['id'];
$query = "SELECT * from users where id='" . $id . "'";
$result = mysqli_query($con, $query) or die(mysql_error());
$row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Update Record</title>
    <link rel="stylesheet" href="../css/style.css" />
</head>

<body>
    <div class="formedit">

        <h1>Update Record</h1>
        <?php
        $status = "";
        if (isset($_POST['new']) && $_POST['new'] == 1) {
            $id = $_POST['id'];
            $trn_date = date("Y-m-d H:i:s");
            $username = $_POST['username'];
            $email = $_POST['email'];
            $submittedby = $_SESSION["username"];
            $update = "update users set username='$username', email='$email'
                       where id=$id ";
            mysqli_query($con, $update) or die(mysql_error());
            $status = "Record Updated Successfully. </br></br>
                <a href='view.php'>View Updated Record</a>";
            echo '<p style="color:#FF0000;">' . $status . '</p>';
        } else {
        ?>
            <div>
                <form name="form" method="post" action="">
                    <input type="hidden" name="new" value="1" />
                    <input name="id" type="hidden" value="<?php echo $row['id']; ?>" />
                    <p><label for="username">Username: </label><br><input type="text" name="username" placeholder="Enter Username" required value="<?php echo $row['username']; ?>" /></p>
                    <p><label for="email">Email: </label><br><input type="text" name="email" placeholder="Enter Email" required value="<?php echo $row['email']; ?>" /></p>
                    <p><input name="submit" type="submit" value="Update" /></p>
                </form>
            <?php } ?>
            </div>
    </div>
</body>

</html>