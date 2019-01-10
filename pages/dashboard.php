<?php
include 'head_foot/header.php';
include 'head_foot/leftside.php';
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

    <?php
    $q1 = mysql_query("select count(id) from registration");

    $q2 = mysql_fetch_row($q1);
    $k4 = $k4 + $q2[0];
    ?>

    <div class="row">
        <div class="container-fluid">
            <div class="card">
                <fieldset>
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <a href="?page=registration">
                            <div class="info-box">
                                <span class="info-box-icon bg-aqua"><i class="fa fa-registered"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">New Registration</span>
                                    <span class="info-box-number"></span>
                                </div>

                                <!-- /.info-box-content -->
                            </div>
                            <a href="#" class="small-box-footer">
                                More info <i class="fa fa-arrow-circle-right"></i>
                            </a>
                        </a>
                        <!-- /.info-box -->
                    </div>

                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <a href="?page=viewdetails">
                            <div class="info-box">
                                <span class="info-box-icon bg-purple"><i class="fa fa-address-card-o"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Total Registration</span>
                                    <span class="info-box-number"><?php echo $k4 ?></span>
                                </div>
                                <div class="progress">
                                    <div class="progress-bar" style="width: 70%"></div>
                                </div>

                                <!-- /.info-box-content -->
                            </div>
                            <a href="#" class="small-box-footer">
                                More info <i class="fa fa-arrow-circle-right"></i>
                            </a>
                        </a>
                        <!-- /.info-box -->
                    </div>

                    <?php
                    $q3 = mysql_query("select count(id) from registration where payment = '' ");

                    $q4 = mysql_fetch_row($q3);
                    $k3 = $k3 + $q4[0];
                    ?>
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <a href="?page=updatepayment">
                            <div class="info-box">
                                <span class="info-box-icon bg-green"><i class="fa fa-shopping-cart"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Update Payment</span>
                                    <span class="info-box-number"><?php echo $k3 ?></span>
                                </div>
                                <div class="progress">
                                    <div class="progress-bar" style="width: 70%"></div>
                                </div>

                                <!-- /.info-box-content -->
                            </div>
                            <a href="#" class="small-box-footer">
                                More info <i class="fa fa-rupee"></i>
                            </a>
                            <!-- /.info-box -->
                        </a>
                    </div>

                    <?php
                    $a1 = mysql_query("select count(id) from registration where payment = 'paid'");

                    $a2 = mysql_fetch_row($a1);
                    $a3 = $a3 + $a2[0];
                    ?>
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <a href="?page=paymentdone">
                            <div class="info-box">
                                <span class="info-box-icon bg-red"><i class="fa fa-envelope-o"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Payment Done</span>
                                    <span class="info-box-number"><?php echo $a3 ?></span>
                                </div>
                                <div class="progress">
                                    <div class="progress-bar" style="width: 70%"></div>
                                </div>

                                <!-- /.info-box-content -->
                            </div>
                            <a href="#" class="small-box-footer">
                                More info <i class="fa fa-arrow-circle-right"></i>
                            </a>
                            <!-- /.info-box -->
                        </a>
                    </div>
                </fieldset>
                <br>
                <fieldset>





                    <?php
                    $ad = date('Y-m-d');
                    $q8 = mysql_query("select count(id) from registration where adate = '$ad' ");

                    $q7 = mysql_fetch_row($q8);
                    $k7 = $k7 + $q7[0];
                    ?>
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <a href="?page=todaysreg&ad=<?php echo $ad ?>">
                            <div class="info-box">
                                <span class="info-box-icon bg-blue"><i class="fa fa-comments-o"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Todays Registration</span>
                                    <span class="info-box-number"><?php echo $k7 ?></span>
                                </div>
                                <div class="progress">
                                    <div class="progress-bar" style="width: 70%"></div>
                                </div>

                                <!-- /.info-box-content -->
                            </div>
                            <a href="#" class="small-box-footer">
                                More info <i class="fa fa-rupee"></i>
                            </a>
                            <!-- /.info-box -->
                        </a>
                    </div>

                    <?php
                    $dates = date('Y-m-d');
                    $qa = mysql_query("select count(id) from registration where adate = '$dates' and payment='paid' ");

                    $qb = mysql_fetch_row($qa);
                    $ka = $ka + $qb[0];
                    ?>
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <a href="?page=todayspay&ad=<?php echo $dates ?>">
                            <div class="info-box">
                                <span class="info-box-icon bg-brown"><i class="fa fa-envelope-o"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Todays Payment Done</span>
                                    <span class="info-box-number"><?php echo $ka ?></span>
                                </div>
                                <div class="progress">
                                    <div class="progress-bar" style="width: 70%"></div>
                                </div>

                                <!-- /.info-box-content -->
                            </div>
                            <a href="#" class="small-box-footer">
                                More info <i class="fa fa-rupee"></i>
                            </a>
                            <!-- /.info-box -->
                        </a>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <a href="?page=fees_report">
                            <div class="info-box">
                                <span class="info-box-icon bg-yellow"><i class="fa fa-calendar"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Fees Date Wise Report</span>
                                    <span class="info-box-number"></span>

                                </div>
                            </div>
                            <a href="#" class="small-box-footer">
                                More info <i class="fa fa-arrow-circle-right"></i>
                            </a>
                            <!-- /.info-box -->
                        </a>
                    </div>

                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <a href="?page=creport">
                            <div class="info-box">
                                <span class="info-box-icon bg-black"><i class="fa fa-calendar"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Quarter's Fees Report</span>
                                    <span class="info-box-number"></span>

                                </div>
                            </div>
                            <a href="#" class="small-box-footer">
                                More info <i class="fa fa-arrow-circle-right"></i>
                            </a>
                            <!-- /.info-box -->
                        </a>
                    </div>

                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <a href="?page=quartersmodule">
                            <div class="info-box">
                                <span class="info-box-icon bg-red"><i class="fa fa-home"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Quarters Module</span>
                                </div>
                                <div class="progress">
                                    <div class="progress-bar" style="width: 70%"></div>
                                </div>

                                <!-- /.info-box-content -->
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