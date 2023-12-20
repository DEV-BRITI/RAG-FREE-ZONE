<?php                
require 'dbase.php'; 
include_once('TCPDF-main/tcpdf.php');

$Reference_ID=$_GET['Reference_ID'];

$inv_mst_query = "SELECT * FROM registration WHERE Reference_ID='$Reference_ID'";             
$inv_mst_results = mysqli_query($con,$inv_mst_query);   
$count = mysqli_num_rows($inv_mst_results);  
if($count>0) 
{
	$inv_mst_data_row = mysqli_fetch_array($inv_mst_results, MYSQLI_ASSOC);

	//----- Code for generate pdf
	$pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
	$pdf->SetCreator(PDF_CREATOR);  
	//$pdf->SetTitle("Export HTML Table data to PDF using TCPDF in PHP");  
	$pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);  
	$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
	$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
	$pdf->SetDefaultMonospacedFont('helvetica');  
	$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
	$pdf->SetMargins(PDF_MARGIN_LEFT, '5', PDF_MARGIN_RIGHT);  
	$pdf->setPrintHeader(false);  
	$pdf->setPrintFooter(false);  
	$pdf->SetAutoPageBreak(TRUE, 10);  
	$pdf->SetFont('helvetica', '', 12);  
	$pdf->AddPage(); //default A4
	//$pdf->AddPage('P','A5'); //when you require custome page size 
	
	$content = ''; 

	$content .= '
	<style type="text/css">
	p{
	font-size:10px;
	line-height:13px;
	font-family:"Calibri", sans-serif;
	color:#000;
	}
	</style>    
    <p style="margin-top:0pt; margin-bottom:10pt; line-height:115%; font-size:1pt;"><img src="RAG-UPPER.jpg" width="802" height="110" alt=""><br></p>
<p style="margin-top:0pt; margin-bottom:10pt;">'.date("d-m-Y").'</p>
<p style="margin-top:0pt; margin-bottom:10pt; text-align:justify;">Subject : Urgent Intervention Required in Reported Ragging Incident</p>
<p style="margin-top:0pt; margin-bottom:10pt; text-align:justify;">Dear Competent Authority,</p>
<p style="margin-top:0pt; margin-bottom:10pt; text-indent:64.35pt; text-align:justify;">I hope this message finds you well. On behalf of RAG-FREE ZONE, a platform dedicated to student safety, we bring to your attention an alleged ragging incident reported through our portal.</p>
<p style="margin-top:0pt; margin-bottom:10pt; text-align:justify;">The incident involves a student at '.$inv_mst_data_row['College_Name'].'. While we maintain the students anonymity, we are ready to share specific details with your authority on a priority basis.</p>
<p style="margin-top:0pt; margin-bottom:10pt; text-align:justify;">We kindly request your immediate intervention for a thorough and impartial investigation. The reporting student details will be made available to facilitate a comprehensive examination.</p>
<p style="margin-top:0pt; margin-bottom:10pt; text-align:justify;">Concerned Student&rsquo;s Details are as follows :</p>
<p style="margin-top:0pt; margin-bottom:10pt; text-align:justify;">College/Institution Name : '.$inv_mst_data_row['College_Name'].'</p>
<p style="margin-top:0pt; margin-bottom:10pt; text-align:justify;">College Code : '.$inv_mst_data_row['College_Code'].'</p>
<p style="margin-top:0pt; margin-bottom:10pt; text-align:justify;">Branch : '.$inv_mst_data_row['Branch'].'</p>
<p style="margin-top:0pt; margin-bottom:10pt; text-align:justify;">Semester : '.$inv_mst_data_row['Semester'].'</p>
<p style="margin-top:0pt; margin-bottom:10pt; text-align:justify;">Date of Incident : '.$inv_mst_data_row['Date_of_Incident'].'</p>
<p style="margin-top:0pt; margin-bottom:10pt; text-align:justify;">Time of Incident : '.$inv_mst_data_row['Time_of_Incident'].'</p>
<p style="margin-top:0pt; margin-bottom:10pt; text-align:justify;">Ref ID : '.$inv_mst_data_row['Reference_ID'].'</p>
<p style="margin-top:0pt; margin-bottom:10pt; text-align:justify;">Incident Details : '.$inv_mst_data_row['Incident_Details'].'</p>
<p style="margin-top:0pt; margin-bottom:10pt; text-align:justify;">Swift action will not only address immediate concerns but contribute to a secure atmosphere within the institution. Please contact us at <a href="mailto:urgency.ragfreezone@gmail.com" style="text-decoration:none;"><u><span style="color:#0000ff;">urgency.ragfreezone@gmail.com</span></u></a> for information exchange.</p>
<p style="margin-top:0pt; margin-bottom:10pt; text-align:justify;">Your commitment to eradicating ragging is appreciated. We anticipate your timely response and cooperation.</p>
<p style="margin-top:0pt; margin-bottom:10pt; text-align:justify; line-height:115%; font-size:1pt;">&nbsp;</p>
<p style="margin-top:0pt; margin-bottom:0pt; line-height:normal;">Sincerely,</p>

