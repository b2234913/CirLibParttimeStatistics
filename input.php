<html>
  <head>
    <BaseFont Size="100">
    <meta name="generator"
    content="HTML Tidy for HTML5 (experimental) for Windows https://github.com/w3c/tidy-html5/tree/c63cc39" />
	<META HTTP-EQUIV="expires" CONTENT="0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>[中大圖書館典閱組]--工讀金輸入</title>
  </head>
  <body background="bk1.gif">

  <p align="center">
        <font face="">
          <font size="+3">新增工讀金資料</font>
        </font>
 
  </p>
    <center>
    <form id="form1" name="form1" method="post" action="add.php">
    <input type="hidden" name="decide" value="&lt;? echo $_SESSION[&#39;decide&#39;]; ?&gt;" /> 
    <table style="border:1px #FFAC55 solid;padding:1px;" rules="all" cellpadding='5'; width="600" height="300" bgcolor="#F5F5F5">
    
    <tr>
    <td>
    <label> 館員: </label>
    <select name="boss">
   <?php
     $link = mysql_connect();
    if (!$link) die("linksql error");
    $db_selected = mysql_select_db("lib_parttime", $link);
    mysql_query("SET NAMES 'utf8'");
    if (!$db_selected) die("DB ERROR");
    $sql = "SELECT * FROM `librarian` WHERE TeamId ='cir' ";
    if (!mysql_query($sql))

        //$result = mysql_query($sql,$link);
      die("SQL ERROR");
    $result = mysql_query($sql) ;    
    $result = mysql_query($sql) or die('MySQL query error');
   $i=1;
   $people = array();
   while($row = mysql_fetch_array($result)){
    
    echo $people[$i]= $row['Name'];
    $i++;
   }

    foreach ($people as $name) {
      echo '<option';
      echo ' value=\''.$name.'\'>'.$name.'</option>';
    }
    ?>
      </select>
    <label>工讀生人數: </label>
    <input name="number" type="text" id="number" size="3" /></label> 
    </td>
    
    <td> 
    <?php 

    $nowyear=date("Y");
    $year=array();
    for($i=0;$i<5;$i++){
        $year[$i]=$nowyear-2+$i;
    }
    echo '<select name="year" id="year">'; 
      echo '<option value="'.$year[0].'">'.$year[0].'</option>';
      echo '<option value="'.$year[1].'">'.$year[1].'</option>';
      echo '<option selected="true" value="'.$year[2].'">'.$year[2].'</option>';
      echo '<option value="'.$year[3].'">'.$year[3].'</option>';
      echo '<option value="'.$year[4].'">'.$year[4].'</option>';
    echo '</select>';
   
    echo '<label> 年 '; 
    echo '<select name="month" id="month" value = "2">';
    $month=array(1,2,3,4,5,6,7,8,9,10,11,12);
    $nowmonth=date("m");
      foreach ($month as $name) {
        echo '<option';
        if ($nowmonth==$name)
          echo ' selected';
        echo ' value=\''.$name.'\'>'.$name.'</option>';
       }
    ?>
    </select></label>
     月 
    </td>
    </tr>
        <tr>
          <td width="290">
            <label>機關負擔金額: 
            <input name="x1" type="text" id="x1" size="12" value="" /></label>
          </td>
         <td></td>
        </tr>
        <tr>
          <td>
            <label>雇主--勞保費: 
            <input name="x2" type="text" id="x2" size="12" /></label>
          </td>
          <td>
            <label>自付--勞保費: 
            <input name="y1" type="text" id="y1" size="12" /></label>
          </td>
        </tr>
        <tr>
          <td>
            <label>雇主--健保費: 
            <input name="x3" type="text" id="x3" size="12" /></label>
          </td>
          <td>
            <label>自付--健保費: 
            <input name="y2" type="text" id="y2" size="12" /></label>
          </td>
        </tr>
        <tr>
          <td>
            <label>雇主--補充保費: 
            <input name="x4" type="text" id="x4" size="12" /></label>
          </td>
          <td>
            <label>自付--補充保費: 
            <input name="y3" type="text" id="y3" size="12" /></label>
          </td>
        </tr>
        <tr>
          <td>
            <label>雇主--勞退金: 
            <input name="x5" type="text" id="x5" size="12" /></label>
          </td>
          <td>
            <label>自付--勞退金: 
            <input name="y4" type="text" id="y4" size="12" /></label>
          </td>
        </tr>
        <tr>
          <td>
            <label>雇主--離職儲金: 
            <input name="x6" type="text" id="x6" size="12" /></label>
          </td>
          <td>
            <label>自付--離職儲金: 
            <input name="y5" type="text" id="y5" size="12" /></label>
          </td>
        </tr>
        <tr>
          <td>&#160;</td>
          <td>
            <label>自付--所得稅:
            <input name="y6" type="text" id="y6" size="12" /></label>
          </td>
        </tr>
    
    </table>
    <input type="button" value="新增" type="submit"  onclick="form1.action='add.php';form1.submit();"/>
    </form>
    </center>


  </body>
</html>
