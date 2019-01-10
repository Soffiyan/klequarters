<?php
include '../Model/connect.php';
function fetch_data() {

    $output = '';
    $output1 = '';
    $from = $_GET['from'];
    $to1 = $_GET['to'];
    $pay = "paid";
    $sql = "SELECT * FROM registration WHERE payment_date between '$from' AND '$to1' and payment='$pay'";
    $result = mysql_query($sql);
    while ($row = mysql_fetch_array($result)) {
        $output .= '<tr> 
        <td>' . $row["challanno"] . '</td>  
        <td>' . $row["name"] . '</td>  
        <td>' . $row["particulars_name"] . '</td>  
        <td>' . $row["refno"] . '</td> 
        <td>' . $row["from1"] . '</td>
        <td>' . $row["to1"] . '</td> 
        <td>' . $row["payment_date"] . '</td>
    </tr> 
    
    ';
    }

    return $output;
}

if (isset($_POST["create_pdf"])) {
    $from = $_GET['from'];
    $to1 = $_GET['to'];
    require_once '../tcpdf/examples/tcpdf_include.php';
    require_once '../tcpdf/tcpdf.php';
    $obj_pdf = new TCPDF('L', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);


    $obj_pdf->SetCreator(PDF_CREATOR);
    $obj_pdf->SetTitle("Date Wise Report");
    $obj_pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);
    $obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
    $obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
    $obj_pdf->SetDefaultMonospacedFont('helvetica');
    $obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
    $obj_pdf->SetMargins(PDF_MARGIN_LEFT, '0', PDF_MARGIN_RIGHT, '20');
    $obj_pdf->setPrintHeader(false);
    $obj_pdf->setPrintFooter(false);
    $obj_pdf->SetAutoPageBreak(TRUE, 10);
    $obj_pdf->SetFont('helvetica', '', 10);
    //$obj_pdf->AddPage( id="plugin"type="application/x-google-chrome-pdf" src="chrome://print/17/-1/print.pdf" stream-url="chrome://print/17/-1/print.pdf"headers="" background-color="0xFF525659" top-toolbar-height="0" top-level-url="undefined">); 
    $obj_pdf->AddPage('L', 'LEGAL');


    $content = '';
    $content .= '  
    <br>

    <h4 align ="center">KLES Hostels & Residential Quarters
JNMC Campus Belgavi - 590010
Demand Notice For (Office-use)<br>Statement Of Quarters / Particulars  From : ' . $from . ' To : ' . $to1 . '</h4> <br />
    <table border="1" cellspacing="0" cellpadding="5">  

        <tr>  
            <th width="10%">Challan-No</th>
            <th width="20%">Name</th>
            <th width="20%">Particulars</th>
            <th width="10%">Ref No</th>
            <th width="10%">From</th>
            <th width="10%">To</th>
            <th width="20%">Payment Date</th>
        </tr>  
        
        ';
    $content .= fetch_data();
    $content .= '</table>';
    $obj_pdf->writeHTML($content);
    $obj_pdf->Output('datewisereport -' . $from . '-' . $to1 . '.pdf', 'I');
}