<?php

include 'head_foot/header.php';
include 'head_foot/leftside.php';
?>
<style>
    .bgclass
    {
        background: #115a9a!important;
        color: white!important;
    }
    .info-box
    {
        box-shadow: -3px 12px 20px 12px rgba(255, 255, 255, 0.1); 
    }
    .info-box-text{
        color: white!important;
        text-align: center!important;
        position: relative!important;
        top: 36px!important;
        font-size: 17px!important;
        text-transform: none!important;
    }
</style>
<div class="content-wrapper">
    <div class="page-title">
        <div>
            <h1>Fees Report</h1>
        </div>        
    </div>
    <div class="row">
        <div class="container-fluid">
            <div class="card">
                <fieldset>
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <a href="?page=qtrs_report">
                            <div class="info-box" style="background: #27a9e3">
                                <span class="info-box-text">Quarters-Rent</span>
                                <span class="info-box-number"></span>

                            </div>
                        </a>

                    </div>

                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <a href="?page=elect_report">
                        <div class="info-box" style="background:#28b779" >
                            <span class="info-box-text">Electrical Charges</span>
                            <span class="info-box-number"></span>

                        </div>
                        </a>

                    </div>

                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <a href="?page=water_report">
                        <div class="info-box" style="background:#ffb848" >
                            <span class="info-box-text">Water Charges</span>
                            <span class="info-box-number"></span>

                        </div>
                        </a>

                    </div>

                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <a href="?page=maint_report">
                        <div class="info-box" style="background:#da542e" >
                            <span class="info-box-text">Maintainence Charges</span>
                            <span class="info-box-number"></span>

                        </div>
                        </a>

                    </div>

                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <a href="?page=late_report">
                        <div class="info-box" style="background:#2255a4" >
                            <span class="info-box-text">Late Fine</span>
                            <span class="info-box-number"></span>

                        </div>
                        </a>

                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <a href="?page=mees_report">
                        <div class="info-box" style="background:#da542e" >
                            <span class="info-box-text">Mess Rent</span>
                            <span class="info-box-number"></span>

                        </div>
                        </a>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <a href="?page=commer_report">
                        <div class="info-box" style="background:#27a9e3" >
                            <span class="info-box-text">Commercial Shop Rent</span>
                            <span class="info-box-number"></span>

                        </div>
                        </a>

                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <a href="?page=service_report">
                        <div class="info-box" style="background:#28b779" >
                            <span class="info-box-text">Service Tax</span>
                            <span class="info-box-number"></span>

                        </div>
                        </a>
                    </div>

                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <a href="?page=dep_report">
                        <div class="info-box" style="background:#ffb848" >
                            <span class="info-box-text">Deposit</span>
                            <span class="info-box-number"></span>

                        </div>
                        </a>
                    </div>

                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <a href="?page=miss_report">
                        <div class="info-box" style="background:#da542e" >
                            <span class="info-box-text">Missellaneous</span>
                            <span class="info-box-number"></span>

                        </div>
                        </a>
                    </div>

                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <a href="?page=total_report">
                        <div class="info-box" style="background:#2255a4" >
                            <span class="info-box-text">Total</span>
                            <span class="info-box-number"></span>

                        </div>
                        </a>
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