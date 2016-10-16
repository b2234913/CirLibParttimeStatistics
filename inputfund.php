<!DOCTYPE html>
<html>
<head>
	<title>[中大圖書館典閱組]--年度預算輸入</title>
</head>
<body background="bk1.gif">

<form id="form1" name="form1" method="post">
    <input type="hidden" name="decide" value="&lt;? echo $_SESSION[&#39;decide&#39;]; ?&gt;" /> 
    <center>
    <p align="center">
        <font face="">
          <font size="+3">新增年度預算</font>
    </font>
    </p>
    <table style="border:1px #FFAC55 solid;padding:1px;" rules="all" cellpadding='5'; width="400" height="50" bgcolor="#F5F5F5">




	<td width="150"><label>年: </label>
  <?php 

    $nowyear=date("Y");
    $year=array();
    for($i=0;$i<5;$i++){
        $year[$i]=$nowyear-2+$i;
    }
    echo '<select name="year" id="year">';
      
      echo '<option value="'.$year[0].'">'.$year[0].'</option>';
      echo '<option value="'.$year[1].'">'.$year[1].'</option>';
      echo '<option value="'.$year[2].'">'.$year[2].'</option>';
      echo '<option value="'.$year[3].'">'.$year[3].'</option>';
      echo '<option value="'.$year[4].'">'.$year[4].'</option>';
      
    echo '</select>';
   ?>
   	</td>
   	<td><lable>預算金額: </label>
   	<input name="fund" type="text" size="10" /></td>

    </table>
    
    <input type="button" value="新增" type="submit"  onclick="form1.action='addfund.php';form1.submit();"/>
</form>
<br>
<br>
</center>

</body>
</html>