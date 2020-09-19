<?php
	/**
	 * Created by PhpStorm.
	 * User: hb-ta
	 * Date: 18/9/2020
	 * Time: 01:10
	 */
	
$data = stripslashes($_POST['res']);

$data = json_decode($data);

//print_r($data);

$destinatario = "$data->email";

$asunto = $data->motivo;//"Mensaje es de prueba";

$cuerpo = '
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>A Simple Responsive HTML Email</title>
  <style type="text/css">
  body {margin: 0; padding: 0; min-width: 100%!important;}
  /*img {height: auto;}*/
  .content {width: 100%; max-width: 600px;}
  .header {padding: 40px 30px 20px 30px;}
  .innerpadding {padding: 30px 30px 30px 30px;}
  .borderbottom {border-bottom: 1px solid #f2eeed;}
  .subhead {font-size: 15px; color: #ffffff; font-family: sans-serif; letter-spacing: 10px;}
  .h1, .h2, .bodycopy {color: #153643; font-family: sans-serif;}
  .h1 {font-size: 33px; line-height: 38px; font-weight: bold;}
  .h2 {padding: 0 0 15px 0; font-size: 24px; line-height: 28px; font-weight: bold;}
  .bodycopy {font-size: 16px; line-height: 22px;}
  .button {text-align: center; font-size: 18px; font-family: sans-serif; font-weight: bold; padding: 0 30px 0 30px;}
  .button a {color: #ffffff; text-decoration: none;}
  .footer {padding: 20px 30px 15px 30px;}
  .footercopy {font-family: sans-serif; font-size: 14px; color: #ffffff;}
  .footercopy a {color: #ffffff; text-decoration: underline;}

  @media only screen and (max-width: 550px), screen and (max-device-width: 550px) {
  body[yahoo] .hide {display: none!important;}
  body[yahoo] .buttonwrapper {background-color: transparent!important;}
  body[yahoo] .button {padding: 0px!important;}
  body[yahoo] .button a {background-color: #e05443; padding: 15px 15px 13px!important;}
  body[yahoo] .unsubscribe {display: block; margin-top: 20px; padding: 10px 50px; background: #2f3942; border-radius: 5px; text-decoration: none!important; font-weight: bold;}
  }

  /*@media only screen and (min-device-width: 601px) {
    .content {width: 600px !important;}
    .col425 {width: 425px!important;}
    .col380 {width: 380px!important;}
    }*/

  </style>
</head>

<body yahoo bgcolor="#f6f8f1">
<table width="100%" bgcolor="#f6f8f1" border="0" cellpadding="0" cellspacing="0">
<tr>
  <td>
    <!--[if (gte mso 9)|(IE)]>
      <table width="600" align="center" cellpadding="0" cellspacing="0" border="0">
        <tr>
          <td>
    <![endif]-->
    <table bgcolor="#ffffff" class="content" align="center" cellpadding="0" cellspacing="0" border="0">
      <tr align="center">
        <td bgcolor="#efefef" class="header" height="70" style="padding: 0 20px 20px 0;">

          <img class="fix" src="http://reclin.org/images/logotiporeclin.jpg" height="70" border="0" alt="" />
          
        </td>
      </tr>
      <tr>
        <td class="innerpadding borderbottom">
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td class="h2">
                Correo enviado correctamente
              </td>
            </tr>
            <tr>
              <td class="bodycopy">
                Gracias por su solicitud, reponderemos a la brebedad.
              </td>
            </tr>
          </table>
        </td>
      </tr>
      <tr>
        <td class="innerpadding borderbottom">
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td class="h2">
                Nombre:
              </td>
            </tr>
            <tr>
              <td class="bodycopy">
                '.$data->nombre.'
              </td>
            </tr>
            <tr>
              <td class="h2">
                Telefono:
              </td>
            </tr>
            <tr>
              <td class="bodycopy">
                '.$data->telefono.'
              </td>
            </tr>
            <tr>
              <td class="h2">
                Consulta:
              </td>
            </tr>
            <tr>
              <td class="bodycopy">
                '.$data->motivo.'
              </td>
            </tr>
            <tr>
              <td class="h2">
                Correo Electronico:
              </td>
            </tr>
            <tr>
              <td class="bodycopy">
                '.$data->email.'
              </td>
            </tr>
            <tr>
              <td class="h2">
                Mensaje:
              </td>
            </tr>
            <tr>
              <td class="bodycopy">
                '.$data->mensaje.'
              </td>
            </tr>
          </table>
        </td>
      </tr>

      <tr>
        <td class="footer" bgcolor="#44525f">
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td align="center" class="footercopy">
                &reg; Reclin 2020<br/>
                <!-- <a href="#" class="unsubscribe"><font color="#ffffff">Unsubscribe</font></a>
                <span class="hide">from this newsletter instantly</span> -->
              </td>
            </tr>
            <tr>
              <td align="center" style="padding: 20px 0 0 0;">
                <table border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td width="37" style="text-align: center; padding: 0 10px 0 10px;">
                      <a href="http://www.facebook.com/">
                        <i class="fab fa-facebook"></i>
                      </a>
                    </td>
                    <td width="37" style="text-align: center; padding: 0 10px 0 10px;">
                      <a href="http://www.twitter.com/">
                        <i class="fab fa-twitter"></i>
                      </a>
                    </td>
                  </tr>
                </table>
              </td>
            </tr>
          </table>
        </td>
      </tr>
    </table>
    </td>
  </tr>
</table>
</body>
</html>
';

$destinatario1 = "ventas@reclin.org";

$asunto1 = "Nueva Correo de la Pagina Web: '$data->motivo'";//"Mensaje es de prueba";

$cuerpo1 = '
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>A Simple Responsive HTML Email</title>
  <style type="text/css">
  body {margin: 0; padding: 0; min-width: 100%!important;}
  /*img {height: auto;}*/
  .content {width: 100%; max-width: 600px;}
  .header {padding: 40px 30px 20px 30px;}
  .innerpadding {padding: 30px 30px 30px 30px;}
  .borderbottom {border-bottom: 1px solid #f2eeed;}
  .subhead {font-size: 15px; color: #ffffff; font-family: sans-serif; letter-spacing: 10px;}
  .h1, .h2, .bodycopy {color: #153643; font-family: sans-serif;}
  .h1 {font-size: 33px; line-height: 38px; font-weight: bold;}
  .h2 {padding: 0 0 15px 0; font-size: 24px; line-height: 28px; font-weight: bold;}
  .bodycopy {font-size: 16px; line-height: 22px;}
  .button {text-align: center; font-size: 18px; font-family: sans-serif; font-weight: bold; padding: 0 30px 0 30px;}
  .button a {color: #ffffff; text-decoration: none;}
  .footer {padding: 20px 30px 15px 30px;}
  .footercopy {font-family: sans-serif; font-size: 14px; color: #ffffff;}
  .footercopy a {color: #ffffff; text-decoration: underline;}

  @media only screen and (max-width: 550px), screen and (max-device-width: 550px) {
  body[yahoo] .hide {display: none!important;}
  body[yahoo] .buttonwrapper {background-color: transparent!important;}
  body[yahoo] .button {padding: 0px!important;}
  body[yahoo] .button a {background-color: #e05443; padding: 15px 15px 13px!important;}
  body[yahoo] .unsubscribe {display: block; margin-top: 20px; padding: 10px 50px; background: #2f3942; border-radius: 5px; text-decoration: none!important; font-weight: bold;}
  }

  /*@media only screen and (min-device-width: 601px) {
    .content {width: 600px !important;}
    .col425 {width: 425px!important;}
    .col380 {width: 380px!important;}
    }*/

  </style>
</head>

<body yahoo bgcolor="#f6f8f1">
<table width="100%" bgcolor="#f6f8f1" border="0" cellpadding="0" cellspacing="0">
<tr>
  <td>
    <!--[if (gte mso 9)|(IE)]>
      <table width="600" align="center" cellpadding="0" cellspacing="0" border="0">
        <tr>
          <td>
    <![endif]-->
    <table bgcolor="#ffffff" class="content" align="center" cellpadding="0" cellspacing="0" border="0">
      <tr align="center">
        <td bgcolor="#efefef" class="header" height="70" style="padding: 0 20px 20px 0;">

          <img class="fix" src="http://reclin.org/images/logotiporeclin.jpg" height="70" border="0" alt="" />

        </td>
      </tr>
      <tr>
        <td class="innerpadding borderbottom">
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td class="h2">
                Nuevo Mensaje
              </td>
            </tr>
            <tr>
              <td class="bodycopy">
                Mensaje enviado desde la Pagina Web.
              </td>
            </tr>
          </table>
        </td>
      </tr>
      <tr>
        <td class="innerpadding borderbottom">
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td class="h2">
                Nombre:
              </td>
            </tr>
            <tr>
              <td class="bodycopy">
                '.$data->nombre.'
              </td>
            </tr>
            <tr>
              <td class="h2">
                Telefono:
              </td>
            </tr>
            <tr>
              <td class="bodycopy">
                '.$data->telefono.'
              </td>
            </tr>
            <tr>
              <td class="h2">
                Consulta:
              </td>
            </tr>
            <tr>
              <td class="bodycopy">
                '.$data->motivo.'
              </td>
            </tr>
            <tr>
              <td class="h2">
                Correo Electronico:
              </td>
            </tr>
            <tr>
              <td class="bodycopy">
                '.$data->email.'
              </td>
            </tr>
            <tr>
              <td class="h2">
                Mensaje:
              </td>
            </tr>
            <tr>
              <td class="bodycopy">
                '.$data->mensaje.'
              </td>
            </tr>
          </table>
        </td>
      </tr>

      <tr>
        <td class="footer" bgcolor="#44525f">
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td align="center" class="footercopy">
                &reg; Reclin 2020<br/>
                <!-- <a href="#" class="unsubscribe"><font color="#ffffff">Unsubscribe</font></a>
                <span class="hide">from this newsletter instantly</span> -->
              </td>
            </tr>
            <tr>
              <td align="center" style="padding: 20px 0 0 0;">
                <table border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td width="37" style="text-align: center; padding: 0 10px 0 10px;">
                      <a href="http://www.facebook.com/">
                        <i class="fab fa-facebook"></i>
                      </a>
                    </td>
                    <td width="37" style="text-align: center; padding: 0 10px 0 10px;">
                      <a href="http://www.twitter.com/">
                        <i class="fab fa-twitter"></i>
                      </a>
                    </td>
                  </tr>
                </table>
              </td>
            </tr>
          </table>
        </td>
      </tr>
    </table>
    </td>
  </tr>
</table>
</body>
</html>
    .';


//para el envío en formato HTML
$headers = "MIME-Version: 1.0\r\n";
$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";

//dirección del remitente
$headers .= "From: $data->nombre <$data->email>\r\n";

//dirección de respuesta, si queremos que sea distinta que la del remitente
//$headers .= "Reply-To: mariano@desarrolloweb.com\r\n";

//ruta del mensaje desde origen a destino
//$headers .= "Return-path: h.tapia@technosoft-bolivia.com\r\n";

//direcciones que recibián copia
//$headers .= "Cc: h.tapia@technosoft-bolivia.com, n4ch0.lopez@gmail.com\r\n";
//$headers .= "Cc: ventas@reclin.org\r\n";

//direcciones que recibirán copia oculta
///$headers .= "Bcc: pepe@pepe.com,juan@juan.com\r\n";

$mail = mail($destinatario,$asunto,$cuerpo,$headers);

$mail1 = mail($destinatario1,$asunto1,$cuerpo1,$headers);

if($mail1)
	echo 1;
else
	echo 0;
?>