<?PHP
	session_start();

	include '../../adodb5/adodb.inc.php';
	include '../../inc/function.php';

	$db = NewADOConnection('mysqli');
	//$db->debug = true;
	$db->Connect();

	$op    = new cnFunction();

	$fecha = $op->ToDay();
	$hora  = $op->Time();

	$data  = stripslashes($_POST['res']);

	$data  = json_decode($data);

	$strQuery = "INSERT INTO proveedor (nombreEmp, nit, ci, depa, nombre, apP, apM, phone, celular, email, direccion, numero, obser, dateReg, statusPro ) ";
	$strQuery.= "VALUES ('".$data->nameEmp."', ".$data->nit.",".$data->ci.", '".$data->dep."', '".$data->name."', '".$data->paterno."', ";
	$strQuery.= "'".$data->materno."', '".$data->fono."', '".$data->celular."', '".$data->email."', '".$data->addres."', '".$data->Nro."', '".$data->obser."', ";
	$strQuery.= "'".$data->date."', 'Activo' )";

	$sql = $db->Execute($strQuery);

	if($sql)
		echo json_encode($data);
	else
		echo 0;
?>
