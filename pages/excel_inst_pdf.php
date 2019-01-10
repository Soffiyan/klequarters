<?php
error_reporting(0);
include '../Model/connect.php';

$ins = $_GET['ins'];
$deps = $_GET['deps'];
if (isset($_POST["export_excel"])) {
    $sql = "select * from quarters_reg where dep='$ins' and status='' and vacate_date=''";
    $result = mysql_query($sql);
    if ($result == true) {
        $output .= '
                <table class="table"  border="1" cellspacing="0" cellpadding="5">
                <tr style="font-size:100%">
                    <th>SI.no</th>
                    <th>Quarter</th>
                    <th>Bed</th>
                    <th>Staff Name</th>
                    <th>Department</th>
                    <th>Institute</th>
                </tr>
                
                ';
        $i = 1;
        while ($row = mysql_fetch_array($result)) {
            $r1 = mysql_query("select * from add_quarter where code='$row[quarter_no]'");
            $ra = mysql_fetch_array($r1);
            $r2 = mysql_query("select * from add_dep where code='$row[dep]'");
            $rb = mysql_fetch_array($r2);
            $department = $rb['dep'];
            $output .= '<tr>  
                          <td align="left">' . $i . '</td>  
                              
                          <td align="left">' . $ra["quarter"] . '</td>  
                          <td align="left">' . $row["bed_room"] . '</td> 
                          <td align="left">' . $row["staff_name"] . '</td>
                          <td align="left">' . $row["institute"] . '</td> 
                          <td align="left">' . $rb["dep"] . '</td>
                     </tr>  
                          ';
            $i = $i + 1;
        }
        $output .= '</table>';
        header("Content-Type: application/xls");
        $dates = date('d-m-Y');
        header("Content-Disposition: attachment; filename=$department-Institute-$dates.xls");
        echo $output;
    }
}
