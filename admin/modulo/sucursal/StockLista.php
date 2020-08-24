<?php
session_start();

include '../../adodb5/adodb.inc.php';
include '../../inc/function.php';

$db = NewADOConnection('mysqli');
//$db->debug = true;
$db->Connect();

   $sql ="select repuesto.numParte,repuesto.name,repuesto.fromRep,repuesto.priceSale,repuesto.priceBuy, almacenSuc.cantidad from (((almacen inner join almacensuc on almacen.id_almacen=almacensuc.id_almacen)inner join sucursal on almacensuc.id_sucursal=sucursal.id_sucursal)inner join repuesto on repuesto.id_repuesto=almacen.id_repuesto) where sucursal.id_sucursal=".$_POST['IDSUCURSAL'];

      $srtQuery = $db->Execute($sql);
      
      echo json_encode($srtQuery);

?>