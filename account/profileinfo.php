<?php
                            $sql = mysql_query("SELECT * FROM `profiles` WHERE `userid` = $userid") or die(mysql_error());
                            $result = mysql_num_rows($sql);
                            $row = mysql_fetch_array($sql); 
                            extract($row);


                            $office = mysql_query("SELECT * FROM office WHERE officeid= $officeid") or die(mysql_error());
                            $sulti = mysql_num_rows($office);
                            $row2 = mysql_fetch_array($office);
                            extract($row2);
?>