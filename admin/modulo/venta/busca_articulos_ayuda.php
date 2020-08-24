<?php
  session_start();

  include '../../adodb5/adodb.inc.php';
  include '../../inc/function.php';

  $db = NewADOConnection('mysqli');
  //$db->debug = true;
  $db->Connect();

  $op = new cnFunction();

  $fecha = $op->ToDay();
  $hora = $op->Time();

  /*if($_SESSION['autorizado']<>1){
      header("Location: index.php");
  }*/

  $art = $_POST['articulo'];

  $cadena = "SELECT id_repuesto, numParte, detail, fromRep, priceSale FROM repuesto WHERE detail LIKE '%$art%' OR numParte LIKE '%$art%' ";

  $sql = $db->Execute($cadena);

  if( $sql->RecordCount() > 0 ){
      echo "<table class='table table-bordered table-hover'>";
      echo "<thead>";
      echo "<tr>";
      echo "<th># de Parte</th>";
      echo "<th>Detalle</th>";
      echo "<th>Repuesto Para</th>";
      echo "<th>Precio U.</th>";
      echo "<th>Agregar</th>";
      echo "<tbody>";
    while($row = $sql->FetchRow()){
      echo "<tr>";
      echo "<td>".$row['numParte']."</td>";
      echo "<td>".$row['detail']."</td>";
      echo "<td>".$row['fromRep']."</td>";
      echo "<td>".$row['priceSale']."</td>";
      echo "<td><button type='button' id='".$row['numParte']."' class='btn btn-primary btn-xs' onclick='add_art(this.id);'><i class='fa fa-reply'></i></button></td>";
      echo "</tr>";
    }
    echo "</tbody>";
    echo "</table>";
  }else{
    echo "<div class='callout callout-danger'>No se encontraron coincidencias...</div>";
  }

?>