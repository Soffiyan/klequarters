<?php
include 'head_foot/header.php';
include 'head_foot/leftside.php';
$refno = $_GET['refno'];
$query = mysql_query("select * from registration where refno = '$refno'");
$row = mysql_fetch_array($query);
?>
<div class="content-wrapper">
    <div class="page-title">
        <div>
            <h1>Update Payment</h1>
        </div>        
    </div>

    <div class="row">
        <div class="container-fluid">
            <div class="card">
                <form class="form-horizontal" method = "post" action = "?page=addpayment&action=add"enctype="multipart/form-data">
                    <fieldset>
                        <div class="col-lg-3">

                            <div class="form-group">
                                <label for="cno">Reference No</label>
                                <input class="form-control" name="refno" value="<?php echo $refno; ?>" id="refno" type="text" readonly required>
                            </div>
                        </div>
                        <div class="col-lg-3">

                            <div class="form-group">
                                <label for="cno">Challan-no</label>
                                <input class="form-control" name="cno" value="<?php echo $row[challanno]; ?>" id="cno" type="text" readonly required>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label  for="name">Name</label>
                                <input class="form-control" name="name" id="name" type="text" value="<?php echo $row[name] ?>">
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label  for="payment">Payment</label>
                                <input class="form-control" name="payment" id="demoDate1" type="text" >
                            </div>
                        </div>
                        <br>
                        <div class="col-lg-2">
                            <div class="form-group" style="margin-top: 6px;">

                                <input type="submit" value="Update" class="btn btn-primary">
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