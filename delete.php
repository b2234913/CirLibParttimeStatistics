<?php
$link = mysql_connect();
if (!$link) die("linksql error");

echo "$delete_id"; 

$db_selected = mysql_select_db("cir_parttimestatistics", $link);
mysql_query("SET NAMES 'utf8'");
if (!$db_selected) die("DB ERROR");

$sql = "DELETE FROM `money` WHERE id = '$delete_id' ";
if (!mysql_query($sql))

                                        //$result = mysql_query($sql,$link);
        die("SQL ERROR");

header("Location: part_time.php");                                         




?>