<?php
/**
 * Created by PhpStorm.
 * User: SONY
 * Date: 4/9/2016
 * Time: 23:31
 */
include '../../inc/conexion.php';
include '../../inc/function.php';

$op = new cnFunction();

$data = stripslashes($_POST['res']);

$data = json_decode($data);

$q = "DELETE FROM ".$data->tabla." WHERE id_".$data->tabla." = '".$data->id."' ";
$reg = $db->Execute($q);

if($reg)
    echo json_encode($data);
else
    echo 0;
?>