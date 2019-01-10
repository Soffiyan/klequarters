<?php
include 'head_foot/header.php';
include 'head_foot/leftside.php';
include 'wordfun.php';
$cno = $_GET['cno'];
$result = mysql_query("select * from registration where challanno = '$cno'");
$row = mysql_fetch_array($result);
$sum = $row[total];
?>
<br><br>
<style>
    body table tr th{
        font-size: 12px!important;
    }
    
    table, th, td {
        border: 1px solid black;
        border-collapse: collapse;
        font-size:12px;
    }
    th, td {
        padding: 5px;
        text-align: left;    
    }
    table
    {
        margin:0 5px;
    }
</style>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <section class="invoice">
                <div class="row invoice-info">
                    <div class="row hidden-print mt-20">
                        <div class="col-xs-12 text-right"><a class="btn btn-primary" href="javascript:window.print();" target="_blank"><i class="fa fa-print"></i> Print</a></div>

                    </div>
                    <form name = "form" action = "" enctype="multipart/form-data">

                        <table style="width: 24%; float: left">
                            <thead>
                                <tr>
                                    <th style="text-align: center;font-size: 16px;" colspan="6">KLES Hostels & Residential Quarters<br>JNMC Campus Belgavi - 590010<br>Demand Notice (Office-use)</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th colspan="3" style="text-align: left;    border-right-color: white;">SI No : <?php echo "$row[challanno]" ?><br><br> Recieved From : <?php echo "$row[name]" ?></th>
                                    <th colspan="3" style="text-align: right">Date : <?php echo "$row[abdate]" ?><br><br> Quarters Number :<?php echo "$row[particulars_name]" ?></th> 
                                </tr>
                                <tr>
                                    <th colspan="3" style="text-align: center;font-size: 16px;"><b>Particulars</b></th>
                                    <th colspan="1" style="text-align: center;font-size: 16px;"><b>Amount</b></th> 
                                </tr>
                                <tr>
                                    <th colspan="2" style="">1.&nbsp;Qtrs Rent <br><br>2.&nbsp; Elect Charges <br><br>3.&nbsp; Water Charges<br><br>4.&nbsp;Maintenance<br><br>5.&nbsp;Fine<br><br>6. &nbsp;Service Tax<br><br>7. &nbsp;Mess Rent<br><br>8. Shop Rent<br><br>9. &nbsp;Deposit <br><br> 10.&nbsp; Missellaneous<br><br> </th>
                                    <th colspan="2" style="">&nbsp; <?php echo "$row[quarters_rent]" ?> <br><br>&nbsp; <?php echo "$row[elect_charges]" ?> <br><br>&nbsp; <?php echo "$row[water_charges]" ?><br><br>&nbsp;<?php echo "$row[maint]" ?><br><br>&nbsp;<?php echo "$row[fine]" ?><br><br>&nbsp;<?php echo "$row[service_tax]" ?><br><br>&nbsp;<?php echo "$row[mess_rent]" ?><br><br>&nbsp;<?php echo "$row[shop_rent]" ?><br><br>&nbsp;<?php echo "$row[deposit]" ?> <br><br>&nbsp; <?php echo "$row[miscellaneous]" ?><br><br> </th> 

                                </tr>
                                <tr>
                                    <th colspan="2" style="text-align: center;">Total</th>
                                    <th colspan="2" style="text-align: center;"><?php echo "$row[total]" ?> / -</th> 

                                </tr>
                                <tr>
                                    <th style="text-align: " colspan="6">By Cash / Cheque / DD NO &nbsp;&nbsp;&nbsp; <?php echo "$row[dd_no]" ?>&nbsp;&nbsp;&nbsp;  Dated&nbsp;&nbsp;&nbsp; <?php echo "$row[dd_date]" ?>&nbsp;&nbsp;&nbsp; Place Of Issue &nbsp;&nbsp;&nbsp;<?php echo "$row[dd_place]" ?>&nbsp;&nbsp;&nbsp; Rupees Inwards &nbsp;&nbsp;&nbsp;<b><u> <?php echo getIndianCurrency($sum) ?>&nbsp;</u></b> </th>
                                </tr>
                                <tr>
                                    <th colspan="6" style="text-align: center;border-bottom-color: white;"><b>For Office Use Only</b></th>

                                </tr>
                                <tr>
                                    <th colspan="6">Recieved Rupees &nbsp;&nbsp;&nbsp;<?php echo "$row[total]"; ?>&nbsp;&nbsp;&nbsp; only and credited to the BZRCMS Bank SB / A/c No 2098 standing in the name of the President K.L.E S A/c For Staff Quarters Belgavi</th>

                                </tr>
                            </tbody>
                        </table>



                        <table style="width: 24%; float: left">
                            <thead>
                                <tr>
                                    <th style="text-align: center;font-size: 16px;" colspan="6">KLES Hostels & Residential Quarters<br>JNMC Campus Belgavi - 590010<br>Demand Notice (Bank Copy)</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th colspan="3" style="text-align: left;    border-right-color: white;">SI No : <?php echo "$row[challanno]" ?><br><br> Recieved From : <?php echo "$row[name]" ?></th>
                                    <th colspan="3" style="text-align: right">Date : <?php echo "$row[abdate]" ?><br><br> Quarters Number :<?php echo "$row[particulars_name]" ?></th> 
                                </tr>
                                <tr>
                                    <th colspan="3" style="text-align: center;font-size: 16px;"><b>Particulars</b></th>
                                    <th colspan="1" style="text-align: center;font-size: 16px;"><b>Amount</b></th> 
                                </tr>
                                <tr>
                                    <th colspan="2" style="">1.&nbsp;Qtrs Rent <br><br>2.&nbsp; Elect Charges <br><br>3.&nbsp; Water Charges<br><br>4.&nbsp;Maintenance<br><br>5.&nbsp;Fine<br><br>6. &nbsp;Service Tax<br><br>7. &nbsp;Mess Rent<br><br>8. Shop Rent<br><br>9. &nbsp;Deposit <br><br> 10.&nbsp; Missellaneous<br><br> </th>
                                    <th colspan="2" style="text-align: center;">&nbsp; <?php echo "$row[quarters_rent]" ?> <br><br>&nbsp; <?php echo "$row[elect_charges]" ?> <br><br>&nbsp; <?php echo "$row[water_charges]" ?><br><br>&nbsp;<?php echo "$row[maint]" ?><br><br>&nbsp;<?php echo "$row[fine]" ?><br><br>&nbsp;<?php echo "$row[service_tax]" ?><br><br>&nbsp;<?php echo "$row[mess_rent]" ?><br><br>&nbsp;<?php echo "$row[shop_rent]" ?><br><br>&nbsp;<?php echo "$row[deposit]" ?> <br><br>&nbsp; <?php echo "$row[miscellaneous]" ?><br><br> </th> 

                                </tr>
                                <tr>
                                    <th colspan="2" style="text-align: center;">Total</th>
                                    <th colspan="2" style="text-align: center;"><?php echo "$row[total]" ?> / -</th> 

                                </tr>
                                <tr>
                                    <th style="text-align: " colspan="6">By Cash / Cheque / DD NO &nbsp;&nbsp;&nbsp; <?php echo "$row[dd_no]" ?>&nbsp;&nbsp;&nbsp;  Dated&nbsp;&nbsp;&nbsp; <?php echo "$row[dd_date]" ?>&nbsp;&nbsp;&nbsp; Place Of Issue &nbsp;&nbsp;&nbsp;<?php echo "$row[dd_place]" ?>&nbsp;&nbsp;&nbsp; Rupees Inwards &nbsp;&nbsp;&nbsp;<b><u> <?php echo getIndianCurrency($sum) ?>&nbsp;</u></b> </th>
                                </tr>
                                <tr>
                                    <th colspan="6" style="text-align: center;border-bottom-color: white;"><b>For Office Use Only</b></th>

                                </tr>
                                <tr>
                                    <th colspan="6">Recieved Rupees &nbsp;&nbsp;&nbsp;<?php echo "$row[total]"; ?>&nbsp;&nbsp;&nbsp; only and credited to the BZRCMS Bank SB / A/c No 2098 standing in the name of the President K.L.E S A/c For Staff Quarters Belgavi</th>

                                </tr>
                            </tbody>
                        </table>



                        <table style="width: 24%; float: left">
                            <thead>
                                <tr>
                                    <th style="text-align: center;font-size: 16px;" colspan="6">KLES Hostels & Residential Quarters<br>JNMC Campus Belgavi - 590010<br>Demand Notice (Bank Acknowledgement)</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th colspan="3" style="text-align: left;    border-right-color: white;">SI No : <?php echo "$row[challanno]" ?><br><br> Recieved From : <?php echo "$row[name]" ?></th>
                                    <th colspan="3" style="text-align: right">Date : <?php echo "$row[abdate]" ?><br><br> Quarters Number :<?php echo "$row[particulars_name]" ?></th> 
                                </tr>
                                <tr>
                                    <th colspan="3" style="text-align: center;font-size: 16px;"><b>Particulars</b></th>
                                    <th colspan="1" style="text-align: center;font-size: 16px;"><b>Amount</b></th> 
                                </tr>
                                <tr>
                                    <th colspan="2" style="">1.&nbsp;Qtrs Rent <br><br>2.&nbsp; Elect Charges <br><br>3.&nbsp; Water Charges<br><br>4.&nbsp;Maintenance<br><br>5.&nbsp;Fine<br><br>6. &nbsp;Service Tax<br><br>7. &nbsp;Mess Rent<br><br>8. Shop Rent<br><br>9. &nbsp;Deposit <br><br> 10.&nbsp; Missellaneous<br><br> </th>
                                    <th colspan="2" style="text-align: center;">&nbsp; <?php echo "$row[quarters_rent]" ?> <br><br>&nbsp; <?php echo "$row[elect_charges]" ?> <br><br>&nbsp; <?php echo "$row[water_charges]" ?><br><br>&nbsp;<?php echo "$row[maint]" ?><br><br>&nbsp;<?php echo "$row[fine]" ?><br><br>&nbsp;<?php echo "$row[service_tax]" ?><br><br>&nbsp;<?php echo "$row[mess_rent]" ?><br><br>&nbsp;<?php echo "$row[shop_rent]" ?><br><br>&nbsp;<?php echo "$row[deposit]" ?> <br><br>&nbsp; <?php echo "$row[miscellaneous]" ?><br><br> </th> 

                                </tr>
                                <tr>
                                    <th colspan="2" style="text-align: center;">Total</th>
                                    <th colspan="2" style="text-align: center;"><?php echo "$row[total]" ?> / -</th> 

                                </tr>
                                <tr>
                                    <th style="text-align: " colspan="6">By Cash / Cheque / DD NO &nbsp;&nbsp;&nbsp; <?php echo "$row[dd_no]" ?>&nbsp;&nbsp;&nbsp;  Dated&nbsp;&nbsp;&nbsp; <?php echo "$row[dd_date]" ?>&nbsp;&nbsp;&nbsp; Place Of Issue &nbsp;&nbsp;&nbsp;<?php echo "$row[dd_place]" ?>&nbsp;&nbsp;&nbsp; Rupees Inwards &nbsp;&nbsp;&nbsp;<b><u> <?php echo getIndianCurrency($sum) ?>&nbsp;</u></b> </th>
                                </tr>
                                <tr>
                                    <th colspan="6" style="text-align: center;border-bottom-color: white;"><b>For Office Use Only</b></th>

                                </tr>
                                <tr>
                                    <th colspan="6">Recieved Rupees &nbsp;&nbsp;&nbsp;<?php echo "$row[total]"; ?>&nbsp;&nbsp;&nbsp; only and credited to the BZRCMS Bank SB / A/c No 2098 standing in the name of the President K.L.E S A/c For Staff Quarters Belgavi</th>

                                </tr>
                            </tbody>
                        </table>



                        <table style="width: 24%; float: left">
                            <thead>
                                <tr>
                                    <th style="text-align: center;font-size: 16px;" colspan="6">KLES Hostels & Residential Quarters<br>JNMC Campus Belgavi - 590010<br>Demand Notice (College Copy)</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th colspan="3" style="text-align: left;    border-right-color: white;">SI No : <?php echo "$row[challanno]" ?><br><br> Recieved From : <?php echo "$row[name]" ?></th>
                                    <th colspan="3" style="text-align: right">Date : <?php echo "$row[abdate]" ?><br><br> Quarters Number :<?php echo "$row[particulars_name]" ?></th> 
                                </tr>
                                <tr>
                                    <th colspan="3" style="text-align: center;font-size: 16px;"><b>Particulars</b></th>
                                    <th colspan="1" style="text-align: center;font-size: 16px;"><b>Amount</b></th> 
                                </tr>
                                <tr>
                                    <th colspan="2" style="">1.&nbsp;Qtrs Rent <br><br>2.&nbsp; Elect Charges <br><br>3.&nbsp; Water Charges<br><br>4.&nbsp;Maintenance<br><br>5.&nbsp;Fine<br><br>6. &nbsp;Service Tax<br><br>7. &nbsp;Mess Rent<br><br>8. Shop Rent<br><br>9. &nbsp;Deposit <br><br> 10.&nbsp; Missellaneous<br><br> </th>
                                    <th colspan="2" style="text-align: center;">&nbsp; <?php echo "$row[quarters_rent]" ?> <br><br>&nbsp; <?php echo "$row[elect_charges]" ?> <br><br>&nbsp; <?php echo "$row[water_charges]" ?><br><br>&nbsp;<?php echo "$row[maint]" ?><br><br>&nbsp;<?php echo "$row[fine]" ?><br><br>&nbsp;<?php echo "$row[service_tax]" ?><br><br>&nbsp;<?php echo "$row[mess_rent]" ?><br><br>&nbsp;<?php echo "$row[shop_rent]" ?><br><br>&nbsp;<?php echo "$row[deposit]" ?> <br><br>&nbsp; <?php echo "$row[miscellaneous]" ?><br><br> </th> 

                                </tr>
                                <tr>
                                    <th colspan="2" style="text-align: center;">Total</th>
                                    <th colspan="2" style="text-align: center;"><?php echo "$row[total]" ?> / -</th> 

                                </tr>
                                <tr>
                                    <th style="text-align: " colspan="6">By Cash / Cheque / DD NO &nbsp;&nbsp;&nbsp; <?php echo "$row[dd_no]" ?>&nbsp;&nbsp;&nbsp;  Dated&nbsp;&nbsp;&nbsp; <?php echo "$row[dd_date]" ?>&nbsp;&nbsp;&nbsp; Place Of Issue &nbsp;&nbsp;&nbsp;<?php echo "$row[dd_place]" ?>&nbsp;&nbsp;&nbsp; Rupees Inwards &nbsp;&nbsp;&nbsp;<b><u> <?php echo getIndianCurrency($sum) ?>&nbsp;</u></b> </th>
                                </tr>
                                <tr>
                                    <th colspan="6" style="text-align: center;border-bottom-color: white;"><b>For Office Use Only</b></th>

                                </tr>
                                <tr>
                                    <th colspan="6">Recieved Rupees &nbsp;&nbsp;&nbsp;<?php echo "$row[total]"; ?>&nbsp;&nbsp;&nbsp; only and credited to the BZRCMS Bank SB / A/c No 2098 standing in the name of the President K.L.E S A/c For Staff Quarters Belgavi</th>

                                </tr>
                            </tbody>
                        </table>

                </div>
        </div>
        </section>
    </div>
</div>
</div>
<?php
include 'head_foot/challanfooter.php';
?>