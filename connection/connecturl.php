<?php
require('../db.php');
include("../auth.php");
include("../index.html");
function Visit($url)
{
       $agent = "Mozilla/4.0 (compatible; MSIE 5.01; Windows NT 5.0)";
       $ch = curl_init();
       curl_setopt($ch, CURLOPT_URL, $url);
       curl_setopt($ch, CURLOPT_USERAGENT, $agent);
       curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
       curl_setopt($ch, CURLOPT_VERBOSE, false);
       curl_setopt($ch, CURLOPT_TIMEOUT, 5);
       curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
       curl_setopt($ch, CURLOPT_SSLVERSION, 3);
       curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
       $page = curl_exec($ch);
       echo curl_error($ch);
       $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
       curl_close($ch);

       return $httpcode >= 200 && $httpcode < 400;
}

$sel_query = "Select id, url from website ORDER BY id asc;";
$result = mysqli_query($con, $sel_query);
while ($row = mysqli_fetch_assoc($result)) {
       //var_dump($row);
       $url = $row["url"];
       $status = Visit($url);
       $website_id = $row["id"];
       $insert_query = "INSERT log (websiteid, statusid) VALUES ('$website_id','$status')";
       mysqli_query($con, $insert_query);
}

$status = "<br>Websites Successfully Connected. </br></br>
                <a href='../logs/view.php'>View Log</a>";
echo '<p style="color:#FF0000;">' . $status . '</p>';
