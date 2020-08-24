/**
 * Created by TAPIA on 13/07/2016.
 */
 function verifica(id_F, p){

	var dato = JSON.stringify( $('#'+id_F).serializeObject() );

	$.ajax({
		url: "inc/"+p,
		type: 'post',
		dataType: 'json',
		async:true,
		data:{res:dato},
		beforeSend: function(data){
			$('#error').css('display','block');
			$('#error').html('<div id="loader"><p>Validando...</p></div>');
		},
		success: function(data){
			if(data !== 0){
				$(location).attr('href','admin.php');
			}else{
				$('#alert').css('display','block').fadeIn(6000,function () {
					$('#alert').fadeOut(4000);
					$('.btn').delay(4000).val('Ingresar');
					$('.btn').delay(4000).removeAttr('disabled');

					$('#login').click();
					$('#password').val('');
					$('#username').val('');

					$('input, select, textarea').filter(':first').focus();
				});
			}
		},
		error: function(data){
			//alert('Error al guardar el formulario');
		}
	});
}

function outSession(user){
	$(location).attr('href','inc/outSession.php?user='+user);
}

function despliega(p, div, id){
	$.ajax({
		url: p,
		type: 'post',
		cache: false,
		data: 'id='+id,
		beforeSend: function(data){
			$("#"+div).html('<div id="load" align="center" class="alert alert-success" role="alert"><p>Cargando contenido. Por favor, espere ...</p></div>');
		},
		success: function(data){
			$("#"+div).fadeOut(1000,function(){
				$("#"+div).html(data).fadeIn(2000);
			});
		}
	});
}


/**
 * [displaySection despliega lista despues de guardar o actualizar]
 * @param  {[type]} p   [description]
 * @param  {[type]} sec [description]
 * @param  {[type]} id  [description]
 * @return {[type]}     [description]
 */
function displaySection(p, sec, id){
	$.ajax({
		url: p,
		type: 'post',
		cache: false,
		data: 'id='+id,
		beforeSend: function(data){
			$("#"+sec).html('<div id="load" align="center" class="alert alert-success" role="alert"><p>Cargando contenido. Por favor, espere ...</p></div>');
		},
		success: function(data){
			$("#"+sec).fadeOut(1000,function(){
				$("#"+sec).html(data).fadeIn(2000);
			});
		}
	});
}

/**
 * GENERA CONTRASEÑA
 */
 function generaPass(id){
	$.ajax({
		url: '../../inc/generaPass.php',
		type: 'post',
		cache: false,
		success: function(data){
			//alert();
			$("#"+id).val(data);
		}
	});
}
/**
 *  GUARDA FORMULARIO
 */
 function saveForm(idForm, p){

	var dato = JSON.stringify( $('#'+idForm).serializeObject() );

	$.ajax({
		url: p,
		type: 'post',
		dataType: 'json',
		async:true,
		data:{res:dato},
		success: function(data){
			//alert(data.checksEmail);
			//parent.$.colorbox.close();
			//ordena(2);
			if(data.tabla === 'cliente'){
				$('#datos_ajax').html('<div class="alert alert-success" role="alert"><strong>Guardado Correctamente!!!</strong></div><br>').fadeIn(4000,function () {
					$('#datos_ajax').fadeOut(2000,function () {
						$('#dataRegister').modal('hide').delay(7000);
						displaySection('listTabla.php','unseen');
					});
				});
			}
			if(data.tabla === 'empleado'){
				$('#datos_ajax').html('<div class="alert alert-success" role="alert"><strong>Guardado Correctamente!!!</strong></div><br>').fadeIn(4000,function () {
					$('#datos_ajax').fadeOut(2000,function () {
						$('#dataRegister').modal('hide').delay(4000);
						displaySection('listTabla.php','unseen');
					});
				});
			}
			if(data.tabla === 'repuesto'){
				//fnClickAddRowU(data,true);
				$('#datos_ajax').html('<div class="alert alert-success" role="alert"><strong>Guardado Correctamente!!!</strong></div><br>').fadeIn(4000,function () {
					$('#datos_ajax').fadeOut(2000,function () {
						$('#dataRegister').modal('hide').delay(4000);
						displaySection('listTabla.php','unseen');
					});
				});
			}
			if(data.tabla === 'sucursal'){
				//fnClickAddRowU(data,true);
				$('#datos_ajax').html('<div class="alert alert-success" role="alert"><strong>Guardado Correctamente!!!</strong></div><br>').fadeIn(4000,function () {
					$('#datos_ajax').fadeOut(2000,function () {
						$('#dataRegister').modal('hide').delay(4000);
						displaySection('listTabla.php','unseen');
					});
				});
			}
			if(data.tabla === 'categoria'){
				//fnClickAddRowU(data,true);
				$('#datos_ajax').html('<div class="alert alert-success" role="alert"><strong>Guardado Correctamente!!!</strong></div><br>').fadeIn(4000,function () {
					$('#datos_ajax').fadeOut(2000,function () {
						$('#dataRegister').modal('hide').delay(4000);
						displaySection('listTabla.php','unseen');
					});
				});
			}
			if(data.tabla === 'proveedor'){
				//fnClickAddRowU(data,true);
				$('#datos_ajax').html('<div class="alert alert-success" role="alert"><strong>Guardado Correctamente!!!</strong></div><br>').fadeIn(4000,function () {
					$('#datos_ajax').fadeOut(2000,function () {
						$('#dataRegister').modal('hide').delay(4000);
						displaySection('listTabla.php','unseen');
					});
				});
			}
			if(data.tabla === 'pedido'){
				//fnClickAddRowInvG(data,true);
				/* CAMBIIO STASTUS CONTADOR */
				$('#modalCheckPedido').modal('hide');
				if(data.OkCont === 0){
					$('tr#tb'+data.pedido+' td.Pendiente').removeClass('Pendiente').addClass('Aprobado');
					$('tr#tb'+data.pedido+' td.Aprobado a').text('Aprobado');
					$('tr#tb'+data.pedido+' td.Aprobado a').removeAttr('data-status1');
					$('tr#tb'+data.pedido+' td.Aprobado a').attr('data-status1','Aprobado');
				}else{
					if(data.OkCont === 1){
						$('tr#tb'+data.pedido+' td.Aprobado').removeClass('Aprobado').addClass('Pendiente');
						$('tr#tb'+data.pedido+' td.Pendiente a').text('Pendiente');
						$('tr#tb'+data.pedido+' td.Pendiente a').removeAttr('data-status1');
						$('tr#tb'+data.pedido+' td.Pendiente a').attr('data-status1','Pendiente');
					}else{
						/* CAMBIIO STASTUS ALMACEN */
						$('#modalCheckAlmacen').modal('hide');
						if(data.OkAlm === 0){
							$('tr#tb'+data.pedido+' td.NoEntregado').removeClass('NoEntregado').addClass('Entregado');
							$('tr#tb'+data.pedido+' td.Entregado a').text('Entregado');
							detalleAlm(data.pedido);
						}else{
							if(data.OkAlm === 1){
								$('tr#tb'+data.pedido+' td.Entregado').removeClass('Entregado').addClass('NoEntregado');
								$('tr#tb'+data.pedido+' td.NoEntregado a').text('No Entregado');
							}else{
								//despliega('modulo/pedido/pedido.php','contenido');
							}
						}
					}
				}
			}
			if(data.tabla === 'produccion'){
				$('#datos_ajax').html('<div class="alert alert-success" role="alert"><strong>Guardado Correctamente!!!</strong></div><br>').fadeIn(4000,function () {
					$('#datos_ajax').fadeOut(2000,function () {
						$('#dataRegister').modal('hide').delay(4000);
						despliega('modulo/produccion/listTabla.php','listTabla');
					});
				});
			}
			if(data.tabla === 'inventarioPre'){
				$('#datos_ajax_import').html('<div class="alert alert-success" role="alert"><strong>Asignado Correctamente!!!</strong></div><br>').fadeIn(4000,function () {
					$('#datos_ajax_import').fadeOut(2000,function () {
						$('#dataImport').modal('hide').delay(4000);
						window.open('modulo/produccion/pdfOrdenAsig.php?res='+data.idP, '_blank');
						despliega('modulo/produccion/listTabla.php','listTabla');
					});
				});
			}
		},
		error: function(data){
			alert('Error al guardar datos');
		}
	});
}

