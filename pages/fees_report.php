<?php
include 'head_foot/header.php';
include 'head_foot/leftside.php';
?>
<script>
    function validation()
    {
        var from = document.form.from_date.value;
        var to = document.form.to_date.value;

        if (from == "")
        {
            alert("Please Select From Date");
            document.form.from_date.value;
            return false;
        }
        if (to == "")
        {
            alert("Please Select To Date");
            document.form.to_date.value;
            return false;
        }
    }
</script>
<?php
$result1 = mysql_query("SELECT SUM(total) AS value_sum FROM registration  where payment='paid'");
$rowss = mysql_fetch_assoc($result1);
$sum = $rowss['value_sum'];
$result = mysql_query("SELECT * FROM registration WHERE payment='paid'");
?>
<div class="content-wrapper">
    <div class="page-title">
        <div>
            <h1>Complete Fees Date Wise Report</h1>
        </div> 
        <form method="post" action="pages/totalpdf.php?sum=<?php echo"$sum"; ?>">
            <input type="submit" name="create_pdf" class="btn btn-primary prim" value="Create pdf" />  
        </form> 
    </div>

    <div class="row">
        <div class="container-fluid">
            <div class="card">
                <form name = "form" onsubmit="return validation()" class="form-horizontal" method = "post" onsubmit="return validation()"action="?page=fees_report&action=add"  enctype="multipart/form-data" >
                    <fieldset>
                        <div class="col-lg-4">
                            <div class="form-group">
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
                            <div class="form-group">
                                <label>To:</label>
                                <div class="input-group date">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" placeholder="DD-MM-YYYY" id="demoDate1"  name="to_date" class="form-control">
                                </div>
                            </div>
                        </div>
                        <br>

                        <div class="col-lg-4" style="margin-top: 5px;">

                            <input type='submit' id="hidden-print" value='GET-DETAILS' class='btn btn-primary prim'>

                        </div>





                        <table class="table table-hover" id="">

                            <thead>

                                <tr>
                                    <th>Challan-No</th>
                                    <th>Name</th>
                                    <th>Quarters</th>
                                    <th>Electricity</th>
                                    <th>Water</th>
                                    <th>Maintanence</th>
                                    <th>Fine</th>
                                    <th>Mess</th>
                                    <th>Shop</th>
                                    <th>Service</th>
                                    <th>Deposit</th>
                                    <th>Missellaneous</th>
                                    <th>total</th>
                                    <th>Pay Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                while ($row = mysql_fetch_array($result)) {
                                    ?>
                                    <tr>
                                        <td><?php echo $row[challanno] ?></td>
                                        <td><?php echo $row[name] ?></td>
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

                    </fieldset>
                </form>

            </div>
        </div>
    </div>
</div>
<?php
include 'head_foot/footer.php';
?>