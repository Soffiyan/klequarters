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
<div class="content-wrapper">
    <div class="page-title">
        <div>
            <h1>Add Bed Room</h1>
        </div>        
    </div>

    <div class="row">
        <div class="container-fluid">
            <div class="card">
                <div class="row">
                    <form class="form-horizontal" method = "post" action = "?page=add_bed&action=add" enctype="multipart/form-data">
                        <fieldset>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="code">Code</label>
                                    <?php
                                    $result = mysql_query("SELECT code FROM add_bed ORDER BY ID Desc Limit 1");
                                    $row = mysql_fetch_array($result);
                                    $codes = $row['code'];
                                    if (empty($codes)) {
                                        $class_code = 1000;
                                        ?>
                                    <input class="form-control" name="code" id="code" readonly value = "<?php echo $class_code ?>" type="text">
                                        <?php
                                    } else {
                                        $start_code = $codes + 1;
                                        ?>
                                        <input class="form-control" name="code" id="code" readonly value = "<?php echo $start_code ?>" type="text">
                                        <?php
                                    }
                                    ?>

                                </div>
                            </div> 
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label  for="select_quarters">Select Quarter's</label>
                                    <select style="width:100%" class="form-control" id="demoSelect" name="select_quarters">
                                        <optgroup>
                                            <?php
                                            $select = mysql_query("SELECT quarter FROM `add_quarter` where flag=''");
                                            while ($row = mysql_fetch_array($select)) {
                                                $rms = $row['quarter'];
                                                $sels_id = mysql_query("SELECT code FROM `add_quarter` where quarter='$rms' and flag=''");
                                                $rows_id = mysql_fetch_array($sels_id);
                                                ?>
                                                <option value="<?php echo $rows_id['code'] ?>"><?php echo $row['quarter'] ?></option>
                                            <?php } ?>    
                                        </optgroup>
                                    </select>
                                </div>
                            </div> 
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="ab">Add Bedroom</label>
                                    <input class="form-control" id="ab" name="ab" type="text" placeholder="Enter Bedroom Name">
                                </div>
                            </div> 
                            <div class='col-lg-3' style="margin-top: 27px">
                                <div class="form-group">
                                    <input type="submit" value="submit" class="btn btn-primary">
                                </div>
                            </div>
                        </fieldset>
                        <fieldset>
                            <?php
                            $result = mysql_query("select * from add_bed")
                            ?>
                            <div class="box-body table-responsive no-padding">
                                <table class="table table-hover" id="sampleTable">

                                    <thead>
                                        <tr>
                                            <th>SI.no</th>
                                            <th>Code</th>
                                            <th>Quarter</th>
                                            <th>bed</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i = 1;
                                        while ($row = mysql_fetch_array($result)) {
                                            $qtr = $row[quarter_code];
                                            ?>
                                            <tr>
                                                <td><?php echo $i ?></td>
                                                <td><?php echo $row[code] ?></td>
                                                <?php
                                                $resul = mysql_query("select * from add_quarter where `code`='$qtr'");
                                                $r = mysql_fetch_array($resul);
                                                ?>
                                                <td><?php echo $r[quarter] ?></td>
                                                <td><?php echo $row[bed] ?></td>
                                            </tr>
                                            <?php
                                            $i = $i + 1;
                                        }
                                        ?>
                                    </tbody>
                                </table>
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