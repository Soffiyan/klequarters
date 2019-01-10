<?php

include 'wordfun.php';

function fetch_data() {
    $output = '';
    $output1 = '';
    $challanno = $_GET['cno'];
    $connect = mysqli_connect("localhost", "root", "root", "klequaters");
    $sql = "select * from registration where challanno='$challanno'";
    $result = mysqli_query($connect, $sql);
    while ($row = mysqli_fetch_array($result)) {
        $sums = "$row[total]";
        $output .= '  
	 <br>
         <br><br>
<style>
	
        table tr td
        {
        font-size:8px;
         border:1px solid black;
        }
        table.float{
float: left
background:#000;
}
        </style>
        
      
           ';
        $output .= '<table border="1" width="25%" class="float" cellspacing="0" cellpadding="5">  
           <tr>  
                <th width="100%" colspan="12" bgcolor="" align="center" colspan="2"><br>KLES Hostels & Residential Quarters<br>JNMC Campus Belgavi - 590010 Demand Notice For (Office Copy)</th>               
                <th width="100%" colspan="12" bgcolor="" align="center" colspan="2"><br>KLES Hostels & Residential Quarters<br>JNMC Campus Belgavi - 590010 Demand Notice For (Bank Copy)</th>               
                <th width="100%" colspan="12" bgcolor="" align="center" colspan="2"><br>KLES Hostels & Residential Quarters<br>JNMC Campus Belgavi - 590010 Demand Notice For (Bank Acknowledgement)</th>               
                <th width="100%" colspan="12" bgcolor="" align="center" colspan="2"><br>KLES Hostels & Residential Quarters<br>JNMC Campus Belgavi - 590010 Demand Notice For (College Copy)</th>               
           </tr> <tr>
            <td class="bods" style="border-width: 0px;" width="50%" colspan="6" bgcolor="" align="left" colspan="2">SI NO <b>' . "$row[challanno]" . '</b><br><br>Recieved From <b>' . "$row[name]" . '</b></td>
            <td style="border-width: 0px;" width="50%" colspan="6" bgcolor="" align="right" colspan="2">Date : <b>' . "$row[abdate]" . '</b><br><br>Qtrs No : <b>______</b></td>
                
            <td style="border-width: 0px;" width="50%" colspan="6" bgcolor="" align="left" colspan="2">SI NO <b>' . "$row[challanno]" . '</b><br><br>Recieved From <b>' . "$row[name]" . '</b></td>
            <td style="border-width: 0px;" width="50%" colspan="6" bgcolor="" align="right" colspan="2">Date : <b>' . "$row[abdate]" . '</b><br><br>Qtrs No : <b>______</b></td>
                
            <td style="border-width: 0px;" width="50%" colspan="6" bgcolor="" align="left" colspan="2">SI NO <b>' . "$row[challanno]" . '</b><br><br>Recieved From <b>' . "$row[name]" . '</b></td>
            <td style="border-width: 0px;" width="50%" colspan="6" bgcolor="" align="right" colspan="2">Date : <b>' . "$row[abdate]" . '</b><br><br>Qtrs No : <b>______</b></td>
                
            <td style="border-width: 0px;" width="50%" colspan="6" bgcolor="" align="left" colspan="2">SI NO <b>' . "$row[challanno]" . '</b><br><br>Recieved From <b>' . "$row[name]" . '</b></td>
            <td style="border-width: 0px;" width="50%" colspan="6" bgcolor="" align="right" colspan="2">Date : <b>' . "$row[abdate]" . '</b><br><br>Qtrs No : <b>______</b></td>
            </tr>  
            <tr>
            <td style="border-width: 1px; border-color:black;" width="50%" colspan="6" bgcolor="" align="center" colspan="2"><b>Particulars</b></td>
            <td style="border-width: 1px;" width="50%" colspan="6" bgcolor="" align="center" colspan="2"><b>Amount</b></td>          
            <td style="border-width: 1px;" width="50%" colspan="6" bgcolor="" align="center" colspan="2"><b>Particulars</b></td>
            <td style="border-width: 1px;" width="50%" colspan="6" bgcolor="" align="center" colspan="2"><b>Amount</b></td>          
            <td style="border-width: 1px;" width="50%" colspan="6" bgcolor="" align="center" colspan="2"><b>Particulars</b></td>
            <td style="border-width: 1px;" width="50%" colspan="6" bgcolor="" align="center" colspan="2"><b>Amount</b></td>          
            <td style="border-width: 1px;" width="50%" colspan="6" bgcolor="" align="center" colspan="2"><b>Particulars</b></td>
            <td style="border-width: 1px;" width="50%" colspan="6" bgcolor="" align="center" colspan="2"><b>Amount</b></td>          
            </tr>
            <tr>
            <td style="border-width: 0px;" width="50%" colspan="6" bgcolor="" align="left" colspan="2">1.&nbsp; Staff Quarters Rent</td>
            <td style="border-width: 0px;" width="50%" colspan="6" bgcolor="" align="center" colspan="2">' . "$row[quarters_rent]" . '</td>   
                
                <td style="border-width: 0px;" width="50%" colspan="6" bgcolor="" align="left" colspan="2">1.&nbsp; Staff Quarters Rent</td>
            <td style="border-width: 0px;" width="50%" colspan="6" bgcolor="" align="center" colspan="2">' . "$row[quarters_rent]" . '</td>            
                <td style="border-width: 0px;" width="50%" colspan="6" bgcolor="" align="left" colspan="2">1.&nbsp; Staff Quarters Rent</td>
            <td style="border-width: 0px;" width="50%" colspan="6" bgcolor="" align="center" colspan="2">' . "$row[quarters_rent]" . '</td>            
                <td style="border-width: 0px;" width="50%" colspan="6" bgcolor="" align="left" colspan="2">1.&nbsp; Staff Quarters Rent</td>
            <td style="border-width: 0px;" width="50%" colspan="6" bgcolor="" align="center" colspan="2">' . "$row[quarters_rent]" . '</td>            
                
            </tr>
            <tr>
            <td style="border-width: 0px;" width="50%" colspan="6" bgcolor="" align="left" colspan="2">2.&nbsp; Electricity Charges </td>
            <td style="border-width: 0px;" width="50%" colspan="6" bgcolor="" align="center" colspan="2">' . "$row[elect_charges]" . '</td>           
                <td style="border-width: 0px;" width="50%" colspan="6" bgcolor="" align="left" colspan="2">2.&nbsp; Electricity Charges </td>
            <td style="border-width: 0px;" width="50%" colspan="6" bgcolor="" align="center" colspan="2">' . "$row[elect_charges]" . '</td>           
                <td style="border-width: 0px;" width="50%" colspan="6" bgcolor="" align="left" colspan="2">2.&nbsp; Electricity Charges </td>
            <td style="border-width: 0px;" width="50%" colspan="6" bgcolor="" align="center" colspan="2">' . "$row[elect_charges]" . '</td>           
                <td style="border-width: 0px;" width="50%" colspan="6" bgcolor="" align="left" colspan="2">2.&nbsp; Electricity Charges </td>
            <td style="border-width: 0px;" width="50%" colspan="6" bgcolor="" align="center" colspan="2">' . "$row[elect_charges]" . '</td>           
                
            </tr>
            <tr>
            <td style="border-width: 0px;" width="50%" colspan="6" bgcolor="" align="left" colspan="2">2.&nbsp; Water Charges </td>
            <td style="border-width: 0px;" width="50%" colspan="6" bgcolor="" align="center" colspan="2">' . "$row[water_charges]" . '</td>
                <td style="border-width: 0px;" width="50%" colspan="6" bgcolor="" align="left" colspan="2">2.&nbsp; Water Charges </td>
            <td style="border-width: 0px;" width="50%" colspan="6" bgcolor="" align="center" colspan="2">' . "$row[water_charges]" . '</td>
                <td style="border-width: 0px;" width="50%" colspan="6" bgcolor="" align="left" colspan="2">2.&nbsp; Water Charges </td>
            <td style="border-width: 0px;" width="50%" colspan="6" bgcolor="" align="center" colspan="2">' . "$row[water_charges]" . '</td>
                <td style="border-width: 0px;" width="50%" colspan="6" bgcolor="" align="left" colspan="2">2.&nbsp; Water Charges </td>
            <td style="border-width: 0px;" width="50%" colspan="6" bgcolor="" align="center" colspan="2">' . "$row[water_charges]" . '</td>
            </tr>
            <tr>
            <td style="border-width: 0px;" width="50%" colspan="6" bgcolor="" align="left" colspan="2">4.&nbsp;Maintenance</td>
            <td style="border-width: 0px;" width="50%" colspan="6" bgcolor="" align="center" colspan="2">' . "$row[maint]" . '</td>
                <td style="border-width: 0px;" width="50%" colspan="6" bgcolor="" align="left" colspan="2">4.&nbsp;Maintenance</td>
            <td style="border-width: 0px;" width="50%" colspan="6" bgcolor="" align="center" colspan="2">' . "$row[maint]" . '</td>
                <td style="border-width: 0px;" width="50%" colspan="6" bgcolor="" align="left" colspan="2">4.&nbsp;Maintenance</td>
            <td style="border-width: 0px;" width="50%" colspan="6" bgcolor="" align="center" colspan="2">' . "$row[maint]" . '</td>
                <td style="border-width: 0px;" width="50%" colspan="6" bgcolor="" align="left" colspan="2">4.&nbsp;Maintenance</td>
            <td style="border-width: 0px;" width="50%" colspan="6" bgcolor="" align="center" colspan="2">' . "$row[maint]" . '</td>
            </tr>
            <tr>
            <td style="border-width: 0px;" width="50%" colspan="6" bgcolor="" align="left" colspan="2">5.&nbsp;Fine / Penalty </td>
            <td style="border-width: 0px;" width="50%" colspan="6" bgcolor="" align="center" colspan="2">' . "$row[fine]" . '</td>
                <td style="border-width: 0px;" width="50%" colspan="6" bgcolor="" align="left" colspan="2">5.&nbsp;Fine / Penalty </td>
            <td style="border-width: 0px;" width="50%" colspan="6" bgcolor="" align="center" colspan="2">' . "$row[fine]" . '</td>
                <td style="border-width: 0px;" width="50%" colspan="6" bgcolor="" align="left" colspan="2">5.&nbsp;Fine / Penalty </td>
            <td style="border-width: 0px;" width="50%" colspan="6" bgcolor="" align="center" colspan="2">' . "$row[fine]" . '</td>
                <td style="border-width: 0px;" width="50%" colspan="6" bgcolor="" align="left" colspan="2">5.&nbsp;Fine / Penalty </td>
            <td style="border-width: 0px;" width="50%" colspan="6" bgcolor="" align="center" colspan="2">' . "$row[fine]" . '</td>
            </tr>
            <tr>
            <td style="border-width: 0px;" width="50%" colspan="6" bgcolor="" align="left" colspan="2">6.&nbsp; Service Tax </td>
            <td style="border-width: 0px;" width="50%" colspan="6" bgcolor="" align="center" colspan="2">' . "$row[service_tax]" . '</td>
                <td style="border-width: 0px;" width="50%" colspan="6" bgcolor="" align="left" colspan="2">6.&nbsp; Service Tax </td>
            <td style="border-width: 0px;" width="50%" colspan="6" bgcolor="" align="center" colspan="2">' . "$row[service_tax]" . '</td>
                <td style="border-width: 0px;" width="50%" colspan="6" bgcolor="" align="left" colspan="2">6.&nbsp; Service Tax </td>
            <td style="border-width: 0px;" width="50%" colspan="6" bgcolor="" align="center" colspan="2">' . "$row[service_tax]" . '</td>
                <td style="border-width: 0px;" width="50%" colspan="6" bgcolor="" align="left" colspan="2">6.&nbsp; Service Tax </td>
            <td style="border-width: 0px;" width="50%" colspan="6" bgcolor="" align="center" colspan="2">' . "$row[service_tax]" . '</td>
            </tr>
            <tr>
            <td style="border-width: 0px;" width="50%" colspan="6" bgcolor="" align="left" colspan="2">7. &nbsp;Mess Rent </td>
            <td style="border-width: 0px;" width="50%" colspan="6" bgcolor="" align="center" colspan="2">' . "$row[mess_rent]" . '</td>
                <td style="border-width: 0px;" width="50%" colspan="6" bgcolor="" align="left" colspan="2">7. &nbsp;Mess Rent </td>
            <td style="border-width: 0px;" width="50%" colspan="6" bgcolor="" align="center" colspan="2">' . "$row[mess_rent]" . '</td>
                <td style="border-width: 0px;" width="50%" colspan="6" bgcolor="" align="left" colspan="2">7. &nbsp;Mess Rent </td>
            <td style="border-width: 0px;" width="50%" colspan="6" bgcolor="" align="center" colspan="2">' . "$row[mess_rent]" . '</td>
                <td style="border-width: 0px;" width="50%" colspan="6" bgcolor="" align="left" colspan="2">7. &nbsp;Mess Rent </td>
            <td style="border-width: 0px;" width="50%" colspan="6" bgcolor="" align="center" colspan="2">' . "$row[mess_rent]" . '</td>
</tr>
            <tr>
<td style="border-width: 0px;" width="50%" colspan="6" bgcolor="" align="left" colspan="2">8.&nbsp; Commercial Shop Rent </td>
            <td style="border-width: 0px;" width="50%" colspan="6" bgcolor="" align="center" colspan="2">' . "$row[shop_rent]" . '</td>
                <td style="border-width: 0px;" width="50%" colspan="6" bgcolor="" align="left" colspan="2">8.&nbsp; Commercial Shop Rent </td>
            <td style="border-width: 0px;" width="50%" colspan="6" bgcolor="" align="center" colspan="2">' . "$row[shop_rent]" . '</td>
                <td style="border-width: 0px;" width="50%" colspan="6" bgcolor="" align="left" colspan="2">8.&nbsp; Commercial Shop Rent </td>
            <td style="border-width: 0px;" width="50%" colspan="6" bgcolor="" align="center" colspan="2">' . "$row[shop_rent]" . '</td>
<td style="border-width: 0px;" width="50%" colspan="6" bgcolor="" align="left" colspan="2">8.&nbsp; Commercial Shop Rent </td>
            <td style="border-width: 0px;" width="50%" colspan="6" bgcolor="" align="center" colspan="2">' . "$row[shop_rent]" . '</td>
            </tr>
            <tr>
            <td style="border-width: 0px;" width="50%" colspan="6" bgcolor="" align="left" colspan="2">9. &nbsp;Deposit </td>
            <td style="border-width: 0px;" width="50%" colspan="6" bgcolor="" align="center" colspan="2">' . "$row[deposit]" . '</td>
                <td style="border-width: 0px;" width="50%" colspan="6" bgcolor="" align="left" colspan="2">9. &nbsp;Deposit </td>
            <td style="border-width: 0px;" width="50%" colspan="6" bgcolor="" align="center" colspan="2">' . "$row[deposit]" . '</td>
                <td style="border-width: 0px;" width="50%" colspan="6" bgcolor="" align="left" colspan="2">9. &nbsp;Deposit </td>
            <td style="border-width: 0px;" width="50%" colspan="6" bgcolor="" align="center" colspan="2">' . "$row[deposit]" . '</td>
            <td style="border-width: 0px;" width="50%" colspan="6" bgcolor="" align="left" colspan="2">9. &nbsp;Deposit </td>
            <td style="border-width: 0px;" width="50%" colspan="6" bgcolor="" align="center" colspan="2">' . "$row[deposit]" . '</td>
            </tr>
            <tr>
<td style="border-width: 0px;" width="50%" colspan="6" bgcolor="" align="left" colspan="2">10.&nbsp; Missellaneous </td>
            <td style="border-width: 0px;" width="50%" colspan="6" bgcolor="" align="center" colspan="2">' . "$row[miscellaneous]" . '</td>
                <td style="border-width: 0px;" width="50%" colspan="6" bgcolor="" align="left" colspan="2">10.&nbsp; Missellaneous </td>
            <td style="border-width: 0px;" width="50%" colspan="6" bgcolor="" align="center" colspan="2">' . "$row[miscellaneous]" . '</td>
                <td style="border-width: 0px;" width="50%" colspan="6" bgcolor="" align="left" colspan="2">10.&nbsp; Missellaneous </td>
            <td style="border-width: 0px;" width="50%" colspan="6" bgcolor="" align="center" colspan="2">' . "$row[miscellaneous]" . '</td>
<td style="border-width: 0px;" width="50%" colspan="6" bgcolor="" align="left" colspan="2">10.&nbsp; Missellaneous </td>
            <td style="border-width: 0px;" width="50%" colspan="6" bgcolor="" align="center" colspan="2">' . "$row[miscellaneous]" . '</td>
            </tr>
            <tr>
            <td style="border-width: 0px;" width="50%" colspan="6" bgcolor="" align="center" colspan="2"><b>Total</b> </td>
            <td style="border-width: 0px;" width="50%" colspan="6" bgcolor="" align="center" colspan="2"><b>' . "$row[total]" . ' &nbsp;/-</b></td>            
                <td style="border-width: 0px;" width="50%" colspan="6" bgcolor="" align="center" colspan="2"><b>Total</b> </td>
            <td style="border-width: 0px;" width="50%" colspan="6" bgcolor="" align="center" colspan="2"><b>' . "$row[total]" . ' &nbsp;/-</b></td>            
                <td style="border-width: 0px;" width="50%" colspan="6" bgcolor="" align="center" colspan="2"><b>Total</b> </td>
            <td style="border-width: 0px;" width="50%" colspan="6" bgcolor="" align="center" colspan="2"><b>' . "$row[total]" . ' &nbsp;/-</b></td>            
                <td style="border-width: 0px;" width="50%" colspan="6" bgcolor="" align="center" colspan="2"><b>Total</b> </td>
            <td style="border-width: 0px;" width="50%" colspan="6" bgcolor="" align="center" colspan="2"><b>' . "$row[total]" . ' &nbsp;/-</b></td>            
            </tr>
            <tr>
            <td style="border-width: 0px;" width="100%" colspan="6" bgcolor="" align="left" colspan="2"><br><br>Rupees In Words  : <b><u>' . getIndianCurrency($sums) . '&nbsp;Only </b></u><br></td>
                <td style="border-width: 0px;" width="100%" colspan="6" bgcolor="" align="left" colspan="2"><br><br>Rupees In Words  : <b><u>' . getIndianCurrency($sums) . '&nbsp;Only </b></u><br></td>
                    <td style="border-width: 0px;" width="100%" colspan="6" bgcolor="" align="left" colspan="2"><br><br>Rupees In Words  : <b><u>' . getIndianCurrency($sums) . '&nbsp;Only </b></u><br></td>
                        <td style="border-width: 0px;" width="100%" colspan="6" bgcolor="" align="left" colspan="2"><br><br>Rupees In Words  : <b><u>' . getIndianCurrency($sums) . '&nbsp;Only </b></u><br></td>
            </tr>           
            <tr>
            <td style="border-width: 0px;" width="34%" colspan="6" bgcolor="" align="left" colspan="2"><br><br>By Cash / Cheque / DD NO  : <b>' . "$row[dd_no]" . '</b><br></td>
            <td style="border-width: 0px;" width="33%" colspan="6" bgcolor="" align="center" colspan="2"><br><br>DD Dated  : <b>' . "$row[dd_date]" . '</b><br></td>
            <td style="border-width: 0px;" width="33%" colspan="6" bgcolor="" align="left" colspan="2"><br><br>Place Of Issue  : <b>' . "$row[dd_place]" . '</b><br></td>   
                <td style="border-width: 0px;" width="34%" colspan="6" bgcolor="" align="left" colspan="2"><br><br>By Cash / Cheque / DD NO  : <b>' . "$row[dd_no]" . '</b><br></td>
            <td style="border-width: 0px;" width="33%" colspan="6" bgcolor="" align="center" colspan="2"><br><br>DD Dated  : <b>' . "$row[dd_date]" . '</b><br></td>
            <td style="border-width: 0px;" width="33%" colspan="6" bgcolor="" align="left" colspan="2"><br><br>Place Of Issue  : <b>' . "$row[dd_place]" . '</b><br></td>           
                <td style="border-width: 0px;" width="34%" colspan="6" bgcolor="" align="left" colspan="2"><br><br>By Cash / Cheque / DD NO  : <b>' . "$row[dd_no]" . '</b><br></td>
            <td style="border-width: 0px;" width="33%" colspan="6" bgcolor="" align="center" colspan="2"><br><br>DD Dated  : <b>' . "$row[dd_date]" . '</b><br></td>
            <td style="border-width: 0px;" width="33%" colspan="6" bgcolor="" align="left" colspan="2"><br><br>Place Of Issue  : <b>' . "$row[dd_place]" . '</b><br></td>           
                <td style="border-width: 0px;" width="34%" colspan="6" bgcolor="" align="left" colspan="2"><br><br>By Cash / Cheque / DD NO  : <b>' . "$row[dd_no]" . '</b><br></td>
            <td style="border-width: 0px;" width="33%" colspan="6" bgcolor="" align="center" colspan="2"><br><br>DD Dated  : <b>' . "$row[dd_date]" . '</b><br></td>
            <td style="border-width: 0px;" width="33%" colspan="6" bgcolor="" align="left" colspan="2"><br><br>Place Of Issue  : <b>' . "$row[dd_place]" . '</b><br></td>           
            </tr>    
            <tr>
                <td style="border-width: 0px;" width="100%" colspan="6" bgcolor="" align="center" colspan="2"><br><b>For Office Use Only</b><br><br>
                Recieved Rupees    <b>' . "$row[total]" . '&nbsp;/-</b>    only and credited to the BZRCMS Bank SB / A/c No 2098 standing in the name of the President K.L.E S A/c For Staff Quarters Belgavi</td>            
                    <td style="border-width: 0px;" width="100%" colspan="6" bgcolor="" align="center" colspan="2"><br><b>For Office Use Only</b><br><br>
                Recieved Rupees    <b>' . "$row[total]" . '&nbsp;/-</b>    only and credited to the BZRCMS Bank SB / A/c No 2098 standing in the name of the President K.L.E S A/c For Staff Quarters Belgavi</td>            
                    <td style="border-width: 0px;" width="100%" colspan="6" bgcolor="" align="center" colspan="2"><br><b>For Office Use Only</b><br><br>
                Recieved Rupees    <b>' . "$row[total]" . '&nbsp;/-</b>    only and credited to the BZRCMS Bank SB / A/c No 2098 standing in the name of the President K.L.E S A/c For Staff Quarters Belgavi</td>            
                    <td style="border-width: 0px;" width="100%" colspan="6" bgcolor="" align="center" colspan="2"><br><b>For Office Use Only</b><br><br>
                Recieved Rupees    <b>' . "$row[total]" . '&nbsp;/-</b>    only and credited to the BZRCMS Bank SB / A/c No 2098 standing in the name of the President K.L.E S A/c For Staff Quarters Belgavi</td>            
            </tr></table>
';
    }
    return $output;
}

if (isset($_POST["create_pdf"])) {

    $challanno = $_GET['cno'];


    require_once '../tcpdf/examples/tcpdf_include.php';
    require_once '../tcpdf/tcpdf.php';
    $obj_pdf = new TCPDF('L', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);


    $obj_pdf->SetCreator(PDF_CREATOR);
    $obj_pdf->SetTitle("Challan");
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
    $content .= fetch_data();

    //$content .= '';









    $obj_pdf->writeHTML($content);





    $obj_pdf->Output('' . $challanno . '-challanno.pdf', 'I');
}
?>


<?php


