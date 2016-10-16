<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<script language="javascript">
    function delete()
    {
      if(confirm("確實要刪除嗎?"))
        alert("已經刪除！");
      else
        alert("已經取消了刪除操作");
    }
  </script> 
  <?php

$link = mysql_connect();
if (!$link) die("linksql error");

$db_selected = mysql_select_db("cir_parttimestatistics", $link);
mysql_query("SET NAMES 'utf8'");
if (!$db_selected) die("DB ERROR");
$sql = "INSERT INTO budget(`year`, `fund`) VALUES ('$year', '$fund')";

if (!mysql_query($sql)){ ?>
             
      <script language="javascript">
     alert("本年度預算已存在");
     window.location.href = 'yearform.php';
	 </script>
<?php
        return check_form();
    }

$sql_query = "select * from budget";
$result = mysql_query($sql_query) or die('MySQL query error');   

header("Location: yearform.php"); 


?>

</body>
</html>