function updateForm(idForm, p){

	var dato = JSON.stringify( $('#'+idForm).serializeObject() );
	//alert(dato);//prueba efra
	$.ajax({
		url: p,
		type: 'post',
		dataType: 'json',
		async:true,
		data:{res:dato},
		success: function(data){
			
			if(data.tabla === 'empleado'){
				$('#datos_ajax_update').html('<div class="alert alert-success" role="alert"><strong>Modificado Correctamente!!!</strong></div><br>').fadeIn(4000,function () {
					$('#datos_ajax_update').fadeOut(2000,function () {
						$('#dataUpdate').modal('hide').delay(4000);
						displaySection('listTabla.php','unseen');
					});
				});
			}
			if(data.tabla === 'repuesto'){
				$('#datos_ajax_update').html('<div class="alert alert-success" role="alert"><strong>Modificado Correctamente!!!</strong></div><br>').fadeIn(4000,function () {
					$('#datos_ajax_update').fadeOut(200,function () {
						$('#dataUpdate').modal('hide').delay(400);
						$('#dataStock').modal('hide').delay(400);
						displaySection('listTabla.php','unseen');
					});
				});
			}
			if(data.tabla === 'sucursal'){
				$('#datos_ajax_update').html('<div class="alert alert-success" role="alert"><strong>Modificado Correctamente!!!</strong></div><br>').fadeIn(4000,function () {
					$('#datos_ajax_update').fadeOut(2000,function () {
						$('#dataUpdate').modal('hide').delay(4000);
						displaySection('listTabla.php','unseen');
					});
				});
			}
			if(data.tabla === 'cliente'){
				$('#datos_ajax_update').html('<div class="alert alert-success" role="alert"><strong>Modificado Correctamente!!!</strong></div><br>').fadeIn(4000,function () {
					$('#datos_ajax_update').fadeOut(2000,function () {
						$('#dataUpdate').modal('hide').delay(4000);
						displaySection('listTabla.php','unseen');
					});
				});
			}
			if(data.tabla === 'categoria'){
				$('#datos_ajax_update').html('<div class="alert alert-success" role="alert"><strong>Modificado Correctamente!!!</strong></div><br>').fadeIn(4000,function () {
					$('#datos_ajax_update').fadeOut(2000,function () {
						$('#dataUpdate').modal('hide').delay(4000);
						displaySection('listTabla.php','unseen');
					});
				});
			}
			if(data.tabla === 'proveedor'){
				$('#datos_ajax_update').html('<div class="alert alert-success" role="alert"><strong>Modificado Correctamente!!!</strong></div><br>').fadeIn(4000,function () {
					$('#datos_ajax_update').fadeOut(2000,function () {
						$('#dataUpdate').modal('hide').delay(4000);
						displaySection('listTabla.php','unseen');
					});
				});
			}
			if(data.tabla === 'produccion'){
				$('#datos_ajax_update').html('<div class="alert alert-success" role="alert"><strong>Modificado Correctamente!!!</strong></div><br>').fadeIn(4000,function () {
					$('#datos_ajax_update').fadeOut(2000,function () {
						$('#dataUpdate').modal('hide').delay(4000);
						despliega('modulo/produccion/listTabla.php','listTabla');
					});
				});
			}
		},
		error: function(data){
			//alert(data);prueba rodr
			alert('Error al modificar datos');
		}
	});
}

function fDelete(idForm, p){
	var dato = JSON.stringify( $('#'+idForm).serializeObject() );
	$.ajax({
		url: p,
		type: 'post',
		dataType: 'json',
		async:false,
		data:{res:dato},
		success: function(data){
			if(data.tabla === 'repuesto'){
				$('#datos_ajax_delete').html('<div class="alert alert-success" role="alert"><strong>Eliminado Correctamente!!!</strong></div><br>').fadeIn(4000,function () {
					$('#datos_ajax_delete').fadeOut(2000,function () {
						$('#dataDelete').modal('hide').delay(4000);
						displaySection('listTabla.php','unseen');
					});
				});
			}
			if(data.tabla === 'empleado'){
				$('#datos_ajax_delete').html('<div class="alert alert-success" role="alert"><strong>Eliminado Correctamente!!!</strong></div><br>').fadeIn(4000,function () {
					$('#datos_ajax_delete').fadeOut(2000,function () {
						$('#dataDelete').modal('hide').delay(4000);
						displaySection('listTabla.php','unseen');
					});
				});
			}
			if(data.tabla === 'sucursal'){
				$('#datos_ajax_delete').html('<div class="alert alert-success" role="alert"><strong>Eliminado Correctamente!!!</strong></div><br>').fadeIn(4000,function () {
					$('#datos_ajax_delete').fadeOut(2000,function () {
						$('#dataDelete').modal('hide').delay(4000);
						displaySection('listTabla.php','unseen');
					});
				});
			}
			if(data.tabla === 'categoria'){
				$('#datos_ajax_delete').html('<div class="alert alert-success" role="alert"><strong>Eliminado Correctamente!!!</strong></div><br>').fadeIn(4000,function () {
					$('#datos_ajax_delete').fadeOut(2000,function () {
						$('#dataDelete').modal('hide').delay(4000);
						displaySection('listTabla.php','unseen');
					});
				});
			}
			if(data.tabla === 'cliente'){
				$('#datos_ajax_delete').html('<div class="alert alert-success" role="alert"><strong>Eliminado Correctamente!!!</strong></div><br>').fadeIn(4000,function () {
					$('#datos_ajax_delete').fadeOut(2000,function () {
						$('#dataDelete').modal('hide').delay(4000);
						displaySection('listTabla.php','unseen');
					});
				});
			}
			if(data.tabla === 'produccion'){
				$('#datos_ajax_delete').html('<div class="alert alert-success" role="alert"><strong>Eliminado Correctamente!!!</strong></div><br>').fadeIn(4000,function () {
					$('#datos_ajax_delete').fadeOut(2000,function () {
						$('#dataDelete').modal('hide').delay(4000);
						despliega('modulo/produccion/listTabla.php','listTabla');
					});
				});
			}
		},
		error: function(data){
			alert('Error al eliminar');
		}
	});
}

