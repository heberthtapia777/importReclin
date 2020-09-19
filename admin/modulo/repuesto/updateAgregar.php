<?PHP
	session_start();

	include '../../adodb5/adodb.inc.php';
	include '../../inc/function.php';

	$db = NewADOConnection('mysqli');

	$db->Connect();

	$op = new cnFunction();

	$fecha = $op->ToDay();
	$hora = $op->Time();

	$data = stripslashes($_POST['res']);

	$data = json_decode($data);
	
	// echo $strQuery;

	$sql = $db->Execute($strQuery);

	$lastIdAl = $db->insert_Id();

	$srtSql = "SELECT * FROM sucursal ";
	$srtSqlId = $db->Execute($srtSql);

	while ($srtId = $srtSqlId->FetchRow()) {
		//primero se inseta  a la tabla almacen(asignaciones) estatica para historial
		//$strQuery = "INSERT INTO almacen ( id_sucursal, id_repuesto, cantidad, dateReg, status ) ";
		//$strQuery.= "VALUES ('".$srtId['id_sucursal']."','".$data->idResp."', '".$data->cantidad."', '".$data->date."', 'Activo' )";


		//Segundo se inserta a la tabla almacensuc que es dinamica
		$strQuery = " INSERT INTO almacenSuc ( id_sucursal, id_repuesto, cantidad, dateReg, status ) ";
		$strQuery .= " VALUES ( '".$srtId['id_sucursal']."','".$data->idResp."', '".$srtId['id_sucursal']."', ";
		$strQuery .= "'".$data->date."', 'Activo' )";
		
		$sql = $db->Execute($strQuery);
	}

	if($sql)
		echo json_encode($data);
	else
		echo 0;

?>
