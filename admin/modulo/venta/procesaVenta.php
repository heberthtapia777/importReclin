<?php
	session_start();

	include '../../inc/conexion.php';
	include '../../inc/function.php';
	
	$op = new cnFunction();

	$fecha = $op->ToDay();
	$hora = $op->Time();

	/*if($_SESSION['autorizado']<>1){
    	header("Location: index.php");
	}*/
	$idCliente 	= 	$_POST['idCliente'];
	$subTotal	=	$_POST['subTotal'];
	$total		=	$_POST['total'];
	$descuento	=	$_POST['descuento'];
	$total 		=	$_POST['total'];

	$cadena_insert	 =	$db->Execute("INSERT INTO compra(id_empleado, id_cliente, dateReg, subTotal, descuento, total, status) VALUES('".$_SESSION['idEmp']."', '".$idCliente."', '".$fecha." ".$hora."', '".$subTotal."', '".$descuento."', '".$total."', 'Activo')");
	
	 // SE PROCESA LA VENTA
    /*$strQuery="INSERT INTO cliente (id_cliente,dateReg,ci,nombre,celular,nombreEmp,phone,email) VALUES ('$ci','$date','$ci','$atencion','$tel1','$empresa','$tel2','$email')";
    $db->Execute($strQuery);
	*/
	$lastId = $db->insert_Id();

	if($cadena_insert)
		echo $lastId;
	else
		echo 0;
?>