function listaInv(idForm){
	var dato = JSON.stringify( $('#'+idForm).serializeObject() );
	$.ajax({
		url: "modulo/empleado/idListaInv.php",
		type: 'post',
		dataType: 'json',
		async:false,
		data:{res:dato},
		beforeSend: function(data){
			//$("#"+div).html('<div id="load" align="center"><p>Cargando contenido. Por favor, espere ...</p></div>');
		},
		success: function(data){
			despliega('modulo/empleado/listaInv.php', 'lista', data.id);
		},
		error: function(data){
			alert('error al mostrar');
		}
	});
}

function obtenerCoor(id){
	$.ajax({
		url: "modulo/empleado/obtenerCoor.php",
		type: 'post',
		dataType: 'json',
		async:false,
		data:{res:id},
		success: function(data){
			return data;
		},
		error: function(data){
			alert('Error al eliminar');
		}
	});
}

/**
 *  WEB CAM
 * */

 /* RECARGA IMAGEN */

 function recargaImg(img, mod){
	$('#foto').html('<img class="thumb" src="../../thumb/phpThumb.php?src=../modulo/'+mod+'/uploads/files/'+img+'&amp;w=120&amp;h=75&amp;far=1&amp;bg=FFFFFF&amp;hash=361c2f150d825e79283a1dcc44502a76" alt="">');
}

function recargaImgU(img, mod){
	$('#fotoU').html('<img class="thumb" src="../../thumb/phpThumb.php?src=../modulo/'+mod+'/uploads/files/'+img+'&amp;w=120&amp;h=75&amp;far=1&amp;bg=FFFFFF&amp;hash=361c2f150d825e79283a1dcc44502a76" alt="">');
}

function closeWebcam(){
	$('#camera').css('display','none');
	$('#save').removeAttr('disabled', 'disabled');
}

function openWebcam(){
	$('#camera').css('display','block');
	$('#save').attr('disabled', 'disabled');
}

function loadImg(mod, tabla){
	$.ajax({
		url: '../../inc/img.php',
		type: 'post',
		cache: false,
		data: 'tabla='+tabla,
		success: function(data){
			recargaImg(data,mod);
			recargaImgU(data,mod);
		}
	});
}

/**
 * STATUS EMPLEADO
 */
 function statusEmp(id, status){
	$.ajax({
		url: '../../inc/statusEmp.php',
		type: 'post',
		async:true,
		data: 'id='+id+'&status='+status,
		success: function(data){

		}
	});
}
/**
 *  STATUS CLIENTE
 */
function statusCli(id, status){
	$.ajax({
		url: '../../inc/statusCli.php',
		type: 'post',
		async:true,
		data: 'id='+id+'&status='+status,
		success: function(data){

		}
	});
}

/**
 *  STATUS SUCURSAL
 */
function statusSuc(id, status){
	$.ajax({
		url: '../../inc/statusSuc.php',
		type: 'post',
		async:true,
		data: 'id='+id+'&status='+status,
		success: function(data){

		}
	});
}

/**
 *  STATUS REPUESTO
 */
function statusRep(id, status){
	$.ajax({
		url: '../../inc/statusRep.php',
		type: 'post',
		async:true,
		data: 'id='+id+'&status='+status,
		success: function(data){

		}
	});
}

/**
 *  STATUS CATEGORIA
 */
function statusCat(id, status){
	$.ajax({
		url: '../../inc/statusCat.php',
		type: 'post',
		async:true,
		data: 'id='+id+'&status='+status,
		success: function(data){

		}
	});
}

/**
 *  STATUS PROVEEDOR
 */
function statusPro(id, status){
	$.ajax({
		url: '../../inc/statusPro.php',
		type: 'post',
		async:true,
		data: 'id='+id+'&status='+status,
		success: function(data){

		}
	});
}
/**
 * MODULO PEDIDO
 * AGREGA PEDIDO
 */

 function adicFila(idForm, p){

	var dato = JSON.stringify( $('#'+idForm).serializeObject() );
	//alert(dato);
	$.ajax({
		url: "inc/"+p,
		type: 'post',
		dataType: 'json',
		async:true,
		data:{res:dato},
		success: function(data){
			sw = 0;

			$('#tabla tbody').find('tr').each(function(index, element){
				cod = $(this).attr('id');

				if( cod === data.producto ){
					cantidad = $('tr#'+data.producto).find('td').eq(1).find('input').val();
					//alert('******'+cantidad);
					cantidad = parseInt(cantidad) + parseInt(data.cant);
					//alert('-------'+cantidad);
					if( parseFloat(cantidad) <= parseFloat(data.cantI) ){

					  precio = $('tr#'+data.producto).find('td').eq(2).find('input').val();
					  precio = parseFloat(precio) * parseFloat(cantidad);
					  $('tr#'+data.producto).find('td').eq(1).find('input').val(cantidad);
					  //$('tr#'+data.producto).find('td').eq(3).find('input').val(cant);
					  $('tr#'+data.producto).find('td').eq(5).find('input').val(precio.toFixed(2));
					  //$('tr#'+data.producto).find('td').eq(4).find('input').val(precio);

				  }else{
					alert('Producto sin Stock...!!!');
				}
				sw = 1;
			}
		});

			if( sw === 0 && data.producto !== undefined ){
				agregarFila(data);
			}
			$('#producto').val('');
			$('#cant').val('');
			subPrecio = 0;
			$('#tabla tbody').find('tr').each(function(index, element){
				subPrecio = parseFloat(subPrecio) + parseFloat($(this).find('td').eq(5).find('input').val());
			});
			$('#tabla tfoot').find('th').eq(1).find('input').val(subPrecio.toFixed(2));

			des = $('#tabla tfoot').find('tr').eq(1).find('th').eq(1).find('input').val();
			if(des === '') des = 0;

			bon = $('#tabla tfoot').find('tr').eq(2).find('th').eq(1).find('input').val();
			if(bon === '') bon = 0;

			total = parseFloat(subPrecio)-parseFloat(des)-parseFloat(bon);
			$('#tabla tfoot').find('tr').eq(3).find('th').eq(1).find('input').val(total.toFixed(2));

			/**
			 * Quitar la validacion
			 */
			 $('#ventIzq').find('div').removeClass('has-success');
			 $('#ventIzq').find('label').removeClass('has-success');
			 $('#ventIzq').find('#producto, #cant').removeClass('valid');
			/**
			 * Fin
			 */
		 },
		 error: function(data){
			alert('Error al guardar el formulario');
		}
	});
	$('#efectivo').val('');
	$('#cambio').val('');
	$('#codigo').focus();
}

