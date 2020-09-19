<?php
	/**
	 * Created by PhpStorm.
	 * User: hb-ta
	 * Date: 18/9/2020
	 * Time: 21:53
	 */
		
	//se requiere el archivo para validar los datos de usuario de bdd para conectar
	$ip = $_SERVER["REMOTE_ADDR"];
	$fecha = date("j \d\e\l n \d\e Y");
	$hora = date("h:i:s");
	$horau = date("h");
	$diau = date("z");
	$aniou = date("Y");
	//se asignan la variables
	$sql = "SELECT aniou, diau, horau, ip ";
	$sql.= "FROM contador WHERE aniou LIKE '$aniou' AND diau LIKE '$diau' AND horau LIKE '$horau' AND ip LIKE '$ip' ";
	
	$es = $db->Execute($sql);
	
	//$es = mysql_query($sql, $con) or die("Error al leer base de datos: ".mysql_error);
	//se buscan los registros que coincidan con la hora,dia,año e ip
	if($es->RecordCount()>0)
	{//no se cuenta la visita
	}
	else
	{
		$sql = "INSERT INTO contador (id, ip, fecha, hora, horau, diau, aniou) ";
		$sql.= "VALUES ('','$ip','$fecha','$hora','$horau','$diau','$aniou')";
		$es = $db->Execute($sql);
		//$es = mysql_query($sql, $con) or die("Error al grabar un mensaje: ".mysql_error);
	}
	//creamos el condicionamiendo para logearlo o no.
	$sql = "SELECT * ";
	$sql.= "FROM contador WHERE id ";
	$es = $db->Execute($sql);
	//$es = mysql_query($sql, $con) or die("Error al leer base de datos: ".mysql_error);
	$visitas = $es->RecordCount();
	
?>