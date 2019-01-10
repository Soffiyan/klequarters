<?php
//error_reporting(0);
include 'Model/config.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // username and password sent from form 

    $myusername = mysqli_real_escape_string($db, $_POST['username']);
    $mypassword = mysqli_real_escape_string($db, $_POST['password']);
    $sql = "SELECT id FROM admin WHERE username = '$myusername' and passcode = '$mypassword'";
    $result = mysqli_query($db, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $count = mysqli_num_rows($result);

    if ($count == 1) {
        //session_register("myusername");
        $_SESSION['login_user'] = $myusername;
        echo "<script>window.location.href='?page=dashboard';</script>";
    } else {
        echo "<script>alert('Wrong UserName Or Password');window.location.href='?page=dashboard';</script>";
    }
}
?>

<html lang="en">
    <head>
        <title>KLE Quarters</title>


        <link href="view/css/bootstrap.min.css" rel="stylesheet">
        <link href="view/css/font-awesome/css/font-awesome.min.css" rel="stylesheet">
        <style>

            .panel-default>.panel-heading {
                background-color: #e8e8e8 !important;
                border: none !important;
            }
            .form-control {
                border-radius:0px !important;
            }
            .form-control:focus {
                border-color: black !important;
            }
            body {
                background-color: #c7c7c7 !important;
                margin: 9em auto;
            }
            .has-feedback .form-control {
                padding-right: 55.5px!important;
            }
            .form-control {
                display: block!important;
                width: 100%!important;
                height: 40px!important;
                padding: 6px 12px!important;
                font-size: 16px!important;
                line-height: 1.42857143!important;
                color: #555!important;
                background-color: #fff!important;
                background-image: none!important;
                border: 1px solid #ccc!important;
                box-shadow: 0 4px 13px rgba(202, 201, 195, 0.48);
            }
            .form-control-feedback {
                position: absolute!important;
                top: 0!important;
                right: 0!important;
                z-index: 2!important;
                display: block!important;
                width: 42px!important;
                height: 34px!important;
                line-height: 42px!important;
                text-align: center!important;
                pointer-events: none!important;
                font-size:16px;
            }

            .btn-primary {
                color: #fff;
                background-color: #002147!important;
                border-radius: 5px;
                border-color: #002147!important;
            }
            .login-panel
            {
                box-shadow: 0 4px 13px rgba(19, 17, 0, 0.48);
            }
            .panel-body{
                background: #f7f7f7!important;
            }
        </style>
    </head>
    <body>

        <div class="container">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">

                    <div class="login-panel panel panel-default">

                        <div class="panel-heading">

                            <h3 class="panel-title"><center><h4><b>KLES HOSTEL Residential Quarters</b></h4><h4></h4></center></h3>
                        </div>

                        <div class="panel-body">
                            <hgroup style="text-align: center;">
                                <img src="upload/<?php $main->fun("pic"); ?>" width="125" height="125"/>
                            </hgroup>
                            <br>
                            <form role="form" style="" method="post">
                                <fieldset>
                                    <div class="form-group has-feedback">
                                        <input class="form-control" placeholder="Username" name="username" type="text"> 
                                        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                                    </div>

                                    <div class="form-group has-feedback">
                                        <input class="form-control" placeholder="Password" name="password" type="password" value="">
                                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input name="remember" type="checkbox" value="Remember Me">Remember Me
                                        </label>
                                    </div>
                                    <!-- Change this to a button or input when using this as a form -->
                                    <input type="submit" value="Submit"class="btn btn-primary btn-block btn-flat" style="height: 40px!important;font-size:16px!important;" name="login">
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </body></html>

</html>