/* EDITA PEDIDO */

function adicFilaEdit(idForm, p){
	"use strict";
	var dato = JSON.stringify( $('#'+idForm).serializeObject() );
	$.ajax({
		url: "inc/"+p,
		type: 'post',
		dataType: 'json',
		async:true,
		data:{res:dato},
		success: function(data){
			sw = 0;
			$('#tabla tbody').find('tr').each(function(index, element){
				cod = $(this).attr('id');
				if( cod === data.producto ){
					cant = $('tr#'+data.producto).find('td').eq(1).find('input#cantidad').val();
					cant = parseInt(cant) + parseInt(data.cant);
					if( parseFloat(cant) <= (parseFloat(data.cantI) + parseInt(data.cantInv)) ){
					  precio = $('tr#'+data.producto).find('td').eq(2).find('input').val();
					  precio = parseFloat(precio) * parseFloat(cant);
					  $('tr#'+data.producto).find('td').eq(1).find('input#cantidad').val(cant);
					  //$('tr#'+data.producto).find('td').eq(3).find('input').val(cant);
					  $('tr#'+data.producto).find('td').eq(5).find('input').val(precio.toFixed(2));
					  //$('tr#'+data.producto).find('td').eq(4).find('input').val(precio);
				  }else{
					alert('Producto sin Stock...!!!');
				}
				sw = 1;
			}
		});

			if( sw === 0 && data.producto !== undefined ){
				agregarFila(data);
			}
			$('#producto').val('');
			$('#cant').val('');
			subPrecio = 0;
			$('#tabla tbody').find('tr').each(function(index, element){
				subPrecio = parseFloat(subPrecio) + parseFloat($(this).find('td').eq(5).find('input').val());
			});
			$('#tabla tfoot').find('th').eq(1).find('input').val(subPrecio.toFixed(2));

			des = $('#tabla tfoot').find('tr').eq(1).find('th').eq(1).find('input').val();
			if(des === '') des = 0;

			bon = $('#tabla tfoot').find('tr').eq(2).find('th').eq(1).find('input').val();
			if(bon === '') bon = 0;

			total = parseFloat(subPrecio)-parseFloat(des)-parseFloat(bon);
			$('#tabla tfoot').find('tr').eq(3).find('th').eq(1).find('input').val(total.toFixed(2));

		},
		error: function(data){
			alert('Error al guardar el formulario');
		}
	});
	$('#efectivo').val('');
	$('#cambio').val('');
	$('#codigo').focus();
}

function agregarFila(data){

  cant = $('input#cant').val();
  //cant = parseInt(cant) + parseInt(data.cant);
  if( parseFloat(cant) <= parseFloat(data.cantI) ){
  // Clona la fila oculta que tiene los campos base, y la agrega al final de la tabla
  //if( data.cantidad > 0 ){
	  //$('#tabla thead').removeAttr('hidden');
	  $('#tabla tfoot').removeAttr('hidden');
	  //$('#submitVenta').removeAttr('hidden');
	  //alert(data.cant);
	  precio = parseFloat(data.cant) * parseFloat(data.precio);

	  var strNueva_Fila = '<tr id="'+data.producto+'">'+
	  '<td class="det">'+data.producto+' '+data.detalle+''+
	  '<input type="hidden" id="item" name="item" value="'+data.producto+'" ></td>'+

	  '<td><input type="text" disabled="disabled" id="cantidad" name="cantidad" value="'+data.cant+'" >'+
	  '<input type="hidden" id="cantidad" name="cantidad" value="'+data.cant+'" ></td>'+

	  '<td><input type="text" disabled="disabled" id="precio" name="precio" value="'+data.precio+'" >'+
	  '<input type="hidden" id="precio" name="precio" value="'+data.precio+'" ></td>'+

	  '<td></td>'+
	  '<td></td>'+
	  '<td><input type="text" disabled="disabled" id="subTotal" name="subTotal" value="'+precio.toFixed(2)+'" ></td>'+
	  '<td align="right" class="delete"><a class="del" onclick="eliminarFila(&#39;&#39;, &#39;'+0+'&#39;, &#39;'+data.producto+'&#39;)"><i class="fa fa-ban fa-2x" aria-hidden="true"></i></a></td>'+
	  '</tr>';

	  $("#tabla tbody").append(strNueva_Fila);

	  $('#tabla tbody').find('tr').each(function(index, element){
		  if( (index % 2) === 0 ){
			  $(this).addClass('even');
		  }else{
			  $(this).addClass('odd');
		  }
	  });

	  $('#tabla tbody').find('tr').each(function(index, element){
		var p = parseFloat($(this).find('td').eq(6).find('input').val());
		$(this).find('td').eq(6).find('input').val(p.toFixed(2));
	});

  }else{

	  alert('Producto sin Stock');

  }
}
/**
 * [eliminarFila Elimina los registros de los pedidos]
 * @param  {[type]} idTr [description]
 * @param  {[type]} sw   [description]
 * @return {[type]}      [description]
 */
