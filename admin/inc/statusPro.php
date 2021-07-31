<?PHP
	session_start();

	include 'conexion.php';
	include 'function.php';

	$op = new cnFunction();

	$id		= $_POST['id'];
	$status = $_POST['status'];

	$strQuery = "UPDATE proveedor SET statusPro = '".$status."' WHERE id_proveedor = '$id'";
	$str = $db->Execute($strQuery);

	if($str)
		echo 1;
	else
		echo 0;
?>
