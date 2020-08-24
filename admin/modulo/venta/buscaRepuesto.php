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

	$codigo = $_POST['codigo'];

	$cadena = "SELECT r.id_repuesto, r.priceSale, r.name AS namePro, suc.cantidad, f.name FROM repuesto AS r, foto AS f ,almacensuc AS suc WHERE r.numParte = '$codigo' AND r.id_repuesto = suc.id_repuesto AND r.id_repuesto = f.id_repuesto and suc.id_sucursal=".$_SESSION['IDSUCURSAL']."  GROUP BY r.id_repuesto ";

	$exe = $db->Execute($cadena);

 	if( $exe->RecordCount() > 0 ){
	   	$array=array();
	   	$i=0;
	    while( $row = $exe->FetchRow() ){
	      $array[$i] = $row;
	      $i++;
   		}
   		echo json_encode($array);
 	}else{
   		echo "0";
 	}
?>