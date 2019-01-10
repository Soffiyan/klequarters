<?php

include '../Model/connect.php';
include 'wordfun.php';

function fetch_data() {
    $output = '';
    $output1 = '';
    $status = $_GET['status'];

    if ($status == 'all') {
        $sql = "select * from add_bed";
        $result = mysql_query($sql);
        $i = 1;
        while ($row = mysql_fetch_array($result)) {
            $r1 = mysql_query("select * from add_quarter where code='$row[quarter_code]'");
            $ra = mysql_fetch_array($r1);
            $r2 = mysql_query("select * from quarters_reg where quarter_no='$row[quarter_code]' and status='' and vacate_date=''");
            $rb = mysql_fetch_array($r2);
            $r3 = mysql_query("select * from add_dep where code='$rb[dep]'");
            $rc = mysql_fetch_array($r3);
            $output .= '<tr>  
                          <td align="left">' . $i . '</td>  
                              
                          <td align="left">' . $ra["quarter"] . '</td>  
                          <td align="left">' . $row["bed"] . '</td> 
                          <td align="left">' . $rb["staff_name"] . '</td>
                          <td align="left">' . $rc["dep"] . '</td> 
                          <td align="left">' . $rb["institute"] . '</td>
                            
                     </tr>  
                          ';
            $i = $i + 1;
        }
        return $output;
    } elseif ($status == '' or $status == 'used') {
        $sql = "select * from add_bed where flag='$status'";
        $result = mysql_query($sql);
        $i = 1;
        while ($row = mysql_fetch_array($result)) {
            $r1 = mysql_query("select * from add_quarter where code='$row[quarter_code]'");
            $ra = mysql_fetch_array($r1);
            $r2 = mysql_query("select * from quarters_reg where quarter_no='$row[quarter_code]' and status='' and vacate_date=''");
            $rb = mysql_fetch_array($r2);
            $r3 = mysql_query("select * from add_dep where code='$rb[dep]'");
            $rc = mysql_fetch_array($r3);
            $output .= '<tr>  
                          <td align="left">' . $i . '</td>  
                              
                          <td align="left">' . $ra["quarter"] . '</td>  
                          <td align="left">' . $row["bed"] . '</td> 
                          <td align="left">' . $rb["staff_name"] . '</td>
                          <td align="left">' . $rc["dep"] . '</td> 
                          <td align="left">' . $rb["institute"] . '</td>
                     </tr>  
                          ';
            $i = $i + 1;
        }
        return $output;
    }
}

if (isset($_POST["create_pdf"])) {
    require_once '../tcpdf/examples/tcpdf_include.php';
    require_once '../tcpdf/tcpdf.php';
    //$custom_layout = array($your_width, $your_height);
    // $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, $custom_layout, true, 'UTF-8', false);
    $obj_pdf = new TCPDF('L', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);


    $obj_pdf->SetCreator(PDF_CREATOR);
    $obj_pdf->SetTitle("Quarters Status Report");
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
    $obj_pdf->AddPage('P', 'PATRIOT');



    $content = '';
    $datess = date('Y');
    $content .= '  
       
	 <br>
         
      	      <h4 align ="center">KLES Hostels & Residential Quarters<br>
JNMC Campus Nehru Nagar Belgavi - 590010
<br>Quarters Status Report';
    $content .= ' <br /><br /> <table border="1" cellspacing="0" cellpadding="5">  

           <tr>  
                    
                    <th width="10%">SI.no</th>
                    <th width="15%">Quarter</th>
                    <th width="10%">Bed</th>                    
                    <th width="25%">Name</th>
                    <th width="20%">Institute</th>
                    <th width="20%">Dep</th>
               
           </tr>  
      ';
    $content .= fetch_data();
    $content .= '</table>';
    $obj_pdf->writeHTML($content);

    $dates = date('d-m-Y');
    $obj_pdf->Output('qtrsstatus.pdf', 'I');
}
?>
<?php


