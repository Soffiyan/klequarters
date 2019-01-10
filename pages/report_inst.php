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

    function get_inst_report(val) {
        $.ajax({
            type: 'post',
            url: 'pages/jfunctions.php',
            data: {
                inst_report: val
            },
            success: function (response) {
                document.getElementById("his").innerHTML = response;
            }
        });
    }

</script>
<div class="content-wrapper">
    <div class="page-title">
        <div class="col-md-6">
            <div class="row hidden-print mt-20">
                <h1>Institute Report</h1>
            </div>
        </div>
        <div class="col-md-6">
            <div class="row hidden-print mt-20">
                <div class="col-xs-12 text-right"><a class="btn btn-primary" href="javascript:window.print();" target="_blank"><i class="fa fa-print"></i> Print</a></div>
            </div>
        </div>
    </div>
    <div  class="row hidden-print mt-20">
        <div class="container-fluid">
            <div class="card">
                <fieldset>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label  for="select_institute">Select Institute</label>
                            <select style="width:100%" class="form-control" id="demoSelect4" name="sd" onchange="get_inst_report(this.value);">
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
                </fieldset>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="container-fluid">
            <div class="card">
                <fieldset>
                    <div class="col-lg-12"style=''>
                        <div id="his"></div>
                    </div>
                </fieldset>
            </div>
        </div>
    </div>
</div>


<?php
include 'head_foot/footer.php';
?>