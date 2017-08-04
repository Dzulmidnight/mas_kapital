 <?php include_once("class.phpmailer.php");
include_once("class.smtp.php");

/*
$mail = new PHPMailer();
$mail->IsSMTP();
//$mail->SMTPSecure = "ssl";
$mail->Host = "mailtrap.io";
//$mail->Port = 25;
$mail->Port = 2525;
$mail->SMTPAuth = true;
$mail->Username = "c1964e91a87e55";
$mail->Password = "7e87bca11dc4a5";
//$mail->SMTPDebug = 1;

$mail->From = "soporte@d-spp.org";
$mail->FromName = utf8_decode("CORREO MASKAPITAL");
$mail->AddBCC("yasser.midnight@gmail.com", "correo Oculto");
*/


$mail = new PHPMailer();
$mail->IsSMTP();
//$mail->SMTPSecure = "ssl";
$mail->Host = "mail.maskapital.mx";
//$mail->Port = 25;
$mail->Port = 25;
$mail->SMTPAuth = true;
$mail->Username = "maskapit";
$mail->Password = "54vX9Wckb5";
//$mail->SMTPDebug = 1;

$mail->From = "maskapit@maskapital.mx";
$mail->FromName = utf8_decode("PÁGINA WEB MASKAPITAL");
$mail->AddBCC("yasser.midnight@gmail.com", "correo Oculto");

 ?>
