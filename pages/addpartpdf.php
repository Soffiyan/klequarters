<?php

function fetch_data() {
    $output = '';
    $output1 = '';
    $connect = mysqli_connect("localhost", "root", "root", "klequaters");
    $sql = "select * from add_particulars";
    $result = mysqli_query($connect, $sql);
    while ($row = mysqli_fetch_array($result)) {
        $output .= '<tr>  
                          <td>' . $row["particular_code"] . '</td>  
                          <td>' . $row["particular"] . '</td>  
                          
                     </tr>  
                          ';
    }
    return $output;
}

if (isset($_POST["create_pdf"])) {
    require_once '../tcpdf/examples/tcpdf_include.php';
    require_once '../tcpdf/tcpdf.php';
    //$custom_layout = array($your_width, $your_height);
    // $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, $custom_layout, true, 'UTF-8', false);
    $obj_pdf = new TCPDF('L', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
    $obj_pdf->SetCreator(PDF_CREATOR);
    $obj_pdf->SetTitle("Particular");
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
    $obj_pdf->AddPage('P', 'A4');
    $content = '';
    $content .= '  
	 <br>
         
      	      <h4 align ="center">KLES Hostels & Residential Quarters
JNMC Campus Belgavi - 590010
Demand Notice For (Office-use)<br>Particulars Report<br /><br />
      <table border="1" cellspacing="0" cellpadding="5">  

           <tr>  
		    
                <th>Particular Code</th>  
                <th>Particular Name</th>
               
           </tr>  
      ';
    $content .= fetch_data();
    $content .= '</table>';



    $obj_pdf->writeHTML($content);
    $obj_pdf->Output('particulars.pdf', 'I');
}
?>
<?php


