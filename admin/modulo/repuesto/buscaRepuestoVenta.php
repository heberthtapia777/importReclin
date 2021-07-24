<?php
	session_start();

	include '../../inc/conexion.php';
	include '../../inc/function.php';

	$op = new cnFunction();

	$fecha = $op->ToDay();
	$hora = $op->Time();

	$idRepuesto = $_POST['IDREPUESTO'];
	

	$strQuery = "SELECT * from comprarepuesto where id_repuesto='$idRepuesto'";
	$str = $db->Execute($strQuery);


	//echo 1
	$sw=1;
    while ($row = $str->FetchRow()) {
	   $sw=2;
    }
    if($sw==2){
    	echo 1;
    }
    else{
		echo 0;
    }

	
?>