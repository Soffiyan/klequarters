<?php

include 'wordfun.php';

function fetch_data() {
    $output = '';
    $output1 = '';

    $connect = mysqli_connect("localhost", "root", "root", "klequaters");
    $from = $_GET['from'];
    $to = $_GET['to'];
    $sum = $_GET['sum'];

    $sql = "SELECT * FROM registration WHERE payment_date between '$from' AND '$to' and payment='paid'";
    $result = mysqli_query($connect, $sql);




    while ($row = mysqli_fetch_array($result)) {
        $output .= '<tr>  
                          <td>' . $row["challanno"] . '</td>  
                          <td>' . $row["name"] . '</td>  
                          <td>' . $row["quarters_rent"] . '</td> 
                          <td>' . $row["elect_charges"] . '</td>
                          <td>' . $row["water_charges"] . '</td> 
                          <td>' . $row["maint"] . '</td>
                          <td>' . $row["fine"] . '</td>  
                          <td>' . $row["mess_rent"] . '</td>  
                          <td>' . $row["shop_rent"] . '</td>  
                          <td>' . $row["service_tax"] . '</td> 
                          <td>' . $row["deposit"] . '</td>
                          <td>' . $row["miscellaneous"] . '</td> 
                          <td>' . $row["total"] . '</td>
                          <td>' . $row["payment_date"] . '</td>
                     </tr>  
                          ';
    }
    return $output;
}

if (isset($_POST["create_pdf"])) {
    $sum = $_GET['sum'];
    $from = $_GET['from'];
    $to1 = $_GET['to'];
    require_once '../tcpdf/examples/tcpdf_include.php';
    require_once '../tcpdf/tcpdf.php';
    //$custom_layout = array($your_width, $your_height);
    // $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, $custom_layout, true, 'UTF-8', false);
    $obj_pdf = new TCPDF('L', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);


    $obj_pdf->SetCreator(PDF_CREATOR);
    $obj_pdf->SetTitle("Fees Report From : $from  To : $to1");
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
Demand Notice For (Office-use)<br>Total Fees Report From : ' . $from . ' To : ' . $to1 . '<br /><br />
      <table border="1" cellspacing="0" cellpadding="5">  

           <tr>  
		    
                <th width="6%">Challan No</th>  
                <th width="10%">Name</th>
                <th width="10%">Qtrs Rent</th>
                <th width="6%">Elect</th>
                <th width="6.6%">Water</th>
                <th width="6.6%">Maintanance</th>
                <th width="6.6%">Fine</th>  
                <th width="6.6%">Mess</th>  
                <th width="6.6%">Shop</th>
                <th width="6.6%">Service</th>
                <th width="6.6%">Deposit</th>
                <th width="6.6%">Missellaneous</th>
                <th width="6.6%">Total</th>
                <th width="8%">Pay Date</th>
               
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
                <th width="35%" colspan="12" bgcolor="" text-align="" colspan="2">Total = ' . "$sum" . '&nbsp;/ - Rupees Only <br> '. getIndianCurrency($sum).'</th>               
           </tr>  
      ';

    $content2 .= '</table>';



    $obj_pdf->writeHTML($content2);
    $obj_pdf->Output('' . $from . '-' . $to1 . '-FeesReport.pdf', 'I');
}
?>
<?php


