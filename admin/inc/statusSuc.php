<?PHP
	session_start();

	include '../adodb5/adodb.inc.php';
	include '../inc/function.php';

	$db = NewADOConnection('mysqli');
	//$db->debug = true;
	$db->Connect();

	$op = new cnFunction();

	$id		= $_POST['id'];
	$status = $_POST['status'];

	$strQuery = "UPDATE sucursal SET status = '".$status."' WHERE id_sucursal = '$id'";
	$str = $db->Execute($strQuery);

	if($str)
		echo 1;
	else
		echo 0;
?>