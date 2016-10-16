<?php

    session_start();
    require('./connection/connection.php');
    // startar sessionen så att man kan använda session variablerna
    // Inkluderar connect.php för att ansluta till databasen
    $user = $_SESSION['username'];
    $sql = mysql_query("SELECT * FROM `users` WHERE `username` = '$user'");
    $result = mysql_num_rows($sql);
  if($result['privilege'] == 'admin')
{
   header("location:release.php");
}
 if ($result['privilege'] == 'user')

 {
    echo "hi";
 }

?>