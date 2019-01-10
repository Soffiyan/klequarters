<?php
include 'head_foot/qheader.php';
include 'head_foot/qsidebar.php';
$refno = $_GET['refno'];
$r = mysql_query("select * from quarters_reg where refno='$refno'");
$row = mysql_fetch_array($r);
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
            <h1>Edit Registration</h1>
        </div>        
    </div>

    <div class="row">
        <div class="container-fluid">
            <div class="card">
                <form class="form-horizontal" method = "post" action = "?page=edit_qtrs&action=add" enctype="multipart/form-data">

                    <div class="row">
                        <fieldset>

                            <div class="col-lg-3">
                                <input type='hidden' name='refno' value='<?php echo $refno ?>'>
                                <div class="form-group">
                                    <label  for="select_quarters">Select Quarter's</label>
                                    <select style="width:100%" class="form-control" id="demoSelect" name="select_quarters" onchange="get_bedroom(this.value);">
                                        <optgroup>
                                            <?php
                                            $ress = mysql_query("select quarter from add_quarter where code='$row[quarter_no]'");
                                            $ress_row = mysql_fetch_array($ress);
                                            ?>
                                            <option value="<?php echo $row['quarter_no'] ?>"><?php echo $ress_row['quarter'] ?></option>
                                            <?php
                                            $select = mysql_query("SELECT quarter_code FROM `add_bed` where flag=''");
                                            while ($ro = mysql_fetch_array($select)) {
                                                $rms = $ro['quarter_code'];
                                                $sels_id = mysql_query("SELECT quarter FROM `add_quarter` where code='$rms'");
                                                $rows_id = mysql_fetch_array($sels_id);
                                                ?>
                                                <option value="<?php echo $ro['quarter_code'] ?>"><?php echo $rows_id['quarter'] ?></option>
                                            <?php } ?>    
                                        </optgroup>
                                    </select>
                                </div>

                            </div> 
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label  for="br">Bed Room</label>
                                    <select style="width:100%" class="form-control" id="br" name="br">
                                        <optgroup>
                                            <option value='<?php echo $row[bed_room] ?>'> <?php echo $row[bed_room] ?></option>
                                        </optgroup>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="nos">Name Of Staff</label>
                                    <input class="form-control" id="nos" name="nos" value='<?php echo $row[staff_name] ?>' type="text" placeholder="Enter Staff Name">
                                </div>
                            </div> 
                            <div class='col-lg-3'>
                                <div class="form-group">
                                    <label  for="inst">Department</label>
                                    <!--<input class="form-control" id="inst" name="inst" value='<?php echo $row[institute] ?>' type="text" placeholder="Enter Institute">-->
                                    <select style="width:100%" class="form-control" id="demoSelect5" name="inst">
                                        <optgroup >
                                            <option value='<?php echo $row[institute] ?>'><?php echo $row[institute] ?></option>
                                            <?php
                                            $select = mysql_query("SELECT insitute FROM `add_inst`");
                                            while ($row1 = mysql_fetch_array($select)) {
                                                
                                                ?>
                                                <option value="<?php echo $row1['insitute'] ?>"><?php echo $row1['insitute'] ?></option>
                                            <?php } ?>  
                                        </optgroup>
                                    </select>
                                </div>
                            </div>
                        </fieldset>
                    </div>

                    <div class="row">
                        <fieldset>

                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label  for="sd">Select Institute</label>
                                    <select style="width:100%" class="form-control" id="demoSelect4" name="sd">
                                        <optgroup >
                                            <?php
                                            $resss = mysql_query("select dep from add_dep where code='$row[dep]'");
                                            $resss_row = mysql_fetch_array($resss);
                                            ?>
                                            <option value="<?php echo $row[dep] ?>"><?php echo $resss_row[dep] ?></option>
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
                            <div class="col-lg-3">
                                <div class="form-group" style="margin-top: 32px;">
                                    <input type="submit" value="Update" class="btn btn-primary">
                                </div>
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