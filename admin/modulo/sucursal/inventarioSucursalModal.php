    
        <!-- Bootstrap core CSS -->
    <link href="../../assets/css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="../../assets/css/bootstrap-datetimepicker.min.css">
    <!--external css-->
    <link href="../../assets/font-awesome/css/font-awesome.css" rel="stylesheet" />

    <!-- Custom styles for this template -->
    <link href="../../assets/css/style.css" rel="stylesheet">
    <link href="../../assets/css/style-responsive.css" rel="stylesheet">

    <!-- <link href="../../assets/css/table-responsive.css" rel="stylesheet"> -->

    <link href="../../assets/css/dataTables.bootstrap.css" rel="stylesheet">
    <link href="../../assets/css/square/blue.css" rel="stylesheet">
    <link href="../../uploadify/uploadify.css" rel="stylesheet">
    <link href="../../assets/css/theme-default.css" rel="stylesheet">
    <link type="text/css" href="../../assets/css/myStyle.css" rel="stylesheet">


      <!--main content start-->
    
              <!-- <h4><i class="fa fa-angle-right"></i> Responsive Table</h4> -->
              <form id="formUpdate" action="javascript:updateForm('formUpdate','update.php')" class="form-horizontal" autocomplete="off"  >
                
                      <div class="modal-body" >
                         <!--inicio de la tabla stock-->
                        <table id="tablaList" class="table table-bordered table-striped table-condensed" style="font-size:11px">
                                  <thead>
                                  <tr>
                                      <th>Nº</th>
                                      <th>Nro. Parte</th>
                                      <th>Nombre</th>
                                      <th>Para Modelo</th>
                                      <th>Precio Venta</th>
                                      <th>Precio Compra</th>
                                      <th>Cantidad</th>
                                     
                                  </tr>
                                  </thead>
                                  <tbody>
                                  <?PHP
                                  $sql   = "select repuesto.numParte,repuesto.name,repuesto.fromRep,repuesto.priceSale,repuesto.priceBuy, almacensuc.cantidad, repuesto.stockMin from  almacensuc ,  sucursal , repuesto  where repuesto.id_repuesto=almacensuc.id_repuesto and almacensuc.id_sucursal=sucursal.id_sucursal and sucursal.id_sucursal=".$_GET['id'];

                                  $cont = 1;

                                  $srtQuery = $db->Execute($sql);
                                  if($srtQuery === false)
                                      die("failed");

                                  while( $row = $srtQuery->FetchRow()){

                                      ?>
                                      <tr id="tb<?=$row[0]?>">
                                          <td align="center"><?=$cont++;?></td>
                                          <td align="center"><?=$row['numParte']?></td>
                                          <td align="center"><?=$row['name'];?></td>
                                          <td align="center"><?=$row['fromRep'];?></td>
                                          <td align="center"><?=$row['priceSale'];?></td>
                                          <td align="center"><?=$row['priceBuy'];?></td>
                                          <td align="center"><?=$row['cantidad'];?></td>
                                          
                                      </tr>
                                      <?PHP
                                  }
                                  ?>
                                  </tbody>
                                  <tfoot>
                                    <tr>
                                        <th>Nº</th>
                                        <th>Nro. Parte</th>
                                        <th>Nombre</th>
                                        <th>Para Modelo</th>
                                        <th>Precio Venta</th>
                                        <th>Precio Compra</th>
                                        <th>Cantidad</th>
                                    </tr>
                                  </tfoot>
                                </table>
                         <!--fin de la tabla stock-->
                     
              </form>


          