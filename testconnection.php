<?php
require('db.php');
include("auth.php");
?>
<!DOCTYPE html>
<html>

<head>
       <meta charset="utf-8">
       <title>View Records</title>
       <link rel="stylesheet" href="css/style.css" />
</head>

<body>
       <!-- <div class="form">

              <h2>View Records</h2>
              <table width="100%" border="1" style="border-collapse:collapse;">
                     <thead>
                            <tr>
                                   <th><strong>ID</strong></th>
                                   <th><strong>UserID</strong></th>
                                   <th><strong>URL</strong></th>

                            </tr>
                     </thead>
                     <tbody> -->
       <?php
       $count = 1;
       $sel_query = "Select id, usersid, url from website ORDER BY id asc;";
       $result = mysqli_query($con, $sel_query);
       while ($row = mysqli_fetch_assoc($result)) { ?>
              <tr>

                     <td align="center"><?php echo $row["id"]; ?></td>
                     <td align="center"><?php echo $row["usersid"]; ?></td>
                     <td align="center"><?php echo $row["url"]; ?></td>

              </tr>
       <?php //$count++;
       } ?>
       <!-- </tbody>
              </table> -->
       </div>
       <?php
       var_dump("VARDUMP: "(mysqli_fetch_assoc($result)));
       $i = $row["id"];
       $site = "";
       for ($i = 0; $i < $row["id"]; $i++) {
              $site = $row["url"];
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
                     if ($httpcode >= 200 && $httpcode < 400) return true;
                     else return false;
              }
              if (Visit($site))
                     echo "$site Website OK ";
              else
                     echo " Website DOWN ";
       }
       ?>

</body>

</html>


<?php

// $site = "google.com";
// function Visit($url)
// {
// $agent = "Mozilla/4.0 (compatible; MSIE 5.01; Windows NT 5.0)";
// $ch = curl_init();
// curl_setopt($ch, CURLOPT_URL, $url);
// curl_setopt($ch, CURLOPT_USERAGENT, $agent);
// curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
// curl_setopt($ch, CURLOPT_VERBOSE, false);
// curl_setopt($ch, CURLOPT_TIMEOUT, 5);
// curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
// curl_setopt($ch, CURLOPT_SSLVERSION, 3);
// curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
// $page = curl_exec($ch);
// echo curl_error($ch);
// $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
// curl_close($ch);
// if ($httpcode >= 200 && $httpcode < 400) return true; // else return false; // } // if (Visit($site)) // echo "$site Website OK " ; // else // echo " Website DOWN " ; // require('db.php'); // include("auth.php"); // $sql="INSERT INTO MyGuests (firstname, lastname, email)
// VALUES ('John', 'Doe', 'john@example.com')" ; // if ($conn->query($sql) === TRUE) {
       // echo "New record created successfully";
       // } else {
       // echo "Error: " . $sql . "<br>" . $conn->error;
       // }
       //