<?php
include'pages/session.php';
?>
<html>
    <head>
        <meta charset="utf-8">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- CSS-->
        <link rel="stylesheet" type="text/css" href="view/theme/dist/css/main.css">
        <!-- Font-icon css-->
        <link href="view/css/font-awesome/css/font-awesome.min.css" rel="stylesheet">
        <title>KLE Quarters</title>
    </head>
    <body class="sidebar-mini fixed">
        <div class="wrapper">
            <!-- Navbar-->
            <header class="main-header designation hidden-print"><a class="logo" href="#"></a>
                <nav class="navbar navbar-static-top">
                    <!-- Sidebar toggle button--><a class="sidebar-toggle" href="#" data-toggle="offcanvas"></a>
                    <!-- Navbar Right Menu-->
                    <div class="navbar-custom-menu">
                        <ul class="top-nav">
                            <!--Notification Menu-->

                            <!-- User Menu-->
                            <li class="dropdown"><a class="dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user fa-lg"></i></a>
                                <ul class="dropdown-menu settings-menu">
                                    <li><a href="?page=logout"><i class="fa fa-sign-out fa-lg"></i> Logout</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>
            <script>
                function sum() {
                    var a, b, c, d, e, f, g, h, i, j;
                    a = parseInt(document.getElementById("qrent").value);
                    if (isNaN(a) == true) {
                        a = 0;
                    }
                    b = parseInt(document.getElementById("echarges").value);
                    if (isNaN(b) == true) {
                        b = 0;
                    }
                    c = parseInt(document.getElementById("wcharges").value);
                    if (isNaN(c) == true) {
                        c = 0;
                    }
                    d = parseInt(document.getElementById("maint").value);
                    if (isNaN(d) == true) {
                        d = 0;
                    }
                    e = parseInt(document.getElementById("fine").value);
                    if (isNaN(e) == true) {
                        e = 0;
                    }
                    f = parseInt(document.getElementById("mrent").value);
                    if (isNaN(f) == true) {
                        f = 0;
                    }
                    g = parseInt(document.getElementById("csr").value);
                    if (isNaN(g) == true) {
                        g = 0;
                    }
                    h = parseInt(document.getElementById("st").value);
                    if (isNaN(h) == true) {
                        h = 0;
                    }
                    i = parseInt(document.getElementById("deposit").value);
                    if (isNaN(i) == true) {
                        i = 0;
                    }
                    var j = parseInt(document.getElementById("miss").value);
                    if (isNaN(j) == true) {
                        j = 0;
                    }
                    document.getElementById("total").value = a + b + c + d + e + f + g + h + i + j;
                }
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
            <style>
                .pay{
                    background: #004463;
                    color: white;
                    padding: 5px 23px 5px 23px;
                    border-radius: 4px;
                }
                .pay:hover{
                    color: white!important;
                    background: black!important;
                }
                .pay{
                    background: #004463;
                    color: white;
                    padding: 5px 23px 5px 23px;
                    border-radius: 4px;
                }
                .pay:hover{
                    color: white!important;
                    background: black!important;
                }
                .pays{
                    background: #8e0808;
                    color: white;
                    padding: 5px 23px 5px 23px;
                    border-radius: 4px;
                }
                .pays:hover{
                    color: white!important;
                    background: black!important;
                }
                .tot{
                    background: #004463;
                    color: white;
                    /* font-size: 14px; */
                    font-weight: 600;
                }
                .bg-purple{
                    background-color: rgb(150, 0, 75) !important;
                }
                .bg-aqua {
                    background-color: #00c0ef !important;
                    width: 110%;
                }.bg-brown {
                    background-color: #7d342f !important;
                    width: 110%;
                }.bg-green {
                    background-color: #00a65a !important;
                    width: 110%;
                }.bg-red{
                    background-color: #dd4b39 !important;
                    width: 110%;
                }.bg-yellow{
                    background: rgb(243, 156, 18) !important;
                    width: 110%;
                }.bg-blue{
                    background-color: #004463 !important;
                    width: 110%;
                }.small-box>.inner {
                    padding: 10px;
                }.small-box h3{
                    z-index: 5;
                }.small-box h3 {
                    font-size: 38px;
                    font-weight: bold;
                    margin: 0 0 10px 0;
                    white-space: nowrap;
                    padding: 0;
                    color: white;
                }.info-box .progress {
                    background: rgba(0,0,0,0.2);
                    margin: 5px -10px 5px -10px;
                    height: 2px;
                }small-box p {
                    z-index: 5;
                }.small-box .icon {
                    -webkit-transition: all .3s linear;
                    -o-transition: all .3s linear;
                    transition: all .3s linear;
                    position: absolute;
                    top: -10px;
                    right: 10px;
                    z-index: 0;
                    font-size: 90px;
                    color: rgba(0,0,0,0.15);
                }.bg-black{
                    background: rgb(53, 52, 50) !important;
                }.fa {
                    color:white!important;
                    display: inline-block;
                    font: normal normal normal 14px/1 FontAwesome;
                    font-size: inherit;
                    text-rendering: auto;
                    -webkit-font-smoothing: antialiased;
                    -moz-osx-font-smoothing: grayscale;
                }.small-box>.small-box-footer {
                    position: relative;
                    text-align: center;
                    padding: 3px 0;
                    color: #fff;
                    color: rgba(255,255,255,0.8);
                    display: block;
                    z-index: 10;
                    background: rgba(0,0,0,0.1);
                    text-decoration: none;
                }
                p{
                    color: white;
                }.info-box {
                    display: block;
                    min-height: 90px;
                    background: #fff;
                    width: 114%;
                    box-shadow: -3px 12px 20px 12px rgba(0,0,0,0.1);
                    border-radius: 2px;
                    margin-bottom: 15px;
                }.info-box-content {
                    padding: 5px 10px;
                    margin-left: 90px;
                }.info-box-text {
                    text-transform: uppercase;
                }.info-box-text {
                    display: block;
                    font-size: 14px;
                    white-space: nowrap;
                    overflow: hidden;
                    text-overflow: ellipsis;
                    color: black;
                }.info-box-number {
                    display: block;
                    font-weight: bold;
                    font-size: 18px;
                    color: black;
                }.info-box-icon {
                    border-top-left-radius: 2px;
                    border-top-right-radius: 0;
                    border-bottom-right-radius: 0;
                    border-bottom-left-radius: 2px;
                    display: block;
                    float: left;
                    height: 90px;
                    width: 90px;
                    text-align: center;
                    font-size: 45px;
                    line-height: 90px;
                    background: rgba(0,0,0,0.2);
                    padding: 21px 10px;
                }.info-box .progress{
                    border-radius: 0;
                }.info-box .progress .progress-bar {
                    background: #fff;
                }
                .info-box .progress, .info-box .progress .progress-bar {
                    border-radius: 0;
                }.progress-bar {
                    float: left;
                    width: 0;
                    height: 100%;
                    font-size: 12px;
                    line-height: 20px;
                    color: #fff;
                    text-align: center;
                    background-color: #337ab7;
                    -webkit-box-shadow: inset 0 -1px 0 rgba(0,0,0,.15);
                    box-shadow: inset 0 -1px 0 rgba(0,0,0,.15);
                    -webkit-transition: width .6s ease;
                    -o-transition: width .6s ease;
                    transition: width .6s ease;
                }
                .main-header .navbar {
                    background-color: #b3020a!important;
                }.main-header .logo {
                    background-color: #b3020a!important;
                }.sidebar-menu > li:hover > a, .sidebar-menu > li.active > a {
                    background: #b3020a!important;
                    border-color: #ffffff !important;
                }.btn-primary {
                    color: #fff;
                    background: #920b11!important;
                    border-color: transparent;
                }
            </style>