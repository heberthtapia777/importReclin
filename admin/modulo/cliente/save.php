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

	$strQuery = "INSERT INTO cliente (id_cliente, ci, depa, id_empleado, nombre, apP, apM, phone, celular, ";
	$strQuery.= "nombreEmp, email, direccion, numero, obser, dateReg, statusCli ) ";
	$strQuery.= "VALUES ('".$data->codCl."', ".$data->ci.", '".$data->dep."', '".$_SESSION['idEmp']."', '".$data->name."', '".$data->paterno."', ";
	$strQuery.= "'".$data->materno."', '".$data->fono."', '".$data->celular."', '".$data->nameEmp."', ";
	$strQuery.= "'".$data->email."', '".$data->addres."', '".$data->Nro."', '".$data->obser."', ";
	$strQuery.= "'".$data->date."', 'Activo' )";

	$sql = $db->Execute($strQuery);

	if($sql)
		echo json_encode($data);
	else
		echo 0;
?>
