<?php
/**
 * Created by PhpStorm.
 * User: SONY
 * Date: 4/9/2016
 * Time: 23:31
 */
//error_reporting(E_ALL ^ E_WARNING);

include '../../inc/conexion.php';
include '../../inc/function.php';

$op = new cnFunction();

$data = stripslashes($_POST['res']);

$data = json_decode($data);

//$q = "DELETE FROM repuesto AS r, almacen AS a WHERE r.id_repuesto = '".$data->id."' ";

$sql = "DELETE repuesto, almacen, suministra FROM repuesto INNER JOIN almacen ON repuesto.id_repuesto = almacen.id_repuesto INNER JOIN suministra ON suministra.id_suministra = almacen.id_suministra WHERE repuesto.id_repuesto = '".$data->id."'";
$reg = $db->Execute($sql);

$sql = "DELETE from almacenSuc where almacenSuc.id_repuesto = '".$data->id."'";
$reg = $db->Execute($sql);


$strQuery = "SELECT name FROM foto WHERE id_repuesto = '".$data->id."' ";
$str = $db->Execute($strQuery);

while ($row = $str->FetchRow()) {
	unlink('uploads/files/'.$row['name'].'');
}

$sql = "DELETE FROM foto WHERE id_repuesto = '".$data->id."' ";
$reg = $db->Execute($sql);

if($reg)
    echo json_encode($data);
else
    echo 0;
?>
