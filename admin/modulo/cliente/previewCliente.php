<?php
/**
 * Created by PhpStorm.
 * User: TAPIA
 * Date: 25/09/2016
 * Time: 0:56
 */
$fecha = $op->ToDay();
$hora = $op->Time();

$id = $_REQUEST['id'];

$strSql = "SELECT * FROM cliente ";
$strSql.= "WHERE id_cliente = '".$id."' ";

$str = $db->Execute($strSql);
$file = $str->FetchRow();
?>

<script>

var coorX;
var coorY;
var id_cliente;

$(document).ready(function(e) {

    $('#dataPreview').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget); // Botón que activó el modal
        var nombre = button.data('name'); // Extraer la información de atributos de datos
        var apP = button.data('paterno'); // Extraer la información de atributos de datos
        var apM = button.data('materno'); // Extraer la información de atributos de datos
            id_cliente = button.data('id'); // Extraer la información de atributos de datos
        var depa = button.data('dep'); // Extraer la información de atributos de datos
        var nameEmp = button.data('nameemp');
        var phone = button.data('fono');
        var celular = button.data('celular');
        var email = button.data('emailc');
        var ci = button.data('ci');
        var direccion = button.data('addresc');
        var numero = button.data('nro');
        var obser = button.data('obser');

        var modal = $(this);
        //modal.find('.modal-title').text('Modificar cliente: '+nombre+' '+apP);
        modal.find('.modal-body #nameEmpU').val(nameEmp);
        modal.find('.modal-body #nameU').val(nombre);
        modal.find('.modal-body #paternoU').val(apP);
        modal.find('.modal-body #maternoU').val(apM);

        modal.find('.modal-body #codClU').val(id_cliente);
        modal.find('.modal-body #codCliU').val(id_cliente);

        modal.find('.modal-body #ciU').val(ci);
        modal.find('.modal-body #depU').val(depa);
        modal.find('.modal-body #fonoU').val(phone);
        modal.find('.modal-body #celularU').val(celular);
        modal.find('.modal-body #emailU').val(email);

        modal.find('.modal-body #addresU').val(direccion);
        modal.find('.modal-body #NroU').val(numero);
        modal.find('.modal-body #obserU').val(obser);

    });

    $('#dateNacU').datetimepicker({
        locale: 'es',
        viewMode: 'years',
        format: 'YYYY-MM-DD'
    });

    $('#dataPreview').on('hidden.bs.modal', function (e) {
        // do something...
        $('#formPreview').get(0).reset();
    });

});

</script>

<style type="text/css">
    #codClU{
        text-transform: uppercase;
    }
</style>

<form id="formPreview" action="javascript:updateForm('formPreview','cliente/update.php')" class="" autocomplete="off" >
<div class="modal fade bs-example-modal-lg" id="dataPreview" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel" data-backdrop="static"
   data-keyboard="false">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="gridSystemModalLabel">Vista Previa<span class="fecha">Fecha: <?=$fecha;?> <?=$hora;?></span></h4>
            </div>
            <div class="modal-body">

                <div class="row">
                    <input id="date" name="date" type="hidden" value="<?=$fecha;?> <?=$hora;?>" />
                    <input id="tabla" name="tabla" type="hidden" value="cliente">
                    <div class="col-md-9">
                        <div class="row">
                            <div class="col-md-4 form-group">
                                <label for="codClU" class="sr-only">Cod. Clinete:</label>
                                <input id="codClU" name="codClU" type="text" placeholder="Cod. Cliente" class="form-control" readonly />
                                <input id="codCliU" name="codCliU" type="hidden" value="<?=$_SESSION['inc'].''.$op->ceros($NumRow[0],2);?>"/>
                            </div>
                            <div class="col-md-8 form-group">
                                <label for="nameEmpU" class="sr-only">Nombre Negocio:</label>
                                <input id="nameEmpU" name="nameEmpU" type="text" placeholder="Nombre Negocio" data-validation="required" class="form-control" autocomplete="off" disabled="" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2 form-group">
                                <label for="nameU" class="sr-only">Nombre:</label>
                                <input id="nameU" name="nameU" type="text" placeholder="Nombre" class="form-control" data-validation="required" autocomplete="off" onBlur="cargaCodU()" disabled=""/>
                            </div>
                            <div class="col-md-2 form-group">
                                <label for="paternoU" class="sr-only">Paterno:</label>
                                <input id="paternoU" name="paternoU" type="text" placeholder="Paterno" data-validation="required" class="form-control" onBlur="cargaCodU()" disabled="" />
                            </div>
                            <div class="col-md-2 form-group">
                                <label for="maternoU" class="sr-only">Materno:</label>
                                <input id="maternoU" name="maternoU" type="text" placeholder="Materno" data-validation="required" class="form-control" disabled="" />
                            </div>
                            <div class="col-md-3 form-group">
                                <label for="ciU" class="sr-only">N° C.I.:</label>
                                <input id="ciU" name="ciU" type="text" placeholder="N° C.I." class="form-control"
                                       data-validation="required number"
                                       readonly="off">
                            </div>
                            <div class="col-md-3 form-group">
                                <label for="depU" class="sr-only">Lugar Exp.:</label>
                                <select id="depU" name="depU" class="form-control" data-validation="required"  disabled="">
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
                        <label for="fonoU" class="sr-only">Telefono:</label>
                        <input id="fonoU" name="fonoU" type="text" placeholder="Telefono" class="form-control" data-validation="number" data-validation-optional-if-answered="celular" disabled=""/>
                    </div>
                    <div class="col-md-3 form-group">
                        <label for="celularU" class="sr-only">Celular:</label>
                        <input id="celularU" name="celularU" type="text" placeholder="Celular" class="form-control" data-validation="number" data-validation-optional-if-answered="fono" disabled=""/>
                    </div>
                    <div class="col-md-6 form-group">
                        <label for="emailU" class="sr-only">Correo Electronico:</label>
                        <input id="emailU" name="emailU" type="text" placeholder="Correo Electronico" value="" class="form-control" data-validation="email" disabled=""/>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-9 form-group">
                        <label for="addresU" class="sr-only"></label>
                        <input id="addresU" name="addresU" type="text" placeholder="Direcci&oacute;n" class="form-control" data-validation="required" disabled=""/>
                    </div>
                    <div class="col-md-3 form-group">
                        <label for="NroU" class="sr-only"></label>
                        <input id="NroU" name="NroU" type="text" placeholder="N° de domicilio" class="form-control" data-validation="required number" disabled=""/>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 form-group">
                        <label for="obserU" class="sr-only"></label>
                        <p id="maxText"><span id="max-length-element">200</span> caracteres restantes</p>
                        <textarea id="obserU" name="obserU" cols="2" placeholder="Observaciones" class="form-control" disabled=""></textarea>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" id="closeU" class="btn btn-success" data-dismiss="modal">
                    <i class="fa fa-close" aria-hidden="true"></i>
                    <span>Cerrar</span>
                </button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
</form>

<script>
    function cargaCodU(){

      var cod   = $('#codCliU').val();
      var n     = $('#nameU').val();
      var p     = $('#paternoU').val();
      var m     = $('#maternoU').val();
      var vr    = cod.substr(0,2);
      var nvr   = cod.substr(6,7);

      var c = vr+'-'+n.substr(0,1)+''+p.substr(0,1)+'-'+nvr;

      $('#codClU').val(c);

    }
</script>