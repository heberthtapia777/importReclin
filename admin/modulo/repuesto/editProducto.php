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
<form id="formUpdate" action="javascript:updateForm('formUpdate','update.php')" class="form-horizontal" autocomplete="off" >
	<div class="modal fade" id="dataUpdate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="exampleModalLabel">Modificar Repuesto</h4>
				</div>
				<div class="modal-body">
					<div id="datos_ajax_update"></div>

					<div class="form-group">
						<label for="fecha" class="control-label col-md-3">Fecha:</label>
						<div class="col-md-4">
							<input id="fecha" name="fecha" type="text" class="form-control" value="<?=$fecha;?> <?=$hora;?>" disabled="disabled" />
						</div>
						<input id="date" name="date" type="hidden" value="<?=$fecha;?> <?=$hora;?>" />
						<input id="tabla" name="tabla" type="hidden" value="repuesto">
						<input id="idResp" name="idResp" type="hidden">
						<input type="hidden" id="idAlmacen" name="idAlmacen" value="">
					</div>
					
					<div class="form-group">
						<label for="numParte" class="control-label col-md-3"># De Parte:</label>
						<div class="col-md-4">
							<input type="text" class="form-control" id="numParte" name="numParte" placeholder="# de Parte"
								   data-validation="required"> <!--server-->
								   <!--data-validation-url="modulo/almacen/validateCode.php"-->
						</div>
					</div>
					
					<div class="form-group">
						<label for="categoria" class="control-label col-md-3">Categoria:</label>
						<div class="col-md-4">
							<select id="categoria" name="categoria" class="form-control" data-validation="required">
								<option value="" disabled selected hidden>Categoria</option>
								<?php
									while ($row = $query->FetchRow()) {
								?>
								<option value="<?=$row['id_categoria']?>"><?=$row['name']?></option>
								<?php
									}
								?>
							</select>
						</div>
					</div>

					<div class="form-group">
						<label for="proveedor" class="control-label col-md-3">Proveedor:</label>
						<div class="col-md-4">
							<select id="proveedor" name="proveedor" class="form-control" data-validation="required">
								<option value="" disabled selected hidden>Proveedor</option>
								<option value="0">Ninguno</option>
								<?php
									while ($row = $queryProv->FetchRow()) {
								?>
								<option value="<?=$row['id_proveedor']?>"><?=$row['nombreEmp']?></option>
								<?php
									}
								?>
							</select>
							<input type="hidden" id="provee" name="provee" value="">
						</div>
					</div>
					<div class="form-group">
						<label for="name" class="control-label col-md-3">Repuesto:</label>
						<div class="col-md-9">
							<input type="text" class="form-control" id="name" name="name" placeholder="Nombre Repuesto" data-validation="required">
						</div>
					</div>
					<div class="form-group">
						<label for="fromRep" class="control-label col-md-3">Repuesto Para Modelos:</label>
						<div class="col-md-9">
							<input type="text" class="form-control" id="fromRep" name="fromRep" placeholder="Repuesto Para" data-validation="required">
						</div>
					</div>
					<div class="form-group">
						<label for="cantidad" class="control-label col-md-3">Cantidad en Stock:</label>
						<div class="col-md-4 col-xs-6">
							<input type="text" class="form-control" id="cantidad" name="cantidad" onblur="javascript:cant_StockU()" placeholder="Cantidad en Stock" data-validation="required number" >
						</div>
					</div>
					<div class="form-group">
						<label for="cantidadMin" class="control-label col-md-3">Cantidad Minima en Stock:</label>
						<div class="col-md-4 col-xs-6">
							<input type="text" class="form-control" id="cantidadMin" name="cantidadMin" placeholder="Cantidad Minima en Stock" data-validation="required number" >
						</div>
					</div>
					<div class="form-group">
						<label for="priceSale" class="control-label col-md-3">Precio Venta:</label>
						<div class="col-md-4 col-xs-6 input-group">
							<div class="input-group-addon">Bs</div>
							<input type="text" class="form-control" id="priceSale" name="priceSale" placeholder="Precio Venta"
							data-validation="required number"
							data-validation-error-msg-container="#error-container"
							data-validation-allowing="float" >
						</div>
						<div id="error-container"></div>
					</div>
					<div class="form-group">
						<label for="priceBuy" class="control-label col-md-3">Precio Compra:</label>
						<div class="col-md-4 col-xs-6 input-group">
							<div class="input-group-addon">Bs</div>
							<input type="text" class="form-control" id="priceBuy" name="priceBuy" placeholder="Precio Compra"
							data-validation="required number"
							data-validation-error-msg-container="#error-container1"
							data-validation-allowing="float" >
						</div>
						<div id="error-container1"></div>
					</div>
					<div class="form-group">
						<div class="checkbox">
						  <label>
						    <input id="statusRep" name="statusRep" type="checkbox" checked />
						     Insertar Repuesto al Inventario
						  </label>
						</div>
					</div>
					<div class="form-group">
						<label for="detail" class="control-label col-md-3">Detalle:</label>
						<div class="col-md-9">
							<textarea class="form-control" id="detailU" name="detailU" data-validation="required" placeholder="Detalle" rows="3"></textarea>
						</div>
					</div>
					<hr>
					<div class="form-group">
						<label for="cantStock" class="control-label col-md-3">Cantidad para Asignar:</label>
						<div class="col-md-4 col-xs-6">
							<input type="text" class="form-control" id="cantStock" onblur="javascript:cant_StockU()" name="cantStock" placeholder="Cantidad para Asignar" data-validation="number"  value="0">
						</div>
					</div>
					<hr>
					<div class="form-group">
						<label for="detail" class="control-label col-md-3 col-xs-3">Asignar a la Sucursal:</label>
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
									<input type="text" class="form-control" id="pre<?=$c;?>" name="<?=$row['id_sucursal'];?>" data-validation="required number" onblur="actuCantU(<?=$NumRow[0];?>)" value="0" >
								</div>
							</div>
						<?php
							}
						?>
						</div>
					</div>
					<hr>
					<div class="row">
						<div class="col-md-12">

					        <!-- The fileupload-buttonbar contains buttons to add/delete files and start/cancel the upload -->
					        <div class="row fileupload-buttonbar">
					            <div class="col-md-12">
					                <!-- The fileinput-button span is used to style the file input field as button -->
					                <span class="btn btn-success btn-sm fileinput-button">
					                    <i class="fa fa-folder-open-o" aria-hidden="true"></i>
					                    <span>Examinar...</span>
					                    <input type="file" id="files" name="files[]" multiple>
					                </span>
					                <button type="submit" class="btn btn-primary btn-sm start">
					                    <i class="fa fa-upload"></i>
					                    <span>Iniciar Subida</span>
					                </button>
					                <button type="reset" class="btn btn-warning btn-sm cancel">
					                    <i class="fa fa-ban"></i>
					                    <span>Cancelar</span>
					                </button>
					                <button type="button" class="btn btn-danger btn-sm delete">
					                    <i class="fa fa-trash-o"></i>
					                    <span>Borrar</span>
					                </button>
					                <input type="checkbox" class="toggle">
					                <!-- The global file processing state -->
					                <span class="fileupload-process"></span>
					            </div>
					            <!-- The global progress state -->
					            <div class="col-md-12 fileupload-progress fade">
					                <!-- The global progress bar -->
					                <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100">
					                    <div class="progress-bar progress-bar-success" style="width:0%;"></div>
					                </div>
					                <!-- The extended global progress state -->
					                <div class="progress-extended">&nbsp;</div>
					            </div>
					        </div>
					        <div class="file-preview">
					        	<div class="file-drop-zone-title">
					        		Arrastre y suelte aquí los archivos …
					        	</div>
					        	<div class="file-drop-zone">
						        	<!-- The table listing the files available for upload/download -->
						        	<table id="loadImages" role="presentation" class="table table-striped"><tbody class="files"></tbody></table>
					        	</div>
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
						<span>Modificar Producto</span>
					</button>
				</div>
			</div>
		</div>
	</div>
