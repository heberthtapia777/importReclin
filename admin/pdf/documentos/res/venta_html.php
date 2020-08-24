<style type="text/css">
<!--
table { vertical-align: top; }
tr    { vertical-align: top; }
td    { vertical-align: top; }
table.page_footer {width: 100%; border: none; background-color: white; padding: 2mm;border-collapse:collapse; border: none;}
.odd {
    background: #E7E7E7;
    padding:10mm;
}
.even{
    padding:4mm;
}
-->
</style>
<?php
    date_default_timezone_set("America/La_Paz" );
?>
<page backtop="15mm" backbottom="15mm" backleft="15mm" backright="15mm" style="font-size: 12pt; font-family: arial" >
        <page_footer>
        <table class="page_footer">
            <tr>

                <td style="width: 50%; text-align: left">
                    P&aacute;gina [[page_cu]]/[[page_nb]]
                </td>
                <td style="width: 50%; text-align: right">
                    &copy; <? echo "tractorepuestoscat.com "; echo  $anio=date('Y'); ?>
                </td>
            </tr>
        </table>
    </page_footer>
    <table cellspacing="0" style="width: 100%;">
        <tr>

            <td style="width: 50%; color: #444444;">
                <img style="width: 100%;" src="../../../img/logo.jpg" alt="Logo"><br>

            </td>
			<td style="width: 50%;text-align:right">
			PROFORMA Nº <? echo $op->ceros($idX,4);?>
			</td>

        </tr>
    </table>
    <br>
    <table cellspacing="0" style="width: 100%; text-align: left; font-size: 10pt;">
		<tr>
		<td style="width:50%;"><strong>Dirección:</strong> <br><?=$suc['nameSuc']?> - <?=$suc['address']?><br><br> <strong>Teléfono.:</strong> (591)2222-2222</td>

		</tr>
	</table>

	<table cellspacing="0" style="width: 100%; text-align: left; font-size: 11pt;">
		<tr>
			<td style="width: 100%;text-align:right">
			<strong>Fecha:</strong> <? echo date("d-m-Y");?>
			</td>
		</tr>
	</table>
    <br>

    <table cellspacing="0" style="width: 100%; text-align: left; font-size: 11pt;">
        <tr>

            <td style="width:15%; "><strong>Cliente:</strong></td>
            <td style="width:50%; text-transform: capitalize;"><? echo $cliente; ?> </td>
			<td style="width:15%;text-align:right"><strong>Teléfono:</strong></td>
			<td style="width:20%">&nbsp;<? echo $phone; ?> </td>
        </tr>
        <tr>

            <td style="width:15%; "><strong>Email:</strong></td>
            <td style="width:50%"><? echo $email; ?></td>
        </tr>

    </table>
    <br>
    <table cellspacing="0" style="width: 100%; text-align: left;font-size: 11pt">
        <tr>
             <td style="width:100%; ">Detalle de Venta.</td>
        </tr>
    </table>
    <br>
    <table cellspacing="0" style="width: 100%; border: solid 1px black; background: #E7E7E7; text-align: center; font-size: 10pt;padding:2mm;">
        <tr>
            <th style="width: 10%">#</th>
            <th style="width: 30%">NOMBRE</th>
            <th style="width: 30%">CANTIDAD</th>
            <th style="width: 15%">PRECIO UNIT.</th>
            <th style="width: 15%">MONTO TOTAL</th>
        </tr>
    </table>

    <table cellspacing="0" style="width: 100%; border: solid 1px black;  text-align: center; font-size: 11pt;">
<?php
    $sumador_total = 0;

    $sqlQuery   = "SELECT * FROM compra AS c, compraRepuesto AS cr, repuesto AS r WHERE c.id_compra = ".$idX." AND c.id_compra = cr.id_compra AND cr.id_repuesto = r.id_repuesto";

    $sql    = $db->Execute($sqlQuery);

    $C = 0;

    while ($row = $sql->FetchRow()){

        $c++;

        $numRep = $row['numParte'];
        $name   = $row['name'];
        $cant   = $row['cantidad'];
        $price  = $row['price'];
        $monto  = $cant*$price;

        $subTotal   = $row['subTotal'];
        $descuento  = $row['descuento'];
        $total      = $row['total'];

        $monto  = number_format($monto,2);

        $condiciones = "Al Contado";

    if( ($c % 2) == 0 )
        $fila = 'odd';
    else
        $fila = 'even';
	?>

        <tr class="<?=$fila;?>">
            <td style="width: 10%; text-align: center; padding:1.5mm;"><?=$c;?></td>
            <td style="width: 30%; text-align: center; padding:1.5mm;"><?=$name;?></td>
            <td style="width: 30%; text-align: center; padding:1.5mm;"><?=$cant;?></td>
            <td style="width: 15%; text-align: right; padding:1.5mm;"><?=$price;?></td>
            <td style="width: 15%; text-align: right; padding:1.5mm;"><?=$monto;?></td>
        </tr>

	<?php
	}

    $total = ($subTotal - $subTotal*($descuento/100));
    ?>
    </table>
<br>
    <table cellspacing="0" style="width: 100%; border-top: dashed 1px ececec; background: #E7E7E7; text-align: center; font-size: 11pt;padding:1mm;">
        <tr>
            <th style="width: 87%; text-align: right;">SUBTOTAL : </th>
            <th style="width: 13%; text-align: right;">Bs.- <? echo number_format($subTotal,2);?></th>
        </tr>
    </table>
    <table cellspacing="0" style="width: 100%; border-top: dashed 1px ececec; background: #E7E7E7; text-align: center; font-size: 11pt;padding:1mm;">
        <tr>
            <th style="width: 87%; text-align: right;">DESCUENTO : </th>
            <th style="width: 13%; text-align: right;"><? echo number_format($descuento,2);?> %</th>
        </tr>
    </table>
    <table cellspacing="0" style="width: 100%; border-top: dashed 1px ececec; background: #E7E7E7; text-align: center; font-size: 11pt;padding:1mm;">
        <tr>
            <th style="width: 87%; text-align: right;">TOTAL : </th>
            <th style="width: 13%; text-align: right;">Bs.- <? echo number_format($total,2);?></th>
        </tr>
    </table>
	*** Precios incluyen IVA ***

	<br><br>
          <table cellspacing="0" style="width: 100%; text-align: left; font-size: 11pt;">
            <tr>
                <td style="width:50%;text-align:right">Condiciones de pago: </td>
                <td style="width:50%; ">&nbsp;<? echo $condiciones; ?></td>
            </tr>
        </table>
    <br><br><br><br>


	  <table cellspacing="10" style="width: 100%; text-align: left; font-size: 11pt;">
			 <tr>
                <td style="width:33%;text-align: center;border-top:solid 1px"><?=$op->toSelect($_SESSION['cargo']);?><br><?=$nameEmp;?></td>
               <td style="width:33%;"></td>
               <td style="width:33%;text-align: center;border-top:solid 1px">Aceptado Cliente</td>
            </tr>
        </table>

</page>
