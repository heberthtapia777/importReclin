<?PHP
	session_start();

	include '../../adodb5/adodb.inc.php';
	include '../../inc/function.php';

	$db = NewADOConnection('mysqli');
	//$db->debug = true;
	$db->Connect();

	$op = new cnFunction();

	$fecha = $op->ToDay();
	$hora = $op->Time();

	$data = stripslashes($_POST['res']);

	$data = json_decode($data);

	//$cargo = $op->toCargo($data->cargo);
	if( $data->statusRep == 'on' )
		$statusRep = 1;
	else
		$statusRep = 0;

	if($data->swModifica=="SI"){
		
		//$lastIdAl = $db->insert_Id();

		$strQuery = "INSERT INTO suministra ( id_repuesto, id_proveedor, cantidad, dateReg ) ";
		$strQuery.= "VALUES ('".$data->IDREPUESTOMODIFICA."', '".$data->proveedor."', '".$data->cantidad."', '".$data->date."' )";

		$sql = $db->Execute($strQuery);

		// se obtiene el ultimo id de la tabla suministra
		$idSuministra = $db->insert_Id();

		$srtSql = "SELECT * FROM sucursal ";
		$srtSqlId = $db->Execute($srtSql);

		$cantidades=explode('@', $data->cantidadSucursal);
		$contador=0;
		while ($srtId = $srtSqlId->FetchRow()) {
			//inserta a almacen (asignaciones)
			//if($cantidades[$contador]!=0){
				$strQuery = "INSERT INTO almacen (id_suministra,id_sucursal, id_repuesto, cantidad, dateReg, status ) ";
				$strQuery.= "VALUES ('".$idSuministra."','".$srtId['id_sucursal']."','".$data->IDREPUESTOMODIFICA."', '".$cantidades[$contador]."', '".$data->date."', 'Activo' )";

				$sql = $db->Execute($strQuery);


				$strQuery = "UPDATE almacensuc SET  cantidad=cantidad+'".$cantidades[$contador]."' where ";
				$strQuery .= " id_sucursal='".$srtId['id_sucursal']."' and id_repuesto='".$data->IDREPUESTOMODIFICA."' ";
			
				$sql = $db->Execute($strQuery);

			//}
			$contador++;
		}

		$sql = "TRUNCATE TABLE auximg ";
		$strQ = $db->Execute($sql);

		if($sql)
			echo json_encode($data);
		else
			echo 0;
	}
	else{//por falso el repuesto no existe y se registra uno nuevo
		
		$strQuery = "INSERT INTO repuesto ( id_categoria, numParte,  name, fromRep, priceSale, priceBuy, detail, stockMin, statusRep, dateReg, status ) ";
		$strQuery.= "VALUES ('".$data->categoria_."', '".$data->numParte."', '".$data->name."', '".$data->fromRep."','".$data->priceSale."','".$data->priceBuy."', ";
		$strQuery.= "'".$data->detail."', '".$data->cantidadMin."', '".$statusRep."', '".$data->date."', 'Activo' )";

		$sql = $db->Execute($strQuery);

		$lastId = $db->insert_Id();

		

		//$lastIdAl = $db->insert_Id();

		$strQuery = "INSERT INTO suministra ( id_repuesto, id_proveedor, cantidad, dateReg ) ";
		$strQuery.= "VALUES ('".$lastId."', '".$data->proveedor."', '".$data->cantidad."', '".$data->date."' )";

		$sql = $db->Execute($strQuery);

		// se obtiene el ultimo id de la tabla suministra
		$idSuministra = $db->insert_Id();

		$srtSql = "SELECT * FROM sucursal ";
		$srtSqlId = $db->Execute($srtSql);

		$cantidades=explode('@', $data->cantidadSucursal);
		$contador=0;
		while ($srtId = $srtSqlId->FetchRow()) {
			//inserta a almacen (asignaciones)
			//if($cantidades[$contador]!=0){
				$strQuery = "INSERT INTO almacen (id_suministra,id_sucursal, id_repuesto, cantidad, dateReg, status ) ";
				$strQuery.= "VALUES ('".$idSuministra ."','".$srtId['id_sucursal']."','".$lastId."', '".$cantidades[$contador]."', '".$data->date."', 'Activo' )";

				$sql = $db->Execute($strQuery);


				$strQuery = "INSERT INTO almacensuc (  id_sucursal, id_repuesto, cantidad, dateReg, status ) ";
				$strQuery .= "VALUES ( '".$srtId['id_sucursal']."','".$lastId."', '".$cantidades[$contador]."', ";
				$strQuery .= "'".$data->date."', 'Activo' )";
				$sql = $db->Execute($strQuery);
			//}
			$contador++;
		}

		/*********************ACTUALIZA FOTO Y ENVIANDO DATOS POR EMAIL*******************************/

		//$data->img = '';

		$strQuery = "SELECT * FROM auximg ";

		$srtQ = $db->Execute($strQuery);

		if ($srtQ){
			while($row = $srtQ->FetchRow()){
				$name = $row['name'];
				$size = $row['size'];

				$strQuery = "INSERT INTO foto ( id_repuesto, name, size, dateReg, status ) ";
				$strQuery.= "VALUES ( '".$lastId."', '".$name."', '".$size."', '".$data->date."', 'Activo' )";

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
	}
		
	

?>