function eliminarFila(idTr, cant, idInv){

	if( $('#tabla tbody').find('tr').length == 1 ){

		if(confirm('Si elimina el ultimo registro. "SE ELIMINARA TODO EL PEDIDO...!!!"')){
			deleteRowBD('delPedido.php',idTr, 'pedido', 'pedido');
			despliega('modulo/pedido/pedido.php','contenido');
		}

	}else{

		if(confirm('¿Esta seguro que desea ELIMINAR EL REGISTRO...!!!?')){
			$.ajax({
				url: 'modulo/pedido/generaXML.php',
				async: true,
				type: 'post',
				cache: false,
				data: 'id='+idInv+'&cant='+cant,
				success: function(data){
					$('#'+idInv).remove();

					subPrecio = 0;
					$('#tabla tbody').find('tr').each(function(index, element){
						subPrecio = parseFloat(subPrecio) + parseFloat($(this).find('td').eq(5).find('input').val());
					});

					$('#tabla tfoot').find('th').eq(1).find('input').val(subPrecio.toFixed(2));

					des = $('#tabla tfoot').find('tr').eq(1).find('th').eq(1).find('input').val();
					if(des === '') des = 0;

					bon = $('#tabla tfoot').find('tr').eq(2).find('th').eq(1).find('input').val();
					if(bon === '') bon = 0;

					total = parseFloat(subPrecio)-parseFloat(des)-parseFloat(bon);
					$('#tabla tfoot').find('tr').eq(3).find('th').eq(1).find('input').val(total.toFixed(2));

					if( total < 0  )
						$('#tabla tfoot').find('tr').eq(1).find('th').eq(1).find('input').css('color','#F7070B');
					else
						$('#tabla tfoot').find('tr').eq(1).find('th').eq(1).find('input').css('color','#000000');

					$('#tabla tbody').find('tr').each(function(index, element){
						if( index % 2 === 0 ){
							$(this).removeClass('odd');
							$(this).addClass('even');
						}else{
							$(this).removeClass('even');
							$(this).addClass('odd');
						}
					});
					$('#efectivo').val('');
					$('#cambio').val('');
					$('#codigo').focus();

				}
			});
		}

	}

}

/* RECARGA TOTALES DEL EDIT */

function recargaFila(){
	subPrecio = 0;
	$('#tabla tbody').find('tr').each(function(index, element){
		subPrecio = parseFloat(subPrecio) + parseFloat($(this).find('td').eq(5).find('input').val());
	});
	$('#tabla tfoot').find('th').eq(1).find('input').val(subPrecio.toFixed(2));

	des = $('#tabla tfoot').find('tr').eq(1).find('th').eq(1).find('input').val();
	if(des === '') des = 0;

	bon = $('#tabla tfoot').find('tr').eq(2).find('th').eq(1).find('input').val();
	if(bon === '') bon = 0;

	total = parseFloat(subPrecio)-parseFloat(des)-parseFloat(bon);
	$('#tabla tfoot').find('tr').eq(3).find('th').eq(1).find('input').val(total.toFixed(2));

}

/* GUARDA PEDIDO */

function savePedido(idForm, p){

	if( !confirm('CONFIRMAR PEDIDO!!!')){
		return;
	}
	var dato = JSON.stringify( $('#'+idForm).serializeObject() );
	$.ajax({
		url: "modulo/pedido/"+p,
		type: 'post',
		dataType: 'json',
		async:true,
		data:{res:dato},
		success: function(data){
			despliega('modulo/pedido/pedido.php','contenido');
			window.open('modulo/pedido/pdfPedido.php?res='+dato, '_blank');
		},
		error: function(data){
			alert('Error al guardar el formulario');
		}
	});
}

/**
 * CANCELAR PEDIDO
 */

function cancelarPedido(){
	if(confirm("Seguro que desea eliminar pedido..!!!"))
	despliega('modulo/pedido/pedido.php','contenido');
}

function cancelarPedidoEdit(){
	if(confirm("Si cancela la modificación no se guardara ningun cambio..!!!"))
	despliega('modulo/pedido/pedido.php','contenido');
}

/**
 * [detalle description genera pdf]
 * @param  {[type]} id [description]
 * @return {[type]}    [description]
 */
 function detalle(id){
	window.open('modulo/pedido/pdfPedDet.php?res='+id, '_blank');
}

 function detalleAlm(id){
	window.open('modulo/pedido/pdfPedAlm.php?res='+id, '_blank');
}
/**
 * [selecCampo Recarga camppo producto]
 * @param  {[type]} name [input producto]
 * @return {[type]}      [description]
 */
 function selecCampo( name ){
	$('#producto').val(name);
}
/**
 * [deleteRowBD Elimina un registritro del modulo de pedido]
 * @param  {[type]} p     [pagina]
 * @param  {[type]} idTr  [id a eliminar]
 * @param  {[type]} tipo  [descripticion de modulo]
 * @param  {[type]} table [tabla de BD]
 * @return {[type]}       [Elimina el item]
 */
 function deleteRowBD(p, idTr, tipo, table){
  var resp=0;
  rr = $.ajax({
	url: 'modulo/'+tipo+'/'+p,
	type: 'post',
	async:false,
	data: 'id='+idTr+'&tipo='+tipo+'&table='+table,
	success: function(data){
		if(data!=1)
			alert('No se puede eliminar el ITEM.');
		else
			resp = data;
	},
	error: function(data){
		alert('Error al eliminar el ITEM.');
	}
});
  	return resp;
}
/**
 * [pad aumenta ceros a la izquierda]
 * @param  {[type]} n      [description]
 * @param  {[type]} length [description]
 * @return {[type]}        [description]
 */
function pad (n, length) {
	var  n = n.toString();
	l=n.length;
	while(l!=0){
		l--;
		 n = "0" + n;
	 }
return n;
}

/**
 * Guardar imagenes a la bd
 */
function saveImg(mod, name, size){
	//alert('entra varias veces...!!!');
	$.ajax({
		url: '../../modulo/'+mod+'/uploadFile.php',
		type: 'post',
		async:false,
		data:{
			name: name,
			size: size
		},
		success: function(data){
			//return data;
		}
	});
}

/**
 * cargas las imagenes en la op modificar
 */

function loadImages(mod, id){
    var dato = JSON.stringify(id);
    $.ajax({
        url: '../../modulo/'+mod+'/loadImages.php',
        type: 'post',
        dataType: 'json',
        cache: false,
        data: 'id='+id,
        beforeSend: function(data){
           // $("#"+div).html('<div id="load" align="center" class="alert alert-success" role="alert"><p>Cargando contenido. Por favor, espere ...</p></div>');
        },
        success: function(data){
        	var row = new Array();
        	var sw = 0;
        	var cont = data.num;
        	i = 0;
            $.each(data,function(index,contenido){
            	j = 0;
                $.each(contenido,function(index,valor){
                	if(i >= cont){
                		sw = 1;
                	}
                	if(sw == 1 && row[j] != ""){
                		size = valor/1000;
                		size = size.toFixed(2);
	                    html = '<tr class="template-download fade in">'+
	                    '<td><span class="preview">'+
	                    '<a href="../../modulo/'+mod+'/uploads/files/'+row[j]+'" title="'+row[j]+'" download="'+row[j]+'" data-gallery=""><img src="../../modulo/'+mod+'/uploads/files/thumbnail/'+row[j]+'"></a>'+
	                    '</span></td>'+
	                    '<td><p class="name">'+
	                    '<a href="../../modulo/'+mod+'/uploads/files/'+row[j]+'" title="'+row[j]+'" download="'+row[j]+'" data-gallery="">'+row[j]+'</a></p></td>'+
	                    '<td><span class="size">'+size+' KB</span></td>'+
	                    '<td>'+
	                    '<button class="btn btn-danger btn-sm delete" data-type="DELETE" data-url="../../modulo/'+mod+'/uploads/index.php?file='+row[j]+'">'+
	                    '<i class="fa fa-trash-o"></i>'+
	                    '<span> Borrar</span>'+
	                    '</button>'+
	                    ' <input id="delete" name="delete" value="1" class="toggle" type="checkbox">'+
	                    '</td>'
	                    '</tr>';
	                   	j++;
	                    $("#loadImages tbody").append(html);
	                }else{
	                	row[i] = valor;
	                }
	                i++;
                });
            });
        }
    });
}

