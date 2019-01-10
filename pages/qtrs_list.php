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
            <h1>Quarters List</h1>
        </div>  
        <form method="post" action="pages/quarterspdf.php">
            <input type="submit" name="create_pdf" class="btn btn-primary prim" value="Create pdf" />  
        </form>
    </div>

    <div class="row">
        <div class="container-fluid">
            <div class="card">
                <div class="row">
                    <fieldset>
                        <?php
                        $result = mysql_query("select * from quarters_reg where status=''")
                        ?>
                        <div class="box-body table-responsive no-padding">
                            <table class="table table-hover" id="tab">

                                <thead>
                                    <tr>
                                        <th>SI.no</th>
                                        <th>Quarter</th>
                                        <th>Bed</th>
                                        <th>Staff Name</th>
                                        <th>Department</th>
                                        <th>Dep</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    while ($row = mysql_fetch_array($result)) {
                                        ?>
                                        <tr>
                                            <td><?php echo $i ?></td>
                                            <?php
                                            $r1 = mysql_query("select * from add_quarter where code='$row[quarter_no]'");
                                            $ra = mysql_fetch_array($r1);
                                            ?>
                                            <td><?php echo $ra[quarter] ?></td>
                                            <td><?php echo $row[bed_room] ?></td>
                                            <td><?php echo $row[staff_name] ?></td>
                                            <td><?php echo $row[institute] ?></td>
                                            <?php
                                            $r2 = mysql_query("select * from add_dep where code='$row[dep]'");
                                            $rb = mysql_fetch_array($r2);
                                            ?>
                                            <td><?php echo $rb[dep] ?></td>
                                            <td><a title="update" href='?page=edit_qtrs&refno=<?php echo $row[refno]; ?>' onclick="return confirm('Are you sure want to edit')"><i class="fa fa-pencil fa-2x"style="font-size: 25px!important;color:blue!important;"  aria-hidden="true"></i></a>
                                                <a title="delete" href='?page=del_qtrs&refno=<?php echo $row[refno]; ?>' onclick="return confirm('Are you sure want to delete')"><i class="fa fa-trash fa-2x" style="font-size: 25px!important;color:red!important;"  aria-hidden="true"></i></a>
                                            </td> 
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
    </div>
</div>

<?php
include 'head_foot/footer.php';
?>