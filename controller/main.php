<?php

class main {

    function add_particulars() {
        $pcode = $_POST['pcode'];
        $epart = $_POST['epart'];
        $reg_date = date('d-m-Y');
        $parti = $epart;
        $q1 = mysql_query("SELECT COUNT(*) FROM `add_particulars` where particular='$parti'");
        $q2 = mysql_fetch_row($q1);
        $k4 = $k4 + $q2[0];
        if ($k4 > 0) {
            echo "<script>alert('$epart Already Exists');window.location.href='?page=add_particulars'</script>";
        } else {
            $sql = mysql_query("update particular_code set status='used' where id='$pcode'");
            $sql = mysql_query("insert into particular_code VALUES(NULL,'')");
            $result = mysql_query("insert into add_particulars values(NULL,'$pcode','$epart','$reg_date')");
            if ($result == true) {
                echo "<script>alert('Particulars Added Successfully');window.location.href = '?page=add_particulars'</script>";
            } else {
                echo "<script>alert('OOP's Something Went Wrong Try Again');window.location.href = '?page=add_particulars'</script>";
            }
        }
    }

    function registration() {

        $ref = $_POST['refno'];
        $challan_no = $_POST['challan_no'];
        $name = $_POST['name'];
        $particulars = $_POST['particulars'];
        $pn = $_POST['pn'];
        $mobile = $_POST['mobile'];
        $from = $_POST['from'];
        $to = $_POST['to'];
        $qrent = $_POST['qrent'];
        $echarges = $_POST['echarges'];
        $wcharges = $_POST['wcharges'];
        $maintainence = $_POST['maint'];
        $fine = $_POST['fine'];
        $messrent = $_POST['mrent'];
        $shoprent = $_POST['csr'];
        $servicetax = $_POST['st'];
        $deposit = $_POST['deposit'];
        $missellaneous = $_POST['miss'];
        $total = $_POST['total'];
        $remarks = $_POST['remarks'];
        $ddno = $_POST['ddno'];
        $dddate = $_POST['dddate'];
        $ddplace = $_POST['ddplace'];
        $adate = date('Y-m-d');
        $abdate = date('d-m-Y');
        $payment = '';
        $paymentdate = '';
        $sql = mysql_query("update challan set status='used' where id='$challan_no'");
        $sql = mysql_query("insert into challan VALUES(NULL,'')");
        $sql = mysql_query("update reference set status='used' where id='$ref'");
        $sql = mysql_query("insert into reference VALUES(NULL,'')");
        $sql = mysql_query("INSERT INTO `registration` VALUES (NULL,'$ref','$challan_no','$name','$particulars','$pn','$mobile','$from','$to','$qrent','$echarges','$wcharges','$maintainence','$fine','$messrent','$shoprent','$servicetax','$deposit','$missellaneous','$total','$remarks','$ddno','$dddate','$ddplace','$adate','$abdate','$payment','$paymentdate')");
        $sql = mysql_query("INSERT INTO `allregistration` VALUES (NULL,'$ref','$challan_no','$name','$particulars','$pn','$mobile','$from','$to','$qrent','$echarges','$wcharges','$maintainence','$fine','$messrent','$shoprent','$servicetax','$deposit','$missellaneous','$total','$remarks','$ddno','$dddate','$ddplace','$adate','$abdate','$payment','$paymentdate')");
        if ($sql == true) {
            ?>
            <form method='post' action='pages/challanpdf.php?cno=<?php echo $challan_no ?>'><input align="center" type="submit" name="create_pdf" class="btn btn-primary" style="border-radius: 6px;" value="Generate-Challan" /><br><a href="?page=registration" class="btn btn-primary"><br>Back</a></form>
            <?php
        } else {
            echo "<script>alert('Failed To Enter Try Again Later');window.location.href='?page=registration'</script>";
        }
    }

    function viewdetails() {
        include 'head_foot/header.php';
        include 'head_foot/leftside.php';
        $result = mysql_query("select * from registration order by id desc");
        ?>
        <div class="content-wrapper">
            <div class="page-title">
                <div>
                    <h1>View Registration Details</h1>
                </div>        
            </div>
            <div class="row">
                <div class="container-fluid">
                    <div class="card">
                        <table class="table table-hover" id="sampleTable">
                            <thead>
                                <tr>
                                    <th>SI.no</th>
                                    <th>Challan-No</th>
                                    <th>Name</th>
                                    <th>Particulars</th>
                                    <th>Reference No</th>
                                    <th>From</th>
                                    <th>To</th>
                                    <th>Challan</th>
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
                                        <td><?php echo $row[challanno] ?></td>
                                        <td><?php echo $row[name] ?></td>
                                        <?php
                                        $q1 = mysql_query("select * from add_particulars where particular_code='$row[particulars]'");
                                        $rose = mysql_fetch_array($q1);
                                        ?>
                                        <td><?php echo $rose[particular] ?></td>
                                        <td><?php echo $row[refno] ?></td>
                                        <td><?php echo $row[from1] ?></td>
                                        <td><?php echo $row[to1] ?></td>
            <!--                                        <td><a title="reprint" class="pay" href='?page=challan&cno=<?php echo $row[challanno]; ?>'> Reprint</a></td>-->

                                        <td style="text-align: center"><form method='post' action='pages/challanpdf.php?cno=<?php echo $row[challanno]; ?>'><input type="submit" name="create_pdf" class="btn-primary" style="border-radius: 6px;" value="Reprint" /></form></td>
                                        <td><a title="update" href='?page=editdetails&id=<?php echo $row[id]; ?>' onclick="return confirm('Are you sure want to edit')"><i class="fa fa-pencil fa-2x"style="font-size: 25px!important;color:blue!important;"  aria-hidden="true"></i></a>
                                            <a title="delete" href='?page=del&cno=<?php echo $row[challanno]; ?>' onclick="return confirm('Are you sure want to delete')"><i class="fa fa-trash fa-2x" style="font-size: 25px!important;color:red!important;"  aria-hidden="true"></i></a>
                                        </td> 
                                    </tr>
                                    <?php
                                    $i = $i + 1;
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <?php
        include 'head_foot/footer.php';
    }

    function del() {
        $cno = $_GET['cno'];
        $delete = mysql_query("delete from registration where challanno='$cno'");
        $delete = mysql_query("delete from allregistration where challanno='$cno'");
        if ($delete == true) {
            echo "<script>alert('Deleted Successfully');window.location.href='?page=viewdetails'</script>";
        } else {
            echo "<script>alert('Failed To Enter Try Again Later');window.location.href='?page=registration'</script>";
        }
    }

    function delpart() {
        $id = $_GET['id'];
        $delete = mysql_query("delete from add_particulars where id='$id'");
        if ($delete == true) {
            echo "<script>alert('Deleted Successfully');window.location.href='?page=add_particulars'</script>";
        } else {
            echo "<script>alert('Failed To Enter Try Again Later');window.location.href='?page=add_particulars'</script>";
        }
    }