function loadImagesMulti(mod, id){
    var dato = JSON.stringify(id);
    $.ajax({
        url: '../../modulo/'+mod+'/loadImages.php',
        type: 'post',
        dataType: 'json',
        cache: false,
        data: 'id='+id,
        beforeSend: function(data){
           // $("#"+div).html('<div id="load" align="center" class="alert alert-success" role="alert"><p>Cargando contenido. Por favor, espere ...</p></div>');
        },
        success: function(data){
        	var row = new Array();
        	var sw = 0;
        	var cont = data.num;
        	i = 0;
            $.each(data,function(index,contenido){
            	j = 0;
                $.each(contenido,function(index,valor){
                	if(i >= cont){
                		sw = 1;
                	}
                	if(sw == 1){
                		size = valor/1000;
                		size = size.toFixed(2);
	                    html = '<tr class="template-download fade in">'+
	                    '<td><span class="preview">'+
	                    '<a href="../../modulo/'+mod+'/uploads/files/'+row[j]+'" title="'+row[j]+'" download="'+row[j]+'" data-gallery=""><img src="../../modulo/'+mod+'/uploads/files/thumbnail/'+row[j]+'"></a>'+
	                    '</span></td>'+
	                    '<td><p class="name">'+
	                    '<a href="../../modulo/'+mod+'/uploads/files/'+row[j]+'" title="'+row[j]+'" download="'+row[j]+'" data-gallery="">'+row[j]+'</a></p></td>'+
	                    '<td><span class="size">'+size+' KB</span></td>'+
	                    '<td>'+
	                    '<button class="btn btn-danger btn-sm delete" data-type="DELETE" data-url="../../modulo/'+mod+'/uploads/index.php?file='+row[j]+'">'+
	                    '<i class="fa fa-trash-o"></i>'+
	                    '<span> Borrar</span>'+
	                    '</button>'+
	                    ' <input id="delete" name="delete" value="1" class="toggle" type="checkbox">'+
	                    '</td>'
	                    '</tr>';
	                   	j++;
	                    $("#loadImages tbody").append(html);
	                }else{
	                	row[i] = valor;
	                }
	                i++;
                });
            });
        }
    });
}


/*FUNCIONES PARA EL PUNTO DE VENTA*/
/************************************************************************************/
function busca_articulo(){
    $(document).ready(function(){
    var cod = $("#codigo").val().trim();
        if(cod.trim()!=""){
        $(document).ready(function(){
        	$.ajax({
          	beforeSend: function(){
            	$("#data_articulo").html("Buscando informacion del articulo...");
         	},
          	url: '../../modulo/venta/buscaRepuesto.php',
          	dataType: 'json',
          	type: 'POST',
          	data: 'codigo='+$("#codigo").val(),
          	success: function(data){
          		//alert(data[0].priceSale);
            	if(data==0){
            		alert("No existe el articulo...!");
            		$("#codigo").val("");
            		$("#codigo").focus();
            		$("#cantidad").attr("disabled", true);
            		$("#preciou").attr("disabled", true);
            	}else{
		            $(".widget-user-desc").html(data[0].namePro);
		            $(".exis").html(data[0].cantidad);
		            $(".preciol").html(data[0].priceSale);
		            //$("#preciou").attr("disabled", false);
		            //$('#preciou').number(true, 2);
		            $("#preciou").val(data[0].priceSale);
		            //$('#cantidad').number(true, 2);
		            $("#cantidad").attr("disabled", false);
		            $("#cantidad").val(0.00);
		            $("#preciou").select();
		            $("#cantidad").focus();
			            if(data[0].name!=""){
			               $("#imagen").attr("src",'../../modulo/repuesto/uploads/files/'+data[0].name);
			            }else{
			               $("#imagen").attr("src",'../../assets/img/sin_foto.png');
			            }
			            if(data[0].cantidad <= 0){
			                alert("No hay suficiente existencia...!")
			                $("#codigo").val("");
			                $("#codigo").focus();
			                $("#cantidad").attr("disabled", true);
			                $("#preciou").attr("disabled", true);
			            }
            }
           },
           error: function(jqXHR,estado,error){
            alert("Parece ser que hay un error por favor, reportalo a Soporte inmediatamente...!");
           }
           });
          });
          }else{
          }
          })
         }
