<?PHP
	session_start();

	include '../../inc/conexion.php';
	include '../../inc/function.php';

	$op = new cnFunction();

	$fecha = $op->ToDay();
	$hora = $op->Time();

	$data = stripslashes($_POST['res']);

	$data = json_decode($data);

	//print_r($data);

	if( $data->statusRep == 'on' )
		$statusRep = 1;
	else
		$statusRep = 0;

	$strQuery = "UPDATE repuesto SET dateReg = '".$fecha." ".$hora."', ";
	$strQuery.= "id_categoria = '".$data->categoria."', numParte = '".$data->numParte."', name = '".$data->name."', fromRep = '".$data->fromRep."', ";
	$strQuery.= "priceSale = '".$data->priceSale."', priceBuy = '".$data->priceBuy."', statusRep='".$statusRep."', detail='".$data->detailU."', status = 'Activo' ";
	$strQuery.= "WHERE id_repuesto = '".$data->idResp."' ";

	$sql = $db->Execute($strQuery);

	$strQuery = "UPDATE suministra SET dateReg = '".$fecha." ".$hora."', ";
	$strQuery.= "id_repuesto = '".$data->idResp."', id_proveedor = '".$data->proveedor."', cantidad = '".$data->cantidad."' ";
	$strQuery.= "WHERE id_repuesto = '".$data->idResp."' "; /**AND id_proveedor =  $data->proveedor";*/

	$sql = $db->Execute($strQuery);

	$srtSql = "SELECT * FROM sucursal ";
	$srtSqlId = $db->Execute($srtSql);

	/*while ($srtId = $srtSqlId->FetchRow()) {
		$strQuery = "INSERT INTO almacenSuc ( id_almacen, id_sucursal, cantidad, dateReg, status ) ";
		$strQuery .= "VALUES ('".$data->idAlmacen."', '".$srtId['id_sucursal']."', '".$srtId['id_sucursal']."', ";
		$strQuery .= "'".$data->date."', 'Activo' )";
		$sql = $db->Execute($strQuery);
	}
	*/

	/*********************ACTUALIZA FOTO Y ENVIANDO DATOS POR EMAIL*******************************/

	//$data->img = '';

	$strQuery = "SELECT * FROM auximg ";

	$srtQ = $db->Execute($strQuery);

	if ($srtQ){
		while($row = $srtQ->FetchRow()){
			$name = $row['name'];
			$size = $row['size'];

			$strQuery = "INSERT INTO foto ( id_repuesto, name, size, dateReg, status ) ";
			$strQuery.= "VALUES ( '".$data->idResp."', '".$name."', '".$size."', '".$data->date."', 'Activo' )";

			$strQ = $db->Execute($strQuery);
			//$data->img = $img;
		}
	}
	//if($data->checksEmail == 'on'){
		//echo 'entra......';
		//include '../../classes/envioData.php';
	//}
	//print_r($data);
	/***************************************************************************/

	$sql = "TRUNCATE TABLE auximg ";
	$strQ = $db->Execute($sql);

	if($sql)
		echo json_encode($data);
	else
		echo 0;

?>
