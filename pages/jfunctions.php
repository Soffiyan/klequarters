<?php
error_reporting(0);
include 'wordfun.php';
include'../Model/connect.php';
if (isset($_POST['get_pcode'])) {
    $get_pcode = $_POST['get_pcode'];
    $qry = mysql_query("select * from add_particulars where particular_code='$get_pcode'") or die(mysql_error());
    while ($row = mysql_fetch_array($qry)) {
        $rm = $row['bal'];
        ?>
        <option value="<?php echo $row['particular']; ?>"><?php echo $row['particular']; ?></option>	
        <?php
    }
}

if (isset($_POST['from'])) {
    $from = $_POST['from'];
    $to = $_POST['to'];
    $from1 = strtotime($from);
    $tos = strtotime($to);
    $date_diff = ($tos - strtotime($from)) / 86400;
    $dayss = round($date_diff, 0);
    echo $dayss;
}
if (isset($_POST['quart'])) {
    $quart_code = $_POST['quart'];
    $qry = mysql_query("select * from add_bed where quarter_code='$quart_code'") or die(mysql_error());
    while ($row = mysql_fetch_array($qry)) {
        ?>
        <option value="<?php echo $row['bed']; ?>"><?php echo $row['bed']; ?></option>	
        <?php
    }
}
if (isset($_POST['quarters'])) {
    $quart_code = $_POST['quarters'];
    $qry = mysql_query("select * from quarters_reg where quarter_no='$quart_code'  and status=''  and vacate_date=''") or die(mysql_error());
    while ($row = mysql_fetch_array($qry)) {
        ?>
        <option value="<?php echo $row['staff_name']; ?>"><?php echo $row['staff_name']; ?></option>	
        <?php
    }
}
if (isset($_POST['quarter'])) {
    $quart_code = $_POST['quarter'];
    $qry = mysql_query("select * from quarters_reg where quarter_no='$quart_code'  and status=''  and vacate_date=''") or die(mysql_error());
    while ($row = mysql_fetch_array($qry)) {
        ?>
        <option value="<?php echo $row['refno']; ?>"><?php echo $row['refno']; ?></option>	
        <?php
    }
}
if (isset($_POST['inst'])) {
    $quart = $_POST['inst'];
    $qry = mysql_query("select * from quarters_reg where quarter_no='$quart' and status='' and vacate_date=''") or die(mysql_error());
    while ($row = mysql_fetch_array($qry)) {
        ?>
        <option value="<?php echo $row['dep']; ?>"><?php echo $row['dep']; ?></option>	
        <?php
    }
}
if (isset($_POST['year'])) {
    $month = $_POST['month'];
    $refno = $_POST['refno'];
    $year = $_POST['year'];
    $qry = mysql_query("select * from update_qtr where refno='$refno' and month='$month' and year='$year'") or die(mysql_error());
    $row = mysql_fetch_array($qry);
    if ($row == true) {
        echo "Payment Has Already Done For This Month And year";
    } else {
        echo "";
    }
}

