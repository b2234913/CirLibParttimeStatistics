<?php
                                        
                                        $link = mysql_connect();
                                        if (!$link) die("linksql error");
           
                                        $db_selected = mysql_select_db("cir_parttimestatistics", $link);
                                        mysql_query("SET NAMES 'utf8'");
                                        if (!$db_selected) die("DB ERROR");
                                        $sql = "UPDATE money(`boss`, `number`, `year`, `month`, `x1`, `x2`, `x3`, `x4`, `x5`, `x6`,`y1`, `y2`, `y3`, `y4`, `y5`, `y6`) VALUES ('$boss', '$number', '$year', '$month', '$x1', '$x2', '$x3', '$x4', '$x5', '$x6', '$y1', '$y2', '$y3', '$y4', '$y5', '$y6')";
                          
                                        if (!mysql_query($sql))

                                        //$result = mysql_query($sql,$link);
                                        die("SQL ERROR");
                                                                                
                                        $sql_query = "select * from money";
                                        $result = mysql_query($sql_query) or die('MySQL query error');   

                                        header("Location: part_time.php"); 
                                                                
                                                    
                                        ?>
