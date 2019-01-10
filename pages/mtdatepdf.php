<?php

include '../Model/connect.php';
include 'wordfun.php';

function fetch_data() {
    $from = $_GET['from'];
    $to = $_GET['to'];
    $output = '';
    $output1 = '';
    $sql = "SELECT * FROM registration WHERE payment='paid' and payment_date between '$from' and '$to' order by id desc";
    $result = mysql_query($sql);
    $i = 1;
    while ($row = mysql_fetch_array($result)) {
        $q1 = mysql_query("select * from add_particulars where particular_code='$row[particulars]'");
        $rose = mysql_fetch_array($q1);
        $output .= '<tr>  
                          <td>' . $i . '</td>  
                          <td>' . $row["challanno"] . '</td>  
                          <td>' . $row["name"] . '</td> 
                          
                          <td>' . $rose["particular"] . '</td> 
                          <td>' . $row["payment_date"] . '</td> 
                          <td>' . $row["from1"] . '</td> 
                          <td>' . $row["to1"] . '</td> 
                          <td>' . $row["maint"] . '</td>                         
                          
                     </tr>  
                          ';
        $i = $i + 1;
    }
    return $output;
}

if (isset($_POST["create_pdf"])) {
    $from = $_GET['from'];
    $to = $_GET['to'];
    $sum = $_GET['sum'];
    require_once '../tcpdf/examples/tcpdf_include.php';
    require_once '../tcpdf/tcpdf.php';
    //$custom_layout = array($your_width, $your_height);
    // $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, $custom_layout, true, 'UTF-8', false);
    $obj_pdf = new TCPDF('L', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);


    $obj_pdf->SetCreator(PDF_CREATOR);
    $obj_pdf->SetTitle("Maintainence-Report");
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
    $obj_pdf->AddPage('l', 'LEGAL');


    $content = '';
    $content .= '  
	 <br>
         
      	      <h4 align ="center">KLES Hostels & Residential Quarters
JNMC Campus Belgavi - 590010
Demand Notice For (Office-use)<br>Maintainence Charges Date Wise Report From - '.$from.' --- To - '.$to.'<br /><br />
      <table border="1" cellspacing="0" cellpadding="5">  

           <tr>  
                                <th width="10%">SI-No</th>
                                <th width="10%">Challan-No</th>
                                <th width="10%">Name</th>
                                <th width="30%">Particulars</th>
                                <th width="10%">Payment Date</th>
                                <th width="10%">From</th>
                                <th width="10%">To</th>
                                <th width="10%">Maintainence Charges</th>
                
               
           </tr>  
      ';
    $content .= fetch_data();
    $content .= '</table>';
    $obj_pdf->writeHTML($content);
    $content2 = '';
    $content2 .= '  
	 <br>
         
      	  
      <table border="1" cellspacing="0" cellpadding="5">  
           <tr>  
                <th width="35%" colspan="12" bgcolor="" text-align="" colspan="2">Total = ' . "$sum" . '&nbsp;/ - Rupees Only</th>               
           </tr> 
      ';

    $content2 .= '</table>';



    $obj_pdf->writeHTML($content2);
    $obj_pdf->Output('Maint-Report .pdf', 'I');
}
?>
<?php


