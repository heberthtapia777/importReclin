<?php
session_start();

  include '../../adodb5/adodb.inc.php';
  include '../../inc/function.php';

  $db = NewADOConnection('mysqli');
  //$db->debug = true;
  $db->Connect();

  $op = new cnFunction();

  $inactivo = 900;

  if( isset($_SESSION['tiempo']) && isset($_SESSION['idEmp']) ) {
    $vida_session = time() - $_SESSION['tiempo'];
        if($vida_session > $inactivo){
            session_destroy();
            header("Location: index.php");
        }else{
          //echo "time_elapsed_B: ".$op->time_elapsed_B(time()-$_SESSION['tiempo'])."\n";
          $nowTime = $_SESSION['tiempo'] = time();
          $strQuery = 'UPDATE usuario SET status = "Inactivo", timeReg = "'.$nowTime.'" WHERE id_empleado = "'.$_SESSION['idEmp'].'"';
          $str = $db->Execute($strQuery);
        }
  }else{
    session_destroy();
    header("Location: ../../index.php");
  }
?>