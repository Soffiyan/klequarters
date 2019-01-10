<?php
include 'head_foot/header.php';
include 'head_foot/leftside.php';
include 'wordfun.php';
?>
<?php
$query = mysql_query("select * from `registration` where payment='paid' order by id desc");
$result = mysql_query("SELECT SUM(quarters_rent) AS value_sum FROM registration  where payment='paid'");
$rowss = mysql_fetch_assoc($result);
$sum = $rowss['value_sum'];
$q1 = mysql_query("select * from add_particulars where particular_code='$row[particulars]'");
?>
<style>
    .col-lg-4{
        padding-left: 0px!important;
    }
</style>
<div class="content-wrapper">
    <div class="page-title">
        <div>
            <h1>Quarters Report</h1>
        </div> 
        <form method="post" action="pages/qtrpdf.php?sum=<?php echo"$sum"; ?>">
            <input type="submit" name="create_pdf" class="btn btn-primary" value="Generate Report" />  
            <a href="?page=feesreport" class='btn btn-primary prim'>Back</a>
        </form>
    </div>
    <div class="row">
        <div class="container-fluid">
            <div class="card">
                <fieldset>
                    <form name = "form" onsubmit="return validation()" method = "post" action="?page=qtrsreport&action=add"  enctype="multipart/form-data" >

                        <div class="col-lg-4">
                            <div class="form-group" id ="hidden-print">
                                <label>From:</label>
                                <div class="input-group date">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" placeholder="DD-MM-YYYY" id="demoDate"  name="from_date" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group" id ="hidden-print">
                                <label>To:</label>
                                <div class="input-group date">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>

                                    <input type="text" placeholder="DD-MM-YYYY" id="demoDate1" name="to_date" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4"style="margin-top: 7px;">
                            <br>
                            <input type='submit' id="hidden-print" value='GET-DETAILS' class='btn btn-primary prim'>

                        </div>


                    </form>

                    <table class="table table-hover table-bordered" id="">

                        <thead>
                            <tr>
                                <th>SI.no</th>
                                <th>Challan-No</th>
                                <th>Name</th>
                                <th>Particulars</th>
                                <th>Payment Date</th>
                                <th>From</th>
                                <th>To</th>
                                <th>Quarters-Fees</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            while ($row = mysql_fetch_array($query)) {
                                ?>
                                <tr>
                                    <td><?php echo $i ?></td>
                                    <td><?php echo $row[challanno] ?></td>
                                    <td><?php echo $row[name] ?></td>
                                    <?php
                                    $q1 = mysql_query("select * from add_particulars where particular_code='$row[particulars]'");
                                    $rose = mysql_fetch_array($q1);
                                    ?>
                                    <td><?php echo $rose[particular] ?></td>
                                    <td><?php echo $row[payment_date] ?></td>
                                    <td><?php echo $row[from1] ?></td>
                                    <td><?php echo $row[to1] ?></td>
                                    <td><?php echo $row[quarters_rent] ?></td>
                                </tr>
                                <?php
                                $i = $i + 1;
                            }
                            ?>
                        </tbody>
                    </table>
                    <label><h4>Total Amount = <?php echo "$sum"; ?></h4></label><br>
                    <label><h4>In Words = <?php echo getIndianCurrency($sum) ?></h4></label>
                </fieldset>
            </div>
        </div>
    </div>
</div>
<?php
include 'head_foot/footer.php';
?>
