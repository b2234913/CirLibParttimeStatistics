<html>
<head>
  <meta name="generator"
  content="HTML Tidy for HTML5 (experimental) for Windows https://github.com/w3c/tidy-html5/tree/c63cc39" />
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>[中大圖書館典閱組]--工讀金統計</title>
  <script language="javascript">
    function delete()
    {
      if(confirm("確實要刪除嗎?"))
        alert("已經刪除！");
      else
        alert("已經取消了刪除操作");
    }
  </script> 
</head>
<body background="bk1.gif">
<?php
        if(!isset($start_year)) $start_year=$nowyear=date("Y");
        if(!isset($end_year)) $end_year=$nowyear=date("Y");
        //echo $start_year,$end_year;
        if(!isset($start_month)) $start_month=$nowmonth=1;//date("n");
        if(!isset($end_month)) $end_month=$nowmonth=12;//date("n");
        //echo $start_month,$end_month;
?>


  <script language="Javascript">   

    function CheckForm()

    {
      if(confirm("確認刪除嗎？")==true)   
        return true;
      else  
        return false;
    }
  
  </script>


  <p align="center">
        <font face="">
          <font size="+3">工讀金統計</font>
        </font>
 
  </p>


  <form method="post" action="part_time.php" name="settimeform">
  
  <p align="center" bgcolor="#708090">
      <label> 從 </label>
      <select name="start_year" >
      <?php
     
    
    $nowyear=date("Y");
    $year=array();
    for($i=0;$i<7;$i++){
        $year[$i]=$nowyear-3+$i;
    }
      
      foreach ($year as $name) {
        echo '<option';
        if ($start_year==$name)
          echo ' selected';
        echo ' value=\''.$name.'\'>'.$name.'</option>';
      }

      ?>

      </select>
      <label> 年 </label>
      <select name="start_month" >
        <?php
        $month=array("1","2","3","4","5","6","7","8","9","10","11","12"); 
        foreach ($month as $name) {
        echo '<option';
        if ($start_month==$name){
          echo ' selected';
        }
        echo ' value=\''.$name.'\'>'.$name.'</option>';
        }
      ?>
      </select>
        
      <label> 月 到 
        <select name="end_year" id="">
          <?php
          date_default_timezone_set("Asia/Taipei");
          
          foreach ($year as $name) {
            echo '<option';
          if ($end_year==$name)
          echo ' selected';
        echo ' value=\''.$name.'\'>'.$name.'</option>';
      }
      ?>
      </select>

      <label> 年 </label>
      <select name="end_month" >
      <?php
      $month=array("1","2","3","4","5","6","7","8","9","10","11","12"); 
      foreach ($month as  $name) {
        echo '<option';
        if ($end_month==$name)
          echo ' selected';
        echo ' value=\''.$name.'\'>'.$name.'</option>';
      }
      ?>
      </select>
       <label> 月 </label> 

        <input type="submit" name="Submit11" value=" 查詢 " />
        </form>
    </p>
        <p align="center">

          <label>   
            <input type="button" value="新增資料"
            onclick="location.href=&#39;https://cir.lib.ncu.edu.tw/part_time/input.php&#39;" />
          </label>
          <input type="button" value="年統計表格" onclick="location.href='https://cir.lib.ncu.edu.tw/part_time/yearform.php'">
        </p>

        <?php 
        

        $link = mysql_connect("localhost", "cirlib", "cir570");
        if (!$link) die("sql connection error!");
        $db_selected = mysql_select_db("cir_parttimestatistics", $link);
        mysql_query("SET NAMES 'utf8'");
        if (!$db_selected) die("DB ERROR");
        $sql = "SELECT * FROM `money` ORDER BY `money`.`year` ASC, `money`.`month` ASC, `money`.`boss` ASC";
        
        $result = mysql_query($sql) ;
        $C = array("#F9F77C","#FFF5EE","#FFDDAA","#00FF99");

        echo '<table width="1900" height="46" border="1" >';
        echo    '<tr bgcolor="lightblue">';
        //echo    '<th width="150" height="10" scope="col">流水號</th>';
        echo    '<th width="140" height="42" scope="col">館員</th>';
        echo    '<th width="140" height="42" scope="col">工讀生人數</th>';
        echo    '<th width="150" scope="col">年月</th>';
        echo    '<th width="190" scope="col">機關負擔金額<br>A</th>';
        echo    '<th width="164" scope="col">雇主<br>勞保費<br>x1</th>';
        echo    '<th width="164" scope="col">雇主<br>健保費<br>x2</th>';
        echo    '<th width="164" scope="col">雇主<br>補充保費<br>x3</th>';
        echo    '<th width="164" scope="col">雇主<br>勞退金<br>x4</th>';
        echo    '<th width="164" scope="col">雇主<br>離職儲金<br>x5</th>';
        echo    '<th width="164" scope="col">雇主<br>小記<br>X=x1+x2+x3+x4+x5</th>';
        echo    '<th width="190" scope="col">個人應領金額<br>B=A-X</th>';
        echo    '<th width="164" scope="col">自付<br>勞保費<br>y1</th>';
        echo    '<th width="164" scope="col">自付<br>健保費<br>y2</th>';
        echo    '<th width="164" scope="col">自付<br>補充保費<br>y3</th>';
        echo    '<th width="164" scope="col">自付<br>離職儲金<br>y4</th>';
        echo    '<th width="164" scope="col">自付<br>勞退金<br>y5</th>';
        echo    '<th width="164" scope="col">自付<br>所得稅<br>y6</th>';
        echo    '<th width="164" scope="col">自付<br>小記<br>Y=y1+y2+y3+y4+y5+y6</th>';
        echo    '<th width="164" scope="col">實發金額<br>B-Y</th>';
        echo    '<th width="110" scope="col">修改</th>';
        echo    '<th width="110" scope="col">刪除</th>';
        echo  '</tr>';


        $result = mysql_query($sql) or die('MySQL query error');
        $i=1;

        while($row = mysql_fetch_array($result)){
          if($row['year'] >= $start_year & $row['year'] <= $end_year ){
            if($row['month'] >= $start_month & $row['month'] <= $end_month){
            
            $c=$row['month']%4;
            echo '<tr bgcolor="'.$C["$c"].'">';
            //echo    '<td ALIGN=center>'.$row['ID'].'</td>';
            echo    '<td ALIGN=center width="62" height="42" scope="col">'.$row['boss'].'  </td>';
            echo    '<td ALIGN=center width="62" height="42" scope="col">'.$row['number'].'</td>';
            echo    '<td ALIGN=center width="150" scope="col">'.$row['year'].'-'.$row['month'].'</td>';
            echo    '<td ALIGN=right width="164" scope="col">'.$row['x1'].'</td>';
            echo    '<td ALIGN=right width="194" scope="col">'.$row['x2'].'</td>';
            echo    '<td ALIGN=right width="164" scope="col">'.$row['x3'].'</td>';
            echo    '<td ALIGN=right width="194" scope="col">'.$row['x4'].'</td>';
            echo    '<td ALIGN=right width="136" scope="col">'.$row['x5'].'</td>';
            echo    '<td ALIGN=right width="176" scope="col">'.$row['x6'].'</td>';
            $x7 = $row['x2']+$row['x3']+$row['x4']+$row['x5']+$row['x6'];
            echo    '<td ALIGN=right width="164" scope="col">'.$x7.'</td>';
            $z1 = $row['x1']-$x7;
            echo    '<td ALIGN=right width="164" scope="col">'.$z1.'</td>';
            echo    '<td ALIGN=right width="194" scope="col">'.$row['y1'].'</td>';
            echo    '<td ALIGN=right width="164" scope="col">'.$row['y2'].'</td>';
            echo    '<td ALIGN=right width="194" scope="col">'.$row['y3'].'</td>';
            echo    '<td ALIGN=right width="164" scope="col">'.$row['y4'].'</td>';
            echo    '<td ALIGN=right width="136" scope="col">'.$row['y5'].'</td>';
            echo    '<td ALIGN=right width="110" scope="col">'.$row['y6'].'</td>';
            $y7 = $row['y1']+$row['y2']+$row['y3']+$row['y4']+$row['y5']+$row['y6'];
            echo    '<td ALIGN=right width="136" scope="col">'.$y7.'</td>';
            $z2 = $z1-$y7;
            echo    '<td ALIGN=right width="110" scope="col">'.$z2.'</td>';

            echo '<form name="form" method="post" action="updata.php">';
            echo '<td ALIGN=center><input name="update_id" type="hidden" value='.$row['ID'].' size="5" /><input type="button" name="" value="修改" type="submit" onclick="submit();"/></td>';
            echo '</form>';

            echo '<form name="form" method="post" action="delete.php" onSubmit="return CheckForm();" >';
            echo '<td ALIGN=center><input name="delete_id" type="hidden" value='.$row['ID'].' size="5" />
            <input type="submit" name="" value="刪除" ></td>';
            echo '</form>';
            echo '</tr>';  
            $i++; 
            }
          }
        }
          echo '</table>';

        ?>


      </body>
      </html>
