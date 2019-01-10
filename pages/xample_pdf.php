<?php

ob_start();
include '../Model/connect.php';
if (isset($_POST["submit"])) {
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

    $sql = "select * from update_qtr";
    $result = mysql_query($sql);
    $content = '';
    $content .= '  
    <br>

    <h4 align ="center">Sample</h4> <br />
    <table border="1" cellspacing="0" cellpadding="5">  

        <tr>  
                                                    <th>SI.no</th>
                                                    <th>Name</th>
                                                    <th>A</th>
                                                    <th>B</th>
                                                    <th>Sum</th>
        </tr>  
        
        ';
    $i = 1;
    while ($row = mysql_fetch_array($result)) {
        $content .= ' 
        <tr> 
        <td>' . $i . '</td>  
        <td>' . $row["name"] . '</td> ';
        $a = $_POST['a' . $i . ''];
        $b = $_POST['b' . $i . ''];
        $sum = $_POST['sum' . $i . ''];
        $content .= '
        <td>' . $a . '</td>
        <td>' . $b . '</td><td>' . $sum . '</td>';        
        

        $content .= '</tr>';
        $i = $i + 1;
    }
    $content .= '</table>';
    $obj_pdf->writeHTML($content);
    $obj_pdf->Output('sample.pdf', 'I');
}