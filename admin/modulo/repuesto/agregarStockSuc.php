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
<form id="formNew" action="javascript:saveForm('formNew','save.php')" class="form-horizontal" autocomplete="off" >
	<div class="modal fade" id="dataRegisterStock" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="exampleModalLabel">Agregar Repuesto</h4>
				</div>
				<div class="modal-body">
					<div id="datos_ajax"></div>

					<div class="form-group">
						<label for="fecha" class="control-label col-md-3">Fecha:</label>
						<div class="col-md-4">
							<input id="fecha" name="fecha" type="text" class="form-control" value="<?=$fecha;?> <?=$hora;?>" disabled="disabled" />
						</div>
						<input id="date" name="date" type="hidden" value="<?=$fecha;?> <?=$hora;?>" />
						<input id="tabla" name="tabla" type="hidden" value="repuesto">
					</div>

					<div class="form-group">
						<label for="numParte" class="control-label col-md-3"># De Parte:</label>
						<div class="col-md-4">
							<input type="text" class="form-control" id="numParte" name="numParte"  onblur="javascript:BuscaRepuesto()" placeholder="# de Parte"
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
							<input type="text" class="form-control" id="cantidad" name="cantidad" onblur="javascript:cant_Stock()" placeholder="Cantidad en Stock" data-validation="required number" >
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
							<textarea class="form-control" id="detail" name="detail" data-validation="required" placeholder="Detalle" rows="3"></textarea>
						</div>
					</div>
					<hr>
					<div class="form-group">
						<label for="cantStock" class="control-label col-md-3">Cantidad para Asignar:</label>
						<div class="col-md-4 col-xs-6">
							<input type="text" class="form-control" id="cantStock" onblur="javascript:cant_Stock()" name="cantStock" placeholder="Cantidad para Asignar" data-validation="number" data-validation-allowing="range[0;1000]" data-validation-error-msg="Se debe de asignar todo el STOCK">
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
									<input type="text" class="form-control" id="pre<?=$c;?>" name="pre<?=$c;?>" data-validation="required number" onblur="actuCant(<?=$NumRow[0];?>)" value="0" >
								</div>
							</div>
						<?php
							}
						?>
						</div>
						<input type="hidden" class="form-control" name="cantidadSucursal" id="cantidadSucursal">
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
				</div>
				<div class="modal-footer">
					<button type="button" id="close" class="btn btn-danger" data-dismiss="modal">
						<i class="fa fa-close" aria-hidden="true"></i>
						<span>Cancelar</span>
					</button>
					<button type="submit" id="save" class="btn btn-success" >
						<i class="fa fa-check" aria-hidden="true"></i>
						<span>Agregar Producto</span>
					</button>
				</div>
			</div>
		</div>
	</div>
</form>



<script>
	var numeroSucurzales=0;
	function cant_Stock() {
        cantidad = $('#formNew #cantidad').val();
		$('#formNew #cantStock').val(cantidad);
		//alert(cantidad);
	}

	function actuCant(num){
	  numeroSucurzales=num;
      pre = 'pre';
      total = 0;
      cantPro = $('#formNew input#cantidad').val();

      var serializadoCantidad="";
      for(i=1; i<=num; i++){
          f = pre+i;
          //alert(f);
          cantPre = $('#formNew input#'+f).val();
          //alert(cantPre);
          total = parseInt(total) + parseInt(cantPre);

          serializadoCantidad=serializadoCantidad+$('#formNew input#'+f).val()+"@";
      }
      resto = parseInt(cantPro) - parseInt(total);
      $('#formNew input#cantStock').val(resto);
      $('#formNew input#'+'cantidadSucursal').val(serializadoCantidad);
    }

	$('#dataRegister').on('hidden.bs.modal', function (e) {
		// do something...
		$('#formNew').get(0).reset();
		html = '';
		$('#loadImages tbody').html(html);
		//$('#detail').val('');
		//$('div.iradio_square-blue').removeClass('checked');
		//despliega('modulo/almacen/producto.php','contenido');
		instancia = CKEDITOR.instances['detail'];
    	editor.destroy();
	});

	$('#dataRegister').on('show.bs.modal', function (event) {
		//alert('entra');
		$('#statusRep:checkbox').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          //increaseArea: '100%' // optional
        });
		$('#detail').val('');
        editor = CKEDITOR.replace( 'detail' );

	});

	$(document).ready(function(){

		$.validate({
          lang: 'es',
          modules : 'security'
        });
      	//$('#obser').restrictLength( $('#max-length-element') );

		//UPLOAD FILES
		'use strict';
	    // Initialize the jQuery File Upload widget:
	    $('#formNew').fileupload({
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
	    $('#formNew').bind('fileuploadcompleted', function (e, data) {
	        $.each(data.files, function (index, file) {
	        //console.log('Added file: ' + file.name);
	        	saveImg('repuesto', file.name, file.size);
                //loadImg('repuesto', 'auxImgEmp');
	        });
	    })

	    $('#formNew').addClass('fileupload-processing');
                $.ajax({
                    // Uncomment the following to send cross-domain cookies:
                    //xhrFields: {withCredentials: true},
                    url: $('#formNew').fileupload('option', 'url'),
                    dataType: 'json',
                    //async:false,
                    context: $('#formNew')[0]
                }).always(function () {
                    $(this).removeClass('fileupload-processing');
                }).done(function (result) {

                      // console.log(result);

                      // loadImages('repuesto',id_repuesto);

                        /*$(this).fileupload('option', 'done')
                            .call(this, $.Event('done'), {result: result});*/
                });
	})

</script>
