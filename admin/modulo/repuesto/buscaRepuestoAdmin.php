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

	$cadena = "SELECT r.id_repuesto, r.priceSale,r.priceBuy,r.detail, r.name AS namePro , f.name, r.fromRep, c.id_categoria, r.stockMin FROM repuesto AS r, foto AS f , categoria as c, suministra As s WHERE r.numParte = '$codigo'  AND r.id_repuesto = f.id_repuesto AND c.id_categoria=r.id_categoria AND s.id_repuesto=r.id_repuesto ";

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