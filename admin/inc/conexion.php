<?php
	//echo ('dsfsd sdf');
	ob_start();
    include(dirname(__FILE__).'/adodb5/adodb.inc.php');
	/*$db = ADONewConnection($dbdriver); # eg 'mysql' o 'postgres'
	$db->debug = true;
	$db->Connect($servidor, $usuario, $contraseña, $database);
*/
	 # Conexion no persistente
    /*$dsn = 'mysql://root:pwd@localhost/mydb';
    $db = NewADOConnection($dsn);
    if (!$db) die("Conexion incorrecta");*/

	/*$pwd   = urlencode('mysql');
	//$flags =  MYSQL_CLIENT_COMPRESS;
	$dsn   = "mysqli://root:$pwd@localhost/bd_mapaMilitantes_full?persist/";
	$db    = ADONewConnection($dsn);  # no need for PConnect()
	if (!$db) die("Conexion incorrecta");*/

	$pwd   = urlencode('1M4b,h{!#.4D');
		//$flags =  MYSQL_CLIENT_COMPRESS;
		$dsn   = "mysqli://sstei207_imporRe:$pwd@gator4166.hostgator.com/sstei207_importReclin?persist";
		$db    = ADONewConnection($dsn);  # no need for PConnect()
		if (!$db) die("Conexion incorrecta.....");
?>