</form>

<script>
	function cant_StockU() {
        cantidad = $('#formUpdate #cantidad').val();
		$('#formUpdate #cantStock').val(cantidad);
		//$('#formUpdate #cantidad').attr('disabled', 'disabled');
		//$('#formUpdate #cantStock').attr('disabled', 'disabled');
	}
	function actuCantU(num){
      pre = 'pre';
      total = 0;
      cantPro = $('#formUpdate input#cantidad').val();
      for(i=1; i<=num; i++){
          f = pre+i;
          cantPre = $('#formUpdate input#'+f).val();
          total = parseInt(total) + parseInt(cantPre);
      }
      resto = parseInt(cantPro) - parseInt(total);
      $('#formUpdate input#cantStock').val(resto);
    }
	var sw = 0;
	function actuOptional(num, sw){
	      pre = 'pre';
	      total = 0;
	      cantPro = $('#formUpdate input#cantidad').val();
	      for(i=1; i<=num; i++){
	          f = pre+i;
	          cantPre = $('#formUpdate input#'+f).val();
	          total = parseInt(total) + parseInt(cantPre);
	          	if(sw != 1){
	          		$('#formUpdate input#'+f).attr('disabled', 'disabled');


	      		}else
	      			$('#formUpdate input#'+f).removeAttr('disabled');
	      }
	      resto = parseInt(cantPro) - parseInt(total);
	      $('#formUpdate input#cantStock').val(resto);
	      if(resto != 0 && sw == 0){
	      	sw = 1;
	      	$('#formUpdate #cantStock').removeAttr('disabled');
	      	actuOptional(num, sw);
	      }
	      $('#formUpdate input#cantidad').attr('disabled', 'disabled');
	      $('#formUpdate input#cantidadMin').attr('disabled', 'disabled');
	      $('#formUpdate input#cantStock').attr('disabled', 'disabled');
	      $('#formUpdate input#numparte').attr('disabled', 'disabled');
    }

	$('#dataUpdate').on('hidden.bs.modal', function (e) {
        $('#formUpdate').get(0).reset();
        html = '';
        $('#loadImages tbody').html(html);
        instancia = CKEDITOR.instances['detailU'];
    	editor.destroy();
    });

	$('#dataUpdate').on('show.bs.modal', function (event) {

		var button  	= $(event.relatedTarget); // Botón que activó el modal
		var idResp		= button.data('idresp'); // Extraer la información de atributos de datos
		var numParte	= button.data('numparte'); // Extraer la información de atributos de datos
		var idCat		= button.data('idcat'); // Extraer la información de atributos de datos
		var idPro	    = button.data('idPro'); // Extraer la información de atributos de datos
		var name		= button.data('name'); // Extraer la información de atributos de datos
		var fromRep 	= button.data('fromrep'); // Extraer la información de atributos de datos
		var cantidad  	= button.data('cantidad'); // Extraer la información de atributos de datos
		var cantidadMin	= button.data('cantidadmin'); // Extraer la información de atributos de datos
		var priceSale 	= button.data('pricesale'); // Extraer la información de atributos de datos
		var priceBuy	= button.data('pricebuy'); // Extraer la información de atributos de datos
		var detail		= button.data('detail'); // Extraer la información de atributos de datos
		var cantSuc		= button.data('cantsuc'); // Extraer la información de atributos de datos
		var idAlmacen	= button.data('idalmacen'); // Extraer la información de atributos de datos
		//var asingSuc;
		//for (var i = 1; i <= cantSuc; i++) {
			//asingSuc = 'asingsuc'+i;
		//	asingSuc = button.data('asingsuc'+i);
		//}
		var statusRep	= button.data('statusrep'); // Extraer la información de atributos de datos


		var modal = $(this);
		modal.find('.modal-title').text('Modificar Repuesto ==> '+numParte);
		modal.find('.modal-body #idResp').val(idResp);
		modal.find('.modal-body #numParte').val(numParte);
		modal.find('.modal-body #name').val(name);
		modal.find('.modal-body #categoria').val(idCat);
		//modal.find('.modal-body #proveedor').val(proveedor);
		modal.find('.modal-body #proveedor').val(0);
		modal.find('.modal-body #fromRep').val(fromRep);
		modal.find('.modal-body #cantidad').val(cantidad);
		modal.find('.modal-body #cantidadMin').val(cantidadMin);
		modal.find('.modal-body #priceSale').val(priceSale);
		modal.find('.modal-body #priceBuy').val(priceBuy);
		modal.find('.modal-body #idAlmacen').val(idAlmacen);
		modal.find('.modal-body #detailU').val(detail);
		for (var i = 1; i <= cantSuc; i++) {
			//asingSuc = 'asingsuc'+i;

			var asingSuc = button.data('asingsuc'+i);
			//alert(asingSuc +" " +i);
			modal.find('.modal-body #pre'+i).val(asingSuc);
		}

		editor = CKEDITOR.replace( 'detailU' );

		id_repuesto = idResp;
		cant_StockU();
		actuOptional(<?=$NumRow[0];?>, 0);

		$('input#statusRep, input:radio').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          //increaseArea: '100%' // optional
        });

		if(statusRep == 1){
			$('#formUpdate').find('#statusRep').iCheck('check');
		}else{
			$('#formUpdate').find('#statusRep').iCheck('uncheck');
		}

	    'use strict';

        // Initialize the jQuery File Upload widget:
        $('#formUpdate').fileupload({
            // Uncomment the following to send cross-domain cookies:
            //xhrFields: {withCredentials: true},
            url: '../../modulo/repuesto/uploads/',
            disableImageResize: /Android(?!.*Chrome)|Opera/.test(window.navigator && navigator.userAgent),
            imageMaxWidth: 1200,
            //imageMaxHeight: 800,
            imageCrop: false, // Force cropped images
            //maxFileSize: 999,
            acceptFileTypes: /(\.|\/)(gif|jpe?g|png)$/i,
            limitMultiFileUploads: 5,
            maxNumberOfFiles: 5
        });

        $('#formUpdate').bind('fileuploadcompleted', function (e, data) {
            $.each(data.files, function (index, file) {
                console.log('Added file: ' + file.name);
                saveImg('repuesto', file.name, file.size);
                //loadImg('repuesto', 'auxImgEmp');
            });
        })

        $('#formUpdate').addClass('fileupload-processing');
            $.ajax({
                // Uncomment the following to send cross-domain cookies:
                //xhrFields: {withCredentials: true},
                url: $('#formUpdate').fileupload('option', 'url'),
                dataType: 'json',
                //async:false,
                context: $('#formUpdate')[0]
            }).always(function () {
                $(this).removeClass('fileupload-processing');
            }).done(function (result) {

                // console.log(result);
                loadImagesMulti('repuesto',id_repuesto);
                 /*$(this).fileupload('option', 'done')
                        .call(this, $.Event('done'), {result: result});*/
            });

    });

</script>
