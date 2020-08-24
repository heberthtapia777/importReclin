<?PHP
$sql = "TRUNCATE TABLE aux_img ";
$strQ = $db->Execute($sql);
$fecha = $op->ToDay();
$hora = $op->Time();

$sql ="SELECT * FROM categoria";
$query = $db->Execute($sql);

$sql ="SELECT * FROM sucursal";
$strQuery = $db->Execute($sql);

$sql ="SELECT * FROM proveedor";
$queryProv = $db->Execute($sql);




?>
<form id="formStock" action="javascript:updateForm('formStock','updateAgregar.php')" class="form-horizontal" autocomplete="off" >
	<div class="modal fade" id="dataStock" tabindex="-1" role="dialog" aria-labelledby="ModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="exampleModalLabel">Agregar Stock</h4>
				</div>
				<div class="modal-body">
                    <div id="datos_ajax_updateAgregar"></div>

                    <div class="form-group">
                        <label for="fecha" class="control-label col-md-3">Fecha:</label>
                        <div class="col-md-4">
                            <input id="fecha" name="fecha" type="text" class="form-control" value="<?=$fecha;?> <?=$hora;?>" disabled="disabled" />
                        </div>
                        <input id="date" name="date" type="hidden" value="<?=$fecha;?> <?=$hora;?>" />
                        <input id="tabla" name="tabla" type="hidden" value="repuesto">
                        <input id="idResp" name="idResp" type="hidden">
                    </div>
                    <div class="form-group">
                        <label for="numParte" class="control-label col-md-3"># De Parte:</label>
                        <div class="col-md-4">
                            <input type="text" class="form-control" id="numParte" name="numParte" placeholder="# de Parte"
                                data-validation="required" disabled> <!--server-->
                                           <!--data-validation-url="modulo/almacen/validateCode.php"-->
                            </div>
                    </div>
                    <div class="form-group">
                        <label for="name" class="control-label col-md-3">Repuesto:</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" id="name" name="name" placeholder="Nombre Repuesto" data-validation="required" >
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="cantidad" class="control-label col-md-3">Cantidad en Stock Actual:</label>
                        <div class="col-md-4 col-xs-6">
                            <input type="text" class="form-control" id="cantidadActual" name="cantidadActual" placeholder="Cantidad en Stock Actual" data-validation="required number"  >
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <label for="cantidad" class="control-label col-md-3">Cantidad a Agregar en Stock:</label>
                        <div class="col-md-4 col-xs-6">
                            <input type="text" class="form-control" id="cantidad" name="cantidad" placeholder="Cantidad a Agregar" data-validation="required number" >
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <label for="cantStock" class="control-label col-md-3">Cantidad para Asignar:</label>
                        <div class="col-md-4 col-xs-6">
                            <input type="text" class="form-control" id="cantStock" onblur="javascript:cant_StockAsig()" name="cantStock" placeholder="Cantidad para Asignar"  value="0">
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <label for="asignar" class="control-label col-md-3 col-xs-3">Asignar a la Sucursal:</label>
                        <div class="col-md-9 col-xs-9">
                        <?php
                          $strEmp = "SELECT COUNT(*) FROM sucursal ";
                          $strNum = $db->Execute($strEmp);
                          $NumRow = $strNum->FetchRow();
                            $c=0;
                            while ($row = $strQuery->FetchRow()) {
                            $c++;
                        ?>
                            <div class="form-group">
                                <div class="col-md-6 col-xs-6">
                                    <p><?=$row['nameSuc']?></p>
                                </div>
                                <div class="col-md-6 col-xs-6">
                                    <input type="text" class="form-control" id="pre<?=$c;?>" name="<?=$row['id_sucursal'];?>" data-validation="required number" onblur="actuCantAsig(<?=$NumRow[0];?>)" value="0" >
                                </div>
                            </div>
                        <?php
                            }
                        ?>
                        </div>
                    </div>
                </div>

				<div class="modal-footer">
					<button type="button" id="close" class="btn btn-danger" data-dismiss="modal">
						<i class="fa fa-close" aria-hidden="true"></i>
						<span>Cancelar</span>
					</button>
					<button type="submit" id="save" class="btn btn-success">
						<i class="fa fa-check" aria-hidden="true"></i>
						<span>Agregar STOCK</span>
					</button>
				</div>
			</div>
		</div>
	</div>
</form>

<script>
    function cant_StockAsig() {

        cantidad = $('#formStock #cantidad').val();
        
        $('#formStock #cantStock').val(cantidad);
    }
    function actuCantAsig(num){
      pre = 'pre';
      total = 0;
      cantPro = $('#formStock input#cantidad').val();
      for(i=1; i<=num; i++){
          f = pre+i;
          cantPre = $('#formStock input#'+f).val();
          total = parseInt(total) + parseInt(cantPre);
      }
      resto = parseInt(cantPro) - parseInt(total);
      $('#formStock input#cantStock').val(resto);
    }
    var sw = 0;
    function actuOptionalAsig(num, sw){
          pre = 'pre';
          total = 0;
          cantPro = $('#formStock input#cantidad').val();
          for(i=1; i<=num; i++){
              f = pre+i;
              cantPre = $('#formStock input#'+f).val();
              total = parseInt(total) + parseInt(cantPre);
          }
          resto = parseInt(cantPro) - parseInt(total);
          $('#formStock input#cantStock').val(resto);
    }

	$('#dataStock').on('hidden.bs.modal', function (e) {
        $('#formStock').get(0).reset();
    });

	$('#dataStock').on('show.bs.modal', function (event) {

        var button      = $(event.relatedTarget); // Botón que activó el modal
        var idResp      = button.data('idresp'); // Extraer la información de atributos de datos
        var numParte    = button.data('numparte'); // Extraer la información de atributos de datos
        var name        = button.data('name'); // Extraer la información de atributos de datos
        var cantidad    = button.data('cantidad'); // Extraer la información de atributos de datos
        var cantSuc     = button.data('cantsuc'); // Extraer la información de atributos de datos
        var idAlmacen   = button.data('idalmacen'); // Extraer la información de atributos de datos
        var statusRep   = button.data('statusrep'); // Extraer la información de atributos de datos

        var modal = $(this);
        modal.find('.modal-title').text('Agregar STOCK al Repuesto ==> '+numParte);
        modal.find('.modal-body #idResp').val(idResp);
        modal.find('.modal-body #numParte').val(numParte);
        modal.find('.modal-body #name').val(name);
        modal.find('.modal-body #cantidadActual').val(cantidad);
        modal.find('.modal-body #idAlmacen').val(idAlmacen);
    });

</script>
