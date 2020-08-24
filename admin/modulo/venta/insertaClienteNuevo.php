<?php
	session_start();

	include '../../adodb5/adodb.inc.php';
	include '../../inc/function.php';

	$db = NewADOConnection('mysqli');
	//$db->debug = true;
	$db->Connect();

	$op = new cnFunction();

	$fecha = $op->ToDay();
	$hora = $op->Time();

	/*if($_SESSION['autorizado']<>1){
    	header("Location: index.php");
	}*/
	$ci 	= 	$_POST['ci'];
	$nombre	=	$_POST['nombre'];
	$celu		=	$_POST['celu'];
	$empresa	=	$_POST['empresa'];
	$fono 		=	$_POST['fono'];
	$email      =   $_POST['email'];


	
	 // SE PROCESA LA VENTA
    $strQuery="INSERT INTO cliente (id_cliente,dateReg,ci,nombre,celular,nombreEmp,phone,email) VALUES ('$ci','$fecha','$ci','$nombre','$celu','$empresa','$fono','$email')";
    $db->Execute($strQuery);

?>