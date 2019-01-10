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
<script>

    function get_date_wise_shifting(val) {
        var from_date = document.getElementById("demoDate").value;
        $.ajax({
            type: 'post',
            url: 'pages/jfunctions.php',
            data: {
                from_date: from_date,
                shift_to_date: val
            },
            success: function (response) {
                document.getElementById("her").innerHTML = response;
            }
        });
    }

</script>
<div class="content-wrapper">
    <div class="page-title">
        <div class="col-md-6">
            <div class="row hidden-print mt-20">
                <h1>Shifting Date Wise Report</h1>
            </div>
        </div>
        <div class="col-md-6">
            <div class="row hidden-print mt-20">
                <div class="col-xs-12 text-right"><a class="btn btn-primary" href="javascript:window.print();" target="_blank"><i class="fa fa-print"></i> Print</a></div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="container-fluid">
            <div class="card">
                <form class="form-horizontal" method = "post" action = "?page=shifting_datewise&action=add" enctype="multipart/form-data">
                    <div class='row'>
                        <fieldset>

                            <div class="col-lg-3 hidden-print">
                                <div class="form-group">
                                    <label for="from_date">From Date</label>
                                    <input class="form-control" id="demoDate" name="from_date" type="text" placeholder="Select From Date" required="">

                                </div>
                            </div>
                            <div class="col-lg-3 hidden-print">
                                <div class="form-group">
                                    <label for="to_date">To Date</label>
                                    <input class="form-control" id="demoDate1" name="to_date" type="text" placeholder="Select To Date" required="" onchange="get_date_wise_shifting(this.value);">

                                </div>
                            </div>

                        </fieldset>
                        <fieldset>
                            <div class="col-lg-12">
                                <div id="her"></div>
                            </div>
                        </fieldset>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<?php

include 'head_foot/footer.php';
?>