<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Invoice</title>

</head>

<body style="font-family:Arial, Helvetica, sans-serif">
 

<h3>Create Proforma Invoice</h3>
<br />
<form action="invoice2.php" class="form-horizontal" id="InvoiceForm" method="post" accept-charset="utf-8">

Entity <input name="Entity" maxlength="255" id="Entity" type="text" required><br /><br />
ATT <input name="ATT" maxlength="255" id="ATT" type="text"><br /><br />
VAT No <input name="VATNo" maxlength="255" id="VATNo"><br /><br />
Address <textarea name="Address" id="Address" cols="42" rows="4" ></textarea><br /><br />
Telephone <input name="Telephone" maxlength="255" id="Telephone" type="text"><br /><br />
Email <input name="Email" maxlength="255" id="Email" type="text"><br /><br />
1. Code <input name="Code1" maxlength="255" id="Code1" type="text"><br /><br />
1. Description <input name="Description1" maxlength="255" id="Description1" type="text"><br /><br />
1. Qty <input name="Qty1" maxlength="255" id="Qty1" type="number"><br /><br />
1. Rate <input name="Rate1" maxlength="255" id="Rate1" type="text"><br /><br />
2. Code <input name="Code2" maxlength="255" id="Code2" type="text"><br /><br />
2. Description <input name="Description2" maxlength="255" id="Description2" type="text"><br /><br />
2. Qty <input name="Qty2" maxlength="255" id="Qty2" type="number"><br /><br />
2. Rate <input name="Rate2" maxlength="255" id="Rate2" type="text"><br /><br />
3. Code <input name="Code3" maxlength="255" id="Code3" type="text"><br /><br />
3. Description <input name="Description3" maxlength="255" id="Description3" type="text"><br /><br />
3. Qty <input name="Qty3" maxlength="255" id="Qty3" type="number"><br /><br />
3. Rate <input name="Rate3" maxlength="255" id="Rate3" type="text"><br /><br />
4. Code <input name="Code4" maxlength="255" id="Code4" type="text"><br /><br />
4. Description <input name="Description4" maxlength="255" id="Description4" type="text"><br /><br />
4. Qty <input name="Qty4" maxlength="255" id="Qty4" type="number"><br /><br />
4. Rate <input name="Rate4" maxlength="255" id="Rate4" type="text"><br /><br />
VAT <input name="VAT" type="radio" value="Yes" checked="checked" /> Yes <input name="VAT" type="radio" value="No" /> No<br /><br />
Terms of Payment<div style="padding-top:5px;"><input name="TermsofPayment" type="radio" value="COD" checked="checked" /> COD <br />
<input name="TermsofPayment" type="radio" value="75% deposit - 25% upon delivery" /> 75% deposit - 25% upon delivery<br />
<input name="TermsofPayment" type="radio" value="50% deposit - 50% upon delivery" /> 50% deposit - 50% upon delivery<br />
<input name="TermsofPayment" type="radio" value="As per Account" /> As per Account<br /><br />
<input class="btn btn-default" value="Submit" type="submit">						<br>
</form>		

</body>
</html>
