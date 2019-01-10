<?php

error_reporting(0);
include'Model/connect.php';
include'controller/main.php';
$page = $_GET['page'];
$action = $_GET['action'];
$main = new main;
if ($page == 'registration') {
    if ($action == 'add') {
        $main->registration();
    } else {
        include 'pages/registration.php';
    }
} elseif ($page == 'dashboard') {
    if ($action == 'add') {
        $main->dashboard();
    } else {
        include 'pages/dashboard.php';
    }
} elseif ($page == 'add_particulars') {
    if ($action == 'add') {
        $main->add_particulars();
    } else {
        include 'pages/add_particulars.php';
    }
} elseif ($page == 'viewdetails') {
    $main->viewdetails();
} elseif ($page == 'updatepayment') {
    $main->updatepayment();
} elseif ($page == 'paymentdone') {
    $main->paymentdone();
} elseif ($page == 'editdetails') {
    if ($action == 'add') {
        $main->editdetails();
    } else {
        include 'pages/editdetails.php';
    }
} elseif ($page == 'addpayment') {
    if ($action == 'add') {
        $main->addpayment();
    } else {
        include 'pages/addpayment.php';
    }
} elseif ($page == 'challan') {
    include 'pages/challan.php';
} elseif ($page == 'challanreprint') {
    $main->challanreprint();
} elseif ($page == 'creport') {
    if ($action == 'add') {
        $main->creport();
    } else {
        include 'pages/creport.php';
    }
} elseif ($page == 'date_wise') {
    if ($action == 'add') {
        $main->date_wise();
    } else {
        include 'pages/date_wise.php';
    }
} elseif ($page == 'todaysreg') {
    $main->todaysreg();
} elseif ($page == 'todayspay') {
    $main->todayspay();
} elseif ($page == 'creportpdf') {
    include 'pages/creportpdf.php';
} elseif ($page == 'editpay') {
    if ($action == 'add') {
        $main->editpay();
    } else {
        include 'pages/editpay.php';
    }
} elseif ($page == 'editdel') {
    $main->editdel();
} elseif ($page == 'login') {
    include 'pages/login.php';
} elseif ($page == 'logout') {
    include 'pages/logout.php';
} elseif ($page == 'session') {
    include 'pages/session.php';
} elseif ($page == 'feesreport') {
    include 'pages/feesreport.php';
} elseif ($page == 'fees_report') {
    if ($action == 'add') {
        $main->fees_report();
    } else {
        include 'pages/fees_report.php';
    }
} elseif ($page == 'del') {
    $main->del();
} elseif ($page == 'delpart') {
    $main->delpart();
} elseif ($page == 'editpart') {
    if ($action == 'add') {
        $main->editpart();
    } else {
        include 'pages/editpart.php';
    }
} elseif ($page == 'adduser') {
    if ($action == 'add') {
        $main->adduser();
    } else {
        include 'pages/adduser.php';
    }
} elseif ($page == 'delusr') {
    $main->delusr();
} elseif ($page == 'qtrs_report') {
    if ($action == 'add') {
        $main->qtrs_report();
    } else {
        include 'pages/qtrs_report.php';
    }
} elseif ($page == 'elect_report') {
    if ($action == 'add') {
        $main->elect_report();
    } else {
        include 'pages/elect_report.php';
    }
} elseif ($page == 'water_report') {
    if ($action == 'add') {
        $main->water_report();
    } else {
        include 'pages/water_report.php';
    }
} elseif ($page == 'maint_report') {
    if ($action == 'add') {
        $main->maint_report();
    } else {
        include 'pages/maint_report.php';
    }
} elseif ($page == 'late_report') {
    if ($action == 'add') {
        $main->late_report();
    } else {
        include 'pages/late_report.php';
    }
} elseif ($page == 'mees_report') {
    if ($action == 'add') {
        $main->mees_report();
    } else {
        include 'pages/mees_report.php';
    }
} elseif ($page == 'commer_report') {
    if ($action == 'add') {
        $main->commer_report();
    } else {
        include 'pages/commer_report.php';
    }
} elseif ($page == 'service_report') {
    if ($action == 'add') {
        $main->service_report();
    } else {
        include 'pages/service_report.php';
    }
} elseif ($page == 'dep_report') {
    if ($action == 'add') {
        $main->dep_report();
    } else {
        include 'pages/dep_report.php';
    }
} elseif ($page == 'miss_report') {
    if ($action == 'add') {
        $main->miss_report();
    } else {
        include 'pages/miss_report.php';
    }
} elseif ($page == 'total_report') {
    if ($action == 'add') {
        $main->total_report();
    } else {
        include 'pages/total_report.php';
    }
} elseif ($page == 'qtrsreport') {
    $main->qtrsreport();
} elseif ($page == 'electreport') {
    $main->electreport();
} elseif ($page == 'waterreport') {
    $main->waterreport();
} elseif ($page == 'maintreport') {
    $main->maintreport();
} elseif ($page == 'latereport') {
    $main->latereport();
} elseif ($page == 'meesreport') {
    $main->meesreport();
} elseif ($page == 'comreport') {
    $main->comreport();
} elseif ($page == 'miscellaneousreport') {
    $main->miscellaneousreport();
} elseif ($page == 'servicereport') {
    $main->servicereport();
} elseif ($page == 'depositreport') {
    $main->depositreport();
} elseif ($page == 'quartersmodule') {
    include 'pages/quartersmodule.php';
} elseif ($page == 'quarters_reg') {
    if ($action == 'add') {
        $main->quarters_reg();
    } else {
        include 'pages/quarters_reg.php';
    }
} elseif ($page == 'add_dep') {
    if ($action == 'add') {
        $main->add_dep();
    } else {
        include 'pages/add_dep.php';
    }
} elseif ($page == 'add_quart') {
    if ($action == 'add') {
        $main->add_quart();
    } else {
        include 'pages/add_quart.php';
    }
} elseif ($page == 'add_bed') {
    if ($action == 'add') {
        $main->add_bed();
    } else {
        include 'pages/add_bed.php';
    }
} elseif ($page == 'qtrs_list') {
    include 'pages/qtrs_list.php';
} elseif ($page == 'updateqtrs_payment') {
    if ($action == 'add') {
        $main->updateqtrs_payment();
    } else {
        include 'pages/updateqtrs_payment.php';
    }
} elseif ($page == 'updates_rent') {
    if ($action == 'add') {
        $main->updates_rent();
    } else {
        include 'pages/updates_rent.php';
    }
} elseif ($page == 'pay_list') {
    include 'pages/pay_list.php';
} elseif ($page == 'paydet') {
    $main->paydet();
} elseif ($page == 'edit_qtrs') {
    if ($action == 'add') {
        $main->edit_qtrs();
    } else {
        include 'pages/edit_qtrs.php';
    }
} elseif ($page == 'vacate') {
    if ($action == 'add') {
        $main->vacate();
    } else {
        include 'pages/vacate.php';
    }
} elseif ($page == 'vacate_list') {
    $main->vacate_list();
}elseif ($page == 'view_quarters_dash') {
    include 'pages/view_quarters_dash.php';
}elseif ($page == 'vacate_datewise') {
    include 'pages/vacate_datewise.php';
}elseif ($page == 'shifting') {
    if ($action == 'add') {
        $main->shifting();
    } else {
        include 'pages/shifting.php';
    }
} elseif ($page == 'shifting_list') {
    $main->shifting_list();
}elseif ($page == 'shifting_datewise') {
    include 'pages/shifting_datewise.php';
}elseif ($page == 'edit_pay') {
    $main->edit_pay();
}elseif ($page == 'add_ins') {
    if ($action == 'add') {
        $main->add_ins();
    } else {
        include 'pages/add_ins.php';
    }
}elseif ($page == 'table') {
    $main->table();
}elseif ($page == 'report_inst') {
    include 'pages/report_inst.php';
}elseif ($page == 'report_pay') {
    include 'pages/report_pay.php';
}elseif ($page == 'q_report') {
    include 'pages/q_report.php';
}elseif ($page == 'del_qtrs') {
    $main->del_qtrs();
}/*elseif ($page == 'xample_pdf') {
    include 'pages/xample_pdf.php';
}*/elseif ($page == 'xample') {
    $main->xample();
}
?>