if (isset($_POST['quarterss'])) {
    $quart_code = $_POST['quarterss'];
    $qry = mysql_query("select * from quarters_reg where quarter_no='$quart_code' and status='' and vacate_date=''") or die(mysql_error());
    while ($row = mysql_fetch_array($qry)) {
        /* $rm = $row['quarter_no'];
          $sel_id = mysql_query("SELECT refno FROM `quarters_reg` where quarter_no='$rm' and status='' and vacate_date=''");
          $row_id = mysql_fetch_array($sel_id); */
        ?>
        <option value="<?php echo $row['refno']; ?>"><?php echo $row['staff_name']; ?></option>	
        <?php
    }
}
if (isset($_POST['bed'])) {
    $quart_code = $_POST['bed'];
    $qry = mysql_query("select * from quarters_reg where quarter_no='$quart_code' and status='' and vacate_date=''") or die(mysql_error());
    while ($row = mysql_fetch_array($qry)) {
        /* $rm = $row['quarter_no'];
          $sel_id = mysql_query("SELECT refno FROM `quarters_reg` where quarter_no='$rm' and status='' and vacate_date=''");
          $row_id = mysql_fetch_array($sel_id); */
        ?>
        <option value="<?php echo $row['bed_room']; ?>"><?php echo $row['bed_room']; ?></option>	
        <?php
    }
}
if (isset($_POST['name'])) {
    $quart_code = $_POST['name'];
    $qry = mysql_query("select * from quarters_reg where quarter_no='$quart_code' and status='' and vacate_date=''") or die(mysql_error());
    while ($row = mysql_fetch_array($qry)) {
        /* $rm = $row['quarter_no'];
          $sel_id = mysql_query("SELECT refno FROM `quarters_reg` where quarter_no='$rm' and status='' and vacate_date=''");
          $row_id = mysql_fetch_array($sel_id); */
        ?>
        <option value="<?php echo $row['staff_name']; ?>"><?php echo $row['staff_name']; ?></option>	
        <?php
    }
}
if (isset($_POST['get_new_bed'])) {
    $quart_code = $_POST['get_new_bed'];
    $qry = mysql_query("select * from add_bed where quarter_code='$quart_code' and flag=''") or die(mysql_error());
    while ($row = mysql_fetch_array($qry)) {
        /* $rm = $row['quarter_no'];
          $sel_id = mysql_query("SELECT refno FROM `quarters_reg` where quarter_no='$rm' and status='' and vacate_date=''");
          $row_id = mysql_fetch_array($sel_id); */
        ?>
        <option value="<?php echo $row['bed']; ?>"><?php echo $row['bed']; ?></option>	
        <?php
    }
}
if (isset($_POST['ins'])) {
    $quart_code = $_POST['ins'];
    $qry = mysql_query("select * from quarters_reg where quarter_no='$quart_code' and status='' and vacate_date=''") or die(mysql_error());
    while ($row = mysql_fetch_array($qry)) {
        /* $rm = $row['quarter_no'];
          $sel_id = mysql_query("SELECT refno FROM `quarters_reg` where quarter_no='$rm' and status='' and vacate_date=''");
          $row_id = mysql_fetch_array($sel_id); */
        ?>
        <option value="<?php echo $row['institute']; ?>"><?php echo $row['institute']; ?></option>	
        <?php
    }
}
if (isset($_POST['dep'])) {
    $quart_code = $_POST['dep'];
    $qry = mysql_query("select * from quarters_reg where quarter_no='$quart_code' and status='' and vacate_date=''") or die(mysql_error());
    while ($row = mysql_fetch_array($qry)) {
        $rm = $row['dep'];
        /* $sel_id = mysql_query("SELECT refno FROM `quarters_reg` where quarter_no='$rm' and status='' and vacate_date=''");
          $row_id = mysql_fetch_array($sel_id); */
        $res = mysql_query("select * from add_dep where code ='$rm'");
        $r = mysql_fetch_array($res);
        ?>
        <option value="<?php echo $row['dep']; ?>"><?php echo $r['dep']; ?></option>	
        <?php
    }
}
if (isset($_POST['to_date'])) {
    error_reporting(0);
    $from_date = $_POST['from_date'];
    $to_date = $_POST['to_date'];
    $f_date = DateTime::createFromFormat('Y-m-d', $from_date)->format('d-m-Y');
    $t_date = DateTime::createFromFormat('Y-m-d', $to_date)->format('d-m-Y');
    $result = mysql_query("select * from quarters_reg where `vacate_date` between '$from_date' and '$to_date'");
    ?>  

    <div class="box-body table-responsive no-padding">
        <div class="col-md-12" style="text-align:center;"><label style="font-size: 22px!important;">Vacate Report From : <?php echo $f_date ?> - To : <?php echo $t_date ?></label></div>
        <table class="table table-hover" id="tab"  style='border: 1px solid #e1d3d3;'>
            <thead>
                <tr>
                    <th>SI.no</th>
                    <th>Quarter</th>
                    <th>Bed</th>
                    <th>Staff Name</th>
                    <th>Dep</th>
                    <th>Institute</th>
                    <th>Vacate Date</th>
                    <th class="row hidden-print mt-20">Payment's</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 1;
                while ($row = mysql_fetch_array($result)) {
                    ?>
                    <tr>
                        <td><?php echo $i ?></td>
                        <?php
                        $r1 = mysql_query("select * from add_quarter where code='$row[quarter_no]'");
                        $ra = mysql_fetch_array($r1);
                        ?>
                        <td><?php echo $ra[quarter] ?></td>
                        <td><?php echo $row[bed_room] ?></td>
                        <td><?php echo $row[staff_name] ?></td>
                        <td><?php echo $row[institute] ?></td>
                        <?php
                        $r2 = mysql_query("select * from add_dep where code='$row[dep]'");
                        $rb = mysql_fetch_array($r2);
                        ?>
                        <td><?php echo $rb[dep] ?></td>
                        <?php
                        $vacate_date = DateTime::createFromFormat('Y-m-d', $row[vacate_date])->format('d-m-Y');
                        ?>
                        <td><?php echo $vacate_date ?></td>
                        <td class="row hidden-print mt-20">
                            <a class="bg-blue" style="color: white;padding: 6px 18px 6px 18px; border-radius: 4px; border: 1px solid #b3020a; background-color: #b3020a !important;" title="update" href='?page=paydet&refno=<?php echo $row[refno]; ?>'>All Pay's</a>    
                        </td>
                    </tr>
                    <?php
                    $i = $i + 1;
                }
                ?>
            </tbody>
        </table>
        <script>
            var $rows = $('#tab tr');
            $('#myInput').keyup(function () {
                var val = $.trim($(this).val()).replace(/ +/g, ' ').toLowerCase();
                $rows.show().filter(function () {
                    var text = $(this).text().replace(/\s+/g, ' ').toLowerCase();
                    return !~text.indexOf(val);
                }).hide();
            });
        </script>
    </div>

    <?php
}

