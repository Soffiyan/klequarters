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
            <h1>Add Quarter</h1>
        </div>        
    </div>

    <div class="row">
        <div class="container-fluid">
            <div class="card">
                <div class="row">
                    <form class="form-horizontal" method = "post" action = "?page=add_quart&action=add" enctype="multipart/form-data">
                        <fieldset>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="code">Code</label>
                                    <?php
                                    $result = mysql_query("SELECT code FROM add_quarter ORDER BY ID Desc Limit 1");
                                    $row = mysql_fetch_array($result);
                                    $codes = $row['code'];
                                    if (empty($codes)) {
                                        $class_code = 1000;
                                        ?>
                                        <input class="form-control" readonly name="code" id="code" value = "<?php echo $class_code ?>" type="text">
                                        <?php
                                    } else {
                                        $start_code = $codes + 1;
                                        ?>
                                        <input class="form-control" readonly name="code" id="code" value = "<?php echo $start_code ?>" type="text">
                                        <?php
                                    }
                                    ?>

                                </div>
                            </div> 
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="nos">Add Quarter</label>
                                    <input class="form-control" id="addq" name="addq" type="text" placeholder="Enter Quarter Name">
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
                            $result = mysql_query("select * from add_quarter")
                            ?>
                            <div class="box-body table-responsive no-padding">
                                <table class="table table-hover" id="sampleTable">

                                    <thead>
                                        <tr>
                                            <th>SI.no</th>
                                            <th>Code</th>
                                            <th>Quarter</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i = 1;
                                        while ($row = mysql_fetch_array($result)) {
                                            ?>
                                            <tr>
                                                <td><?php echo $i ?></td>
                                                <td><?php echo $row[code] ?></td>
                                                <td><?php echo $row[quarter] ?></td>
                                            </tr>
                                            <?php
                                            $i = $i + 1;
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>

                        </fieldset>
                </div>
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