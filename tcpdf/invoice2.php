<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Invoice 2</title>
</head>

<body>
<?php
require_once('tcpdf_include.php');
class MYPDF extends TCPDF 
{
	public function Header() {
		$image_file = 'http://makemoneyprogramming.com/code/invoice/logo.jpg';
		
		//$pdf->Image('images/image_demo.jpg', $x, $y, $w, $h, 'JPG', '', '', false, 300, '', false, false, 0, $fitbox, false, false);
		$this->Image($image_file,'',8,80,'', 'JPG', '', 'T', false, 300, 'L', false, false, 0, false, false, false);
	}

	// Page footer
	public function Footer() {
		// Position at 15 mm from bottom
        $this->SetY(-15);
        // Set font
        $this->SetFont('helvetica', 'I', 8);
        // Page number
        $this->Cell(0, 10, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
	}
	
}

function CreatePdf($id,&$pdf,$Entity,$Telephone,$Email,$Address,$ATT,$VATNo,$Code1,$Description1,$Qty1,$Rate1,$Code2,$Description2,$Qty2,$Rate2,$Code3,$Description3,$Qty3,$Rate3,$Code4,$Description4,$Qty4,$Rate4,$VAT,$TermsofPayment)
{
	// set document information
	$pdf->SetCreator(PDF_CREATOR);
	$pdf->SetAuthor('Alex');
	$pdf->SetTitle('Invoice example');
	$pdf->SetSubject('Invoice');
	$pdf->SetKeywords('Invoice');

	// set default header data
	$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 048', PDF_HEADER_STRING);

	// set header and footer fonts
	$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
	$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

	// set default monospaced font
	$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

	// set margins
	$pdf->SetMargins(PDF_MARGIN_LEFT + 5, PDF_MARGIN_TOP - 5, PDF_MARGIN_RIGHT +5);
	$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
	$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

	// set auto page breaks
	$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

	// set image scale factor
	$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

	// set some language-dependent strings (optional)
	if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
		require_once(dirname(__FILE__).'/lang/eng.php');
		$pdf->setLanguageArray($l);
	}

	// ---------------------------------------------------------

	$pdf->AddPage();

	$pdf->SetFont('helvetica', '', 9);
	$pdf->setJPEGQuality(100);

	$temp = '<br><br><br><br><br><br><br><span align="center"><b>PROFORMA INVOICE</b></span> <br>
	<br><br>';
	$temp .= '<table cellspacing="0" cellpadding="8" border="0">
    	<tr>
        	<td align="center" width="285" colspan="2" style="border-right: solid thin black;border-left: solid thin black;border-top: solid thin black"><b>CUSTOMER DETAILS</b></td>   	
			<td align="center" width="25" style="border-right: solid thin black"></td>
			<td align="center" width="285" colspan="2" style="border-right: solid thin black;border-top: solid thin black"><b>OUR DETAILS</b></td>
    	</tr>
		<tr>
        	<td align="left" width="90" style="border-left: solid thin black"><b>ENTITY:</b></td>   
			<td align="left" width="195" style="border-right: solid thin black">' . $Entity .'</td>   	
			<td align="center" width="25" style="border-right: solid thin black"></td>
			<td align="left" width="90"><b>ENTITY:</b></td> 
			<td align="left" width="195" style="border-right: solid thin black">Progrow Products (Pty) Ltd</td> 
		</tr> 
		<tr>
        	<td align="left" width="90" style="border-left: solid thin black"><b>ATT:</b></td>   
			<td align="left" width="195" style="border-right: solid thin black">' . $ATT .'</td>   	
			<td align="center" width="25" style="border-right: solid thin black"></td>
			<td align="left" width="90"><b>Proforma:</b></td> 
			<td align="left" width="195" style="border-right: solid thin black"># ' . ($id + 2000) . '</td> 
		</tr> 
		<tr>
        	<td align="left" width="90" style="border-left: solid thin black"><b>VAT NO:</b></td>   
			<td align="left" width="195" style="border-right: solid thin black">' . $VATNo .'</td>   	
			<td align="center" width="25" style="border-right: solid thin black"></td>
			<td align="left" width="90"><b>VAT NO:</b></td> 
			<td align="left" width="195" style="border-right: solid thin black">4340260811</td> 
		</tr> 
		<tr>
        	<td align="left" width="90" style="border-left: solid thin black"><b>ADDRESS:</b></td>   
			<td align="left" width="195" style="border-right: solid thin black">' . nl2br($Address) .'</td>   	
			<td align="center" width="25" style="border-right: solid thin black"></td>
			<td align="left" width="90"><b>ADDRESS:</b></td> 
			<td align="left" width="195" style="border-right: solid thin black">Unit15 Plank House Park, 15 Clinton Street<br />
			Stellenbosch, Republic of South Africa</td> 
		</tr> 
		<tr>
        	<td align="left" width="90" style="border-left: solid thin black"><b>TEL:</b></td>   
			<td align="left" width="195" style="border-right: solid thin black">' . $Telephone .'</td>   	
			<td align="center" width="25" style="border-right: solid thin black"></td>
			<td align="left" width="90"><b>TEL:</b></td> 
			<td align="left" width="195" style="border-right: solid thin black">23 379 32316</td> 
		</tr>
		<tr>
        	<td align="left" width="90" style="border-left: solid thin black"></td>   
			<td align="left" width="195" style="border-right: solid thin black"></td>   	
			<td align="center" width="25" style="border-right: solid thin black"></td>
			<td align="left" width="90"><b>FAX:</b></td> 
			<td align="left" width="195" style="border-right: solid thin black">036 520 11231</td> 
		</tr> 
		<tr>
        	<td align="left" width="90" style="border-left: solid thin black"><b>EMAIL:</b></td>   
			<td align="left" width="195" style="border-right: solid thin black">' . $Email .'</td>   	
			<td align="center" width="25" style="border-right: solid thin black"></td>
			<td align="left" width="90"><b>EMAIL:</b></td> 
			<td align="left" width="195" style="border-right: solid thin black">admin@dog.co.za</td> 
		</tr> 
		<tr>
        	<td align="left" width="90" style="border-left: solid thin black;border-bottom: solid thin black"></td>   
			<td align="left" width="195" style="border-right: solid thin black;border-bottom: solid thin black"></td>   	
			<td align="center" width="25" style="border-right: solid thin black"></td>
			<td align="left" width="90" style="border-bottom: solid thin black"><b>INVOICE DATE:</b></td> 
			<td align="left" width="195" style="border-right: solid thin black;border-bottom: solid thin black">' . date('d.m.Y') .'</td> 
		</tr> 
		</table>
		<br>
<br>
<br>
<br>';
	
