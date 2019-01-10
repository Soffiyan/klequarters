<?php

include 'head_foot/qheader.php';
include 'head_foot/qsidebar.php';
?>
<style>
    .info-box-number {
        font-size: 27px!important;
    }
</style>
<div class="content-wrapper">
    <div class="page-title">
        <div>
            <h1>Dashboard</h1>
        </div>        
    </div>
    <div class="row">
        <div class="container-fluid">
            <div class="card">
                <fieldset>
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <a href="?page=quarters_reg">
                            <div class="info-box">
                                <span class="info-box-icon bg-aqua"><i class="fa fa-registered"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">New Registration</span>
                                    <span class="info-box-number"></span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                        </a><a href="#" class="small-box-footer">
                            More info <i class="fa fa-arrow-circle-right"></i>
                        </a>
                        <!-- /.info-box -->
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <a href="?page=updates_rent">
                            <div class="info-box">
                                <span class="info-box-icon bg-green"><i class="fa fa-shopping-cart"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Update Payment</span>
                                </div>
                                <div class="progress">
                                    <div class="progress-bar" style="width: 70%"></div>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                        </a><a href="#" class="small-box-footer">
                            More info <i class="fa fa-rupee"></i>
                        </a>
                        <!-- /.info-box -->
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <a href="?page=view_quarters_dash">
                            <div class="info-box">
                                <span class="info-box-icon bg-yellow"><i class="fa fa-dashboard"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">View Quarters</span>
                                    <span class="info-box-number"></span>

                                </div>
                            </div>
                        </a><a href="#" class="small-box-footer">
                            More info <i class="fa fa-arrow-circle-right"></i>
                        </a>
                        <!-- /.info-box -->
                    </div>
                </fieldset>                
            </div>
        </div>
    </div>
</div>

<?php

include 'head_foot/footer.php';
?>