<p style="margin-top:0pt; margin-bottom:0pt; line-height:normal;">Anti-Ragging Cell</p>
<p style="margin-top:0pt; margin-bottom:0pt; line-height:normal;">Inform Authorities Team</p>
<p style="margin-top:0pt; margin-bottom:0pt; line-height:normal;">RAG-FREE ZONE</p>
<p style="margin-top:0pt; margin-bottom:10pt;">Copy To :</p>
<p style="margin-top:0pt; margin-bottom:0pt; line-height:normal;">1. UGC Anti-Ragging Cell</p>
<p style="margin-top:0pt; margin-bottom:0pt; line-height:normal;">2. WB Police Anti-Ragging Cell</p>
<p style="margin-top:0pt; margin-bottom:0pt; line-height:normal;">3. College Anti-Ragging Squad</p>';
$pdf->writeHTML($content);

$file_location = "rag-free-zone/public_html/pdfd/"; //add your full path of your server
//$file_location = "/opt/lampp/htdocs/examples/generate_pdf/uploads/"; //for local xampp server

$datetime=date('dmY_hms');
$file_name = "RFZ_".$datetime.".pdf";
// ob_end_clean();

if($_GET['ACTION']=='VIEW') 
{
	$pdf->Output($file_name, 'I'); // I means Inline view
} 
else if($_GET['ACTION']=='DOWNLOAD')
{
	$pdf->Output($file_name, 'D'); // D means download
}
else if($_GET['ACTION']=='UPLOAD')
{
$pdf->Output($file_location.$file_name, 'F'); // F means upload PDF file on some folder
echo "Upload successfully!!";
}
else if($_GET['ACTION']=='EMAIL')
{
$pdf->Output($file_location.$file_name, 'F'); // F means upload PDF file on some folder
//echo "Email send successfully!!";
	error_reporting(E_ALL ^ E_DEPRECATED);	
	include_once('PHPMailer/class.phpmailer.php');	
	require ('PHPMailer/PHPMailerAutoload.php');

	$body='';
	$body .="<html>
	<head>
	<style type='text/css'> 
	body {
	font-family: Calibri;
	line-height:13px;
	font-size:16px;
	color:#000;
	}
	</style>
	</head>
	<body>
	Dear Receiver,
	<p>
	We trust this communication finds you in good health.
	</p>
	<p>
	We are writing to you on behalf of the RAG-FREE ZONE, a dedicated platform committed to ensuring the safety and well-being of students across educational institutions.
	</p>
	Please find the attachment to know more.
	<p>
	Revert back to helpline@ragfreezone.in
	</p>
	We anticipate your timely response and cooperation.
	<p>
	Thank you!
	</p>
	Please be notified that this is a System generated mail.<br>And do not reply to this mail.
	</body>
	</html>";

	$mail = new PHPMailer();
	$mail->CharSet = 'UTF-8';
	$mail->IsMAIL();
	$mail->IsSMTP();
	$mail->SMTPSecure = 'tls';
	$mail->Subject    = "FUNCTIONALITY TESTING";
	$mail->From = "urgency.ragfreezone@gmail.com";
	$mail->FromName = "RAG-FREE ZONE";
	$mail->IsHTML(true);
	$mail->AddAddress('indrajitgon268@gmail.com'); // To mail id
	//$mail->AddCC('info.shinerweb@gmail.com'); // Cc mail id
	//$mail->AddBCC('info.shinerweb@gmail.com'); // Bcc mail id

	$mail->AddAttachment($file_location.$file_name);
	$mail->MsgHTML ($body);
	$mail->WordWrap = 50;
	$mail->Send();	
	$mail->SmtpClose();
	if($mail->IsError()) {
	echo "Mailer Error: " . $mail->ErrorInfo;
	} else {
		echo "Message sent!";					
	};
}
//----- End Code for generate pdf
	
}
else
{
	echo 'Record not found for PDF.';
}

?>