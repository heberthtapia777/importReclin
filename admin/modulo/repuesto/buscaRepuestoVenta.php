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