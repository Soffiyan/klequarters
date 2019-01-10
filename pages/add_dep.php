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
            <h1>Add Institue</h1>
        </div>        
    </div>

    <div class="row">
        <div class="container-fluid">
            <div class="card">
                <div class="row">
                    <form class="form-horizontal" method = "post" action = "?page=add_dep&action=add" enctype="multipart/form-data">
                        <fieldset>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="code">Code</label>
                                    <?php
                                    $result = mysql_query("SELECT code FROM add_dep ORDER BY ID Desc Limit 1");
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
                                    <label for="ab">Add Institute</label>
                                    <input class="form-control" id="ad" name="ad" type="text" placeholder="Enter Institute Name">
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
                            $result = mysql_query("select * from add_dep")
                            ?>
                            <div class="box-body table-responsive no-padding">
                                <table class="table table-hover" id="tab">

                                    <thead>
                                        <tr>
                                            <th>SI.no</th>
                                            <th>Code</th>
                                            <th>Institute</th>
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
                                                <td><?php echo $row[dep] ?></td>
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