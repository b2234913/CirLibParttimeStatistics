<!DOCTYPE html>
<html>
<head>
	<title>[中大圖書館典閱組]--工讀金</title>
</head>

<center>
<body background="bk1.gif">
<?php 
        $nowyear=date("Y");
        if(!isset($select_year)) $select_year=$nowyear;

        $link = mysql_connect();
        if (!$link) die("sql connection error!");
        $db_selected = mysql_select_db("cir_parttimestatistics", $link);
        mysql_query("SET NAMES 'utf8'");
        if (!$db_selected) die("DB ERROR");
        $sql = "SELECT * FROM `budget` ORDER BY `budget`.`year` ASC";
        
        $result = mysql_query($sql) ;

        echo '<table><tr><td>';
        echo '<form name="form" method="post" action="yearform.php" onSubmit="return CheckForm();" >';
        $forward_year = $select_year -1;
        echo '<input name="select_year" type="hidden" value='.$forward_year.' size="5" />';
        echo '<input type="submit" name="" value="上年度" ></form></td>';
            

        echo '<td><form name="form" method="post" action="yearform.php" onSubmit="return CheckForm();" >';
        $next_year = $select_year +1;
        echo '<input name="select_year" type="hidden" value='.$next_year.' size="5" />';
        echo '<input type="submit" name="" value="下年度" ></form></td></tr></table>';

        echo '<font size="+2">館方分配點閱組';
        echo $select_year;

        echo '年可使用之預算';
            
            while($row = mysql_fetch_array($result)){
                if($row['year']==$select_year){
                    echo $money = $row['fund'];
                    $fund = $row['fund'];
                }
            }
        ?>


元</font><br>

<table><tr><td>
<form name="form" method="post" action="updatafund.php">
<ALIGN=center>
<input name="updata_year" type="hidden" value='.$select_year.'>
<input type="button" value="修改預算" type="submit" onclick="submit();"/>
</form></td>
    

<td>
<form name="form" method="post" action="updatafund.php">
<input type="button" value="新增預算" onclick="location.href='https://cir.lib.ncu.edu.tw/part_time/inputfund.php'">
<center>
</td>
<td>
<input type="button" value="返回工讀金統計" onclick="location.href='https://cir.lib.ncu.edu.tw/part_time/part_time.php'"></center>
</td>

<?php
    $link = mysql_connect();
    if (!$link) die("sql connection error!");
    $db_selected = mysql_select_db("cir_parttimestatistics", $link);
    mysql_query("SET NAMES 'utf8'");
    if (!$db_selected) die("DB ERROR");
    
    $sql = "SELECT * FROM `money` WHERE year ='$select_year' ";
    
    $result1 = mysql_query($sql) ;
    $i=1;   
      
    
?>



 <table style="border:1px #FFAC55 solid;padding:1px;" rules="all" ;  bgcolor="#F5F5F5">
 		<tr bgcolor="#FFD700">
 				<th width="100" height="42" scope="col"> 年月 </th>
 				<th width="120" height="42" scope="col"> 雇主負擔支出<br>(勞退勞保補充保費離職儲金等) </th>
 				<th width="120" height="42" scope="col"> 工讀金支出 </th> 
 				<th width="120" height="42" scope="col"> 小記 </th>
 				<th width="120" height="42" scope="col"> 支出累計 </th>
 				<th width="120" height="42" scope="col"> 結餘 </th>
 				<th width="120" height="42" scope="col"> 執行率 </th>
 				<th width="120" height="42" scope="col"> 工讀生人數 </th>
 				<th width="120" height="42" scope="col"> 每名工讀生平均金額 </th>
 		</tr>
        