		$temp .= '<table cellspacing="0" cellpadding="4" border="1">
		<tr>
        	<td align="center" width="90"><b>CODE</b></td>   
			<td align="center" width="195"><b>DESCRIPTION</b></td>   	
			<td align="center" width="100"><b>QTY</b></td>
			<td align="center" width="100"><b>RATE</b></td> 
			<td align="center" width="100"><b>TOTAL</b></td> 
		</tr>';
		$Total1 = 0;
		if ($Code1!="")
		{
		$Total1 =  $Qty1 * $Rate1;
		$temp .= '<tr>
        	<td align="center" width="90">' . $Code1 . '</td>   
			<td align="center" width="195">' . $Description1 . '</td>   	
			<td align="center" width="100">' . $Qty1 . '</td>
			<td align="center" width="100">' . number_format($Rate1, 2, '.', ' ') . '</td> 
			<td align="center" width="100">' . number_format($Total1, 2, '.', ' ') . '</td> 
		</tr>';
		}
		$Total2 = 0;
		if ($Code2!="")
		{
		$Total2 =  $Qty2 * $Rate2;
		$temp .= '<tr>
        	<td align="center" width="90">' . $Code2 . '</td>   
			<td align="center" width="195">' . $Description2 . '</td>   	
			<td align="center" width="100">' . $Qty2 . '</td>
			<td align="center" width="100">' . number_format($Rate2, 2, '.', ' ') . '</td> 
			<td align="center" width="100">' . number_format($Total2, 2, '.', ' ') . '</td> 
		</tr>';
		}
		$Total3 = 0;
		if ($Code3!="")
		{
		$Total3 =  $Qty3 * $Rate3;
		$temp .= '<tr>
        	<td align="center" width="90">' . $Code3 . '</td>   
			<td align="center" width="195">' . $Description3 . '</td>   	
			<td align="center" width="100">' . $Qty3 . '</td>
			<td align="center" width="100">' . number_format($Rate3, 2, '.', ' ') . '</td> 
			<td align="center" width="100">' . number_format($Total3, 2, '.', ' ') . '</td> 
		</tr>';
		}
		$Total4 = 0;
		if ($Code4!="")
		{
		$Total4 =  $Qty4 * $Rate4;
		$temp .= '<tr>
        	<td align="center" width="90">' . $Code4 . '</td>   
			<td align="center" width="195">' . $Description4 . '</td>   	
			<td align="center" width="100">' . $Qty4 . '</td>
			<td align="center" width="100">' . number_format($Rate4, 2, '.', ' ') . '</td> 
			<td align="center" width="100">' . number_format($Total4, 2, '.', ' ') . '</td> 
		</tr>';
		}
		
