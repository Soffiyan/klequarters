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
</script>
<?php
$id = $_GET['id'];
$qry = mysql_query("select * from registration where id = '$id'");
$ros = mysql_fetch_array($qry);
?>

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
                    <form class="form-horizontal" method = "post" action = "?page=editdetails&action=add" enctype="multipart/form-data">
                        <fieldset>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="id">Id</label>
                                    <input class="form-control" name="id" id="id" value="<?php echo $id ?>" type="text">
                                </div>
                                <div class="form-group">
                                    <label for="challan_no">Challan</label>
                                    <input class="form-control" name="challan_no" id="challan_no" value="<?php echo $ros[challanno]; ?>" type="number" placeholder="Enter Challan No" readonly required>
                                </div>
                                <div class="form-group">
                                    <label  for="name">Name</label>
                                    <input class="form-control" name="name" id="name" type="text" value="<?php echo $ros[name]; ?>" placeholder="Enter Name" required>

                                </div>
                                <div class="form-group">
                                    <label  for="particulars">Select Particulars</label>
                                    <select class="form-control" id="" name="particulars" onchange="get_pcode(this.value);">
                                        <optgroup >
                                            <option value="<?php echo $ros[particulars]; ?>"><?php echo $ros[particulars_name]; ?></option>
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
                                            <option value="<?php echo $ros['particulars']; ?>"><?php echo $ros['particulars']; ?></option>

                                        </optgroup>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="mobile">Mobile</label>
                                    <input class="form-control" id="mobile" value="<?php echo $ros['mobile']; ?>" name="mobile" type="number" placeholder="Enter Mobile No"required>

                                </div>
                                <div class="form-group">
                                    <label  for="from">From</label>
                                    <input class="form-control" id="demoDate" name="from" value="<?php echo $ros['from1']; ?>" type="text" placeholder="Select From Date"required>

                                </div>
                                <div class="form-group">
                                    <label  for="to">To</label>
                                    <input class="form-control" id="demoDate1" name="to" type="text" value="<?php echo $ros['to1']; ?>" placeholder="Select To Date"required>

                                </div>
                                <div class="form-group">
                                    <label  for="qrent">Qtrs Rent</label>
                                    <input class="form-control" value="<?php echo $ros[quarters_rent]; ?>" name="qrent" onkeyup="sum();" id="qrent" type="number" placeholder="Enter Quarters Rent"required>

                                </div>
                            </div> 
                            <div class="col-lg-4">


                                <div class="form-group">
                                    <label for="echarges">Elect Charges</label>
                                    <input class="form-control" value="<?php echo $ros[elect_charges]; ?>" name="echarges" onkeyup="sum();" id="echarges" type="number" placeholder="Enter Electric Charges" required>

                                </div>
                                <div class="form-group">
                                    <label for="wcharges">Water Charges</label>
                                    <input class="form-control" value="<?php echo $ros[water_charges]; ?>" id="wcharges" onkeyup="sum();" name="wcharges" type="number" placeholder="Enter Water Charges"required>

                                </div>
                                <div class="form-group">
                                    <label for="maint">Maintainence</label>
                                    <input class="form-control" value="<?php echo $ros[maint]; ?>" id="maint" onkeyup="sum();" name="maint" type="number" placeholder="Enter Maintainence Charges"required>

                                </div>



                                <div class="form-group">
                                    <label for="fine">Late Fine</label>
                                    <input class="form-control" value="<?php echo $ros[fine]; ?>" id="fine" onkeyup="sum();" name="fine" type="number" placeholder="Enter Late Fine"required>

                                </div>
                                <div class="form-group">
                                    <label for="mrent">Mess Rent</label>
                                    <input class="form-control" value="<?php echo $ros[mess_rent]; ?>" id="mrent" onkeyup="sum();" name="mrent" type="number" placeholder="Enter Mess Rent"required>

                                </div>
                                <div class="form-group">
                                    <label for="csr">Commercial Shop Rent</label>
                                    <input class="form-control" value="<?php echo $ros[shop_rent]; ?>" id="csr" name="csr" onkeyup="sum();" type="number" placeholder="Enter Shop Rent"required>

                                </div>
                                <div class="form-group">
                                    <label for="st">Service Tax 15%</label>
                                    <input class="form-control" value="<?php echo $ros[service_tax]; ?>" id="st" name="st" onkeyup="sum();" type="number" placeholder="Enter Service Tax"required>

                                </div>
                            </div>
                            <div class="col-lg-4">

                                <div class="form-group">
                                    <label for="deposit">Deposit</label>
                                    <input class="form-control" value="<?php echo $ros[deposit]; ?>" id="deposit" name="deposit" onkeyup="sum();" type="number" placeholder="Enter Deposit"required>

                                </div>
                                <div class="form-group">
                                    <label for="miss">Missellaneous</label>
                                    <input class="form-control" value="<?php echo $ros[miscellaneous]; ?>" id="miss" name="miss" onkeyup="sum();" type="number" placeholder="Enter Missellaneous Fees"required>                                    
                                </div>
                                <div class="form-group">
                                    <label for="total">Total</label>
                                    <input class="form-control" value="<?php echo $ros[total]; ?>" id="total" name="total" readonly type="number" placeholder="Total Amount"required>
                                </div>

                                <div class="form-group">
                                    <label for="remarks">Remarks</label>

                                    <textarea class="form-control" id="remarks" name="remarks" rows="3"><?php echo $ros[remarks]; ?></textarea><span class="help-block"></span>

                                </div>

                                <div class="form-group">
                                    <label for="details">DD NO. Date Place: </label>
                                </div>
                                <div class="col-lg-4" style="padding-left: 0px!important;">
                                    <div class="form-group">
                                        <input type="text" id="ddno" value="<?php echo $ros[dd_no]; ?>" name="ddno" placeholder="DD-no" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-4" style="">
                                    <div class="form-group">
                                        <input type="text" id="dd_date" value="<?php echo $ros[dd_date]; ?>" name="dddate" placeholder="DD Date" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-4" style="padding-right: 0px!important;">
                                    <div class="form-group">
                                        <input type="text" id="ddplace" value="<?php echo $ros[dd_place]; ?>"  name="ddplace" placeholder="Bank Name" class="form-control">
                                    </div>

                                </div>
                                <div class="form-group">
                                    <input type="submit" value="update" class="btn btn-primary">
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