if (isset($_POST['shift_to_date'])) {
    error_reporting(0);
    $from_date = $_POST['from_date'];
    $to_date = $_POST['shift_to_date'];
    $f_date = DateTime::createFromFormat('Y-m-d', $from_date)->format('d-m-Y');
    $t_date = DateTime::createFromFormat('Y-m-d', $to_date)->format('d-m-Y');
    $result = mysql_query("select * from shift where `shifting_date` between '$from_date' and '$to_date'");
    ?>  

    <div class="box-body table-responsive no-padding">
        <div class="col-md-12" style="text-align:center;"><label style="font-size: 22px!important;">Shifting Report From : <?php echo $f_date ?> - To : <?php echo $t_date ?></label></div>
        <table class="table table-hover" id="tab"  style='border: 1px solid #e1d3d3;'>

            <thead>
                <tr>
                    <th>SI.no</th>
                    <th>Doc No</th>
                    <th>Old Qtr</th>
                    <th>Old Bed</th>
                    <th>New Qtr</th>
                    <th>New Bed</th>
                    <th>Staff Name</th>
                    <th>Institue</th>
                    <th>Dep</th>
                    <th>Shifting Date</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 1;
                while ($row = mysql_fetch_array($result)) {
                    ?>
                    <tr>
                        <td><?php echo $i ?></td>
                        <td><?php echo $row[challanno] ?></td>
                        <?php
                        $r1 = mysql_query("select * from add_quarter where code='$row[old_quarter]'");
                        $ra = mysql_fetch_array($r1);
                        ?>
                        <td><?php echo $ra[quarter] ?></td>
                        <td><?php echo $row[old_bed] ?></td>
                        <?php
                        $r3 = mysql_query("select * from add_quarter where code='$row[new_quarter]'");
                        $ra1 = mysql_fetch_array($r3);
                        ?>
                        <td><?php echo $ra1[quarter] ?></td>
                        <td><?php echo $row[new_bed] ?></td>
                        <td><?php echo $row[staff_name] ?></td>
                        <td><?php echo $row[institue] ?></td>
                        <?php
                        $r2 = mysql_query("select * from add_dep where code='$row[dep]'");
                        $rb = mysql_fetch_array($r2);
                        ?>
                        <td><?php echo $rb[dep] ?></td>
                        <?php
                        $s_date = DateTime::createFromFormat('Y-m-d', $row[shifting_date])->format('d-m-Y');
                        ?>
                        <td><?php echo $s_date ?></td>
                    </tr>
                    <?php
                    $i = $i + 1;
                }
                ?>
            </tbody>
        </table>
        <script>
            var $rows = $('#tab tr');
            $('#myInput').keyup(function () {
                var val = $.trim($(this).val()).replace(/ +/g, ' ').toLowerCase();
                $rows.show().filter(function () {
                    var text = $(this).text().replace(/\s+/g, ' ').toLowerCase();
                    return !~text.indexOf(val);
                }).hide();
            });
        </script>
    </div>

    <?php
}

