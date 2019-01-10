<?php
include 'head_foot/header.php';
include 'head_foot/leftside.php';
?>
<div class="content-wrapper">
    <div class="page-title">
        <div>
            <h1>Add Particulars</h1>
        </div>  
        <form method="post" action="pages/addpartpdf.php">
            <input type="submit" name="create_pdf" class="btn btn-primary prim" value="Create pdf" />  
        </form> 
    </div>

    <div class="row">
        <div class="container-fluid">
            <div class="card">
                <form class="form-horizontal" method = "post" action = "?page=add_particulars&action=add"enctype="multipart/form-data">
                    <fieldset>
                        <div class="col-lg-4">

                            <div class="form-group">
                                <label for="pcode">Particular Code</label>
                                <?php
                                $stat = ' ';
                                $pcode = mysql_query("SELECT * FROM `particular_code` where status='' ORDER BY id DESC;")or die(mysql_error());
                                if (mysql_num_rows($pcode) > 0) {
                                    $row1 = mysql_fetch_array($pcode);
                                    $a1 = $row1['id'];
                                } else {
                                    $a1 = 1;
                                }
                                ?> 
                                <input class="form-control" name="pcode" value="<?php echo $a1; ?>" id="pcode" type="text" readonly placeholder="Enter Particular Code"required>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label  for="epart">Enter Particulars</label>
                                <input class="form-control" name="epart" id="epart" type="text" placeholder="Enter Particular"required>
                            </div>

                        </div>
                        <br>
                        <div class="col-lg-4">
                            <div class="form-group" style="margin-top: 6px;">

                                <input type="submit" value="submit" class="btn btn-primary">
                            </div>
                        </div>
                        <hr>
                        <?php
                        $result = mysql_query("select * from add_particulars order by id desc");
                        ?>
                        <table class="table table-hover table-bordered" id="sampleTable">
                            <thead>
                                <tr>
                                    <th>SI.no</th>
                                    <th>Particular-Code</th>
                                    <th>Particular</th>
                                    <th>Date Of Registration</th>
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
                                        <td><?php echo $row[particular_code] ?></td>
                                        <td><?php echo $row[particular] ?></td>
                                        <td><?php echo $row[reg_date] ?></td>
                                        <td><a title="update" href='?page=editpart&id=<?php echo $row[id]; ?>' onclick="return confirm('Are you sure want to edit')"><i class="fa fa-pencil fa-2x"style="font-size: 25px!important;color:blue!important;"  aria-hidden="true"></i></a>
                                            <a title="delete" href='?page=delpart&id=<?php echo $row[id]; ?>' onclick="return confirm('Are you sure want to delete')"><i class="fa fa-trash fa-2x" style="font-size: 25px!important;color:red!important;"  aria-hidden="true"></i></a>
                                        </td> 
                                    </tr>
                                    <?php
                                    $i = $i + 1;
                                }
                                ?>
                            </tbody>
                        </table>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>

    <?php
    include 'head_foot/footer.php';
    ?>