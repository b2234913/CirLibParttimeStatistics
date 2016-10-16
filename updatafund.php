<!DOCTYPE html>
<html>
<head>
	<title>[中大圖書館典閱組]--修改年度預算</title>
</head>
<body background="bk1.gif">
<p align="center">
        <font face="">
          <font size="+3">修改年度預算</font>
        </font>
</p>
 <center>
 <form id="form1" name="form1" method="post" action="sql_updatafund.php">
 <?php
     $link = mysql_connect();
    if (!$link) die("linksql error");
    $db_selected = mysql_select_db("cir_parttimestatistics", $link);
    mysql_query("SET NAMES 'utf8'");
    if (!$db_selected) die("DB ERROR");
    $sql = "SELECT * FROM `budget` WHERE year ='$updata_year' ";
    if (!mysql_query($sql))
    	die("SQL ERROR");
    $result = mysql_query($sql) ;    
    $result = mysql_query($sql) or die('MySQL query error');
    $row = mysql_fetch_array($result);

    $nowyear=date("Y");
    $year=array();
    for($i=0;$i<5;$i++){
        $year[$i]=$nowyear-2+$i;
    }
    echo '<table style="border:1px #FFAC55 solid;padding:1px;" rules="all" cellpadding=\'5\'; width="400" height="50" bgcolor="#F5F5F5">';
    echo '<td width="150"><label>年: </label>';
    echo '<select name="year" >';
      foreach ($year as $name) {
        echo '<option';
        if ($row['year']==$name)
          echo ' selected';
        echo ' value=\''.$name.'\'>'.$name.'</option>';
       }
       echo '</select></td>';
    echo '<td><lable>預算金額: </label>';
   	echo '<input name="fund" type="text" size="10" value=';
    echo $row['fund'] ;
    echo '></td>';
    ?>
</table>
<input type="button" value="更新預算" type="submit"  onclick="submit();"/>
</form>
</center>
</body>
</html>