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
    function get_staff(val) {
        $.ajax({
            type: 'post',
            url: 'pages/jfunctions.php',
            data: {
                quarters: val
            },
            success: function (response) {
                document.getElementById("her").innerHTML = response;
            }
        });
    }
    function get_ref(val) {
        $.ajax({
            type: 'post',
            url: 'pages/jfunctions.php',
            data: {
                quarter: val
            },
            success: function (response) {
                document.getElementById("rn").innerHTML = response;
            }
        });
    }
    function valid(val) {
        var refno = document.getElementById("rn").value;
        var month = document.getElementById("demoSelect1").value;
        $.ajax({
            type: 'post',
            url: 'pages/jfunctions.php',
            data: {
                refno: refno,
                month: month,
                year: val
            },
            success: function (response) {
                document.getElementById("his").innerHTML = response;
            }
        });
    }
    function get_inst(val) {
        $.ajax({
            type: 'post',
            url: 'pages/jfunctions.php',
            data: {
                inst: val
            },
            success: function (response) {
                document.getElementById("inst").innerHTML = response;
            }
        });
    }
</script>
<div class="content-wrapper">
    <div class="page-title">
        <div>
            <h1>Update Quarter's Rent</h1>
        </div>        
    </div>

    <div class="row">
        <div class="container-fluid">
            <div class="card">
                <form class="form-horizontal" method = "post" action = "?page=updates_rent&action=add" enctype="multipart/form-data">
                    <div class='row'>
                        <fieldset>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label  for="select_quarters">Select Quarter's</label>
                                    <select style="width:100%" class="form-control" id="demoSelect" name="select_quarters" onchange="get_staff(this.value);get_ref(this.value);get_inst(this.value)">
                                        <optgroup>
                                            <option value="">Select</option>
                                            <?php
                                            $select = mysql_query("SELECT quarter_code FROM `add_bed` where flag='used'");
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
                            <div class="col-lg-3" style="display: none">
                                <div class="form-group">
                                    <label  for="rn">Reference No</label>
                                    <select style="width:100%" class="form-control" id="rn" name="rn" required>
                                        <optgroup >

                                        </optgroup>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label  for="ss">Select Staff</label>
                                    <select style="width:100%" class="form-control" id="her" name="ss" required>
                                        <optgroup >

                                        </optgroup>
                                    </select>
                                </div>
                            </div>
                            <div class='col-lg-3'>
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
                                            <option>Month</option>
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
                                        print '<label>Select Year</label><select name="year" id="demoSelect3" class="form-control" onchange="valid(this.value)"><option>Year</option><option value="' . $date . '">' . $date . '</option>';

                                        for ($start = 2000; $start < 2030; $start++) {

                                            print '<option value="' . $start . '">' . $start . '</option>';
                                        }
                                        print '</select>';
                                        ?>
                                    </div>
                                </div>
                                <div id='his'></div>

                            </div>
                        </fieldset>
                    </div>
                    <div class='row'>
                        <fieldset>
                            <div class="col-lg-3" style='display: none;'>
                                <div class="form-group">
                                    <label  for="ins">Institute</label>
                                    <select style="width:100%" class="form-control" id="inst" name="ins">
                                        <optgroup >

                                        </optgroup>
                                    </select>
                                </div>
                            </div>
                            
                            <div class='col-lg-3'>
                                <div class="form-group">
                                    <label for="amount">Amount</label>
                                    <input class="form-control" id="amount" name="amount" type="text" placeholder="Enter Amount" required="">

                                </div>
                            </div>
                            <div class='col-lg-3' style="margin-top: 32px">
                                <div class="form-group">
                                    <input type="submit" value="submit" class="btn btn-primary">
                                </div>
                            </div>
                        </fieldset>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <?php
    include 'head_foot/footer.php';
    ?>