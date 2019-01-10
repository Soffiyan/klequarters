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

</script>
<div class="content-wrapper">
    <div class="page-title">
        <div>
            <h1>Vacate</h1>
        </div>        
    </div>

    <div class="row">
        <div class="container-fluid">
            <div class="card">
                <form class="form-horizontal" method = "post" action = "?page=vacate&action=add" enctype="multipart/form-data">
                    <div class='row'>
                        <fieldset>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label  for="select_quarters">Select Quarter's</label>
                                    <select style="width:100%" class="form-control" id="demoSelect" name="select_quarters" onchange="get_ref(this.value);">
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
                            <div class="col-lg-3">
                                <div class="form-group">
                                        <label  for="rn">Staff Name</label>
                                    <select style="width:100%" class="form-control" id="rn" name="refno">
                                        <optgroup >

                                        </optgroup>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="vdate">Vacate Date</label>
                                    <input class="form-control" id="demoDate" name="vdate" type="text" placeholder="Select Vacate Date" required="">

                                </div>
                            </div>
                            <div class='col-lg-3' style="margin-top: 32px">
                                <div class="form-group">
                                    <input type="submit" value="Vacate" class="btn btn-primary">
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