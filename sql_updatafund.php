<?php



$link = mysql_connect();
if (!$link) die("linksql error");

$db_selected = mysql_select_db("cir_parttimestatistics", $link);
mysql_query("SET NAMES 'utf8'");
if (!$db_selected) die("DB ERROR");
$sql = "UPDATE `budget` SET `fund`='$fund' WHERE `year` = '$year' ";

if (!mysql_query($sql))
		die("SQL ERROR");
$sql_query = "select * from money";
$result = mysql_query($sql_query) or die('MySQL query error');   
header("Location: yearform.php");         

?>
