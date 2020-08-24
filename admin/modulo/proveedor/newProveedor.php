<?PHP
$fecha = $op->ToDay();
$hora = $op->Time();
?>

<script>
$(document).ready(function(e) {

	$('#dateNac').datetimepicker({
		locale: 'es',
		viewMode: 'years',
		format: 'YYYY-MM-DD'
	});
	$.validate({
        lang: 'es',
        modules : 'security, modules/logic'
   	});
   	$('#obser').restrictLength( $('#max-length-element') );

   	$('#dataRegister').on('shown.bs.modal', function () {
	  $('#nameEmp').focus()
	})

	$('#dataRegister').on('hidden.bs.modal', function (e) {
		// do something...
		$('#formNew').get(0).reset();
	});
});
</script>
<style type="text/css">
	#codCl{
		text-transform: uppercase;
	}
</style>
<form id="formNew" action="javascript:saveForm('formNew','save.php')" class="" autocomplete="off" >
<div class="modal fade bs-example-modal-lg" id="dataRegister" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel" data-backdrop="static"
   data-keyboard="false">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="gridSystemModalLabel">Nuevo Proveedor <span class="fecha">Fecha: <?=$fecha;?> <?=$hora;?></span></h4>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-md-12">
						<div id="datos_ajax"></div>
					</div>
				</div>
				<div class="row">
					<input id="date" name="date" type="hidden" value="<?=$fecha;?> <?=$hora;?>" />
					<input id="tabla" name="tabla" type="hidden" value="proveedor">
					<div class="col-md-12">
						<div class="row">
							<div class="col-md-8 form-group">
								<label for="nameEmp" class="sr-only">Nombre Empresa:</label>
								<input id="nameEmp" name="nameEmp" type="text" placeholder="Nombre Empresa" class="form-control" autofocus autocomplete="off" data-validation= "required" />
							</div>
							<div class="col-md-4 form-group">
								<label for="nit" class="sr-only">NIT:</label>
								<input id="nit" name="nit" type="text" placeholder="NIT" class="form-control" autocomplete="off"
									data-validation="required number server"
									data-validation-url="validateNIT.php"/>
							</div>
						</div>
						<div class="row">
							<div class="col-md-2 form-group">
								<label for="name" class="sr-only">Nombre:</label>
								<input id="name" name="name" type="text" placeholder="Nombre" class="form-control" data-validation="required" autocomplete="off"/>
							</div>
							<div class="col-md-2 form-group">
								<label for="paterno" class="sr-only">Paterno:</label>
								<input id="paterno" name="paterno" type="text" placeholder="Paterno" data-validation="required" class="form-control" />
							</div>
							<div class="col-md-2 form-group">
								<label for="materno" class="sr-only">Materno:</label>
								<input id="materno" name="materno" type="text" placeholder="Materno" data-validation="required" class="form-control" />
							</div>
							<div class="col-md-3 form-group">
								<label for="ci" class="sr-only">N° C.I.:</label>
								<input id="ci" name="ci" type="text" placeholder="N° C.I." class="form-control"
									   data-validation="required number server"
									   data-validation-url="validateCI.php"/>
							</div>
							<div class="col-md-3 form-group">
							<label for="dep" class="sr-only">Lugar Exp.:</label>
							<select id="dep" name="dep" class="form-control" data-validation="required">
								<option value="" disabled selected hidden>Lugar Exp.</option>
								<option value="lp">La Paz</option>
								<option value="cbb">Cochabamba</option>
								<option value="sz">Santa Cruz</option>
								<option value="bn">Beni</option>
								<option value="tr">Tarija</option>
								<option value="pt">Potosi</option>
								<option value="or">Oruro</option>
								<option value="pd">Pando</option>
							</select>
					</div>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-md-3 form-group">
						<label for="fono" class="sr-only">Telefono:</label>
						<input id="fono" name="fono" type="text" placeholder="Telefono" class="form-control" data-validation="number" data-validation-optional-if-answered="celular"/>
					</div>
					<div class="col-md-3 form-group">
						<label for="celular" class="sr-only">Celular:</label>
						<input id="celular" name="celular" type="text" placeholder="Celular" class="form-control" data-validation="number" data-validation-optional-if-answered="fono"/>
					</div>
					<div class="col-md-6 form-group">
						<label for="email" class="sr-only">Correo Electronico:</label>
						<input id="email" name="email" type="text" placeholder="Correo Electronico" value="" class="form-control" data-validation="email"/>
					</div>
				</div>

				<div class="row">
					<div class="col-md-9 form-group">
						<label for="addres" class="sr-only"></label>
						<input id="addres" name="addres" type="text" placeholder="Direcci&oacute;n" class="form-control" data-validation="required"/>
					</div>
					<div class="col-md-3 form-group">
						<label for="Nro" class="sr-only"></label>
						<input id="Nro" name="Nro" type="text" placeholder="N° de domicilio" class="form-control" data-validation="required number"/>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12 form-group">
						<label for="obser" class="sr-only"></label>
						<p id="maxText" class="text-info"><span id="max-length-element">200</span> caracteres restantes</p>
						<textarea id="obser" name="obser" cols="2" placeholder="Observaciones" class="form-control"></textarea>
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
					<span>Agregar Proveedor</span>
				</button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
</form>