/***************************************************************************************/
function busqueda_art(){
   $("#modal_busqueda_arts").modal({
             show:true,
             backdrop: 'static',
             keyboard: false
            });
   $('#modal_busqueda_arts').on('shown.bs.modal', function () {
   $("#lista_articulos").html("");
   $("#articulo_buscar").val("");
   $("#articulo_buscar").focus();
   });
}
/*****************************************************************************/
function busca(){
	// alert("okoko");
	// $.post("../../Modulo/Ventas/busca_articulos_ayuda.php",{articulo:$("#articulo_buscar").val()},function(data){
       // Repuestos=$.parseJSON(data);
        //alert(data);
   		
    //  });
    $.ajax({
        beforeSend: function(){
          $("#lista_articulos").html("<img src='dist/img/default.gif'></img>");
          },
        url: 'busca_articulos_ayuda.php',
        type: 'POST',
        data: 'articulo='+$("#articulo_buscar").val(),
        success: function(x){
        	$("#lista_articulos").html(x);
        },
        error: function(jqXHR,estado,error){
        	$("#lista_articulos").html("Error en la peticion AJAX..."+estado+"      "+error);
        }
    });
    
}
/*****************************************************************************/
function add_art(art){
  //alert(art);
  $("#modal_busqueda_arts").modal("toggle");
  $("#codigo").val(art.trim());
  busca_articulo();
}
/*************************************************************************************/
 function agrega_a_lista(){
   $(document).ready(function(){
        if( $("#cantidad").val() > 0 ){

            var articulo 	=	$("#codigo").val();
            var descripcion =	$(".widget-user-desc").html();
            var precio 		=	$("#preciou").val();
            var cantidad 	=	$("#cantidad").val();
            var canTotal	=	$(".exis").text();
            //alert(canTotal);
            var price 		=	precio.split("Bs. ");
            var monto 		=	cantidad*price[1];
            var sw = 0;

            $('#tabla_articulos tbody').find('tr').each(function(index, element){
				cod = $(this).attr('id');
				//alert(cod);

				if( cod === articulo ){

					cant = $('tr#'+articulo).find('td').eq(2).text();
					cant = parseInt(cant) + parseInt(cantidad);

					if( parseFloat(cant) <= parseFloat(canTotal) ){

					  precio = $('tr#'+articulo).find('td').eq(3).text();
					  precio = parseFloat(precio) * parseFloat(cant);
					  //alert(precio);
					  $('tr#'+articulo).find('td').eq(2).text(cant);
					  //$('tr#'+articulo).find('td').eq(3).find('input').val(cant);
					  $('tr#'+articulo).find('td').eq(4).text(precio.toFixed(2));
					  //$('tr#'+articulo).find('td').eq(4).find('input').val(precio);

				  	}else{
						alert('Producto sin Stock...!!!');
					}
					sw = 1;
				}
			});

            if( sw === 0 && articulo !== undefined ){
            	if( parseFloat(cantidad) <= parseFloat(canTotal) ){
            		$("#tabla_articulos > tbody").append("<tr id='"+articulo+"'><td class='center'>"+articulo+"</td><td class='center'>"+descripcion+"</td><td class='center'>"+cantidad+"</td><td class='center'>"+price[1]+"</td><td class='center'>"+monto.toFixed(2)+"</td><td class='center'><button class='btn btn-block btn-danger btn-xs delete'><i class='icon-trash bigger-120'></i> Eliminar</button></td></tr>");
            		$("#codigo").val("");
		            $("#cantidad").val("");
		            $("#preciou").val("");
		            $(".widget-user-desc").text("");
		            $(".preciol").text("0.00");
		            $(".exis").text("0.00");
		            $("#cantidad").attr("disabled", true);
		            $("#preciou").attr("disabled", true);
		            $("#codigo").focus();
		            /*cancela_operacion();*/
		            $("#imagen").attr("src",'../../assets/img/sin_foto.png');
		            resumen();
            	}else{
					alert('Producto sin Stock...!!!');
				}
        	}else{
        		/**
        		 * cuando el producto ya esta agregado y solo cambian las cantidades
        		 */
        		$("#codigo").val("");
		            $("#cantidad").val("");
		            $("#preciou").val("");
		            $(".widget-user-desc").text("");
		            $(".preciol").text("0.00");
		            $(".exis").text("0.00");
		            $("#cantidad").attr("disabled", true);
		            $("#preciou").attr("disabled", true);
		            $("#codigo").focus();
		            /*cancela_operacion();*/
		            $("#imagen").attr("src",'../../assets/img/sin_foto.png');
		            resumen();
        	}

        }else{
            var n = noty({
                text: "La cantidad es invalida...!",
                theme: 'relax',
                layout: 'center',
                type: 'error',
                timeout: 2000,
            });
        }
    })
}
/******************************************************************************************/
$(function(){
        // Evento que selecciona la fila y la elimina
	    $('#tabla_articulos').on("click",".delete",function(){
	    	var parent = $(this).parents().parents().get(0);
		  	$(parent).remove();
           	resumen();
       	});
       });
/****************************************************************************************/
function pone_num_venta(){
          $(document).ready(function(){
          $.ajax({
          beforeSend: function(){
            $("#num_ticket").html("Buscando...");
           },
          url: 'busca_ticket.php',
          type: 'POST',
          data: 'caja='+$("#ncaja").val(),
          success: function(x){
            $("#num_ticket").html("Caja: "+$("#ncaja").val()+" - Ticket # " +x);
           },
           error: function(jqXHR,estado,error){
             $("#num_ticket").html('Hubo un error: '+estado+' '+error);
           }
           });
          });
        }
/*****************************************************************************************/
function resumen(){
  	$(document).ready(function(){
    var articulos=0.00;
    var monto=0.00;
    $('#tabla_articulos > tbody > tr').each(function(){
    	articulos	+=parseFloat($(this).find("td").eq(2).html());
    	monto		+=parseFloat($(this).find('td').eq(4).html());
    });
    $("#total_articulos").html("Total de Articulos: "+articulos.toFixed(2));

    var des = $("#descuento").val();
    des = des.split(" ");
    if(des==""){
    	des[0] = 0;
    	//alert(des);
    }

    subTotal = monto;
    monto = monto-((monto*des[0])/100);
    $("#totales").html('Bs. ' + monto.toFixed(2));
    $("#des").html(des[0]+' %');
    $("#subTotal").html('Bs. '+ subTotal.toFixed(2));
    if(articulos>0){
      $("#btn-procesa").prop('disabled', false);
      $("#btn-cancela").prop('disabled', false);
      $("#descuento").prop('disabled', false);
    }else{
      $("#btn-procesa").prop('disabled', true);
      $("#btn-cancela").prop('disabled', true);
      $("#descuento").prop('disabled', true);
    }
    $("#total_venta").val(monto.toFixed(2));
    })
}

/***********************************************************************************************/
function cancela_venta(){
     $("#btn_cancela").prop("disabled", true);
     var n = noty({
              text: "Deseas cancelar la venta...?",
              theme: 'relax',
              layout: 'center',
              type: 'information',
              buttons     : [
                {addClass: 'btn btn-primary',
                 text    : 'Si',
                 onClick : function ($noty){
                      $noty.close();
                      $("#tabla_articulos > tbody:last").children().remove();
                      resumen();
                      cancela_codigo();
                      $("#codigo").focus();
                  }
               },
               {addClass: 'btn btn-danger',
                text    : 'No',
                onClick : function ($noty){
                  $("#btn_cancela").prop("disabled", false);
                   $noty.close();
                 }
                }
              ]
          });
   }
