<?php
/**
 * Created by PhpStorm.
 * User: SONY
 * Date: 23/9/2016
 * Time: 16:25
 */
session_start();

include '../../inc/conexion.php';
include '../../inc/function.php';

$op = new cnFunction();

?>
<script>
  $(document).ready(function() {
    $('#tablaList').DataTable({
        "language": {
            "lengthMenu": "Mostrar _MENU_ filas por pagina",
            "zeroRecords": "No se encontro nada - Lo siento",
            "info": "Mostrando _PAGE_ de _PAGES_",
            "infoEmpty": "No hay registros disponibles",
            "infoFiltered": "(Filtrada de _MAX_ registros en total)",
            "search":         "Buscar:",
            "paginate": {
                "first":      "Primero",
                "last":       "Ultimo",
                "next":       "Siguiente",
                "previous":   "Anterior"
            }
        },
        "columnDefs": [
            {
                "targets": [ 1 ],
                "visible": false,
                "searchable": true
            }
        ]
    });

    $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            //increaseArea: '100%' // optional
          });

        $('input').on('ifChecked', function(event){
            id = $(this).attr('id');
            statusPro(id, 'Activo');
        });
        $('input').on('ifUnchecked',function(event){
            id = $(this).attr('id');
            statusPro(id, 'Inactivo');
        });

  });

  $('div#sidebar').find('a#proveedor').addClass('active');
  $('div#sidebar').find('li#listProveedor').addClass('active');
</script>

<table id="tablaList" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
            <tr>
                <th>Nº</th>
                <th>Fecha</th>
                <th>Nombre Compañia</th>
                <th>Nombre</th>
                <th>Ap. Paterno</th>
                <th>Ap. Materno</th>
                <th>Email</th>
                <th>Telefono</th>
                <th>Celular</th>
                <th>Acciones</th>
            </tr>
            </thead>
            <tbody>
            <?PHP
            $sql = "SELECT * ";
            $sql.= "FROM proveedor ";
            $sql.= "ORDER BY (dateReg) DESC ";

            $cont = 1;

            $srtQuery = $db->Execute($sql);
            if($srtQuery === false)
                die("failed");

            while( $row = $srtQuery->FetchRow()){

                ?>
                <tr id="tb<?=$row[0]?>">
                    <td align="center"><?=$cont++;?></td>
                    <td><?=$row['dateReg']?></td>
                    <td><?=$row['nombreEmp'];?></td>
                    <td><?=$row['nombre'];?></td>
                    <td><?=$row['apP'];?></td>
                    <td><?=$row['apM'];?></td>
                    <td><?=$row['email'];?></td>
                    <td><?=$row['phone'];?></td>
                    <td><?=$row['celular'];?></td>
                    <td width="15%">
                        <div class="btn-group">
                                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#dataPreview"
                                            data-id="<?=$row['id_proveedor']?>"
                                            data-nameEmp="<?=$row['nombreEmp']?>"
                                            data-nit="<?=$row['nit']?>"
                                            data-name="<?=$row['nombre']?>"
                                            data-paterno="<?=$row['apP']?>"
                                            data-materno="<?=$row['apM']?>"
                                            data-ci="<?=$row['ci']?>"
                                            data-dep="<?=$row['depa']?>"
                                            data-fono="<?=$row['phone']?>"
                                            data-celular="<?=$row['celular']?>"
                                            data-addres="<?=$row['direccion']?>"
                                            data-Nro="<?=$row['numero']?>"
                                            data-email="<?=$row['email']?>"
                                            data-obser="<?=$row['obser']?>"
                                    >
                                    <i class='fa fa-external-link'></i> Vista Previa
                                    </button>

                                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#dataUpdate"
                                            data-id="<?=$row['id_proveedor']?>"
                                            data-nameEmp="<?=$row['nombreEmp']?>"
                                            data-nit="<?=$row['nit']?>"
                                            data-name="<?=$row['nombre']?>"
                                            data-paterno="<?=$row['apP']?>"
                                            data-materno="<?=$row['apM']?>"
                                            data-ci="<?=$row['ci']?>"
                                            data-dep="<?=$row['depa']?>"
                                            data-fono="<?=$row['phone']?>"
                                            data-celular="<?=$row['celular']?>"
                                            data-addres="<?=$row['direccion']?>"
                                            data-Nro="<?=$row['numero']?>"
                                            data-email="<?=$row['email']?>"
                                            data-obser="<?=$row['obser']?>"
                                    >
                                        <i class='fa fa-pencil-square-o '></i>
                                        <span>Modificar</span>
                                    </button>
                        </div>
                        <div style="width: 188px; margin-top: 5px">
                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#dataDeletePro" data-id="<?=$row['id_proveedor']?>"  ><i class='glyphicon glyphicon-trash'></i> Eliminar
                            </button>

                            <div class="checkbox" id="status<?=$row['id_proveedor']?>">
                                    <?PHP
                                    if( $row['statusPro'] == 'Activo' ){
                                    ?>
                                        <input type="checkbox" name="checks" checked id="<?=$row['id_proveedor']?>"/>
                                        <label>Status</label>
                                    <?PHP
                                    }else{
                                    ?>
                                        <input type="checkbox" name="checks" id="<?=$row['id_proveedor']?>"/>
                                        <label>Status</label>
                                    <?PHP
                                    }
                                    ?>
                            </div>
                        </div>
                    </td>
                </tr>
                <?PHP
            }
            ?>
            </tbody>
            <tfoot>
            <tr>
                <th>Nº</th>
                <th>Fecha</th>
                <th>Nombre Compañia</th>
                <th>Nombre</th>
                <th>Ap. Paterno</th>
                <th>Ap. Materno</th>
                <th>Email</th>
                <th>Telefono</th>
                <th>Celular</th>
                <th>Acciones</th>
            </tr>
            </tfoot>
        </table>