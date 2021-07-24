<?php
include '../../inc/conexion.php';
/*$sql = "TRUNCATE TABLE auxImg ";
$strImg = $db->Execute($sql);
*/
$name = $_POST['name'];
$size = $_POST['size'];

$strQuery = "INSERT INTO auximg( name, size ) ";
$strQuery.= "VALUES( '".$name."', '".$size."' ) ";

$srt = $db->Execute($strQuery);

if($srt)
	echo 1;
else
	echo 0;
?>