/***************************************************************************************/
function cancela_codigo(){
   $("#preciou").val("");
   $("#cantidad").val("");
   $("#preciou").attr("disabled", true);
   $("#cantidad").attr("disabled", true);
   $("#codigo").val("");
   $("#codigo").focus();
}
/********************************************************************************************/
function busca_cliente(){
    $(document).ready(function(){
        $("#modal_tabla_clientes").modal({
            show:true,
            backdrop: 'static',
            keyboard: false
        });
       $.ajax({
          beforeSend: function(){
            $("#lista_clientes").html("Cargando los clientes...");
          },
          url: 'lista_clientes.php',
          type: 'POST',
          data: null,
          success: function(x){
            $("#lista_clientes").html(x);
            $(document).ready(function() {
             $('#sample-table-3').DataTable();
            });
           },
          error: function(jqXHR,estado,error){
            $("#lista_clientes").html('Hubo un error: '+estado+' '+error);
          }
       });
       })
      }
/*********************************************************************************************/
function pone_cliente(elid){
    var client=elid;
    var idcl=client.split("|");
    $("#idcliente_credito").val(idcl[0]);
    $("#modal_tabla_clientes").modal('hide');
    $("#tipo_de_venta").html("<button class='btn btn-danger btn-xs' onclick='quita_cliente();'>Quitar</button> Venta al Contado a: "+idcl[1]);
    $("#btn_cre").attr('disabled', true);
    //window.alert(client);
}
/*********************************************************************************************/
function quita_cliente(){
  $("#btn_cre").attr('disabled', false);
  $("#tipo_de_venta").html("Venta de Contado.");
  $("#idcliente_credito").val("");
}
/***************************************************************************************/
function prepara_venta(){
  $(document).ready(function(){
   $("#modal_prepara_venta").modal({
        show:true,
        backdrop: 'static',
        keyboard: false
   });
   $('#modal_prepara_venta').on('shown.bs.modal', function () {
   $("#paga_con").select();
   $('#paga_con').focus();
   });
   $("#total_de_venta").val("Bs. "+ $("#total_venta").val());
   })
}
/***********************************************************************************/
function calcula_cambio(){
   var m1=$("#total_venta").val();
   var m2=$("#paga_con").val();
   var change=parseFloat(m2)-parseFloat(m1);
   $("#el_cambio").val("Bs. "+change.toFixed(2));
}
/**************************************************************************************/
function procesaVenta(){
	var resp=0;
	var idCliente 	=	$("#idcliente_credito").val();
	var subTotal 	=	$('#subTotal').html();
	var total		=	$('#totales').html();
	var descuento 	= 	$('#descuento').val();
	descuento 	= descuento.split(" ");
	subTotal	=	subTotal.split(" ");
	total		=	total.split(" ");
	//alert(total[1]);
    /*var descuento	= 	$(this).find('td').eq(0).html();
    var total		= 	$(this).find('td').eq(2).html();*/

	$.ajax({
    	url: '../../modulo/venta/procesaVenta.php',
        type: 'POST',
        async: false,
        data: {
        	subTotal: subTotal[1],
        	idCliente: idCliente,
        	descuento: descuento[0],
        	total: total[1],
        },
        success: function(x){
        	//alert(x);
        	resp = x;
        }
    });
 	return(resp);
}
function procesa_venta(){
  $(document).ready(function(){
    /*busca el numero de ticket*/
    //setTimeout('actualiza_ticket()',1000);
    $('#modal_prepara_venta').modal('toggle');
        var credi 	 ='0';
        var clients  ='0';
        var descuento 	= 	$('#descuento').html();
        //$("#btn-procesa").prop('disabled', true);
        if($('#idcliente_credito').val()!=""){
            credi 	=	'1';
            clients =	$("#idcliente_credito").val();
        }
        var yapuso = 0;

        var idX = procesaVenta();

        	$('#tabla_articulos > tbody > tr').each(function(){
                //var descripcion_art	=	$(this).find('td').eq(1).html();
                var cod 	= 	$(this).find('td').eq(0).html();
                var can 	= 	$(this).find('td').eq(2).html();
                var preciou	= 	$(this).find('td').eq(3).html();
                var monto	=	$(this).find('td').eq(4).html();
                $.ajax({
                	beforeSend: function(){
                	},
                	url: 'procesa_venta.php',
                    type: 'POST',
                    async: false,
                    data: 'id='+idX+'&idRep='+cod+'&cantidad='+can+'&precio='+preciou+'&monto='+monto+'&cliente='+clients,
                    success: function(x){
                        var n = noty({
	                        text: "Procesando venta...  articulo actual: "+cod,
	                    	theme: 'relax',
	                        layout: 'topLeft',
	                        type: 'success',
	                        timeout: 2000,
                        });
                        $("#tabla_articulos > tbody:last").children().remove();
                        resumen();
                        quita_cliente();
                        $("#descuento").val("0");
                        $("#des").html("0 %");
                        $("#codigo").focus();
                        // if(yapuso==0){
                        //     llena_ticket_archivo(cod,can,preciou,descripcion_art,yapuso,monto,$("#totales").html(),$("#paga_con").val(),$("#el_cambio").val(),n_tic);
                        //        yapuso=1;
                        // }else{
                        //     llena_ticket_archivo(cod,can,preciou,descripcion_art,yapuso,monto,$("#totales").html(),$("#paga_con").val(),$("#el_cambio").val(),n_tic);
                        // }
                    },
                    error: function(jqXHR,estado,error){
                        $("#errores").html('Error... '+estado+'  '+error);
                    }
                });
            });
       	VentanaCentrada('../../pdf/documentos/venta_pdf.php?idX='+idX+'&clients='+clients,'Cotizacion','','1024','768','true');
    })
}

function verCompra(idX, clients){
    VentanaCentrada('../../pdf/documentos/venta_pdf.php?idX='+idX+'&clients='+clients,'Cotizacion','','1024','768','true');
}

function busca_cotizacion(){
	var dato = $('#cotizacion').val();
	$.ajax({
		url: "busca_cotizacion.php",
		type: 'post',
		dataType: 'json',
		async:false,
		data:{codigo:dato},
		beforeSend: function(data){
			//$("#"+div).html('<div id="load" align="center"><p>Cargando contenido. Por favor, espere ...</p></div>');
		},
		success: function(data){
			$('#tabla tfoot').removeAttr('hidden');
			//$('#submitVenta').removeAttr('hidden');
			//alert(data.cant);
			for (var i = 0; i < data.length; i++) {
				var monto 	=	data[i].cantidad*data[i].priceSale;
				$("#tabla_articulos > tbody").append("<tr id='"+data[i].numparte+"'><td class='center'>"+data[i].numparte+"</td><td class='center'>"+data[i].name+"</td><td class='center'>"+data[i].cantidad+"</td><td class='center'>"+data[i].priceSale+"</td><td class='center'>"+monto.toFixed(2)+"</td><td class='center'><button class='btn btn-block btn-danger btn-xs delete'><i class='icon-trash bigger-120'></i> Eliminar</button></td></tr>");
			}
			resumen();
		},
		error: function(data){

		}
	});
}
