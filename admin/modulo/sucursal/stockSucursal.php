<?PHP
$sql = "TRUNCATE TABLE aux_img ";
$strQ = $db->Execute($sql);
$fecha = $op->ToDay();
$hora = $op->Time();
?>
<!--hoja de stylo-->
<style type="text/css"> 



 </style>
<!--fin de hoja de stylo-->
<form id="formUpdate" action="javascript:updateForm('formUpdate','update.php')" class="form-horizontal" autocomplete="off" >
	<div class="modal fade" id="dataStock" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					<h4 class="modal-title" id="exampleModalLabel">Modificar </h4>
				</div>
				<div class="modal-body" id="id-frame">
				    <!--inicio de la tabla stock-->
					
					<!--fin de la tabla stock-->
				</div>
				
			</div>
		</div>
	</div>
</form>

<script>
	$('#dataStock').css("width", '100%');
	$('#dataStock').css("height", '100%');

	$('#dataStock').on('hidden.bs.modal', function (e) {
		// do something...
		$('#formUpdate').get(0).reset();
	});
	
	$('#dataStock').on('show.bs.modal', function (event) {

		var button  	= $(event.relatedTarget); // Botón que activó el modal
		var idSuc		= button.data('idsuc'); // Extraer la información de atributos de datos
		var nameSuc		= button.data('address'); // Extraer la información de atributos de datos
		var address  	= button.data('address'); // Extraer la información de atributos de datos

		var modal = $(this);
		modal.find('.modal-title').text('Stock de: '+nameSuc);
		modal.find('.modal-body #idSuc').val(idSuc);
		modal.find('.modal-body #name').val(nameSuc);
		modal.find('.modal-body #address').val(address);

		$('input#suc'+idSuc).iCheck('check');
		var idFrame = document.getElementById("id-frame");
		idFrame.innerHTML="<iframe  overflow:scroll; width='100%' height='100%' src='inventarioSucursalModal.php?id="+idSuc+"&of="+nameSuc+"' frameborder='0' ></iframe>" ;

		
	});

</script>