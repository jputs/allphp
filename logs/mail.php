<?php
require('../db.php');
include("../auth.php");
include("../index.html");

$count = 1;
//$sel_query = "Select * from log ORDER BY id desc;";
$sel_query = "SELECT log.logid, log.websiteid, website.name, log.statusid, log.logdate, website.email FROM log INNER JOIN  website ON log.websiteid=website.id where log.statusid=0;";
$result = mysqli_query($con, $sel_query);
while ($row = mysqli_fetch_assoc($result)) {

    $to = ($row = mysqli_fetch_assoc($result)[5]);
    $subject = 'website.name' . "WEBSITE DOWN";

    $message = "
    <html>
    <head>
    <title>HTML email</title>
    </head>
    <body>
    <p>This email contains HTML Tags!</p>
    <table>
    <tr>
    <th>Firstname</th>
    <th>Lastname</th>
    </tr>
    <tr>
    <td>John</td>
    <td>Doe</td>
    </tr>
    </table>
    </body>
    </html>
    ";

    // Always set content-type when sending HTML email
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

    // More headers
    $headers .= 'From: <webmaster@example.com>' . "\r\n";
    $headers .= 'Cc: myboss@example.com' . "\r\n";

    mail($to, $subject, $message, $headers);
    var_dump($row = mysqli_fetch_assoc($result)[5]);
}