<?php 
        $X=array();
        $Y=array();
        $Z=array();
        $N=array();
        $j=1;

        while($j<=12){
             
            while($row = mysql_fetch_array($result1)){
                if($row['month']==1){
                    $X[1] = $X[1] + $row['x1'];
                    $Y[1] = $Y[1] + $row['x2'] + $row['x3']+ $row['x4']+ $row['x5']+ $row['x6'] ;
                    $N[1]=$N[1]+$row['number'];
                    
                }
                if($row['month']==2){
                    $X[2] = $X[2] + $row['x1'];
                    $Y[2] = $Y[2] + $row['x2'] + $row['x3']+ $row['x4']+ $row['x5']+ $row['x6'] ; 
                   $N[2]=$N[2]+$row['number'];
                }
                if($row['month']==3){
                    $X[3] = $X[3] + $row['x1'];
                    $Y[3] = $Y[3] + $row['x2'] + $row['x3']+ $row['x4']+ $row['x5']+ $row['x6'] ; 
                    $N[3]=$N[3]+$row['number'];
                }
                if($row['month']==4){
                    $X[4] = $X[4] + $row['x1'];
                    $Y[4] = $Y[4] + $row['x2'] + $row['x3']+ $row['x4']+ $row['x5']+ $row['x6'] ; 
                    $N[4]=$N[4]+$row['number'];
                }
                if($row['month']==5){
                    $X[5] = $X[5] + $row['x1'];
                    $Y[5] = $Y[5] + $row['x2'] + $row['x3']+ $row['x4']+ $row['x5']+ $row['x6'] ; 
                    $N[5]=$N[5]+$row['number'];
                }
                if($row['month']==6){
                    $X[6] = $X[6] + $row['x1'];
                    $Y[6] = $Y[6] + $row['x2'] + $row['x3']+ $row['x4']+ $row['x5']+ $row['x6'] ; 
                   $N[6]=$N[6]+$row['number'];
                }
                if($row['month']==7){
                    $X[7] = $X[7] + $row['x1'];
                    $Y[7] = $Y[7] + $row['x2'] + $row['x3']+ $row['x4']+ $row['x5']+ $row['x6'] ; 
                   $N[7]=$N[7]+$row['number'];
                }
                if($row['month']==8){
                    $X[8] = $X[8] + $row['x1'];
                    $Y[8] = $Y[8] + $row['x2'] + $row['x3']+ $row['x4']+ $row['x5']+ $row['x6'] ; 
                   $N[8]=$N[8]+$row['number'];
                }
                if($row['month']==9){
                    $X[9] = $X[9] + $row['x1'];
                    $Y[9] = $Y[9] + $row['x2'] + $row['x3']+ $row['x4']+ $row['x5']+ $row['x6'] ; 
                    $N[9]=$N[9]+$row['number'];
                }
                if($row['month']==10){
                    $X[10] = $X[10] + $row['x1'];
                    $Y[10] = $Y[10] + $row['x2'] + $row['x3']+ $row['x4']+ $row['x5']+ $row['x6'] ; 
                    $N[10]=$N[10]+$row['number'];
                }
                if($row['month']==11){
                    $X[11] = $X[11] + $row['x1'];
                    $Y[11] = $Y[11] + $row['x2'] + $row['x3']+ $row['x4']+ $row['x5']+ $row['x6'] ; 
                    $N[11]=$N[11]+$row['number'];
                }
                if($row['month']==12){
                    $X[12] = $X[12] + $row['x1'];
                    $Y[12] = $Y[12] + $row['x2'] + $row['x3']+ $row['x4']+ $row['x5']+ $row['x6'] ; 
                   $N[12]=$N[12]+$row['number'];
                }

                
            }

            echo '<tr><td align="right">';
            echo $select_year.' 年 '.$j.' 月';

            echo '</td><td align="right">';
            echo $Y[$j];
            echo '</td><td align="right">';
            if($Y[$j]!=0 | $X[$j]!=0)
             echo $X[$j] - $Y[$j] ;

            echo '</td><td align="right">';
            echo $X[$j];
            echo '</td>';
            $B = $B + $X[$j];
            $C = $fund - $B ;
            if($fund!=0) $D = ($B/$fund)*100;
            $E = null;
            if($N[$j]!=0) $E = $X[$j]/$N[$j];
            echo '<td align = "right">';
            if(isset($X[$j])) echo $B;
            echo '</td><td align = "right">';
            if(isset($X[$j])) echo $C;
            echo '</td><td align = "right">';
            if(isset($X[$j])) echo number_format($D,2),'%';
            echo '</td><td align = "right">'.$N[$j].'</td><td align = "right">';
            if(isset($X[$j])) echo number_format($E);
            echo '</td></tr>';
            $j++;
        }

?>


 </table>


 </center>
</body>
</html>