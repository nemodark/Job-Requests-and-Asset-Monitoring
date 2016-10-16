<?php
                            $sql = mysql_query("SELECT * FROM `profiles` WHERE `userid` = $userid") or die(mysql_error());
                            $result = mysql_num_rows($sql);
                            $row = mysql_fetch_array($sql); 
                            extract($row);
?>