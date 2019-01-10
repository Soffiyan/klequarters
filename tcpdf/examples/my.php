<?php  
 function fetch_data()  
 {  
      $output = '';  
      $connect = mysqli_connect("localhost", "root", "root", "klehostel");  
      $sql = "SELECT * FROM hostels ORDER BY id ASC";  
      $result = mysqli_query($connect, $sql);  
      while($row = mysqli_fetch_array($result))  
      {       
      $output .= '<tr>  
                          <td>'.$row["id"].'</td>  
                          <td>'.$row["hostel"].'</td>  
                          <td>'.$row["room_type"].'</td>  
                          
                     </tr>  
                          ';  
      }  
      return $output;  
 }  
 if(isset($_POST["create_pdf"]))  
 {  
      require_once('tcpdf_include.php');  
   $obj_pdf = new TCPDF('L', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
    

      $obj_pdf->SetCreator(PDF_CREATOR);  
      $obj_pdf->SetTitle("dzfdf");  
      $obj_pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);  
      $obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
      $obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
      $obj_pdf->SetDefaultMonospacedFont('helvetica');  
      $obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
      $obj_pdf->SetMargins(PDF_MARGIN_LEFT, '5', PDF_MARGIN_RIGHT);  
      $obj_pdf->setPrintHeader(false);  
      $obj_pdf->setPrintFooter(false);  
      $obj_pdf->SetAutoPageBreak(TRUE, 10);  
      $obj_pdf->SetFont('helvetica', '', 10);  
      //$obj_pdf->AddPage( id="plugin"type="application/x-google-chrome-pdf" src="chrome://print/17/-1/print.pdf" stream-url="chrome://print/17/-1/print.pdf"headers="" background-color="0xFF525659" top-toolbar-height="0" top-level-url="undefined">); 
     $obj_pdf->AddPage('L','LEGAL');

      
      $content = '';  
      $content .= '  
	 <br>
      	  <h4 align ="center">Hostel Details</h4> <br />
      <table border="1" cellspacing="0" cellpadding="5">  

           <tr>  
		    
                <th width="10%">ID</th>  
                <th width="40%">hostel</th>  
                <th width="45%">room_type</th>  
               
           </tr>  
      ';  
      $content .= fetch_data();  
      $content .= '</table>';  
      $obj_pdf->writeHTML($content);  
      $obj_pdf->Output('sample.pdf', 'I');  
 }  
 ?>  
 <!DOCTYPE html>  
 <html>  
     
      <head>  
           <title>print </title>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />            
      </head>  
      
      <body>  
           <br /><br />  
           <div class="container" style="width:700px;">  
                <h3 align="center">...........</h3><br />  
                <div class="table-responsive">  
				
                     <table class="table table-bordered">  
					 
					<h3 align ="center">Hostel Details</h3> <br />
					 
                          <tr>  
						   
                               <th width="10%">ID</th>  
                               <th width="50%">hostel</th>  
                               <th width="50%">Room type</th>  
                               
                          </tr>  
                     <?php  
                     echo fetch_data();  
                     ?>  
                     </table>  
                     <br />  
                     <form method="post">  
                         <select class="settings-select" aria-labelledby="media-size-label">
    <option value="{&quot;custom_display_name&quot;:&quot;Letter&quot;,&quot;height_microns&quot;:279400,&quot;is_default&quot;:true,&quot;name&quot;:&quot;NA_LETTER&quot;,&quot;vendor_id&quot;:&quot;1&quot;,&quot;width_microns&quot;:215900}">Letter</option>
    <option value="{&quot;custom_display_name&quot;:&quot;Legal&quot;,&quot;height_microns&quot;:355600,&quot;name&quot;:&quot;NA_LEGAL&quot;,&quot;vendor_id&quot;:&quot;5&quot;,&quot;width_microns&quot;:215900}">Legal</option>
    <option value="{&quot;custom_display_name&quot;:&quot;Executive&quot;,&quot;height_microns&quot;:266700,&quot;name&quot;:&quot;NA_EXECUTIVE&quot;,&quot;vendor_id&quot;:&quot;7&quot;,&quot;width_microns&quot;:184100}">Executive</option>
    <option value="{&quot;custom_display_name&quot;:&quot;A4&quot;,&quot;height_microns&quot;:297000,&quot;name&quot;:&quot;ISO_A4&quot;,&quot;vendor_id&quot;:&quot;9&quot;,&quot;width_microns&quot;:210000}">A4</option>
    <option value="{&quot;custom_display_name&quot;:&quot;A5&quot;,&quot;height_microns&quot;:210000,&quot;name&quot;:&quot;ISO_A5&quot;,&quot;vendor_id&quot;:&quot;11&quot;,&quot;width_microns&quot;:148000}">A5</option>
    <option value="{&quot;custom_display_name&quot;:&quot;B5 (JIS)&quot;,&quot;height_microns&quot;:257000,&quot;name&quot;:&quot;JIS_B5&quot;,&quot;vendor_id&quot;:&quot;13&quot;,&quot;width_microns&quot;:182000}">B5 (JIS)</option>
    <option value="{&quot;custom_display_name&quot;:&quot;Folio&quot;,&quot;height_microns&quot;:330200,&quot;name&quot;:&quot;JIS_EXEC&quot;,&quot;vendor_id&quot;:&quot;14&quot;,&quot;width_microns&quot;:215900}">Folio</option>
    <option value="{&quot;custom_display_name&quot;:&quot;Envelope #10&quot;,&quot;height_microns&quot;:241300,&quot;name&quot;:&quot;NA_NUMBER_10&quot;,&quot;vendor_id&quot;:&quot;20&quot;,&quot;width_microns&quot;:104700}">Envelope #10</option>
    <option value="{&quot;custom_display_name&quot;:&quot;Envelope DL&quot;,&quot;height_microns&quot;:220000,&quot;name&quot;:&quot;ISO_DL&quot;,&quot;vendor_id&quot;:&quot;27&quot;,&quot;width_microns&quot;:110000}">Envelope DL</option>
</select>
                          <input type="submit" name="create_pdf" class="btn btn-danger" value="Create pdf" />  
                     </form>  
                </div>  
           </div>  
      </body>  
 </html>  
 
