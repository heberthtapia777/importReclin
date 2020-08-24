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

	$cadena = "SELECT cd.ci,cd.atencion,cd.tel1,cd.empresa,cd.tel2,cd.email, r.id_repuesto,r.numparte, r.name, dc.cantidad, r.priceSale FROM cotizaciones_demo AS cd, detalle_cotizacion_demo AS dc, repuesto AS r WHERE cd.numero_cotizacion = dc.numero_cotizacion AND cd.numero_cotizacion = '".$codigo."' AND dc.id_producto = r.id_repuesto";

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