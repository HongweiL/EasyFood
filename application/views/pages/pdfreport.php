<?php
tcpdf();
$obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$obj_pdf->SetCreator(PDF_CREATOR);
$title = "EasyFood";
$obj_pdf->SetTitle($title);
$obj_pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, $title, PDF_HEADER_STRING);
$obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
$obj_pdf->SetDefaultMonospacedFont('helvetica');
$obj_pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
$obj_pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$obj_pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
$obj_pdf->SetFont('helvetica', '', 9);
$obj_pdf->setFontSubsetting(false);
$obj_pdf->AddPage();
$avaliable = 'NO';
if ($detail->avalibility) {
  $avaliable = 'YES';
}
$content = '';
$content .= "

<div>
<div><h2>Description for ".$detail->name."</h2></div>
<div>DISH NAME:
<h3>".$detail->name."</h3><br></div>

<div>RESTAURANT:
<h3>".$detail->restaurant."</h3><br></div>

<div>CATEGORY:
<h3>".$detail->category."</h3><br></div>
CATEGORY:
<h3>".$detail->category."</h3><br>
<div>VOTES:
<h3>".$detail->fav."</h3><br></div>

<div>AVALIBILITY:
<h3>".$avaliable."</h3><br></div>

<div>PRICE:
<h3>".$detail->price."</h3></div></div>
";
$obj_pdf->writeHTML($content, true, false, true, false, '');
$obj_pdf->Output('dishdiscription.pdf', 'I');

 ?>
