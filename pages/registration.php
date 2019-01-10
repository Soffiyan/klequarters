<?php
include 'head_foot/header.php';
include 'head_foot/leftside.php';
?>
<script>
    function get_pcode(val)
    {
        $.ajax({
            type: 'post',
            url: 'pages/jfunctions.php',
            data: {
                get_pcode: val,
            },
            success: function (response) {
                document.getElementById("pn").innerHTML = response;
            }
        });
    }
    function get_days(val)
    {
        var from = document.getElementById('demoDate').value;
        $.ajax({
            type: 'post',
            url: 'pages/jfunctions.php',
            data: {
                from: from,
                to: val,
            },
            success: function (response) {
                document.getElementById("totd").innerHTML = response;
            }
        });
    }
</script>
<style>
    label 
    {
        font-size: 17px!important;
    }
</style>
<div class="content-wrapper">
    <div class="page-title">
        <div>
            <h1>Registration</h1>
        </div>        
    </div>

    <div class="row">
        <div class="container-fluid">
            <div class="card">
                <div class="row">
                    <form class="form-horizontal" method = "post" action = "?page=registration&action=add" enctype="multipart/form-data">
                        <fieldset>
                            <div class="col-lg-3">
                                <div class="form-group" style="display: none">
                                    <label for="challan_no">Reference No</label>
                                    <?php
                                    $stat = ' ';
                                    $ref = mysql_query("SELECT * FROM `reference` where status='' ORDER BY id DESC;")or die(mysql_error());
                                    if (mysql_num_rows($ref) > 0) {
                                        $row1 = mysql_fetch_array($ref);
                                        $a1 = $row1['id'];
                                    } else {
                                        $a1 = 1;
                                    }
                                    ?> 
                                    <input class="form-control" name="refno" value="<?php echo $a1; ?>" id="refno" type="text" readonly required>
                                </div>
                                <div class="form-group">
                                    <label for="challan_no">Challan</label>
                                    <?php
                                    $stat = ' ';
                                    $challan = mysql_query("SELECT * FROM `challan` where status='' ORDER BY id DESC;")or die(mysql_error());
                                    if (mysql_num_rows($challan) > 0) {
                                        $rows = mysql_fetch_array($challan);
                                        $a2 = $rows['id'];
                                    } else {
                                        $a2 = 1;
                                    }
                                    ?> 
                                    <input class="form-control" name="challan_no" id="challan_no" value="<?php echo $a2; ?>" type="number" placeholder="Enter Challan No"required>
                                </div>
                                <div class="form-group">
                                    <label  for="name">Name</label>
                                    <input class="form-control" name="name" id="name" type="text" placeholder="Enter Name" required>

                                </div>
                                <div class="form-group">
                                    <label  for="particulars">Select Particulars</label>
                                    <select style="width:100%" class="form-control" id="demoSelect" name="particulars" onchange="get_pcode(this.value);">
                                        <optgroup >
                                            <option value="">Select</option>
                                            <?php
                                            $select = mysql_query("SELECT DISTINCT `particular` FROM `add_particulars`");

                                            while ($row = mysql_fetch_array($select)) {
                                                $rms = $row['particular'];
                                                $sels_id = mysql_query("SELECT particular_code FROM `add_particulars` where particular='$rms'");
                                                $rows_id = mysql_fetch_array($sels_id);
                                                ?>
                                                <option value="<?php echo $rows_id['particular_code']; ?>"><?php echo $row['particular']; ?></option>
                                            <?php } ?>    
                                        </optgroup>
                                    </select>
                                </div>

                                <div class="form-group" style="display: none">
                                    <label  for="pn">Particulars Name</label>
                                    <select class="form-control" id="pn" name="pn">
                                        <optgroup >
                                            <option value="">Select</option>

                                        </optgroup>
                                    </select>
                                </div>


                                <div class="form-group">
                                    <label for="mobile">Mobile</label>
                                    <input class="form-control" id="mobile" name="mobile" type="number" placeholder="Enter Mobile No">

                                </div>
                                <div class="form-group">
                                    <label  for="from">From</label>
                                    <input class="form-control" id="demoDate" name="from" type="text" placeholder="Select From Date"required>

                                </div>
                                <div class="form-group">
                                    <label  for="to">To</label>
                                    <input class="form-control" id="demoDate1" name="to" type="text" placeholder="Select To Date" onchange="get_days(this.value)">

                                </div>

                            </div> 
                            <div class="col-lg-3">

                                <div class="form-group">
                                    <label  for="totd">Total Days</label>
                                    <span id="totd" class="form-control">

                                </div>
                                <div class="form-group">
                                    <label  for="qrent">Qtrs Rent</label>
                                    <input class="form-control" value="0" name="qrent" onkeyup="sum();" id="qrent" type="number" placeholder="Enter Quarters Rent"required>

                                </div>
                                <div class="form-group">
                                    <label for="echarges">Elect Charges</label>
                                    <input class="form-control" value="0" name="echarges" onkeyup="sum();" id="echarges" type="number" placeholder="Enter Electric Charges" required>

                                </div>

                                <div class="form-group">
                                    <label for="wcharges">Water Charges</label>
                                    <input class="form-control" value="0" id="wcharges" onkeyup="sum();" name="wcharges" type="number" placeholder="Enter Water Charges"required>

                                </div>
                                <div class="form-group">
                                    <label for="maint">Maintainence</label>
                                    <input class="form-control" value="0" id="maint" onkeyup="sum();" name="maint" type="number" placeholder="Enter Maintainence Charges"required>

                                </div>



                                <div class="form-group">
                                    <label for="fine">Late Fine</label>
                                    <input class="form-control" value="0" id="fine" onkeyup="sum();" name="fine" type="number" placeholder="Enter Late Fine"required>

                                </div>
                            </div>
                            <div class="col-lg-3">



                                <div class="form-group">
                                    <label for="mrent">Mess Rent</label>
                                    <input class="form-control" value="0" id="mrent" onkeyup="sum();" name="mrent" type="number" placeholder="Enter Mess Rent"required>

                                </div>
                                <div class="form-group">
                                    <label for="csr">Commercial Shop Rent</label>
                                    <input class="form-control" value="0" id="csr" name="csr" onkeyup="sum();" type="number" placeholder="Enter Shop Rent"required>

                                </div>
                                <div class="form-group">
                                    <label for="st">Service Tax 18%</label>
                                    <input class="form-control" value="0" id="st" name="st" onkeyup="sum();" type="number" placeholder="Enter Service Tax"required>

                                </div>
                                <div class="form-group">
                                    <label for="deposit">Deposit</label>
                                    <input class="form-control" value="0" id="deposit" name="deposit" onkeyup="sum();" type="number" placeholder="Enter Deposit"required>
                                </div>
                                <div class="form-group">
                                    <label for="miss">Missellaneous</label>
                                    <input class="form-control" value="0" id="miss" name="miss" onkeyup="sum();" type="number" placeholder="Enter Missellaneous Fees"required>                                    
                                </div>
                                <div class="form-group">
                                    <label for="total">Total</label>
                                    <input class="form-control" value="0" id="total" name="total" readonly type="number" placeholder="Total Amount"required>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="remarks">Remarks</label>

                                    <textarea class="form-control" id="remarks" name="remarks" rows="3"></textarea><span class="help-block"></span>
                                </div>
                                <div class="form-group">
                                    <label for="details">DD NO. Date Place: </label>
                                </div>
                                <div class="col-lg-4" style="padding-left: 0px!important;">
                                    <div class="form-group">
                                        <input type="text" id="ddno" name="ddno" placeholder="DD-no" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-4" style="">
                                    <div class="form-group">
                                        <input type="text" id="dd_date" name="dddate" placeholder="DD Date" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-4" style="padding-right: 0px!important;">
                                    <div class="form-group">
                                        <input type="text" id="ddplace"  name="ddplace" placeholder="Bank Name" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group" style="text-align:center;">
                                    <input type="submit" value="submit" class="btn btn-primary">
                                </div>
                            </div>
                        </fieldset>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
<?php
include 'head_foot/footer.php';
?>




