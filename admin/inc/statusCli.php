<?PHP
	session_start();

	include '../inc/conexion.php';
	include '../inc/function.php';

	$op = new cnFunction();

	$id		= $_POST['id'];
	$status = $_POST['status'];

	$strQuery = "UPDATE cliente SET statusCli = '".$status."' WHERE id_cliente = '$id'";
	$str = $db->Execute($strQuery);

	if($str)
		echo 1;
	else
		echo 0;
?>