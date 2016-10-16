<html>
<head>
  <meta name="generator"
  content="HTML Tidy for HTML5 (experimental) for Windows https://github.com/w3c/tidy-html5/tree/c63cc39" />
  <META HTTP-EQUIV="expires" CONTENT="0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>[中大圖書館典閱組]--工讀金修改</title>
  </head>
  <body background="bk1.gif">
    
  <p align="center">
        <font face="">
          <font size="+3">修改工讀金資料</font>
        </font>
 
  </p>
  
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
    
    $people[$i]= $row['Name'];
    $i++;
   }


    echo '<center>';
    echo '<form id="form1" name="form1" method="post" action="sql_update.php">';
    echo  '<input type="hidden" name="decide" value="&lt;? echo $_SESSION[&#39;decide&#39;]; ?&gt;" /> ';
    echo '<table style="border:1px #FFAC55 solid;padding:1px;" rules="all" cellpadding=\'5\'; width="600" height="300" bgcolor="#F5F5F5">';
    echo '<tr><td><label>館員: </label>'; 
    echo '<select name="boss" id="name" >';
    foreach ($people as $name) {
      echo '<option';
      if ($row['boss']==$name)
        echo ' selected';
      echo ' value=\''.$name.'\'>'.$name.'</option>';
    }
    echo '</select>';


    ?>


    <?php
  
    $link = mysql_connect();
    if (!$link) die("linksql error");
    $db_selected = mysql_select_db("cir_parttimestatistics", $link);
    mysql_query("SET NAMES 'utf8'");
    if (!$db_selected) die("DB ERROR");
    $sql = "SELECT * FROM `money` WHERE id ='$update_id' ";
    if (!mysql_query($sql))

        //$result = mysql_query($sql,$link);
      die("SQL ERROR");
    $result = mysql_query($sql) ;    
    $result = mysql_query($sql) or die('MySQL query error');
    $row = mysql_fetch_array($result);

    
    
    
    
    $month=array(1,2,3,4,5,6,7,8,9,10,11,12); 

    ?>
    
  </select></label> 
  <label>工讀生人數: 
    <input name="number" type="text" value="<?php echo $row['number']; ?>" size="1" /></label> 
    </td>

    <td>    
    <select name="year" >
      <?php
      $nowyear=date("Y");
      $year=array();
      for($i=0;$i<5;$i++){
        $year[$i]=$nowyear-2+$i;
      }
      foreach ($year as $name) {
        echo '<option';
        if ($row['year']==$name)
          echo ' selected';
        echo ' value=\''.$name.'\'>'.$name.'</option>';
      }
      ?>
    </select>
    年

    
    <select name="new_month" >
      <?php
      foreach ($month as $index => $name) {
          //echo "$index";
        echo '<option';
        if ($row['month']-1==$index){
          echo ' selected';
        }
        echo ' value=\''.$index.'\'>'.$name.'</option>';
      }
      echo '</select>';
      ?>
      月
      </td></tr>
      

    
          <tr>
          
            <td width="290">
              <label>機關負擔金額: 
                <input name="x1" type="text" value="<?php echo $row['x1']; ?>" size="12" value="" /></label>
              </td>
              <td></td>
            </tr>
            <tr>
              <td>
                <label>雇主--勞保費: 
                  <input name="x2" type="text" value="<?php echo $row['x2']; ?>" size="12" /></label>
                </td>
                <td>
                  <label>自付--勞保費: 
                    <input name="y1" type="text" value="<?php echo $row['y1']; ?>" size="12" /></label>
                  </td>
                </tr>
                <tr>
                  <td>
                    <label>雇主--健保費: 
                      <input name="x3" type="text" value="<?php echo $row['x3']; ?>" size="12" /></label>
                    </td>
                    <td>
                      <label>自付--健保費: 
                        <input name="y2" type="text" value="<?php echo $row['y2']; ?>" size="12" /></label>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <label>雇主--補充保費: 
                          <input name="x4" type="text" value="<?php echo $row['x4']; ?>" size="12" /></label>
                        </td>
                        <td>
                          <label>自付--補充保費: 
                            <input name="y3" type="text" value="<?php echo $row['y3']; ?>" size="12" /></label>
                          </td>
                        </tr>
                        <tr>
                          <td>
                            <label>雇主--勞退金: 
                              <input name="x5" type="text" value="<?php echo $row['x5']; ?>" size="12" /></label>
                            </td>
                            <td>
                              <label>自付--勞退金: 
                                <input name="y4" type="text" value="<?php echo $row['y4']; ?>" size="12" /></label>
                              </td>
                            </tr>
                            <tr>
                              <td>
                                <label>雇主--離職儲金: 
                                  <input name="x6" type="text" value="<?php echo $row['x6']; ?>" size="12" /></label>
                                </td>
                                <td>
                                  <label>自付--離職儲金: 
                                    <input name="y5" type="text" value="<?php echo $row['y5']; ?>" size="12" /></label>
                                  </td>
                                </tr>
                                <tr>
                                  <td>&#160;</td>
                                  <td>
                                    <label>自付--所得稅: 
                                      <input name="y6" type="text" value="<?php echo $row['y6']; ?>" size="12" /></label>
                                    </td>
                                  </tr>
                              </table>
                              
                              <input name="update_id" type="hidden" value="<?php echo $update_id;?>" size="5" />
                              
                              <input type="button" value="更新資料" type="submit"  onclick="submit();"/>
                            </form>
                            </center>

                          </body>
                          </html>