		$TTotal = $Total1 + $Total2 + $Total3 + $Total4;
		$temp .= '<tr>
        	<td align="center" columnspan="2" width="285"></td>   
			<td align="left" columnspan="2" width="200" >SUBTOTAL</td> 
			<td align="center" width="100">' . number_format($TTotal, 2, '.', ' ') . '</td> 
		</tr>';
			
		if ($VAT == "Yes")
		{ 
			$TheVAT = $TTotal * 0.14;
		}
		else
		{
			echo $TTotal; 
			$TheVAT = 0;
		}
		$temp .= '<tr>
        	<td align="center" columnspan="2" width="285"></td>   
			<td align="left" columnspan="2" width="200">VAT</td> 
			<td align="center" width="100">' . number_format($TheVAT, 2, '.', ' ') . '</td> 
		</tr>';
		$temp .= '<tr>
        	<td align="center" columnspan="2" width="285"></td>   
			<td align="left" columnspan="2" width="200">TOTAL COST IN RANDS (ZAR)</td> 
			<td align="center" width="100">' . number_format($TheVAT + $TTotal, 2, '.', ' ') . '</td> 
		</tr>';
		$temp .= '</table><br>
<br>
<br>
<br>
';
	$pdf->writeHTML($temp, true, false, false, false, '');
	
	
	$temp = '<table cellspacing="0" cellpadding="0" border="0">
    	<tr>
        	<td align="left" width="120"><b>Bank:</b><br><b>Account name:</b><br><b>Account number:</b><br><b>Branch Code:</b><br><b>Swift Code:</b>
</td> 
			<td align="left" width="165">Nedbank<br>Progrow Products (Pty) Ltd<br>106792131<br>191265<br>NEDSZAJJ</td> 
			<td align="left" width="120"><b>Currency:</b><br><b>Terms & Payment:</b></td> 
			<td align="left" width="180">ZAR<br>' . $TermsofPayment . '</td>   	
		</tr></table>';
	
	$pdf->writeHTML($temp, true, false, false, false, '');
	$temp = '
		<br><br><br><span align="center"><b><i>We thank you for your business.</b></span>';
	
	$pdf->writeHTML($temp, true, false, false, false, '');
	
	$pdf->AddPage();
}
?>
<?
if (isset($_POST['Entity']))
{
	$Entity = $_POST['Entity'];
	$ATT = $_POST['ATT'];
	$VATNo = $_POST['VATNo'];
	$Address = $_POST['Address'];
	$Email = $_POST['Email'];
	$Telephone = $_POST['Telephone'];
	$Code1 = $_POST['Code1'];
	$Description1 = $_POST['Description1'];
	$Qty1 = $_POST['Qty1'];
	$Rate1 = $_POST['Rate1'];
	$Code2 = $_POST['Code2'];
	$Description2 = $_POST['Description2'];
	$Qty2 = $_POST['Qty2'];
	$Rate2 = $_POST['Rate2'];
	$Code3 = $_POST['Code3'];
	$Description3 = $_POST['Description3'];
	$Qty3 = $_POST['Qty3'];
	$Rate3 = $_POST['Rate3'];
	$Code4 = $_POST['Code4'];
	$Description4 = $_POST['Description4'];
	$Qty4 = $_POST['Qty4'];
	$Rate4 = $_POST['Rate4'];
	$VAT = $_POST['VAT'];
	$TermsofPayment = $_POST['TermsofPayment'];
	$id = 0;
	
	// create new PDF document
	$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

	CreatePdf($id,$pdf,$Entity,$Telephone,$Email,$Address,$ATT,$VATNo,$Code1,$Description1,$Qty1,$Rate1,$Code2,$Description2,$Qty2,$Rate2,$Code3,$Description3,$Qty3,$Rate3,$Code4,$Description4,$Qty4,$Rate4,$VAT,$TermsofPayment);
	
	//mkdir("invoices/$id", 0777);
	
	$pdf->Output('files/Invoice.pdf', 'F');
	
}

?>
 
<a href="files/Invoice.pdf" target="_blank">Invoice</a>

</body>
</html>
