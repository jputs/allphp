<?php
require('../db.php');
$id=$_REQUEST['id'];
$query = "DELETE FROM website WHERE id=$id";
$result = mysqli_query($con, $query) or die(mysql_error());
header("Location: view.php");
