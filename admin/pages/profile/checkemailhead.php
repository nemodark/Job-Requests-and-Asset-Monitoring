<?php 
// http://www.itechroom.com : Technology News, Web Development and more
include "../../../connection/connection.php";
$emailaddress=$_POST['email_ad'];

$query = "SELECT email FROM profiles";
$result = mysql_query($query) or die ("Could not fetch email data");
while($row = mysql_fetch_array($result)){
	$emailaa[] = $row['email'];

}



if(in_array($emailaddress,$emailaa)) 
{echo '<span class="error">Email already exists.</span>';exit;}
else if (preg_match("/^[a-zA-Z1-9]+$/", $emailaddress)) 
{
       echo '<span class="success">Email is available.</span>';
} 
else 
{
      echo '<span class="error"></span>';
}

?>