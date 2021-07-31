<?php
session_start();
include 'conexion.php';

$strEmp = "SELECT COUNT(*) FROM cliente WHERE id_empleado = ".$_SESSION['idEmp']." ";
$strNum = $db->Execute($strEmp);
$NumRow = $strNum->FetchRow();

$NumRow[0]++;

echo ($NumRow[0]);

?>