    function updatepayment() {
        include 'head_foot/header.php';
        include 'head_foot/leftside.php';
        $result = mysql_query("select * from registration where payment='' order by id desc");
        ?>
        <div class="content-wrapper">
            <div class="page-title">
                <div>
                    <h1>Payment Not Done</h1>
                </div>        
            </div>
            <div class="row">
                <div class="container-fluid">
                    <div class="card">
                        <table class="table table-hover" id="sampleTable">
                            <thead>
                                <tr >
                                    <th>SI.no</th>
                                    <th>Challan-No</th>
                                    <th>Name</th>
                                    <th>Particulars</th>
                                    <th>Ref No</th>
                                    <th style="text-align:center">Update</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                while ($row = mysql_fetch_array($result)) {
                                    ?>
                                    <tr>
                                        <td><?php echo $i ?></td>
                                        <td><?php echo $row[challanno] ?></td>
                                        <td><?php echo $row[name] ?></td>
                                        <?php
                                        $q1 = mysql_query("select * from add_particulars where particular_code='$row[particulars]'");
                                        $rose = mysql_fetch_array($q1);
                                        ?>
                                        <td><?php echo $rose[particular] ?></td>
                                        <td><?php echo $row[refno] ?></td>
                                        <td style="text-align:center"><a class="pay" href="?page=addpayment&refno=<?php echo $row[refno] ?>">Pay</a></td>

                                    </tr>
                                    <?php
                                    $i = $i + 1;
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <?php
        include 'head_foot/footer.php';
    }

    function paymentdone() {
        include 'head_foot/header.php';
        include 'head_foot/leftside.php';
        $result = mysql_query("select * from registration where payment='paid' order by id desc");
        ?>
        <div class="content-wrapper">
            <div class="page-title">
                <div>
                    <h1>Payment Done</h1>
                </div>        
            </div>
            <div class="row">
                <div class="container-fluid">
                    <div class="card">
                        <table class="table table-hover" id="sampleTable">
                            <thead>
                                <tr>
                                    <th>SI.no</th>
                                    <th>Challan-No</th>
                                    <th>Name</th>
                                    <th>Particulars</th>
                                    <th>Ref No</th>
                                    <th>Payment</th>
                                    <th>Payment-Date</th>
                                    <th style="text-align: center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                while ($row = mysql_fetch_array($result)) {
                                    ?>
                                    <tr>
                                        <td><?php echo $i ?></td>
                                        <td><?php echo $row[challanno] ?></td>
                                        <td><?php echo $row[name] ?></td>
                                        <?php
                                        $q1 = mysql_query("select * from add_particulars where particular_code='$row[particulars]'");
                                        $rose = mysql_fetch_array($q1);
                                        ?>
                                        <td><?php echo $rose[particular] ?></td>
                                        <td><?php echo $row[refno] ?></td>
                                        <td><?php echo $row[payment] ?></td>
                                        <td><?php echo $row[payment_date] ?></td>
                                        <td align="center"><a title="Edit" href='?page=editpay&id=<?php echo $row[id]; ?>' onclick="return confirm('Are you sure want to edit')"><i class="fa fa-pencil fa-2x"style="font-size: 25px!important;color:blue!important;"  aria-hidden="true"></i></a>
                                            <a title="Edit" href='?page=editdel&id=<?php echo $row[id]; ?>' onclick="return confirm('Are you sure want to delete')"><i class="fa fa-trash fa-2x"style="font-size: 25px!important;color:red!important;"  aria-hidden="true"></i></a>
                                        </td>
                                    </tr>
                                    <?php
                                    $i = $i + 1;
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <?php
        include 'head_foot/footer.php';
    }

    function editdetails() {
        $id = $_POST['id'];
        $challan_no = $_POST['challan_no'];
        $name = $_POST['name'];
        $particulars = $_POST['particulars'];
        $pn = $_POST['pn'];
        $mobile = $_POST['mobile'];
        $from = $_POST['from'];
        $to = $_POST['to'];
        $qrent = $_POST['qrent'];
        $echarges = $_POST['echarges'];
        $wcharges = $_POST['wcharges'];
        $maintainence = $_POST['maint'];
        $fine = $_POST['fine'];
        $messrent = $_POST['mrent'];
        $shoprent = $_POST['csr'];
        $servicetax = $_POST['st'];
        $deposit = $_POST['deposit'];
        $missellaneous = $_POST['miss'];
        $total = $_POST['total'];
        $remarks = $_POST['remarks'];
        $ddno = $_POST['ddno'];
        $dddate = $_POST['dddate'];
        $ddplace = $_POST['ddplace'];
        $sql = mysql_query("update registration set `name`='$name',`particulars`='$particulars',`particulars_name`='$pn',`mobile`='$mobile',`from1`='$from',`to1`='$to',`quarters_rent`='$qrent',`elect_charges`='$echarges',`water_charges`='$wcharges',`maint`='$maintainence',`fine`='$fine',`mess_rent`='$messrent',`shop_rent`='$shoprent',`service_tax`='$servicetax',`deposit`='$deposit',`miscellaneous`='$missellaneous',`total`='$total',`remarks`='$remarks',`dd_no`='$ddno',`dd_date`='$dddate',`dd_place`='$ddplace' where challanno='$challan_no'");
        $sql = mysql_query("update allregistration set `name`='$name',`particulars`='$particulars',`particulars_name`='$pn',`mobile`='$mobile',`from1`='$from',`to1`='$to',`quarters_rent`='$qrent',`elect_charges`='$echarges',`water_charges`='$wcharges',`maint`='$maintainence',`fine`='$fine',`mess_rent`='$messrent',`shop_rent`='$shoprent',`service_tax`='$servicetax',`deposit`='$deposit',`miscellaneous`='$missellaneous',`total`='$total',`remarks`='$remarks',`dd_no`='$ddno',`dd_date`='$dddate',`dd_place`='$ddplace' where challanno='$challan_no'");

        if ($sql == true) {
            echo "<script>alert('Registered Updated Successfully');window.location.href = '?page=viewdetails'</script>";
        } else {
            echo "<script>alert('OOP's Something Went Wrong Try Again');window.location.href = '?page=editdetails&id=$id'</script>";
        }
    }

    function addpayment() {
        $refno = $_POST['refno'];
        $cno = $_POST['cno'];
        $name = $_POST['name'];
        $payment = $_POST['payment'];
        $update = mysql_query("update allregistration set `payment`='paid',`payment_date`='$payment' where refno = '$refno'");
        $update = mysql_query("update registration set `payment`='paid',`payment_date`='$payment' where refno = '$refno'");
        if ($update == true) {
            echo "<script>alert('Payment Updated Successfully');window.location.href = '?page=updatepayment'</script>";
        } else {
            echo "<script>alert('OOP's Something Went Wrong Try Again');window.location.href = '?page=addpayment&refno=$refno'</script>";
        }
    }

    function fun($xyz) {
        $res = mysql_query("select $xyz from company");
        $row = mysql_fetch_array($res);
        echo $row["$xyz"];
    }

    function challanreprint() {
        include 'head_foot/header.php';
        include 'head_foot/leftside.php';
        $result = mysql_query("select * from registration order by id desc");
        ?>
        <div class="content-wrapper">
            <div class="page-title">
                <div>
                    <h1>Challan Reprint</h1>
                </div>        
            </div>
            <div class="row">
                <div class="container-fluid">
                    <div class="card">
                        <table class="table table-hover" id="">
                            <thead>
                                <tr>
                                    <th>SI.no</th>
                                    <th>Challan-No</th>
                                    <th>Name</th>
                                    <th>Particulars</th>
                                    <th>Reference No</th>
                                    <th>From</th>
                                    <th>To</th>
                                    <th>Challan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                while ($row = mysql_fetch_array($result)) {
                                    ?>
                                    <tr>
                                        <td><?php echo $i ?></td>
                                        <td><?php echo $row[challanno] ?></td>
                                        <td><?php echo $row[name] ?></td>
                                        <?php
                                        $q1 = mysql_query("select * from add_particulars where particular_code='$row[particulars]'");
                                        $rose = mysql_fetch_array($q1);
                                        ?>
                                        <td><?php echo $rose[particular] ?></td>
                                        <td><?php echo $row[refno] ?></td>
                                        <td><?php echo $row[from1] ?></td>
                                        <td><?php echo $row[to1] ?></td>
                                        <!--<td><a title="reprint" class="pay" href='?page=challan&cno=<?php echo $row[challanno]; ?>'> Reprint</a></td>-->
                                        <td style="text-align: center"><form method='post' action='pages/challanpdf.php?cno=<?php echo $row[challanno]; ?>'><input type="submit" name="create_pdf" class="btn-primary" style="border-radius: 6px;" value="Reprint" /></form></td>

                                    </tr>
                                    <?php
                                    $i = $i + 1;
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <?php
        include 'head_foot/footer.php';
    }

    function date_wise() {
        include 'head_foot/header.php';
        include 'head_foot/leftside.php';
        $from = $_POST['from_date'];
        $to = $_POST['to_date'];
        $pay = "paid";
        $result = mysql_query("SELECT * FROM registration WHERE payment_date between '$from' AND '$to' and payment='paid'");
        ?>

        <div class="content-wrapper">
            <div class="page-title">
                <div>
                    <h1>Statement Of Quarters / Particulars &nbsp;&nbsp;<b><?php echo"From : $from - To $to"; ?></h1>
                </div> 
                <form method="post" action="pages/datepdf.php?from=<?php echo"$from"; ?>&to=<?php echo "$to"; ?>">
                    <input type="submit" name="create_pdf" class="btn btn-primary" value="Create pdf" />  
                </form>
            </div>
            <div class="row">
                <div class="container-fluid">
                    <div class="card">
                        <table class="table table-hover" >
                            <thead>

                                <tr>
                                    <th>SI.no</th>
                                    <th>Challan-No</th>
                                    <th>Name</th>
                                    <th>Particulars</th>
                                    <th>Reference No</th>
                                    <th>From</th>
                                    <th>To</th>
                                    <th>Payment Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                while ($row = mysql_fetch_array($result)) {
                                    ?>
                                    <tr>
                                        <td><?php echo $i ?></td>
                                        <td><?php echo $row[challanno] ?></td>
                                        <td><?php echo $row[name] ?></td>
                                        <td><?php echo $row[particulars_name] ?></td>
                                        <td><?php echo $row[refno] ?></td>
                                        <td><?php echo $row[from1] ?></td>
                                        <td><?php echo $row[to1] ?></td>
                                        <td><?php echo $row[payment_date] ?></td>

                                    </tr>
                                    <?php
                                    $i = $i + 1;
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <?php
        include 'head_foot/footer.php';
    }

    function todaysreg() {
        include 'head_foot/header.php';
        include 'head_foot/leftside.php';
        $adate = $_GET['ad'];
        $result = mysql_query("SELECT * FROM registration WHERE adate ='$adate'");
        ?>
        <div class="content-wrapper">
            <div class="page-title">
                <div>
                    <h1>Today Registration &nbsp;&nbsp;<b><?php echo"Date : $adate"; ?></h1>
                </div>        
            </div>
            <div class="row">
                <div class="container-fluid">
                    <div class="card">
                        <table class="table table-bordered" >
                            <thead>

                                <tr>
                                    <th>SI.no</th>
                                    <th>Challan-No</th>
                                    <th>Name</th>
                                    <th>Particulars</th>
                                    <th>Reference No</th>
                                    <th>From</th>
                                    <th>To</th>
                                    <th>Challan</th>
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
                                        <td><?php echo $row[challanno] ?></td>
                                        <td><?php echo $row[name] ?></td>
                                        <?php
                                        $q1 = mysql_query("select * from add_particulars where particular_code='$row[particulars]'");
                                        $rose = mysql_fetch_array($q1);
                                        ?>
                                        <td><?php echo $rose[particular] ?></td>
                                        <td><?php echo $row[refno] ?></td>
                                        <td><?php echo $row[from1] ?></td>
                                        <td><?php echo $row[to1] ?></td>
                                        <!--<td><a title="reprint" class="pay" href='?page=challan&cno=<?php echo $row[challanno]; ?>'> Reprint</a></td>-->
                                        <td style="text-align: center"><form method='post' action='pages/challanpdf.php?cno=<?php echo $row[challanno]; ?>'><input type="submit" name="create_pdf" class="pay" value="Reprint" /></form></td>
                                        <td><a title="update" href='?page=editdetails&id=<?php echo $row[id]; ?>' onclick="return confirm('Are you sure want to edit')"><i class="fa fa-pencil" style="color:blue!important;font-size: 25px!important;" aria-hidden="true"></i></a>
                                            <a title="delete" href='' onclick="return confirm('Are you sure want to delete')"><i class="fa fa-trash fa-2x" style="font-size: 25px!important;color:red!important;"  aria-hidden="true"></i></a>
                                        </td> 
                                    </tr>
                                    <?php
                                    $i = $i + 1;
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <?php
        include 'head_foot/footer.php';
    }

    function todayspay() {
        include 'head_foot/header.php';
        include 'head_foot/leftside.php';
        $adate = $_GET['ad'];
        $result = mysql_query("SELECT * FROM registration WHERE adate ='$adate' and payment='paid'");
        ?>
        <div class="content-wrapper">
            <div class="page-title">
                <div>
                    <h1>Today's Payment &nbsp;&nbsp;<b><?php echo"Date : $adate"; ?></h1>
                </div>        
            </div>
            <div class="row">
                <div class="container-fluid">
                    <div class="card">
                        <table class="table table-bordered" >
                            <thead>

                                <tr>
                                    <th>SI.no</th>
                                    <th>Challan-No</th>
                                    <th>Name</th>
                                    <th>Particulars</th>
                                    <th>Ref No</th>
                                    <th>Payment</th>
                                    <th>Paid</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                while ($row = mysql_fetch_array($result)) {
                                    ?>
                                    <tr>
                                        <td><?php echo $i ?></td>
                                        <td><?php echo $row[challanno] ?></td>
                                        <td><?php echo $row[name] ?></td>
                                        <?php
                                        $q1 = mysql_query("select * from add_particulars where particular_code='$row[particulars]'");
                                        $rose = mysql_fetch_array($q1);
                                        ?>
                                        <td><?php echo $rose[particular] ?></td>
                                        <td><?php echo $row[refno] ?></td>
                                        <td><?php echo $row[payment] ?></td>
                                        <td><?php echo $row[payment_date] ?></td>
                                    </tr>
                                    <?php
                                    $i = $i + 1;
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <?php
        include 'head_foot/footer.php';
    }

    function editpay() {
        $refno = $_POST['refno'];
        $cno = $_POST['cno'];
        $name = $_POST['name'];
        $payment = $_POST['payment'];
        $update = mysql_query("update allregistration set `payment_date`='$payment' where refno = '$refno'");
        $update = mysql_query("update registration set `payment_date`='$payment' where refno = '$refno'");
        if ($update == true) {
            echo "<script>alert('Payment Updated Successfully');window.location.href = '?page=paymentdone'</script>";
        } else {
            echo "<script>alert('OOP's Something Went Wrong Try Again');window.location.href = '?page=paymentdone&refno=$refno'</script>";
        }
    }

    function editdel() {
        $id = $_GET['id'];
        $update = mysql_query("update registration set `payment`='',`payment_date`='' where id='$id'");
        $update = mysql_query("update allregistration set `payment`='',`payment_date`='' where id='$id'");
        if ($update == true) {
            echo "<script>alert('Deleted Successfully');window.location.href = '?page=paymentdone'</script>";
        } else {
            echo "<script>alert('OOP's Something Went Wrong Try Again');window.location.href = '?page=paymentdone'</script>";
        }
    }

    function fees_report() {
        include 'head_foot/header.php';
        include 'head_foot/leftside.php';
        $from = $_POST['from_date'];
        $to = $_POST['to_date'];
        $result1 = mysql_query("SELECT SUM(total) AS value_sum FROM registration  WHERE payment_date between '$from' AND '$to' and payment='paid'");
        $rowss = mysql_fetch_assoc($result1);
        $sum = $rowss['value_sum'];


        $pay = "paid";
        $result = mysql_query("SELECT * FROM registration WHERE payment_date between '$from' AND '$to' and payment='$pay'");
        ?>

        <div class="content-wrapper">
            <div class="page-title">
                <div>
                    <h1>Statement Of Quarters / Particulars &nbsp;&nbsp;<b><?php echo"From : $from - To $to"; ?></h1>
                </div> 
                <form method="post" action="pages/datfees.php?from=<?php echo"$from"; ?>&to=<?php echo "$to"; ?>&sum=<?php echo $sum; ?>">
                    <input type="submit" name="create_pdf" class="btn btn-primary" value="Create pdf" />  
                    <a href="?page=total_report" class='btn btn-primary prim'>Back</a>
                </form>
            </div>
            <div class="row">
                <div class="container-fluid">
                    <div class="card">
                        <table class="table table-hover" id="">
                            <thead>

                                <tr>
                                    <th>SI.no</th>
                                    <th>Challan-No</th>
                                    <th>Name</th>
                                    <th>Quarters</th>
                                    <th>Electricity</th>
                                    <th>Water</th>
                                    <th>Maintanence</th>
                                    <th>Fine</th>
                                    <th>Mess</th>
                                    <th>Shop</th>
                                    <th>Service</th>
                                    <th>Deposit</th>
                                    <th>Missellaneous</th>
                                    <th>total</th>
                                    <th>Pay Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                while ($row = mysql_fetch_array($result)) {
                                    ?>
                                    <tr>
                                        <td><?php echo $i ?></td>
                                        <td><?php echo $row[challanno] ?></td>
                                        <td><?php echo $row[name] ?></td>
                                        <td><?php echo $row[quarters_rent] ?></td>
                                        <td><?php echo $row[elect_charges] ?></td>
                                        <td><?php echo $row[water_charges] ?></td>
                                        <td><?php echo $row[maint] ?></td>
                                        <td><?php echo $row[fine] ?></td>
                                        <td><?php echo $row[mess_rent] ?></td>
                                        <td><?php echo $row[shop_rent] ?></td>
                                        <td><?php echo $row[service_tax] ?></td>
                                        <td><?php echo $row[deposit] ?></td>
                                        <td><?php echo $row[miscellaneous] ?></td>
                                        <td><?php echo $row[total] ?></td>
                                        <td><?php echo $row[payment_date] ?></td>
                                    </tr>
                                    <?php
                                    $i = $i + 1;
                                }
                                ?>
                            </tbody>
                        </table>
                        <label><h4>Total Amount = <?php echo "$sum"; ?></h4></label> 
                    </div>
                </div>
            </div>
        </div>

        <?php
        include 'head_foot/footer.php';
    }

    function editpart() {
        $id = $_POST['id'];
        $epart = $_POST['epart'];
        $reg_date = date('d-m-Y');

        $update = mysql_query("update add_particulars set `particular`='$epart',`reg_date`='$reg_date' where id='$id'");
        if ($update == true) {
            echo "<script>alert('Updated Successfully');window.location.href='?page=add_particulars'</script>";
        } else {
            echo "<script>alert('Failed To Enter Try Again Later');window.location.href='?page=add_particulars'</script>";
        }
    }

    function adduser() {
        $uname = $_POST['uname'];
        $pass = $_POST['pass'];
        $mobile = $_POST['mobile'];
        $address = $_POST['address'];
        $users = $uname;
        $q1 = mysql_query("SELECT COUNT(*) FROM `admin` where username='$users'");
        $q2 = mysql_fetch_row($q1);
        $k4 = $k4 + $q2[0];
        if ($k4 > 0) {
            echo "<script>alert('User $uname Already Exists Please Select a valid username');window.location.href='?page=adduser'</script>";
        } else {
            $insert = mysql_query("insert into admin values(NULL,'$uname','$pass','$address','$mobile')");
            if ($insert == true) {
                echo "<script>alert('User Added Successfully ');window.location.href='?page=adduser'</script>";
            } else {
                echo "<script>alert('Failed To Enter Try Again Later');window.location.href='?page=adduser'</script>";
            }
        }
    }

    function delusr() {
        $id = $_GET['id'];
        $del = mysql_query("delete from admin where id='$id'");
        if ($del == true) {
            echo "<script>alert('User Deleted Successfully ');window.location.href='?page=adduser'</script>";
        } else {
            echo "<script>alert('Failed To Enter Try Again Later');window.location.href='?page=adduser'</script>";
        }
    }

    function qtrsreport() {
        include 'head_foot/header.php';
        include 'head_foot/leftside.php';
        include 'pages/wordfun.php';
        $from = $_POST['from_date'];
        $to = $_POST['to_date'];
        $pay = "paid";
        $result = mysql_query("SELECT * FROM registration WHERE payment='paid' AND payment_date between '$from' AND '$to'");
        $result1 = mysql_query("SELECT SUM(quarters_rent) AS value_sum FROM registration  where payment='$pay' and payment_date between '$from' AND '$to'");
        $rowss = mysql_fetch_assoc($result1);
        $sum = $rowss['value_sum'];
        ?>

        <div class="content-wrapper">
            <div class="page-title">
                <div>
                    <h1>Quarters Date Wise Report From - <?php echo $from; ?> &  To - <?php echo $to; ?></h1>
                </div> 
                <form method="post" action="pages/qdatepdf.php?sum=<?php echo"$sum"; ?>&from=<?php echo "$from"; ?>&to=<?php echo "$to" ?>">
                    <input type="submit" name="create_pdf" class="btn btn-primary" value="Generate Report" />  
                    <a href="?page=qtrs_report" class='btn btn-primary prim'>Back</a>
                </form>
            </div>
            <div class="row">
                <div class="container-fluid">
                    <div class="card">
                        <fieldset>
                            <table class="table table-hover table-bordered" id="">

                                <thead>
                                    <tr>
                                        <th>SI.no</th>
                                        <th>Challan-No</th>
                                        <th>Name</th>
                                        <th>Particulars</th>
                                        <th>Payment Date</th>
                                        <th>From</th>
                                        <th>To</th>
                                        <th>Quarters-Fees</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    while ($row = mysql_fetch_array($result)) {
                                        ?>
                                        <tr>
                                            <td><?php echo $i ?></td>
                                            <td><?php echo $row[challanno] ?></td>
                                            <td><?php echo $row[name] ?></td>
                                            <?php
                                            $q1 = mysql_query("select * from add_particulars where particular_code='$row[particulars]'");
                                            $rose = mysql_fetch_array($q1);
                                            ?>
                                            <td><?php echo $rose[particular] ?></td>
                                            <td><?php echo $row[payment_date] ?></td>
                                            <td><?php echo $row[from1] ?></td>
                                            <td><?php echo $row[to1] ?></td>
                                            <td><?php echo $row[quarters_rent] ?></td>
                                        </tr>
                                        <?php
                                        $i = $i + 1;
                                    }
                                    ?>
                                </tbody>
                            </table>
                            <label><h4>Total Amount = <?php echo "$sum"; ?></h4></label><br>
                            <label><h4>In Words = <?php echo getIndianCurrency($sum) ?></h4></label>
                        </fieldset>
                    </div>
                </div>
            </div>
        </div>


        <?php
        include 'head_foot/footer.php';
    }

    function electreport() {
        include 'head_foot/header.php';
        include 'head_foot/leftside.php';
        include 'pages/wordfun.php';
        $from = $_POST['from_date'];
        $to = $_POST['to_date'];
        $pay = "paid";
        $result = mysql_query("SELECT * FROM registration WHERE payment_date between '$from' AND '$to' and payment='$pay'");
        $result1 = mysql_query("SELECT SUM(elect_charges) AS value_sum FROM registration  where payment='$pay' and payment_date between '$from' AND '$to'");
        $rowss = mysql_fetch_assoc($result1);
        $sum = $rowss['value_sum'];
        ?>

        <div class="content-wrapper">
            <div class="page-title">
                <div>
                    <h1>Electrical Date Wise Report From - <?php echo $from; ?> &  To - <?php echo $to; ?></h1>
                </div> 
                <form method="post" action="pages/edatepdf.php?sum=<?php echo"$sum"; ?>&from=<?php echo "$from"; ?>&to=<?php echo "$to" ?>">
                    <input type="submit" name="create_pdf" class="btn btn-primary" value="Generate Report" />  
                    <a href="?page=elect_report" class='btn btn-primary prim'>Back</a>
                </form>
            </div>
            <div class="row">
                <div class="container-fluid">
                    <div class="card">
                        <fieldset>
                            <table class="table table-hover table-bordered" id="">

                                <thead>
                                    <tr>
                                        <th>SI.no</th>
                                        <th>Challan-No</th>
                                        <th>Name</th>
                                        <th>Particulars</th>
                                        <th>Payment Date</th>
                                        <th>From</th>
                                        <th>To</th>
                                        <th>Quarters-Fees</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    while ($row = mysql_fetch_array($result)) {
                                        ?>
                                        <tr>
                                            <td><?php echo $i ?></td>
                                            <td><?php echo $row[challanno] ?></td>
                                            <td><?php echo $row[name] ?></td>
                                            <?php
                                            $q1 = mysql_query("select * from add_particulars where particular_code='$row[particulars]'");
                                            $rose = mysql_fetch_array($q1);
                                            ?>
                                            <td><?php echo $rose[particular] ?></td>
                                            <td><?php echo $row[payment_date] ?></td>
                                            <td><?php echo $row[from1] ?></td>
                                            <td><?php echo $row[to1] ?></td>
                                            <td><?php echo $row[elect_charges] ?></td>
                                        </tr>
                                        <?php
                                        $i = $i + 1;
                                    }
                                    ?>
                                </tbody>
                            </table>
                            <label><h4>Total Amount = <?php echo "$sum"; ?></h4></label><br>
                            <label><h4>In Words = <?php echo getIndianCurrency($sum) ?></h4></label>
                        </fieldset>
                    </div>
                </div>
            </div>
        </div>


        <?php
        include 'head_foot/footer.php';
    }

    function waterreport() {
        include 'head_foot/header.php';
        include 'head_foot/leftside.php';
        include 'pages/wordfun.php';
        $from = $_POST['from_date'];
        $to = $_POST['to_date'];
        $pay = "paid";
        $result = mysql_query("SELECT * FROM registration WHERE payment_date between '$from' AND '$to' and payment='$pay'");
        $result1 = mysql_query("SELECT SUM(water_charges) AS value_sum FROM registration  where payment='$pay' and payment_date between '$from' AND '$to'");
        $rowss = mysql_fetch_assoc($result1);
        $sum = $rowss['value_sum'];
        ?>

        <div class="content-wrapper">
            <div class="page-title">
                <div>
                    <h1>Water Date Wise Report From - <?php echo $from; ?> &  To - <?php echo $to; ?></h1>
                </div> 
                <form method="post" action="pages/wdatepdf.php?sum=<?php echo"$sum"; ?>&from=<?php echo "$from"; ?>&to=<?php echo "$to" ?>">
                    <input type="submit" name="create_pdf" class="btn btn-primary" value="Generate Report" />  
                    <a href="?page=water_report" class='btn btn-primary prim'>Back</a>
                </form>
            </div>
            <div class="row">
                <div class="container-fluid">
                    <div class="card">
                        <fieldset>
                            <table class="table table-hover table-bordered" id="">

                                <thead>
                                    <tr>
                                        <th>SI.no</th>
                                        <th>Challan-No</th>
                                        <th>Name</th>
                                        <th>Particulars</th>
                                        <th>Payment Date</th>
                                        <th>From</th>
                                        <th>To</th>
                                        <th>Water-Fees</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    while ($row = mysql_fetch_array($result)) {
                                        ?>
                                        <tr>
                                            <td><?php echo $i ?></td>
                                            <td><?php echo $row[challanno] ?></td>
                                            <td><?php echo $row[name] ?></td>
                                            <?php
                                            $q1 = mysql_query("select * from add_particulars where particular_code='$row[particulars]'");
                                            $rose = mysql_fetch_array($q1);
                                            ?>
                                            <td><?php echo $rose[particular] ?></td>
                                            <td><?php echo $row[payment_date] ?></td>
                                            <td><?php echo $row[from1] ?></td>
                                            <td><?php echo $row[to1] ?></td>
                                            <td><?php echo $row[water_charges] ?></td>
                                        </tr>
                                        <?php
                                        $i = $i + 1;
                                    }
                                    ?>
                                </tbody>
                            </table>
                            <label><h4>Total Amount = <?php echo "$sum"; ?></h4></label><br>
                            <label><h4>In Words = <?php echo getIndianCurrency($sum) ?></h4></label>
                        </fieldset>
                    </div>
                </div>
            </div>
        </div>


        <?php
        include 'head_foot/footer.php';
    }

    function maintreport() {
        include 'head_foot/header.php';
        include 'head_foot/leftside.php';
        include 'pages/wordfun.php';
        $from = $_POST['from_date'];
        $to = $_POST['to_date'];
        $pay = "paid";
        $result = mysql_query("SELECT * FROM registration WHERE payment_date between '$from' AND '$to' and payment='$pay'");
        $result1 = mysql_query("SELECT SUM(maint) AS value_sum FROM registration  where payment='$pay' and payment_date between '$from' AND '$to'");
        $rowss = mysql_fetch_assoc($result1);
        $sum = $rowss['value_sum'];
        ?>

        <div class="content-wrapper">
            <div class="page-title">
                <div>
                    <h1>Maintainence Date Wise Report From - <?php echo $from; ?> &  To - <?php echo $to; ?></h1>
                </div> 
                <form method="post" action="pages/mtdatepdf.php?sum=<?php echo"$sum"; ?>&from=<?php echo "$from"; ?>&to=<?php echo "$to" ?>">
                    <input type="submit" name="create_pdf" class="btn btn-primary" value="Generate Report" />  
                    <a href="?page=maint_report" class='btn btn-primary prim'>Back</a>
                </form>
            </div>
            <div class="row">
                <div class="container-fluid">
                    <div class="card">
                        <fieldset>
                            <table class="table table-hover table-bordered" id="">

                                <thead>
                                    <tr>
                                        <th>SI.no</th>
                                        <th>Challan-No</th>
                                        <th>Name</th>
                                        <th>Particulars</th>
                                        <th>Payment Date</th>
                                        <th>From</th>
                                        <th>To</th>
                                        <th>Maintainence</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    while ($row = mysql_fetch_array($result)) {
                                        ?>
                                        <tr>
                                            <td><?php echo $i ?></td>
                                            <td><?php echo $row[challanno] ?></td>
                                            <td><?php echo $row[name] ?></td>
                                            <?php
                                            $q1 = mysql_query("select * from add_particulars where particular_code='$row[particulars]'");
                                            $rose = mysql_fetch_array($q1);
                                            ?>
                                            <td><?php echo $rose[particular] ?></td>
                                            <td><?php echo $row[payment_date] ?></td>
                                            <td><?php echo $row[from1] ?></td>
                                            <td><?php echo $row[to1] ?></td>
                                            <td><?php echo $row[maint] ?></td>
                                        </tr>
                                        <?php
                                        $i = $i + 1;
                                    }
                                    ?>
                                </tbody>
                            </table>
                            <label><h4>Total Amount = <?php echo "$sum"; ?></h4></label><br>
                            <label><h4>In Words = <?php echo getIndianCurrency($sum) ?></h4></label>
                        </fieldset>
                    </div>
                </div>
            </div>
        </div>


        <?php
        include 'head_foot/footer.php';
    }

    function latereport() {
        include 'head_foot/header.php';
        include 'head_foot/leftside.php';
        include 'pages/wordfun.php';
        $from = $_POST['from_date'];
        $to = $_POST['to_date'];
        $pay = "paid";
        $result = mysql_query("SELECT * FROM registration WHERE payment_date between '$from' AND '$to' and payment='$pay'");
        $result1 = mysql_query("SELECT SUM(fine) AS value_sum FROM registration  where payment='$pay' and payment_date between '$from' AND '$to'");
        $rowss = mysql_fetch_assoc($result1);
        $sum = $rowss['value_sum'];
        ?>

        <div class="content-wrapper">
            <div class="page-title">
                <div>
                    <h1>Fine/Late/Penalty Date Wise Report From - <?php echo $from; ?> &  To - <?php echo $to; ?></h1>
                </div> 
                <form method="post" action="pages/fdatepdf.php?sum=<?php echo"$sum"; ?>&from=<?php echo "$from"; ?>&to=<?php echo "$to" ?>">
                    <input type="submit" name="create_pdf" class="btn btn-primary" value="Generate Report" />  
                    <a href="?page=late_report" class='btn btn-primary prim'>Back</a>
                </form>
            </div>
            <div class="row">
                <div class="container-fluid">
                    <div class="card">
                        <fieldset>
                            <table class="table table-hover table-bordered" id="">

                                <thead>
                                    <tr>
                                        <th>SI.no</th>
                                        <th>Challan-No</th>
                                        <th>Name</th>
                                        <th>Particulars</th>
                                        <th>Payment Date</th>
                                        <th>From</th>
                                        <th>To</th>
                                        <th>Fine</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    while ($row = mysql_fetch_array($result)) {
                                        ?>
                                        <tr>
                                            <td><?php echo $i ?></td>
                                            <td><?php echo $row[challanno] ?></td>
                                            <td><?php echo $row[name] ?></td>
                                            <?php
                                            $q1 = mysql_query("select * from add_particulars where particular_code='$row[particulars]'");
                                            $rose = mysql_fetch_array($q1);
                                            ?>
                                            <td><?php echo $rose[particular] ?></td>
                                            <td><?php echo $row[payment_date] ?></td>
                                            <td><?php echo $row[from1] ?></td>
                                            <td><?php echo $row[to1] ?></td>
                                            <td><?php echo $row[fine] ?></td>
                                        </tr>
                                        <?php
                                        $i = $i + 1;
                                    }
                                    ?>
                                </tbody>
                            </table>
                            <label><h4>Total Amount = <?php echo "$sum"; ?></h4></label><br>
                            <label><h4>In Words = <?php echo getIndianCurrency($sum) ?></h4></label>
                        </fieldset>
                    </div>
                </div>
            </div>
        </div>


        <?php
        include 'head_foot/footer.php';
    }

    function meesreport() {
        include 'head_foot/header.php';
        include 'head_foot/leftside.php';
        include 'pages/wordfun.php';
        $from = $_POST['from_date'];
        $to = $_POST['to_date'];
        $pay = "paid";
        $result = mysql_query("SELECT * FROM registration WHERE payment_date between '$from' AND '$to' and payment='$pay'");
        $result1 = mysql_query("SELECT SUM(mess_rent) AS value_sum FROM registration  where payment='$pay' and payment_date between '$from' AND '$to'");
        $rowss = mysql_fetch_assoc($result1);
        $sum = $rowss['value_sum'];
        ?>

        <div class="content-wrapper">
            <div class="page-title">
                <div>
                    <h1>Mess Rent Date Wise Report From - <?php echo $from; ?> &  To - <?php echo $to; ?></h1>
                </div> 
                <form method="post" action="pages/messdatepdf.php?sum=<?php echo"$sum"; ?>&from=<?php echo "$from"; ?>&to=<?php echo "$to" ?>">
                    <input type="submit" name="create_pdf" class="btn btn-primary" value="Generate Report" />  
                    <a href="?page=mees_report" class='btn btn-primary prim'>Back</a>
                </form>
            </div>
            <div class="row">
                <div class="container-fluid">
                    <div class="card">
                        <fieldset>
                            <table class="table table-hover table-bordered" id="">

                                <thead>
                                    <tr>
                                        <th>SI.no</th>
                                        <th>Challan-No</th>
                                        <th>Name</th>
                                        <th>Particulars</th>
                                        <th>Payment Date</th>
                                        <th>From</th>
                                        <th>To</th>
                                        <th>Mess Rent</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    while ($row = mysql_fetch_array($result)) {
                                        ?>
                                        <tr>
                                            <td><?php echo $i ?></td>
                                            <td><?php echo $row[challanno] ?></td>
                                            <td><?php echo $row[name] ?></td>
                                            <?php
                                            $q1 = mysql_query("select * from add_particulars where particular_code='$row[particulars]'");
                                            $rose = mysql_fetch_array($q1);
                                            ?>
                                            <td><?php echo $rose[particular] ?></td>
                                            <td><?php echo $row[payment_date] ?></td>
                                            <td><?php echo $row[from1] ?></td>
                                            <td><?php echo $row[to1] ?></td>
                                            <td><?php echo $row[mess_rent] ?></td>
                                        </tr>
                                        <?php
                                        $i = $i + 1;
                                    }
                                    ?>
                                </tbody>
                            </table>
                            <label><h4>Total Amount = <?php echo "$sum"; ?></h4></label><br>
                            <label><h4>In Words = <?php echo getIndianCurrency($sum) ?></h4></label>
                        </fieldset>
                    </div>
                </div>
            </div>
        </div>


        <?php
        include 'head_foot/footer.php';
    }

    function comreport() {
        include 'head_foot/header.php';
        include 'head_foot/leftside.php';
        include 'pages/wordfun.php';
        $from = $_POST['from_date'];
        $to = $_POST['to_date'];
        $pay = "paid";
        $result = mysql_query("SELECT * FROM registration WHERE payment_date between '$from' AND '$to' and payment='$pay'");
        $result1 = mysql_query("SELECT SUM(shop_rent) AS value_sum FROM registration  where payment='$pay' and payment_date between '$from' AND '$to'");
        $rowss = mysql_fetch_assoc($result1);
        $sum = $rowss['value_sum'];
        ?>

        <div class="content-wrapper">
            <div class="page-title">
                <div>
                    <h1>Shop Rent Date Wise Report From - <?php echo $from; ?> &  To - <?php echo $to; ?></h1>
                </div> 
                <form method="post" action="pages/shopdatepdf.php?sum=<?php echo"$sum"; ?>&from=<?php echo "$from"; ?>&to=<?php echo "$to" ?>">
                    <input type="submit" name="create_pdf" class="btn btn-primary" value="Generate Report" />  
                    <a href="?page=commer_report" class='btn btn-primary prim'>Back</a>
                </form>
            </div>
            <div class="row">
                <div class="container-fluid">
                    <div class="card">
                        <fieldset>
                            <table class="table table-hover table-bordered" id="">

                                <thead>
                                    <tr>
                                        <th>SI.no</th>
                                        <th>Challan-No</th>
                                        <th>Name</th>
                                        <th>Particulars</th>
                                        <th>Payment Date</th>
                                        <th>From</th>
                                        <th>To</th>
                                        <th>Shop Rent</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    while ($row = mysql_fetch_array($result)) {
                                        ?>
                                        <tr>
                                            <td><?php echo $i ?></td>
                                            <td><?php echo $row[challanno] ?></td>
                                            <td><?php echo $row[name] ?></td>
                                            <?php
                                            $q1 = mysql_query("select * from add_particulars where particular_code='$row[particulars]'");
                                            $rose = mysql_fetch_array($q1);
                                            ?>
                                            <td><?php echo $rose[particular] ?></td>
                                            <td><?php echo $row[payment_date] ?></td>
                                            <td><?php echo $row[from1] ?></td>
                                            <td><?php echo $row[to1] ?></td>
                                            <td><?php echo $row[shop_rent] ?></td>
                                        </tr>
                                        <?php
                                        $i = $i + 1;
                                    }
                                    ?>
                                </tbody>
                            </table>
                            <label><h4>Total Amount = <?php echo "$sum"; ?></h4></label><br>
                            <label><h4>In Words = <?php echo getIndianCurrency($sum) ?></h4></label>
                        </fieldset>
                    </div>
                </div>
            </div>
        </div>


        <?php
        include 'head_foot/footer.php';
    }

    function miscellaneousreport() {
        include 'head_foot/header.php';
        include 'head_foot/leftside.php';
        include 'pages/wordfun.php';
        $from = $_POST['from_date'];
        $to = $_POST['to_date'];
        $pay = "paid";
        $result = mysql_query("SELECT * FROM registration WHERE payment_date between '$from' AND '$to' and payment='$pay'");
        $result1 = mysql_query("SELECT SUM(miscellaneous) AS value_sum FROM registration  where payment='$pay' and payment_date between '$from' AND '$to'");
        $rowss = mysql_fetch_assoc($result1);
        $sum = $rowss['value_sum'];
        ?>

        <div class="content-wrapper">
            <div class="page-title">
                <div>
                    <h1>Miscellaneous Date Wise Report From - <?php echo $from; ?> &  To - <?php echo $to; ?></h1>
                </div> 
                <form method="post" action="pages/msldatepdf.php?sum=<?php echo"$sum"; ?>&from=<?php echo "$from"; ?>&to=<?php echo "$to" ?>">
                    <input type="submit" name="create_pdf" class="btn btn-primary" value="Generate Report" />  
                    <a href="?page=miss_report" class='btn btn-primary prim'>Back</a>
                </form>
            </div>
            <div class="row">
                <div class="container-fluid">
                    <div class="card">
                        <fieldset>
                            <table class="table table-hover table-bordered" id="">

                                <thead>
                                    <tr>
                                        <th>SI.no</th>
                                        <th>Challan-No</th>
                                        <th>Name</th>
                                        <th>Particulars</th>
                                        <th>Payment Date</th>
                                        <th>From</th>
                                        <th>To</th>
                                        <th>Miscellaneous</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    while ($row = mysql_fetch_array($result)) {
                                        ?>
                                        <tr>
                                            <td><?php echo $i ?></td>
                                            <td><?php echo $row[challanno] ?></td>
                                            <td><?php echo $row[name] ?></td>
                                            <?php
                                            $q1 = mysql_query("select * from add_particulars where particular_code='$row[particulars]'");
                                            $rose = mysql_fetch_array($q1);
                                            ?>
                                            <td><?php echo $rose[particular] ?></td>
                                            <td><?php echo $row[payment_date] ?></td>
                                            <td><?php echo $row[from1] ?></td>
                                            <td><?php echo $row[to1] ?></td>
                                            <td><?php echo $row[miscellaneous] ?></td>
                                        </tr>
                                        <?php
                                        $i = $i + 1;
                                    }
                                    ?>
                                </tbody>
                            </table>
                            <label><h4>Total Amount = <?php echo "$sum"; ?></h4></label><br>
                            <label><h4>In Words = <?php echo getIndianCurrency($sum) ?></h4></label>
                        </fieldset>
                    </div>
                </div>
            </div>
        </div>


        <?php
        include 'head_foot/footer.php';
    }

    function servicereport() {
        include 'head_foot/header.php';
        include 'head_foot/leftside.php';
        include 'pages/wordfun.php';
        $from = $_POST['from_date'];
        $to = $_POST['to_date'];
        $pay = "paid";
        $result = mysql_query("SELECT * FROM registration WHERE payment_date between '$from' AND '$to' and payment='$pay'");
        $result1 = mysql_query("SELECT SUM(service_tax) AS value_sum FROM registration  where payment='$pay' and payment_date between '$from' AND '$to'");
        $rowss = mysql_fetch_assoc($result1);
        $sum = $rowss['value_sum'];
        ?>

        <div class="content-wrapper">
            <div class="page-title">
                <div>
                    <h1>Service Tax Date Wise Report From - <?php echo $from; ?> &  To - <?php echo $to; ?></h1>
                </div> 
                <form method="post" action="pages/servicedatepdf.php?sum=<?php echo"$sum"; ?>&from=<?php echo "$from"; ?>&to=<?php echo "$to" ?>">
                    <input type="submit" name="create_pdf" class="btn btn-primary" value="Generate Report" />  
                    <a href="?page=service_report" class='btn btn-primary prim'>Back</a>
                </form>
            </div>
            <div class="row">
                <div class="container-fluid">
                    <div class="card">
                        <fieldset>
                            <table class="table table-hover table-bordered" id="">

                                <thead>
                                    <tr>
                                        <th>SI.no</th>
                                        <th>Challan-No</th>
                                        <th>Name</th>
                                        <th>Particulars</th>
                                        <th>Payment Date</th>
                                        <th>From</th>
                                        <th>To</th>
                                        <th>Service Tax</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    while ($row = mysql_fetch_array($result)) {
                                        ?>
                                        <tr>
                                            <td><?php echo $i ?></td>
                                            <td><?php echo $row[challanno] ?></td>
                                            <td><?php echo $row[name] ?></td>
                                            <?php
                                            $q1 = mysql_query("select * from add_particulars where particular_code='$row[particulars]'");
                                            $rose = mysql_fetch_array($q1);
                                            ?>
                                            <td><?php echo $rose[particular] ?></td>
                                            <td><?php echo $row[payment_date] ?></td>
                                            <td><?php echo $row[from1] ?></td>
                                            <td><?php echo $row[to1] ?></td>
                                            <td><?php echo $row[service_tax] ?></td>
                                        </tr>
                                        <?php
                                        $i = $i + 1;
                                    }
                                    ?>
                                </tbody>
                            </table>
                            <label><h4>Total Amount = <?php echo "$sum"; ?></h4></label><br>
                            <label><h4>In Words = <?php echo getIndianCurrency($sum) ?></h4></label>
                        </fieldset>
                    </div>
                </div>
            </div>
        </div>


        <?php
        include 'head_foot/footer.php';
    }

    function depositreport() {
        include 'head_foot/header.php';
        include 'head_foot/leftside.php';
        include 'pages/wordfun.php';
        $from = $_POST['from_date'];
        $to = $_POST['to_date'];
        $pay = "paid";
        $result = mysql_query("SELECT * FROM registration WHERE payment_date between '$from' AND '$to' and payment='$pay'");
        $result1 = mysql_query("SELECT SUM(deposit) AS value_sum FROM registration  where payment='$pay' and payment_date between '$from' AND '$to'");
        $rowss = mysql_fetch_assoc($result1);
        $sum = $rowss['value_sum'];
        ?>

        <div class="content-wrapper">
            <div class="page-title">
                <div>
                    <h1>Service Tax Date Wise Report From - <?php echo $from; ?> &  To - <?php echo $to; ?></h1>
                </div> 
                <form method="post" action="pages/depdatepdf.php?sum=<?php echo"$sum"; ?>&from=<?php echo "$from"; ?>&to=<?php echo "$to" ?>">
                    <input type="submit" name="create_pdf" class="btn btn-primary" value="Generate Report" />  
                    <a href="?page=dep_report" class='btn btn-primary prim'>Back</a>
                </form>
            </div>
            <div class="row">
                <div class="container-fluid">
                    <div class="card">
                        <fieldset>
                            <table class="table table-hover table-bordered" id="">

                                <thead>
                                    <tr>
                                        <th>SI.no</th>
                                        <th>Challan-No</th>
                                        <th>Name</th>
                                        <th>Particulars</th>
                                        <th>Payment Date</th>
                                        <th>From</th>
                                        <th>To</th>
                                        <th>Deposit</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    while ($row = mysql_fetch_array($result)) {
                                        ?>
                                        <tr>
                                            <td><?php echo $i ?></td>
                                            <td><?php echo $row[challanno] ?></td>
                                            <td><?php echo $row[name] ?></td>
                                            <?php
                                            $q1 = mysql_query("select * from add_particulars where particular_code='$row[particulars]'");
                                            $rose = mysql_fetch_array($q1);
                                            ?>
                                            <td><?php echo $rose[particular] ?></td>
                                            <td><?php echo $row[payment_date] ?></td>
                                            <td><?php echo $row[from1] ?></td>
                                            <td><?php echo $row[to1] ?></td>
                                            <td><?php echo $row[deposit] ?></td>
                                        </tr>
                                        <?php
                                        $i = $i + 1;
                                    }
                                    ?>
                                </tbody>
                            </table>
                            <label><h4>Total Amount = <?php echo "$sum"; ?></h4></label><br>
                            <label><h4>In Words = <?php echo getIndianCurrency($sum) ?></h4></label>
                        </fieldset>
                    </div>
                </div>
            </div>
        </div>


        <?php
        include 'head_foot/footer.php';
    }

    function add_quart() {
        $code = $_POST['code'];
        $add_quart = $_POST['addq'];
        $reg_date = date('Y-m-d');
        $flag = '';
        $parti = $add_quart;
        $q1 = mysql_query("SELECT COUNT(*) FROM `add_quarter` where quarter='$parti'");
        $q2 = mysql_fetch_row($q1);
        $k4 = $k4 + $q2[0];
        if ($k4 > 0) {
            echo "<script>alert('$parti Already Exists');window.location.href='?page=add_quart'</script>";
        } else {
            $result = mysql_query("insert into add_quarter values(NULL,'$code','$add_quart','$reg_date','$flag')");
            if ($result == true) {
                echo "<script>alert('Quarter Added Successfully');window.location.href='?page=add_quart'</script>";
            } else {
                echo "<script>alert('Failed To Enter Try Again Later');window.location.href='?page=add_quart'</script>";
            }
        }
    }

    function add_bed() {
        $code = $_POST['code'];
        $select_quarters = $_POST['select_quarters'];
        $ab = $_POST['ab'];
        $reg_date = date('Y-m-d');
        $flag = '';

        $result = mysql_query("insert into add_bed values(NULL,'$code','$select_quarters','$ab','$reg_date','$flag')");
        $result = mysql_query("update add_quarter set flag='used' where code='$select_quarters'");
        if ($result == true) {
            echo "<script>alert('Bed Added Successfully');window.location.href='?page=add_bed'</script>";
        } else {
            echo "<script>alert('Failed To Enter Try Again Later');window.location.href='?page=add_bed'</script>";
        }
    }

    function add_dep() {
        $code = $_POST['code'];
        $dep = $_POST['ad'];
        $reg_date = date('Y-m-d');
        $parti = $dep;
        $q1 = mysql_query("SELECT COUNT(*) FROM `add_dep` where dep='$parti'");
        $q2 = mysql_fetch_row($q1);
        $k4 = $k4 + $q2[0];
        if ($k4 > 0) {
            echo "<script>alert('$parti Department Already Exists');window.location.href='?page=add_dep'</script>";
        } else {
            $result = mysql_query("insert into add_dep values(NULL,'$code','$dep','$reg_date')");
            if ($result == true) {
                echo "<script>alert('Department Added Successfully');window.location.href='?page=add_dep'</script>";
            } else {
                echo "<script>alert('Failed To Enter Try Again Later');window.location.href='?page=add_dep'</script>";
            }
        }
    }

    function quarters_reg() {
        $code = $_POST['challan_no'];
        $qtrs = $_POST['select_quarters'];
        $bed_room = $_POST['br'];
        $nos = $_POST['nos'];
        $inst = $_POST['inst'];
        $select_dep = $_POST['sd'];
        $month = '';
        $year = '';
        $payment_date = '';
        $reg_date = date('Y-m-d');
        $time = time();
        $un = uniqid();
        $ran = rand();
        $refno = $time . $un . $ran;
        $amount = '';
        $status = '';
        $vacate_date = '';

        $result = mysql_query("insert into quarters_reg values(NULL,'$code','$qtrs','$bed_room','$nos','$inst','$select_dep','$month','$year','$payment_date','$reg_date','$refno','$amount','$status','$vacate_date')") or die(mysql_error());

        $result = mysql_query("insert into manage_qtr values(NULL,'$nos','$refno','$payment_date','$month','$year','$reg_date','$qtrs','$amount','$status','$vacate_date')") or die(mysql_error());
        //$result = mysql_query("insert into update_qtr values(NULL,'$nos','$refno','$payment_date','$month','$year','$reg_date','$qtrs','$amount','$status','$vacate_date')") or die(mysql_error());

        $result = mysql_query("update add_bed set `flag`='used' where `quarter_code`='$qtrs' and `bed`='$bed_room'") or die(mysql_error());

        if ($result == true) {
            echo "<script>alert('Congrats Registration Successfully');window.location.href='?page=quarters_reg'</script>";
        } else {
            echo "<script>alert('Failed To Enter Try Again Later');window.location.href='?page=quarters_reg'</script>";
        }
    }

    public function updates_rent() {
        $select_quarters = $_POST['select_quarters'];
        $refno = $_POST['rn'];
        $staff = $_POST['ss'];
        $payment_date = $_POST['pdate'];
        $month = $_POST['month'];
        $year = $_POST['year'];
        $reg_date = date('Y-m-d');
        $amount = $_POST['amount'];
        $ins = $_POST['ins'];
        $status = '';
        $vacate_date = '';

        $result = mysql_query("insert into update_qtr values(NULL,'$staff','$refno','$payment_date','$month','$year','$reg_date','$select_quarters','$amount','$status','$vacate_date','$ins')") or die(mysql_error());
        $result = mysql_query("update manage_qtr set `amount`='$amount', `month`='$month',`year`='$year',`payment_date`='$payment_date' where `refno`='$refno'") or die(mysql_error());
        $result = mysql_query("update quarters_reg set `amount`='$amount', `month`='$month',`year`='$year',`pay_date`='$payment_date' where `refno`='$refno'") or die(mysql_error());
        if ($result == true) {
            echo "<script>alert('Payment Updated Successfully');window.location.href='?page=updates_rent'</script>";
        } else {
            echo "<script>alert('Failed To Enter Try Again Later');window.location.href='?page=updates_rent'</script>";
        }
    }

    public function paydet() {
        include 'head_foot/qheader.php';
        include 'head_foot/qsidebar.php';
        $refno = $_GET['refno'];
        $result = mysql_query("select * from update_qtr where refno ='$refno'");
        $res = mysql_query("select * from update_qtr where refno ='$refno'");
        $r1 = mysql_fetch_array($res);
        ?>
        <div class="content-wrapper">
            <div class="page-title">
                <div>
                    <h1>List All The <?php echo $r1[name] ?>&nbsp;Payment's</h1>
                </div>        
            </div>
            <style>
                .staff{font-size: 18px;
                       color: white;
                       /* border: 1px Solid #027cb3; */
                       background: #b3020a;
                       border-radius: 4px;
                }
            </style>
            <div class="row">
                <div class="container-fluid">
                    <div class="card">
                        <div class="row">

                            <fieldset>

                                <div class="box-body table-responsive no-padding">

                                    <div style="padding: 10px 0px 10px 7px;    font-size: 18px; background: #b3020a; color: white;">Staff Name :&nbsp;<input type="text" name="name" value="<?php echo $r1[name] ?>" style="border: none;background: #b3020a; color: white;"></div>
                                    <table class="table table-hover" id="tab">

                                        <thead>

                                            <tr>
                                                <th>SI.no</th>
                                                <th>Month</th>
                                                <th>Year</th>
                                                <th>Payment Date</th>
                                                <th>Amount</th>
                                                <th>Quarter Name</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $i = 1;
                                            while ($row = mysql_fetch_array($result)) {
                                                ?>
                                            <form class="form-horizontal" method = "post" action = "?page=edit_pay&action=add" enctype="multipart/form-data">
                                                <tr>

                                                    <td><?php echo $i ?></td>
                                                    <td style="display: none;"><input type="text" readonly name="names" id="names<?php echo $i ?>" value="<?php echo $row[name] ?>" style="border: none;"></td>
                                                    <td><input type="text" readonly name="month" id="month<?php echo $i ?>" value="<?php echo $row[month] ?>" style="border: none;"></td>
                                                    <td><input type="text" readonly name="year" id="year<?php echo $i ?>" value="<?php echo $row[year] ?>" style="    border: none;"></td>
                                                    <td><input type="text" name="pdate" id="pdate<?php echo $i ?>" value="<?php echo $row[payment_date] ?>" style="background: #b3020a; color: white; border-radius: 4px; padding: 3px;border: none;"></td>
                                                    <td><input type="text" name="amt" id="amt<?php echo $i ?>" value="<?php echo $row[amount] ?>" style="background: #b3020a; color: white; border-radius: 4px; padding: 3px;border: none;"></td>
                                                    <?php
                                                    $r1 = mysql_query("select * from add_quarter where code='$row[quarter_code]'");
                                                    $ra = mysql_fetch_array($r1);
                                                    ?>
                                                    <td>
                                                        <select name="qtrs" id="qtrs<?php echo $i ?>" style="border: none;">
                                                            <option value="<?php echo $ra[code] ?>"><?php echo $ra[quarter] ?></option>
                                                        </select>

                                                                                                                                                                                                                                                            <!--<input type="text" id="qtrs<?php echo $i ?>" readonly name="qtrs" value="<?php echo $ra[quarter] ?>" style=" border: none;">--></td>
                                                    <td style="display: none;"><input type="text" name="refno" id="refno<?php echo $i ?>" value="<?php echo $row[refno] ?>" style=" border: none;"></td>
                                                    <td><input type="submit" value="Update" class="btn btn-primary"></td>
                                                </tr>
                                            </form>
                                            <?php
                                            $i = $i + 1;
                                        }
                                        ?>
                                        </tbody>
                                    </table>

                                </div>

                            </fieldset>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
        include 'head_foot/footer.php';
    }

    function edit_pay() {
        $month = $_POST['month'];
        $year = $_POST['year'];
        $pdate = $_POST['pdate'];
        $amt = $_POST['amt'];
        $qtrs = $_POST['qtrs'];
        $refno = $_POST['refno'];
        $names = $_POST['names'];
        //echo "$month<br>$year<br>$pdate<br>$amt<br>$qtrs<br>$refno<br>";
        $result = mysql_query("update update_qtr set `amount`='$amt',`payment_date`='$pdate' where month='$month' and year='$year' and quarter_code='$qtrs' and refno = '$refno' and name='$names'");
        $result = mysql_query("update quarters_reg set `amount`='$amt',`pay_date`='$pdate'  where month='$month' and year='$year' and quarter_no='$qtrs' and refno = '$refno' and staff_name='$names'");
        $result = mysql_query("update manage_qtr set `amount`='$amt',`payment_date`='$pdate' where month='$month' and year='$year' and quarter_code='$qtrs' and refno = '$refno' and name='$names'");
        if ($result == true) {
            echo "<script>alert('Updated Successfully');window.location.href='?page=paydet&refno=$refno'</script>";
        } else {
            echo "<script>alert('Failed To Enter Try Again Later');window.location.href='?page=paydet&refno=$refno'</script>";
        }
    }

    function edit_qtrs() {
        $refno = $_POST['refno'];
        $qtrs = $_POST['select_quarters'];
        $bed_room = $_POST['br'];
        $nos = $_POST['nos'];
        $inst = $_POST['inst'];
        $select_dep = $_POST['sd'];

        $result = mysql_query("update quarters_reg set `staff_name`='$nos',`institute`='$inst',`dep`='$select_dep' where refno='$refno'");
        $result = mysql_query("update manage_qtr set `name`='$nos' where refno='$refno'");
        $result = mysql_query("update update_qtr set `name`='$nos' where refno='$refno'");
        if ($result == true) {
            echo "<script>alert('Data Updated Successfully');window.location.href='?page=qtrs_list'</script>";
        } else {
            echo "<script>alert('Failed To Enter Try Again Later');window.location.href='?page=qtrs_list'</script>";
        }
    }

    function vacate() {
        $quarters = $_POST['select_quarters'];
        $refno = $_POST['refno'];
        $status = "vacate";
        $vacate_date = $_POST['vdate'];

        $result = mysql_query("update quarters_reg set `status`='$status',`vacate_date`='$vacate_date' where refno='$refno'");
        $result = mysql_query("update manage_qtr set `status`='$status',`vacate_date`='$vacate_date' where refno='$refno'");
        $result = mysql_query("update update_qtr set  `status`='$status',`vacate_date`='$vacate_date' where refno='$refno'");
        $result = mysql_query("update add_bed set `flag`='' where quarter_code='$quarters'");

        if ($result == true) {
            echo "<script>alert('Vacated Successfully');window.location.href='?page=vacate'</script>";
        } else {
            echo "<script>alert('Failed To Enter Try Again Later');window.location.href='?page=vacate'</script>";
        }
    }

    function vacate_list() {
        include 'head_foot/qheader.php';
        include 'head_foot/qsidebar.php';
        ?>

        <div class="content-wrapper">
            <div class="page-title">
                <div>
                    <h1>Vacate List</h1>
                </div> 

            </div>

            <div class="row">
                <div class="container-fluid">
                    <div class="card">
                        <div class="row">
                            <fieldset>
                                <?php
                                $result = mysql_query("select * from quarters_reg where status ='vacate'")
                                ?>
                                <div class="box-body table-responsive no-padding">
                                    <table class="table table-hover" id="tab">

                                        <thead>
                                            <tr>
                                                <th>SI.no</th>
                                                <th>Quarter</th>
                                                <th>Bed</th>
                                                <th>Staff Name</th>
                                                <th>Dep</th>
                                                <th>Institute</th>
                                                <th>Vacate Date</th>
                                                <th>Payment's</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $i = 1;
                                            while ($row = mysql_fetch_array($result)) {
                                                ?>
                                                <tr>
                                                    <td><?php echo $i ?></td>
                                                    <?php
                                                    $r1 = mysql_query("select * from add_quarter where code='$row[quarter_no]'");
                                                    $ra = mysql_fetch_array($r1);
                                                    ?>
                                                    <td><?php echo $ra[quarter] ?></td>
                                                    <td><?php echo $row[bed_room] ?></td>
                                                    <td><?php echo $row[staff_name] ?></td>
                                                    <td><?php echo $row[institute] ?></td>
                                                    <?php
                                                    $r2 = mysql_query("select * from add_dep where code='$row[dep]'");
                                                    $rb = mysql_fetch_array($r2);
                                                    ?>
                                                    <td><?php echo $rb[dep] ?></td>
                                                    <td><?php echo $row[vacate_date] ?></td>
                                                    <td>
                                                        <a class="bg-blue" style="color: white;padding: 6px 18px 6px 18px; border-radius: 4px; border: 1px solid #b3020a; background-color: #b3020a !important;" title="update" href='?page=paydet&refno=<?php echo $row[refno]; ?>'>All Pay's</a>    
                                                    </td>
                                                </tr>
                                                <?php
                                                $i = $i + 1;
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>

                            </fieldset>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
        include 'head_foot/footer.php';
    }

    function shifting() {
        $select_quarters = $_POST['select_quarters'];
        $bed = $_POST['bed'];
        $refno = $_POST['refno'];
        $inst = $_POST['inst'];
        $dep = $_POST['dep'];
        $name = $_POST['name'];
        $select_new_quarters = $_POST['select_new_quarters'];
        $new_bed = $_POST['new_bed'];
        $doc = $_POST['doc'];
        $reg_date = date('Y-m-d');
        $shifting_date = $_POST['sdate'];
        //$pdate = $_POST['pdate'];
        //$month = $_POST['month'];
        //$year = $_POST['year'];
        //$amount = $_POST['amount'];
        $status = '';
        $v_date = '';
        $result = mysql_query("insert into shift values(NULL,'$select_quarters','$bed','$select_new_quarters','$new_bed','$refno','$name','$inst','$dep','$shifting_date','$reg_date','$doc')");
        //$result = mysql_query("insert into update_qtr values(NULL,'$name','$refno','$pdate','$month','$year','$reg_date','$select_new_quarters','$amount','$status','$v_date')");
        //$result = mysql_query("update manage_qtr set `payment_date`='$pdate',`month`='$month',`year`='$year',`quarter_code`='$select_new_quarters',`amount`='$amount',`reg_date`='$reg_date' where refno='$refno' and status='' and vacate_date=''");
        $result = mysql_query("update quarters_reg set `quarter_no`='$select_new_quarters',`bed_room`='$new_bed',`reg_date`='$reg_date' where refno='$refno' and status='' and vacate_date=''");
        $result = mysql_query("update add_bed set flag='used' where `quarter_code`='$select_new_quarters' and `bed`='$new_bed' and flag=''");
        $result = mysql_query("update add_bed set flag='' where `quarter_code`='$select_quarters' and `bed`='$bed' and flag='used'");
        if ($result == true) {
            echo "<script>alert('Shifted Successfully');window.location.href='?page=shifting'</script>";
        } else {
            echo "<script>alert('Failed To Enter Try Again Later');window.location.href='?page=shifting'</script>";
        }


        //echo "$select_quarters<br>$bed<br>$refno<br>$inst<br>$dep<br>$name<br>$select_new_quarters<br>$new_bed<br>$doc<br>$reg_date<br>$shifting_date<br>$pdate<br>$month<br>$year<br>$amount";
    }

    function shifting_list() {
        include 'head_foot/qheader.php';
        include 'head_foot/qsidebar.php';
        ?>

        <div class="content-wrapper">
            <div class="page-title">
                <div>
                    <h1>Shifting List</h1>
                </div> 

            </div>

            <div class="row">
                <div class="container-fluid">
                    <div class="card">
                        <div class="row">
                            <fieldset>
                                <?php
                                $result = mysql_query("select * from shift")
                                ?>
                                <div class="box-body table-responsive no-padding">
                                    <table class="table table-hover" id="tab">

                                        <thead>
                                            <tr>
                                                <th>SI.no</th>
                                                <th>Old Qtr</th>
                                                <th>Old Bed</th>
                                                <th>New Qtr</th>
                                                <th>New Bed</th>
                                                <th>Staff Name</th>
                                                <th>Dep</th>
                                                <th>Institute</th>
                                                <th>Shift Date</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $i = 1;
                                            while ($row = mysql_fetch_array($result)) {
                                                ?>
                                                <tr>
                                                    <td><?php echo $i ?></td>
                                                    <?php
                                                    $r1 = mysql_query("select * from add_quarter where code='$row[old_quarter]'");
                                                    $ra = mysql_fetch_array($r1);
                                                    ?>
                                                    <td><?php echo $ra[quarter] ?></td>
                                                    <td><?php echo $row[old_bed] ?></td>
                                                    <?php
                                                    $r3 = mysql_query("select * from add_quarter where code='$row[new_quarter]'");
                                                    $ra1 = mysql_fetch_array($r3);
                                                    ?>
                                                    <td><?php echo $ra1[quarter] ?></td>
                                                    <td><?php echo $row[new_bed] ?></td>
                                                    <td><?php echo $row[staff_name] ?></td>
                                                    <td><?php echo $row[institue] ?></td>
                                                    <?php
                                                    $r2 = mysql_query("select * from add_dep where code='$row[dep]'");
                                                    $rb = mysql_fetch_array($r2);
                                                    ?>
                                                    <td><?php echo $rb[dep] ?></td>
                                                    <td><?php echo $row[shifting_date] ?></td>
                                                    <?php
                                                    $r4 = mysql_query("select * from quarters_reg where refno='$row[refno]'");
                                                    $ra2 = mysql_fetch_array($r4);
                                                    $rsp = $ra2['status'];
                                                    if ($rsp == 'vacate') {
                                                        ?> 
                                                        <td><?php echo $ra2[status] ?></td>
                                                        <?php
                                                    } else {
                                                        
                                                    }
                                                    ?>
                                                </tr>
                                                <?php
                                                $i = $i + 1;
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>

                            </fieldset>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
        include 'head_foot/footer.php';
    }

    function add_ins() {
        $code = $_POST['code'];
        $dep = $_POST['ad'];
        $reg_date = date('Y-m-d');
        $parti = $dep;
        $q1 = mysql_query("SELECT COUNT(*) FROM `add_inst` where insitute='$parti'");
        $q2 = mysql_fetch_row($q1);
        $k4 = $k4 + $q2[0];
        if ($k4 > 0) {
            echo "<script>alert('$parti Institute Already Exists');window.location.href='?page=add_ins'</script>";
        } else {
            $result = mysql_query("insert into add_inst values(NULL,'$code','$dep','$reg_date')");
            if ($result == true) {
                echo "<script>alert('Institute Added Successfully');window.location.href='?page=add_ins'</script>";
            } else {
                echo "<script>alert('Failed To Enter Try Again Later');window.location.href='?page=add_ins'</script>";
            }
        }
    }

    function table() {
        include 'head_foot/qheader.php';
        include 'head_foot/qsidebar.php';
        $qtr_code = $_GET['qtr_code'];
        ?><div class="content-wrapper">
            <div class="page-title">
                <div>
                    <h1>Details</h1>
                </div>        
            </div>
            <style>
                .staff{font-size: 18px;
                       color: white;
                       /* border: 1px Solid #027cb3; */
                       background: #b3020a;
                       border-radius: 4px;
                }
            </style>
            <div class="row">
                <div class="container-fluid">
                    <div class="card">
                        <div class="row">

                            <fieldset>
                                <?php
                                $result = mysql_query("select * from quarters_reg where quarter_no='$qtr_code' and status='' and vacate_date=''");
                                $re = mysql_query("select * from quarters_reg where quarter_no='$qtr_code' and status='' and vacate_date=''");
                                $r1 = mysql_fetch_array($re);
                                ?>
                                <div class="box-body table-responsive no-padding">

                                    <div style="padding: 10px 0px 10px 7px;    font-size: 18px; background: #b3020a; color: white;">Staff Name :&nbsp;<input type="text" name="name" value="<?php echo $r1[staff_name] ?>" style="border: none;background: #b3020a; color: white;"></div>
                                    <table class="table table-hover" id="tab">
                                        <thead>
                                            <tr>
                                                <th>SI.no</th>
                                                <th>Quarter</th>
                                                <th>Bed</th>
                                                <th>Staff Name</th>
                                                <th>Institue</th>
                                                <th>Dep</th>
                                                <th>Payment's</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $i = 1;
                                            while ($row = mysql_fetch_array($result)) {
                                                ?>

                                                <tr>
                                                    <td><?php echo $i ?></td>
                                                    <?php
                                                    $r1 = mysql_query("select * from add_quarter where code='$row[quarter_no]'");
                                                    $ra = mysql_fetch_array($r1);
                                                    ?>
                                                    <td><?php echo $ra[quarter] ?></td>
                                                    <td><?php echo $row[bed_room] ?></td>
                                                    <td><?php echo $row[staff_name] ?></td>
                                                    <td><?php echo $row[institute] ?></td>
                                                    <?php
                                                    $r2 = mysql_query("select * from add_dep where code='$row[dep]'");
                                                    $rb = mysql_fetch_array($r2);
                                                    ?>
                                                    <td><?php echo $rb[dep] ?></td>
                                                    <td>
                                                        <a class="bg-blue" style="color: white;padding: 6px 18px 6px 18px; border-radius: 4px; border: 1px solid #b3020a; background-color: #b3020a !important;" title="update" href='?page=paydet&refno=<?php echo $row[refno]; ?>'>All Pay's</a>    
                                                    </td>
                                                </tr>
                                                <?php
                                                $i = $i + 1;
                                            }
                                            ?>
                                        </tbody>
                                    </table>

                                </div>

                            </fieldset>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
        include 'head_foot/footer.php';
    }

    function del_qtrs() {
        $refno = $_GET['refno'];
        $del = mysql_query("select * from quarters_reg where refno = '$refno'");
        $row = mysql_fetch_array($del);
        $quarter_code = $row['quarter_no'];
        $delete = mysql_query("update add_bed set flag = '' where quarter_code = '$quarter_code'");
        $delete = mysql_query("delete from quarters_reg where refno='$refno'");
        $delete = mysql_query("delete from manage_qtr where refno='$refno'");
        $delete = mysql_query("delete from update_qtr where refno='$refno'");
        if ($delete == true) {
            echo "<script>alert('Deleted Successfully');window.location.href='?page=qtrs_list'</script>";
        } else {
            echo "<script>alert('Failed To Enter Try Again Later');window.location.href='?page=qtrs_list'</script>";
        }
    }

    function xample() {
        include 'head_foot/qheader.php';
        include 'head_foot/qsidebar.php';
        ?>
            <script>
            function get_sums(val){
                var a = document.getElementById("a" + val).value;
                var b = document.getElementById("b" + val).value;
                document.getElementById("sum" + val).value = a + b;
            }
            </script>
        <div class="content-wrapper">
            <div class="page-title">
                <div>
                    <h1>Xample</h1>
                </div>        
            </div>
            <style>
                .staff{font-size: 18px;
                       color: white;
                       /* border: 1px Solid #027cb3; */
                       background: #b3020a;
                       border-radius: 4px;
                }
            </style>
            <?php
            $result = mysql_query("select * from update_qtr")
            ?>
            <div class="row">
                <div class="container-fluid">
                    <div class="card">
                        <div class="row">

                            <fieldset>
                                <div class="box-body table-responsive no-padding">


                                    <br>
                                    <table class="table table-hover" id="tab">
                                        <thead>
                                            <tr>
                                                <th>SI.no</th>
                                                <th>Name</th>
                                                <th>A</th>
                                                <th>B</th>
                                                <th>SUM</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $i = 1;
                                            while ($row = mysql_fetch_array($result)) {
                                                $qtr = $row[quarter_code];
                                                ?>
                                                <tr>
                                                    <td><?php echo $i ?></td>
                                                    <td><?php echo $row[name] ?></td>
                                                    <td>
                                                        <form method="post"  action = "pages/xample_pdf.php" enctype="multipart/form-data">
                                                            <input type="text" name="a<?php echo $i; ?>" id="a<?php echo $i ?>" class="form-control"  onkeyup="get_sums(<?php echo $i ?>);">
                                                            </td>
                                                            <td>
                                                                <input type="text" name="b<?php echo $i; ?>" id="b<?php echo $i ?>" class="form-control" onkeyup="get_sums(<?php echo $i ?>);">
                                                            </td>
                                                            <td>
                                                                <input type="text" name="sum<?php echo $i; ?>" id="sum<?php echo $i ?>" class="form-control" onkeyup="get_sums(<?php echo $i ?>);">
                                                            </td>

                                                </tr>
                                                <?php
                                                $i = $i + 1;
                                            }
                                            ?>
                                        <input type="submit" value="Submit" name="submit" class="btn btn-success btn-block"/>
                                        </form>
                                        </tbody>
                                    </table>

                                    </form>

                                </div>

                            </fieldset>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
        include 'head_foot/footer.php';
    }

}
