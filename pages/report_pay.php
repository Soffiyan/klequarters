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

    function get_date_wise_pay(val) {
        var from_date = document.getElementById("demoDate").value;
        $.ajax({
            type: 'post',
            url: 'pages/jfunctions.php',
            data: {
                from_date: from_date,
                pay_to_date: val
            },
            success: function (response) {
                document.getElementById("her").innerHTML = response;
            }
        });
    }
    function get_pay_report(val) {
        $.ajax({
            type: 'post',
            url: 'pages/jfunctions.php',
            data: {
                get_pay_report: val
            },
            success: function (response) {
                document.getElementById("her").innerHTML = response;
            }
        });
    }
    function get_dm(val) {
        var month = document.getElementById("demoSelect1").value;
        $.ajax({
            type: 'post',
            url: 'pages/jfunctions.php',
            data: {
                month: month,
                get_dm: val
            },
            success: function (response) {
                document.getElementById("her").innerHTML = response;
            }
        });
    }
</script>
<div class="content-wrapper">
    <div class="page-title">
        <div class="col-md-6">
            <div class="row hidden-print mt-20">
                <h1>Payment Date Wise Report</h1>
            </div>
        </div>
        <div class="col-md-6">
            <div class="row hidden-print mt-20">
                <div class="col-xs-12 text-right"><a class="btn btn-primary" href="javascript:window.print();" target="_blank"><i class="fa fa-print"></i> Print</a></div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="container-fluid">
            <div class="card">

                <div class='row'>
                    <fieldset>

                        <div class="col-lg-2 hidden-print">
                            <div class="form-group">
                                <label for="from_date">From Date</label>
                                <input class="form-control" id="demoDate" name="from_date" type="text" placeholder="Select From Date" required="">

                            </div>
                        </div>
                        <div class="col-lg-2 hidden-print">
                            <div class="form-group">
                                <label for="to_date">To Date</label>
                                <input class="form-control" id="demoDate1" name="to_date" type="text" placeholder="Select To Date" required="" onchange="get_date_wise_pay(this.value);">

                            </div>
                        </div>
                        <div class="col-lg-1 hidden-print" style='margin-top: 30px;text-align: center;'>
                            <div class="form-group">
                                <label style="background-color: #920b11 !important; width: 100%!important; padding: 5px!important; color: white!important; border-radius: 5px!important;">Or</label>
                            </div>
                        </div>
                        <div class="col-lg-2 hidden-print">
                            <div class="form-group">
                                <label  for="select_institute">Select Institute</label>
                                <select style="width:100%" class="form-control" id="demoSelect4" name="sd" onchange="get_pay_report(this.value);">
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
                        <div class="col-lg-1 hidden-print" style='margin-top: 30px;text-align: center;'>
                            <div class="form-group">
                                <label style="background-color: #920b11 !important; width: 100%!important; padding: 5px!important; color: white!important; border-radius: 5px!important;">Or</label>
                            </div>
                        </div>
                        <div class="col-lg-2 hidden-print">
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
                        <div class="col-lg-2 hidden-print">
                            <div class="form-group">
                                <div class="form-group">
                                    <?php
                                    $already_selected_value = 2030;
                                    $earliest_year = 2000;
                                    $date = date('Y');
                                    print '<label>Year</label><select name="year" id="demoSelect3" class="form-control" onchange="get_dm(this.value)"><option>Year</option><option value="' . $date . '">' . $date . '</option>';

                                    for ($start = 2000; $start < 2030; $start++) {

                                        print '<option value="' . $start . '">' . $start . '</option>';
                                    }
                                    print '</select>';
                                    ?>
                                </div>

                            </div>
                        </div>

                    </fieldset>
                    <fieldset>
                        <div class="col-lg-12">
                            <div id="her"></div>
                        </div>
                    </fieldset>

                </div>
            </div>
        </div>
    </div>
</div>


<?php
include 'head_foot/footer.php';
?>