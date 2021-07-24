<?PHP
	ini_set("session.use_trans_sid","0");
	ini_set("session.use_only_cookies","1");
	ini_set("register_long_array","on");

	session_start();
	date_default_timezone_set("America/La_Paz" ) ;
	//session_set_cookie_params(0,"/",$_SERVER["HTTP_HOST"],0);

	include '../inc/conexion.php';

	$data = stripslashes($_POST['res']);
	$data = json_decode($data);

	$strQuery = "SELECT * FROM usuario WHERE user = '".$data->username."' ";
	$strQuery.= "AND pass = '".$data->password."' ";

	$strSql = $db->Execute($strQuery);
	$row = $strSql->FetchRow();

	$inactivo = 900;

	if( $row['status'] == 'Activo' ){

		$oldTime = $row['timeReg'];
		$nowTime = time();
		$tiempo_transcurrido = ($nowTime - $oldTime);

		if( $tiempo_transcurrido > $inactivo ){
			$strQuery = 'UPDATE usuario SET status = "Inactivo", timeReg = "'.$nowTime.'" WHERE id_usuario = "'.$row['id_usuario'].'"';
			$str = $db->Execute($strQuery);
		}

	}/*else{
		$strQuery = 'UPDATE usuario SET status = "Activo", WHERE id_usuario = "'.$row['id_usuario'].'"';
		$str = $db->Execute($strQuery);
	}*/

	$sql = 'SELECT * ';
	$sql.= 'FROM empleado AS e, usuario AS u ';
	$sql.= 'WHERE u.user LIKE "'.$data->username.'" AND u.pass LIKE "'.$data->password.'" ';
	$sql.= 'AND e.id_empleado = u.id_empleado ' ;
	$sql.= 'AND e.statusEmp = "Activo" ';
	$sql.= 'AND u.status= "Inactivo"';

	 

	$strSql = $db->Execute($sql);
	$reg = $strSql->FetchRow();
	$num = $strSql->RecordCount();

	$_SESSION['idEmp']	= $reg['id_empleado'];
	$_SESSION['cargo']	= $reg['cargo'];
	$_SESSION['tiempo'] = time();
	$_SESSION['nameUser'] = $reg['nombre'].' '.$reg['apP'];
	$_SESSION["idUser"] = $reg['id_usuario'];
	$_SESSION["idSuc"] = $reg['id_sucursal'];

	$data->cargo = $reg['cargo'];

	if($num == 1){
		/*$strQuery = 'UPDATE usuario SET status = "Activo", dateReg = "'.date("Y-n-j H:i:s").'" WHERE id_usuario = "'.$reg['id_usuario'].'"';
		$str = $db->Execute($strQuery);
		$_SESSION["idUser"] = $reg['id_usuario'];
		$_SESSION["ultimoAcceso"] = date("Y-n-j H:i:s");*/
		echo json_encode($data);
	}else{
		//$_SESSION["idUser"] = NULL;
		echo 0;
	}

?>
