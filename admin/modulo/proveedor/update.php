<?PHP
	session_start();

	include '../../adodb5/adodb.inc.php';
	include '../../inc/function.php';

	$db = NewADOConnection('mysqli');

	$db->Connect();

	$op = new cnFunction();

	$fecha = $op->ToDay();
	$hora  = $op->Time();

	$data  = stripslashes($_POST['res']);

	$data  = json_decode($data);

	//print_r($data);

	/**
	 * Actualiza el proveedor
	 */

	$strQuery = "UPDATE proveedor SET nombre = '".$data->nameU."', apP = '".$data->paternoU."', apM = '".$data->maternoU."', depa = '".$data->depU."', phone = '".$data->fonoU."', celular = '".$data->celularU."', ";
	$strQuery.= "nombreEmp = '".$data->nameEmpU."', nit  = '".$data->nitU."',email  = '".$data->emailU."', direccion = '".$data->addresU."', numero = '".$data->NroU."', ";
	$strQuery.= "obser  = '".$data->obserU."', dateReg = '".$fecha.' '.$hora."' ";
	$strQuery.= "WHERE id_proveedor = '".$data->idProv."' ";

	$sql = $db->Execute($strQuery);

	if($sql)
		echo json_encode($data);
	else
		echo 0;
?>
