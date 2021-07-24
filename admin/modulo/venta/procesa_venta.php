<?php
	session_start();

	include '../../inc/conexion.php';
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

	$id			=	strtoupper($_POST['id']);
	$idRep		=	strtoupper($_POST['idRep']);
	$cantidad	=	$_POST['cantidad'];
	$precio		=	$_POST['precio'];

	//if($clienteid == '0'){
	$strQuery = "INSERT INTO comprarepuesto(id_compra, id_repuesto, price, cantidad, status) VALUES('".$id."', '".$idRep."', '".$precio."', '".$cantidad."', 'Activo')";

	$cadena_insert	 =	$db->Execute($strQuery);
//actualiza tabla almacen suc
	$strQuery = "UPDATE almacensuc set almacensuc.cantidad=almacensuc.cantidad-".$cantidad." where almacensuc.id_repuesto='".$idRep."' and id_sucursal='".$_SESSION['IDSUCURSAL']."'";
    $db->Execute($strQuery);
   
	//}
	/*if($credito=='1'){
		$cadena_insert=$db->Execute("INSERT INTO compra(codigo,cantidad,tipo,fecha,user,costou,preciou,proveedor,descuento_porcentaje,impuesto_porcentaje,serie,numero,fecha_proceso,referencia,referencia1,referencia2) VALUES(
	'$codigo',$cantidad,'STCR',now(),'$usuario',$costo_articulo,$preciou,0,0.00,0.00,$caja,$numero_ticket,now(),'$clienteid','','')");
	}*/

	//$cadena_update=$db->Execute("Update existencias set cantidad=cantidad-$cantidad where codigo='$codigo'");

?>