if (isset($_POST['inst_report'])) {
    $institute = $_POST['inst_report'];
    $result = mysql_query("select * from quarters_reg where dep='$institute' and status='' and vacate_date=''");
    $re = mysql_query("select * from add_dep where code='$institute'");
    $rss = mysql_fetch_array($re);
    $deps = $rss["dep"];
    ?>
    <div class="box-body table-responsive no-padding">
        <div class="col-md-12"  style="text-align:center;BORDER: 2PX SOLID #920b11; PADDING: 12PX;"><label style="font-size: 22px!important;">( <?php echo $rss[dep]; ?> ) Institute Wise Report</label>
            <form method="post" action="pages/inst_pdf.php?ins=<?php echo"$institute"; ?>&deps=<?php echo $deps ?>" style="position: relative">
                <input type="submit" style="position: absolute; left: 5px; bottom: 5px;" name="create_pdf" class="btn btn-primary prim" value="Generate Report" />  
            </form> 
            <form method="post" action="pages/excel_inst_pdf.php?ins=<?php echo"$institute"; ?>&deps=<?php echo $deps ?>" style="position: relative">
                <input type="submit" style="position: absolute; right: 7px; bottom: 18px;" name="export_excel" class="btn btn-primary prim" value="Import Excel" />  
            </form> 
            <table class="table table-hover" id="sampleTable" style='border: 1px solid #e1d3d3;'>

                <thead>
                    <tr>
                        <th>SI.no</th>
                        <th>Quarter</th>
                        <th>Bed</th>
                        <th>Staff Name</th>
                        <th>Department</th>
                        <th>Institute</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    $i = 1;
                    while ($row = mysql_fetch_array($result)) {
                        ?>

                        <tr>
                            <td><?php echo $i ?></td>
                            <?php
                            $r1 = mysql_query("select * from add_quarter where code='$row[quarter_no]'");
                            $ra = mysql_fetch_array($r1);
                            ?>
                            <td><?php echo $ra[quarter] ?></td>
                            <td><?php echo $row[bed_room] ?></td>
                            <td><?php echo $row[staff_name] ?></td>
                            <td><?php echo $row[institute] ?></td>
                            <?php
                            $r2 = mysql_query("select * from add_dep where code='$row[dep]'");
                            $rb = mysql_fetch_array($r2);
                            ?>
                            <td><?php echo $rb[dep] ?></td>                     
                        </tr>
                        <?php
                        $i = $i + 1;
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <?php
}

if (isset($_POST['pay_to_date'])) {
    error_reporting(0);
    $from_date = $_POST['from_date'];
    $to_date = $_POST['pay_to_date'];
    $f_date = DateTime::createFromFormat('Y-m-d', $from_date)->format('d-m-Y');
    $t_date = DateTime::createFromFormat('Y-m-d', $to_date)->format('d-m-Y');
    $result = mysql_query("select * from update_qtr where `payment_date` between '$from_date' and '$to_date' and status='' and vacate_date=''");
    $result1 = mysql_query("SELECT SUM(amount) AS value_sum FROM update_qtr  where `payment_date` between '$from_date' and '$to_date' and status='' and vacate_date=''");
    $rowss = mysql_fetch_assoc($result1);
    $sum = $rowss['value_sum'];
    ?>  
    <div class="box-body table-responsive no-padding">
        <div class="col-md-12" style="text-align:center;"><label style="font-size: 22px!important;">Payment Report From : <?php echo $f_date ?> - To : <?php echo $t_date ?></label></div>

        <form method="post" action="pages/pay_pdf.php?from=<?php echo"$from_date"; ?>&to=<?php echo $to_date ?>&sum=<?php echo $sum ?>">
            <input type="submit" name="create_pdf" class="btn btn-primary prim" value="Generate Report" />  
        </form> 

        <table class="table table-hover" style='border: 1px solid #e1d3d3;'>

            <thead>
                <tr>
                    <th>SI.no</th>
                    <th>Name</th>
                    <th>Quarter</th>
                    <th>Month</th>
                    <th>Year</th>
                    <th>Amount</th>
                    <th>Institute</th>
                    <th>Payment Date</th>
                </tr>
            </thead>

            <tbody>
                <?php
                $i = 1;
                while ($row = mysql_fetch_array($result)) {
                    ?>

                    <tr>
                        <td><?php echo $i ?></td>
                        <td><?php echo $row[name] ?></td>
                        <?php
                        $r1 = mysql_query("select * from add_quarter where code='$row[quarter_code]'");
                        $ra = mysql_fetch_array($r1);
                        ?>
                        <td><?php echo $ra[quarter] ?></td>
                        <td><?php echo $row[month] ?></td>
                        <td><?php echo $row[year] ?></td>
                        <td><?php echo $row[amount] ?></td>
                        <?php
                        $r2 = mysql_query("select * from add_dep where code='$row[institute]'");
                        $rb = mysql_fetch_array($r2);
                        ?>
                        <td><?php echo $rb[dep] ?></td>  

                        <?php
                        $p_date = DateTime::createFromFormat('Y-m-d', $row[payment_date])->format('d-m-Y');
                        ?>
                        <td><?php echo $p_date ?></td>                    
                    </tr>
                    <?php
                    $i = $i + 1;
                }
                ?>
            </tbody>
        </table>
        <label style='border-radius: 6px;border: 1px solid #c9c9c9; padding: 0px 10px 0px 13px;box-shadow: 0 2px 2px 0 rgba(0, 0, 0, 0.14), 0 1px 5px 0 rgba(0, 0, 0, 0.12), 0 3px 1px -2px rgba(0, 0, 0, 0.2);'><h4>Total Amount = <?php echo "$sum"; ?> <br><br> <div class='bg-blue' style='background-color: #920b11 !important; width: 100%!important; padding: 5px!important; color: white!important; border-radius: 5px!important;'><?php echo getIndianCurrency($sum); ?></div></h4></label> 
    </div>


    <?php
}

if (isset($_POST['get_pay_report'])) {
    error_reporting(0);
    $dep = $_POST['get_pay_report'];

    $result = mysql_query("select * from update_qtr where `institute` = '$dep' and status='' and vacate_date=''");
    $result1 = mysql_query("SELECT SUM(amount) AS value_sum FROM update_qtr  where `institute` = '$dep' and status='' and vacate_date=''");
    $rowss = mysql_fetch_assoc($result1);
    $sum = $rowss['value_sum'];

    $re = mysql_query("select * from add_dep where code='$dep'");
    $rss = mysql_fetch_array($re);
    ?>  
    <div class="box-body table-responsive no-padding">
        <div class="col-md-12" style="text-align:center;"><label style="font-size: 22px!important;">( <?php echo $rss[dep]; ?> ) Intitute Wise Payment Report </label></div>

        <form method="post" action="pages/pay_ins_pdf.php?dep=<?php echo"$dep"; ?>&sum=<?php echo $sum ?>">
            <input type="submit" name="create_pdf" class="btn btn-primary prim" value="Generate Report" />  
        </form>

        <table class="table table-hover" style='border: 1px solid #e1d3d3;'>

            <thead>
                <tr>
                    <th>SI.no</th>
                    <th>Name</th>
                    <th>Quarter</th>
                    <th>Month</th>
                    <th>Year</th>
                    <th>Amount</th>
                    <th>Payment Date</th>
                    <th>Institute</th>
                </tr>
            </thead>

            <tbody>
                <?php
                $i = 1;
                while ($row = mysql_fetch_array($result)) {
                    ?>

                    <tr>
                        <td><?php echo $i ?></td>
                        <td><?php echo $row[name] ?></td>
                        <?php
                        $r1 = mysql_query("select * from add_quarter where code='$row[quarter_code]'");
                        $ra = mysql_fetch_array($r1);
                        ?>
                        <td><?php echo $ra[quarter] ?></td>
                        <td><?php echo $row[month] ?></td>
                        <td><?php echo $row[year] ?></td>
                        <td><?php echo $row[amount] ?></td>
                        <?php
                        $p_date = DateTime::createFromFormat('Y-m-d', $row[payment_date])->format('d-m-Y');
                        ?>
                        <td><?php echo $p_date ?></td> 
                        <?php
                        $r2 = mysql_query("select * from add_dep where code='$row[institute]'");
                        $rb = mysql_fetch_array($r2);
                        ?>
                        <td><?php echo $rb[dep] ?></td>   
                    </tr>
                    <?php
                    $i = $i + 1;
                }
                ?>
            </tbody>
        </table>
        <label style='border-radius: 6px;border: 1px solid #c9c9c9; padding: 0px 10px 0px 13px;box-shadow: 0 2px 2px 0 rgba(0, 0, 0, 0.14), 0 1px 5px 0 rgba(0, 0, 0, 0.12), 0 3px 1px -2px rgba(0, 0, 0, 0.2);'><h4>Total Amount = <?php echo "$sum"; ?> <br><br> <div class='bg-blue' style='background-color: #920b11 !important; width: 100%!important; padding: 5px!important; color: white!important; border-radius: 5px!important;'><?php echo getIndianCurrency($sum); ?></div></h4></label> 
    </div>


    <?php
}
if (isset($_POST['get_stat'])) {
    $status = $_POST['get_stat'];
    $result = mysql_query("select * from add_bed where flag='$status'");
    $sr = mysql_query("select * from add_bed where flag='$status'");
    if ($status == 'all') {
        $r = mysql_query("select * from add_bed");
        ?>
        <div class = "box-body table-responsive no-padding">
            <div class = "col-md-12" style = "text-align:center;"><label style = "font-size: 22px!important;">Quarter Status Report</label></div>

            <form method = "post" action = "pages/qts_pdf.php?status=<?php echo"$status"; ?>">
                <input type = "submit" name = "create_pdf" class = "btn btn-primary prim" value = "Generate Report" />
            </form>
             <form method="post" action="pages/excel_qts_pdf.php?status=<?php echo"$status"; ?>" style="position: relative">
                <input type="submit" style="position: absolute; right: 2px; bottom: 15px;" name="export_excel" class="btn btn-primary prim" value="Import Excel" />  
            </form> 

            <table class = "table table-hover" style = 'border: 1px solid #e1d3d3;'>

                <thead>
                    <tr>
                        <th width="10%">SI.no</th>
                        <th width="15%">Quarter</th>
                        <th width="10%">Bed</th>                    
                        <th width="20%">Name</th>
                        <th width="15%">Institute</th>
                        <th width="15%">Dep</th>
                        <th width="25%">Status</th>

                    </tr>
                </thead>

                <tbody>
                    <?php
                    $i = 1;
                    while ($rows = mysql_fetch_array($r)) {
                        ?>

                        <tr>
                            <td><?php echo $i ?></td>                        
                            <?php
                            $r1s = mysql_query("select * from add_quarter where code='$rows[quarter_code]'");
                            $ras = mysql_fetch_array($r1s);
                            ?>
                            <td><?php echo $ras[quarter] ?></td>
                            <td><?php echo $rows[bed] ?></td>
                            <?php
                            $r2s = mysql_query("select * from quarters_reg where quarter_no='$rows[quarter_code]' and status='' and vacate_date=''");
                            $rbs = mysql_fetch_array($r2s);
                            ?>                        
                            <td><?php echo $rbs[staff_name] ?></td>                        
                            <?php
                            $r3s = mysql_query("select * from add_dep where code='$rbs[dep]'");
                            $rcs = mysql_fetch_array($r3s);
                            ?>                        
                            <td><?php echo $rcs[dep] ?></td>
                            <td><?php echo $rbs[institute] ?></td>
                            <?php
                            if ($rows[flag] == 'used') {
                                echo "<td><span class='bg-blue' style='background-color: #920b11 !important; width: 100%; padding: 0px 20px 2px 20px; color: white; border-radius: 3px;'>Alloted</span></td>";
                            } else {
                                echo "<td><span class='bg-blue' style='background-color: green !important; width: 100%; padding: 0px 20px 2px 20px; color: white; border-radius: 3px;'>Not-Allot</span></td></td>";
                            }
                            ?>
                        </tr>
                        <?php
                        $i = $i + 1;
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <?php
    } elseif ($status == '' or $status == 'used') {
        ?>
        <div class="box-body table-responsive no-padding">
            <div class="col-md-12" style="text-align:center;"><label style="font-size: 22px!important;">Quarter Status Report</label></div>

            <form method="post" action="pages/qts_pdf.php?status=<?php echo"$status"; ?>">
                <input type="submit" name="create_pdf" class="btn btn-primary prim" value="Generate Report" />  
            </form>

            <table class="table table-hover" style='border: 1px solid #e1d3d3;'>

                <thead>
                    <tr>
                        <th width="10%">SI.no</th>
                        <th width="15%">Quarter</th>
                        <th width="10%">Bed</th>                    
                        <th width="20%">Name</th>
                        <th width="15%">Institute</th>
                        <th width="15%">Dep</th>
                        <th width="25%">Status</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    $i = 1;
                    while ($row = mysql_fetch_array($result)) {
                        ?>

                        <tr>
                            <td><?php echo $i ?></td>                        
                            <?php
                            $r1 = mysql_query("select * from add_quarter where code='$row[quarter_code]'");
                            $ra = mysql_fetch_array($r1);
                            ?>
                            <td><?php echo $ra[quarter] ?></td>
                            <td><?php echo $row[bed] ?></td>
                            <?php
                            $r2 = mysql_query("select * from quarters_reg where quarter_no='$row[quarter_code]' and status='' and vacate_date=''");
                            $rb = mysql_fetch_array($r2);
                            ?>                        
                            <td><?php echo $rb[staff_name] ?></td>                        
                            <?php
                            $r3 = mysql_query("select * from add_dep where code='$rb[dep]'");
                            $rc = mysql_fetch_array($r3);
                            ?>                        
                            <td><?php echo $rc[dep] ?></td>
                            <td><?php echo $rb[institute] ?></td>
                            <?php
                            if ($row[flag] == 'used') {
                                echo "<td><span class='bg-blue' style='background-color: #920b11 !important; width: 100%; padding: 0px 20px 2px 20px; color: white; border-radius: 3px;'>Alloted</span></td>";
                            } else {
                                echo "<td><span class='bg-blue' style='background-color: green !important; width: 100%; padding: 0px 20px 2px 20px; color: white; border-radius: 3px;'>Not-Allot</span></td>";
                            }
                            ?>
                        </tr>
                        <?php
                        $i = $i + 1;
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <?php
    }
}
if (isset($_POST['get_dm'])) {
    error_reporting(0);
    $month = $_POST['month'];
    $year = $_POST['get_dm'];

    $result = mysql_query("select * from update_qtr where `month` = '$month' and year='$year' and status='' and vacate_date=''");
    $result1 = mysql_query("SELECT SUM(amount) AS value_sum FROM update_qtr where `month` = '$month' and year='$year' and status='' and vacate_date=''");
    $rowss = mysql_fetch_assoc($result1);
    $sum = $rowss['value_sum'];
    ?>
    <div class = "box-body table-responsive no-padding">
        <div class = "col-md-12" style = "text-align:center;"><label style = "font-size: 22px!important;">Payment Report <br> <?php echo $month
    ?>&nbsp;-&nbsp;<?php echo $year ?></label></div>

        <form method="post" action="pages/get_dm_pdf.php?month=<?php echo"$month"; ?>&year=<?php echo $year ?>&sum=<?php echo $sum ?>">
            <input type="submit" name="create_pdf" class="btn btn-primary prim" value="Generate Report" />  
        </form>

        <table class="table table-hover" style='border: 1px solid #e1d3d3;'>

            <thead>
                <tr>
                    <th>SI.no</th>
                    <th>Name</th>
                    <th>Quarter</th>
                    <th>Month</th>
                    <th>Year</th>
                    <th>Amount</th>
                    <th>Institute</th>
                    <th>Payment Date</th>
                </tr>
            </thead>

            <tbody>
                <?php
                $i = 1;
                while ($row = mysql_fetch_array($result)) {
                    ?>

                    <tr>
                        <td><?php echo $i ?></td>
                        <td><?php echo $row[name] ?></td>
                        <?php
                        $r1 = mysql_query("select * from add_quarter where code='$row[quarter_code]'");
                        $ra = mysql_fetch_array($r1);
                        ?>
                        <td><?php echo $ra[quarter] ?></td>
                        <td><?php echo $row[month] ?></td>
                        <td><?php echo $row[year] ?></td>
                        <td><?php echo $row[amount] ?></td>
                        <?php
                        $r2 = mysql_query("select * from add_dep where code='$row[institute]'");
                        $rb = mysql_fetch_array($r2);
                        ?>
                        <td><?php echo $rb[dep] ?></td>  

                        <?php
                        $p_date = DateTime::createFromFormat('Y-m-d', $row[payment_date])->format('d-m-Y');
                        ?>
                        <td><?php echo $p_date ?></td>                    
                    </tr>
                    <?php
                    $i = $i + 1;
                }
                ?>
            </tbody>
        </table>
        <label style='border-radius: 6px;border: 1px solid #c9c9c9; padding: 0px 10px 0px 13px;box-shadow: 0 2px 2px 0 rgba(0, 0, 0, 0.14), 0 1px 5px 0 rgba(0, 0, 0, 0.12), 0 3px 1px -2px rgba(0, 0, 0, 0.2);'><h4>Total Amount = <?php echo "$sum"; ?> <br><br> <div class='bg-blue' style='background-color: #920b11 !important; width: 100%!important; padding: 5px!important; color: white!important; border-radius: 5px!important;'><?php echo getIndianCurrency($sum); ?></div></h4></label> 
    </div>


    <?php
}
?>

