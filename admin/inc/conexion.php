<?php
	
	ob_start();
    include(dirname(__FILE__).'/../adodb5/adodb.inc.php');

	/*$pwd   = urlencode('mysql');
	//$flags =  MYSQL_CLIENT_COMPRESS;
		$dsn   = "mysqli://root:$pwd@localhost/bd_importReclin?persist/";
		$db    = ADONewConnection($dsn);  # no need for PConnect()
		if (!$db) die("Conexion incorrecta");*/
	
	$pwd   = urlencode('7?9r]CJwrE+~');
		//$flags =  MYSQL_CLIENT_COMPRESS;
		$dsn   = "mysqli://sstei207_imporRe:$pwd@gator4166.hostgator.com/sstei207_importReclin?persist";
		$db    = ADONewConnection($dsn);  # no need for PConnect()
		if (!$db) die("Conexion incorrecta.....");
?>
