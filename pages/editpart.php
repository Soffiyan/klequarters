
<?php
include 'head_foot/header.php';
include 'head_foot/leftside.php';
$id = $_GET['id'];
$query = mysql_query("select * from add_particulars where id='$id'");
$row = mysql_fetch_array($query);
?>

<div class="content-wrapper">
    <div class="page-title">
        <div>
            <h1>Add Particulars</h1>
        </div>        
    </div>

    <div class="row">
        <div class="container-fluid">
            <div class="card">
                <form class="form-horizontal" method = "post" action = "?page=editpart&action=add"enctype="multipart/form-data">
                    <fieldset>
                        <input type="hidden" name="id" id="id" value="<?php echo $id; ?>">
                        <div class="col-lg-4">

                            <div class="form-group">
                                <label for="pcode">Particular Code</label>

                                <input class="form-control" name="pcode" value="<?php echo "$row[particular_code]" ?>" id="pcode" type="text" readonly placeholder="Enter Particular Code"required>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label  for="epart">Enter Particulars</label>
                                <input class="form-control" name="epart" id="epart" value="<?php echo "$row[particular]" ?>" type="text" placeholder="Enter Particular"required>
                            </div>

                        </div>
                        <br>
                        <div class="col-lg-4">
                            <div class="form-group" style="margin-top: 6px;">

                                <input type="submit" value="submit" class="btn btn-primary">
                            </div>
                        </div>

                    </fieldset>
                </form>
            </div>
        </div>
    </div>

    <?php
    include 'head_foot/footer.php';
    ?>