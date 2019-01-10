<link rel="stylesheet" type = "text/css" href="view/css/print.css"/>
<?php
error_reporting(0);
include'../Model/connect.php';
include 'head_foot/header.php';
include 'head_foot/leftside.php';


if (isset($_POST['stepp'])) {
    $step = $_POST['stepp'];
    $particular_code = $_POST['particular_code'];
    $payment = 'paid';

    if ($step == 'one') {
        $condition = "`particulars`='$particular_code' and `payment`='$payment'";
    }
    $result1 = mysql_query("Select * from `registration` where $condition order by id desc");

    $result = mysql_query("SELECT SUM(total) AS value_sum FROM registration  where `particulars`='$particular_code' and `payment`='paid'");
    $rowss = mysql_fetch_assoc($result);
    $sum = $rowss['value_sum'];

    $res = mysql_query("select data from reportdata");
    $rowz = mysql_fetch_array($res)
    ?>


    <div class="container-fluid">
        <div class="clearfix"></div>
        <br>

        <div class='row'>
            <div class='col-lg-4'>
                <img src="upload/1493879640e1dd6f27bdeb6b07dadce36b11ee6633.png" width="75px" height="75"> 
            </div>
            <div class='col-lg-4'>
                <center><b><h1 style="font-size: 20px; display: block;line-height: 1.5em;"><?php echo "$rowz[data]" ?><h1 style="font-size: 20px; display: block">Quarters / Particulars Report</h1></h2></b></center>
            </div>

            <script src = "view/js/print.js"></script>
            <div class="col-lg-4" style="text-align: left">
                <div class="col-xs-12 text-right"><a class="btn btn-primary" id="hidden-print" onclick = "myFunction();" href="javascript:window.print();" target="_blank"><i class="fa fa-print"></i> Print</a></div>
            </div>
        </div>
        <hr>
        <div id="page-wrap">  
            <table class="table table-hover table-bordered" id="">
                <tr>
                    <th>Challan-No</th>
                    <th>Name</th>
                    <th>Particulars</th>
                    <th>Quarters</th>
                    <th>Electricity</th>
                    <th>Water</th>
                    <th>Maintanence</th>
                    <th>Fine</th>
                    <th>Mess</th>
                    <th>Shop</th>
                    <th>Service</th>
                    <th>Deposit</th>
                    <th>Miss</th>
                    <th>total</th>
                    <th>Pay-Date</th>
                </tr>
                <tbody>
                    <?php
                    $i = 1;
                    while ($row = mysql_fetch_array($result1)) {
                        ?>   

                        <tr>
                            <td><?php echo $row[challanno] ?></td>
                            <td><?php echo $row[name] ?></td>
                            <td><?php echo $row[particulars_name] ?></td>
                            <td><?php echo $row[quarters_rent] ?></td>
                            <td><?php echo $row[elect_charges] ?></td>
                            <td><?php echo $row[water_charges] ?></td>
                            <td><?php echo $row[maint] ?></td>
                            <td><?php echo $row[fine] ?></td>
                            <td><?php echo $row[mess_rent] ?></td>
                            <td><?php echo $row[shop_rent] ?></td>
                            <td><?php echo $row[service_tax] ?></td>
                            <td><?php echo $row[deposit] ?></td>
                            <td><?php echo $row[miscellaneous] ?></td>
                            <td><?php echo $row[total] ?></td>
                            <td><?php echo $row[payment_date] ?></td>
                        </tr>

                        <?php
                        $i = $i + 1;
                    }
                    ?>
                </tbody>
            </table>
            <label><h4>Total Amount = <?php echo "$sum"; ?></h4></label> 
        </div>
    </div>
    <?php
}
?>

