<?php
include 'head_foot/qheader.php';
include 'head_foot/qsidebar.php';
?>
<style>
    .info-box-number {
        font-size: 27px!important;
    }
    label 
    {
        font-size: 17px!important;
    }
    .table > tbody > tr > td{
        border-top: 1px solid #b3020a!important;
    }
</style>
<div class="content-wrapper">
    <div class="page-title">
        <div class="col-md-3">
            <h1>Quarter's</h1>
        </div> 
    </div>
    <?php
    $result = mysql_query("select * from add_bed");
    ?>
    <div class="row">
        <div class="container-fluid">
            <div class="card" style="padding: 36px 46px 0px 46px;">
                <div class="row">
                    <h3 style="text-align: center">Quarters Dashboard</h3>
                    <table class='table table-hover' style="background: white;border: 1px solid #b3020a;">
                        <tbody>
                            <?php
                            $count = 6;
                            $s = 1;
                            while ($row = mysql_fetch_array($result)) {
                                if ($s == 1) {
                                    echo"<tr style='border-bottom: 1px solid #b3020a;    text-align: center;'>";
                                }
                                ?>
                            <td style="font-size: 17px!important;width: 12%;"><b><?php
                                    $used = "used";
                                    $flag = $row['flag'];
                                    $res = mysql_query("select * from add_quarter where code='$row[quarter_code]'");
                                    $r = mysql_fetch_array($res);
                                    if ($flag == '') {
                                        ?><span class='fa fa-home green' style="color:green!important;font-size: 31px!important;"></span><br><?php
                                        echo $r['quarter'];
                                    } elseif ($flag == $used) {
                                        ?><a href="?page=table&qtr_code=<?php echo $row[quarter_code]; ?>"><span class='fa fa-home red' style="color:red!important;font-size: 31px!important;"></a></span><br><?php
                                        echo $r['quarter'];
                                    } else {
                                        echo 'failed';
                                    }
                                    ?></b></td>
                            <?php
                            echo"</td>";
                            if ($s == $count) {
                                echo"</tr>";
                                $s = 0;
                            }
                            $s = $s + 1;
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include 'head_foot/footer.php';
?>