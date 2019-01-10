<?php
include 'head_foot/header.php';
include 'head_foot/leftside.php';
?>
<script>
    function validation()
    {
        var from = document.form.from_date.value;
        var to = document.form.to_date.value;

        if (from == "")
        {
            alert("Please Select From Date");
            document.form.from_date.value;
            return false;
        }
        if (to == "")
        {
            alert("Please Select To Date");
            document.form.to_date.value;
            return false;
        }
    }
</script>
<div class="content-wrapper">
    <div class="page-title">
        <div>
            <h1>Date Wise Report</h1>
        </div>        
    </div>

    <div class="row">
        <div class="container-fluid">
            <div class="card">
                <form name = "form" class="form-horizontal" method = "post" onsubmit="return validation()"action="?page=date_wise&action=add"  enctype="multipart/form-data" >
                    <fieldset>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>From:</label>
                                <div class="input-group date">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" placeholder="DD-MM-YYYY" id="demoDate"  name="from_date" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>To:</label>
                                <div class="input-group date">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" placeholder="DD-MM-YYYY" id="demoDate1"  name="to_date" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="his"></div>
                        <br>
                        <div class="col-lg-4" style="margin-top: 5px;">
                            
                            <input type='submit' id="hidden-print" value='GET-DETAILS' class='btn btn-primary prim'>
                        </div>
                        <div class="his"></div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>
<?php
include 'head_foot/footer.php';
?>