<?php
	/*-------------------------
	Autor: Obed Alvarado
	Web: obedalvarado.pw
	Mail: info@obedalvarado.pw
	---------------------------*/

	session_start();
	/* Connect To Database*/
	include '../../adodb5/adodb.inc.php';
	include '../../inc/function.php';

	$db = NewADOConnection('mysqli');
	//$db->debug = true;
	$db->Connect();

	$op = new cnFunction();

	$fecha = $op->ToDay();
	$hora = $op->Time();

	require_once(dirname(__FILE__).'/../html2pdf.class.php');

	//Variables por GET
	$idX		= $_GET['idX'];
	$clients	= $_GET['clients'];
	//Fin de variables por GET
	if($clients != '0'){
		$sql 	= "SELECT * FROM cliente WHERE id_cliente = '".$clients."'";
		$query 	= $db->Execute($sql);
		$reg	= $query->FetchRow();

		$cliente = $reg['nombre'].' '.$reg['apP'].' '.$reg['apM'];
		$phone 	 = $reg['phone'];
		$email	 = $reg['email'];
	}else{
		$cliente = "Sin nombre";
	}

	$sqlQuery = "SELECT * FROM empleado WHERE id_empleado = '".$_SESSION['idEmp']."'";
	$query = $db->Execute($sqlQuery);
	$fila = $query->FetchRow();

	$nameEmp = $fila['nombre'].' '.$fila['apP'];

	$sqlSuc = "SELECT * FROM sucursal WHERE id_sucursal = '".$fila['id_sucursal']."' ";
	$querySuc = $db->Execute($sqlSuc);
	$suc = $querySuc->FetchRow();

    // get the HTML
    ob_start();
    include(dirname('__FILE__').'/res/venta_html.php');
    $content = ob_get_clean();

    try
    {
        // init HTML2PDF
        $html2pdf = new HTML2PDF('P', 'LETTER', 'es', true, 'UTF-8', array(0, 0, 0, 0));
        // display the full page
        $html2pdf->pdf->SetDisplayMode('fullpage');
        // convert
        $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
        // send the PDF
        $html2pdf->Output('Cotizacion.pdf');
    }
    catch(HTML2PDF_exception $e) {
        echo $e;
        exit;
    }
