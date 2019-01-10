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
</style>
<script>
    function get_bedroom(val) {
        $.ajax({
            type: 'post',
            url: 'pages/jfunctions.php',
            data: {
                quart: val
            },
            success: function (response) {
                document.getElementById("br").innerHTML = response;
            }
        });
    }
</script>
<div class="content-wrapper">
    <div class="page-title">
        <div>
            <h1>Quarter's Registration</h1>
        </div>        
    </div>
    <div class="row">
        <div class="container-fluid">
            <div class="card">
                <div class="row">
                    <form class="form-horizontal" method = "post" action = "?page=quarters_reg&action=add" enctype="multipart/form-data">
                        <fieldset>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="challan_no">Doc No</label>
                                    <?php
                                    $result = mysql_query("SELECT challan_no FROM quarters_reg ORDER BY ID Desc Limit 1");
                                    $row = mysql_fetch_array($result);
                                    $codes = $row['challan_no'];
                                    if (empty($codes)) {
                                        $class_code = 1000;
                                        ?>
                                        <input class="form-control" readonly name="challan_no" id="challan_no" value = "<?php echo $class_code ?>" type="text">
                                        <?php
                                    } else {
                                        $start_code = $codes + 1;
                                        ?>
                                        <input class="form-control" readonly name="challan_no" id="challan_no" value = "<?php echo $start_code ?>" type="text">
                                        <?php
                                    }
                                    ?>

                                </div>
                                <div class="form-group">
                                    <label  for="select_quarters">Select Quarter's</label>
                                    <select style="width:100%" class="form-control" id="demoSelect" name="select_quarters" onchange="get_bedroom(this.value);">
                                        <optgroup>
                                            <option value="">Select</option>
                                            <?php
                                            $select = mysql_query("SELECT quarter_code FROM `add_bed` where flag=''");
                                            while ($row = mysql_fetch_array($select)) {
                                                $rms = $row['quarter_code'];
                                                $sels_id = mysql_query("SELECT quarter FROM `add_quarter` where code='$rms'");
                                                $rows_id = mysql_fetch_array($sels_id);
                                                ?>
                                                <option value="<?php echo $row['quarter_code'] ?>"><?php echo $rows_id['quarter'] ?></option>
                                            <?php } ?>    
                                        </optgroup>
                                    </select>
                                </div>

                            </div> 
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label  for="br">Bed Room</label>
                                    <select style="width:100%" class="form-control" id="br" name="br">
                                        <optgroup >
                                        </optgroup>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="nos">Name Of Staff</label>
                                    <input class="form-control" id="nos" name="nos" type="text" placeholder="Enter Staff Name">
                                </div>



                            </div> 
                            
                            <div class='col-lg-3'>
                                <div class="form-group">
                                    <label  for="sd">Select Institute</label>
                                    <select style="width:100%" class="form-control" id="demoSelect4" name="sd">
                                        <optgroup >
                                            <option value="">Select</option>
                                            <?php
                                            $select = mysql_query("SELECT dep FROM `add_dep`");
                                            while ($row = mysql_fetch_array($select)) {
                                                $rms = $row['dep'];
                                                $sels_id = mysql_query("SELECT code FROM `add_dep` where dep='$rms'");
                                                $rows_id = mysql_fetch_array($sels_id);
                                                ?>
                                                <option value="<?php echo $rows_id['code'] ?>"><?php echo $row['dep'] ?></option>
                                            <?php } ?>  
                                        </optgroup>
                                    </select>
                                </div>
                            </div>
                            <div class='col-lg-3'>
                                <div class="form-group">
                                    <label  for="inst">Select Department</label>
                                    <select style="width:100%" class="form-control" id="demoSelect5" name="inst">
                                        <optgroup >
                                            <option value="">Select</option>
                                            <?php
                                            $select = mysql_query("SELECT insitute FROM `add_inst`");
                                            while ($row = mysql_fetch_array($select)) {
                                                $rms = $row['insitute'];
                                                $sels_id = mysql_query("SELECT code FROM `add_inst` where insitute='$rms'");
                                                $rows_id = mysql_fetch_array($sels_id);
                                                ?>
                                                <option value="<?php echo $row['insitute'] ?>"><?php echo $row['insitute'] ?></option>
                                            <?php } ?>  
                                        </optgroup>
                                    </select>
                                    <!--<input class="form-control" id="inst" name="inst" type="text" placeholder="Enter Institute"required>-->

                                </div>
                            </div>

                            <!--<div class='col-lg-3'>
                                <div class="form-group">
                                    <label for="pdate">Payment Date</label>
                                    <input class="form-control" id="demoDate" name="pdate" type="text" placeholder="Select Pay Date" required="">

                                </div>
                            </div>
                            <div class='col-lg-3'>
                                <div class='col-lg-6' style="PADDING-LEFT: 0px;">
                                    <div class="form-group">
                                        <label  for="month">Month</label>
                                        <select style="padding: 6px" class="" id="demoSelect1" name="month">
                                            <?php
                                            $monthArray = range(1, 12);
                                            foreach ($monthArray as $month) {
                                                $monthPadding = str_pad($month, 2, "0", STR_PAD_LEFT);
                                                $fdate = date("F", strtotime("2015-$monthPadding-01"));
                                                echo '<option value="' . $fdate . '">' . $fdate . '</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class='col-lg-6' style="padding-right: 0px;">
                                    <div class="form-group">
                                        <?php
                                        $already_selected_value = 2030;
                                        $earliest_year = 2000;
                                        $date = date('Y');
                                        print '<label>Select Year</label><select name="year" id="demoSelect3" class="form-control">';

                                        for ($start = 2000; $start < 2030; $start++) {

                                            print '<option value="' . $start . '">' . $start . '</option>';
                                        }
                                        print '</select>';
                                        ?>
                                    </div>
                                </div>

                            </div>
                            <div class='col-lg-3'></div><div class='col-lg-3'></div><div class='col-lg-3'></div>
                            <div class='col-lg-3'>
                                <div class="form-group">
                                    <label for="amount">Amount</label>
                                    <input class="form-control" id="amount" name="amount" type="text" placeholder="Enter Amount" required="">

                                </div>
                            </div>-->



                            <div class="col-lg-12" style="margin-top: 32px">
                                <div class="form-group">
                                    <input type="submit" value="Submit" style="width:100%" class="btn btn-primary">
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