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
            <h1>Add Department</h1>
        </div>        
    </div>

    <div class="row">
        <div class="container-fluid">
            <div class="card">
                <div class="row">
                    <form class="form-horizontal" method = "post" action = "?page=add_ins&action=add" enctype="multipart/form-data">
                        <fieldset>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="code">Code</label>
                                    <?php
                                    $result = mysql_query("SELECT code FROM add_inst ORDER BY ID Desc Limit 1");
                                    $row = mysql_fetch_array($result);
                                    $codes = $row['code'];
                                    if (empty($codes)) {
                                        $class_code = 100;
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
                                    <label for="ab">Add Department</label>
                                    <input class="form-control" id="ad" name="ad" type="text" placeholder="Enter Department Name">
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
                            $result = mysql_query("select * from add_inst")
                            ?>
                            <div class="box-body table-responsive no-padding">
                                <table class="table table-hover" id="sampleTable">

                                    <thead>
                                        <tr>
                                            <th>SI.no</th>
                                            <th>Code</th>
                                            <th>Department</th>
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
                                                <td><?php echo $row[insitute] ?></td>
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