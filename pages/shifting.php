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

    function get_ref(val) {
        $.ajax({
            type: 'post',
            url: 'pages/jfunctions.php',
            data: {
                quarterss: val
            },
            success: function (response) {
                document.getElementById("rn").innerHTML = response;
            }
        });
    }
    function get_bed(val) {
        $.ajax({
            type: 'post',
            url: 'pages/jfunctions.php',
            data: {
                bed: val
            },
            success: function (response) {
                document.getElementById("bed").innerHTML = response;
            }
        });
    }
    function get_new_bed(val) {
        $.ajax({
            type: 'post',
            url: 'pages/jfunctions.php',
            data: {
                get_new_bed: val
            },
            success: function (response) {
                document.getElementById("new_bed").innerHTML = response;
            }
        });
    }
    function get_name(val) {
        $.ajax({
            type: 'post',
            url: 'pages/jfunctions.php',
            data: {
                name: val
            },
            success: function (response) {
                document.getElementById("name").innerHTML = response;
            }
        });
    }
    function get_ins(val) {
        $.ajax({
            type: 'post',
            url: 'pages/jfunctions.php',
            data: {
                ins: val
            },
            success: function (response) {
                document.getElementById("inst").innerHTML = response;
            }
        });
    }
    function get_dep(val) {
        $.ajax({
            type: 'post',
            url: 'pages/jfunctions.php',
            data: {
                dep: val
            },
            success: function (response) {
                document.getElementById("dep").innerHTML = response;
            }
        });
    }

</script>
<div class="content-wrapper">
    <div class="page-title">
        <div>
            <h1>Shifting</h1>
        </div>        
    </div>

    <div class="row">
        <div class="container-fluid">
            <div class="card">
                <form class="form-horizontal" method = "post" action = "?page=shifting&action=add" enctype="multipart/form-data">
                    <div class='row'>
                        <fieldset>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label  for="select_quarters">Select Quarter's</label>
                                    <select style="width:100%" class="form-control" id="demoSelect" name="select_quarters" onchange="get_ref(this.value);get_bed(this.value);get_dep(this.value);get_name(this.value);get_ins(this.value)">
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
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label  for="bed">Bed</label>
                                    <select style="width:100%" class="form-control" id="bed" name="bed">
                                        <optgroup>

                                        </optgroup>
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label  for="rn">Refno</label>
                                    <select style="width:100%" class="form-control" id="rn" name="refno">
                                        <optgroup>

                                        </optgroup>
                                    </select>
                                </div>
                            </div>
                        </fieldset>
                    </div>
                    <div class="row">
                        <fieldset>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label  for="inst">Department</label>
                                    <select style="width:100%" class="form-control" id="inst" name="inst">
                                        <optgroup>

                                        </optgroup>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label  for="dep">Institute</label>
                                    <select style="width:100%" class="form-control" id="dep" name="dep">
                                        <optgroup>

                                        </optgroup>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label  for="name">Name</label>
                                    <select style="width:100%" class="form-control" id="name" name="name">
                                        <optgroup>

                                        </optgroup>
                                    </select>
                                </div>
                            </div>
                        </fieldset>
                    </div>
                    <hr>
                    <div class="row">
                        <fieldset>
                            <div class="col-lg-4" style="display: none;">
                                <div class="form-group">
                                    <label for="doc">Doc No</label>
                                    <?php
                                    $result = mysql_query("SELECT challanno FROM shifting ORDER BY ID Desc Limit 1");
                                    $row = mysql_fetch_array($result);
                                    $codes = $row['code'];
                                    if (empty($codes)) {
                                        $class_code = 100;
                                        ?>
                                        <input class="form-control" name="doc" id="doc" readonly value = "<?php echo $class_code ?>" type="text">
                                        <?php
                                    } else {
                                        $start_code = $codes + 1;
                                        ?>
                                        <input class="form-control" name="doc" id="doc" readonly value = "<?php echo $start_code ?>" type="text">
                                        <?php
                                    }
                                    ?>

                                </div>
                            </div> 
                            <div class="col-lg-4" >
                                <div class="form-group">
                                    <label  for="select_new_quarters">Select New Quarter's</label>
                                    <select style="width:100%" class="form-control" id="demoSelect1" name="select_new_quarters" onchange="get_new_bed(this.value);">
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
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label  for="new_bed">New Bed</label>
                                    <select style="width:100%" class="form-control" id="new_bed" name="new_bed">
                                        <optgroup>

                                        </optgroup>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="sdate">Shifting Date</label>
                                    <input class="form-control" id="demoDate" name="sdate" type="text" placeholder="Select Shifting Date" required="">

                                </div>
                            </div>

                        </fieldset>
                    </div>
                    <!--<div class="row">
                        <fieldset>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="pdate">Payment Date</label>
                                    <input class="form-control" id="demoDate1" name="pdate" type="text" placeholder="Select Pay Date" required="">
                                </div>
                            </div>
                            <div class='col-lg-4'>
                                <div class='col-lg-6' style="PADDING-LEFT: 0px;">
                                    <div class="form-group">
                                        <label  for="month">Select Month</label><br>
                                        <select style="padding: 6px" class="" id="demoSelect4" name="month">
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
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="amount">Amount</label>
                                    <input class="form-control" id="amount" name="amount" type="text" placeholder="Enter Amount" required="">

                                </div>
                            </div>
                        </fieldset>
                    </div>
                    -->
                    <div class="row">
                        <fieldset>
                            <div class='col-lg-12' style="margin-top: 32px">
                                <div class="form-group">
                                    <input type="submit" value="Shift" style="width:100%" class="btn btn-primary">
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