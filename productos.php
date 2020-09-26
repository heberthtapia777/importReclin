<?php
	/**
	 * Created by PhpStorm.
	 * User: hb-ta
	 * Date: 30/8/2020
	 * Time: 04:42
	 */
	

	# conectare la base de datos
	//$con=@mysqli_connect('localhost', 'bd_importReclin', 'M;ijiT+]k?wJ', 'bd_importReclin');
    $con=@mysqli_connect('localhost', 'root', 'mysql', 'bd_admin');
    if(!$con){
        die("imposible conectarse: ".mysqli_error($con));
    }
    if (@mysqli_connect_errno()) {
        die("Connect failed: ".mysqli_connect_errno()." : ". mysqli_connect_error());
    }
	$action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
	if($action == 'ajax'){
		include 'pagination.php'; //incluir el archivo de paginación
		//las variables de paginación
		$page = (isset($_REQUEST['page']) && !empty($_REQUEST['page']))?$_REQUEST['page']:1;
		$per_page = 9; //la cantidad de registros que desea mostrar
		$adjacents  = 4; //brecha entre páginas después de varios adyacentes
		$offset = ($page - 1) * $per_page;
		//Cuenta el número total de filas de la tabla*/
		$count_query   = mysqli_query($con,"SELECT count(*) AS numrows FROM repuesto AS r, foto AS f WHERE r.id_repuesto = f.id_repuesto ");
		if ($row= mysqli_fetch_array($count_query)){$numrows = $row['numrows'];}
		$total_pages = ceil($numrows/$per_page);
		$reload = 'index.php';
		//consulta principal para recuperar los datos
		$query = mysqli_query($con,"SELECT r.id_repuesto, f.name, r.name, r.detail FROM repuesto AS r, foto AS f  WHERE r.id_repuesto = f.id_repuesto order by r.id_repuesto LIMIT $offset,$per_page");
		
		//$sql = "SELECT r.id_repuesto, f.name, r.name, r.detail FROM repuesto AS r, foto AS f WHERE r.id_repuesto = f.id_repuesto ORDER BY (r.id_repuesto) DESC";
		
		if ($numrows>0){
			?>
			<div class="row">
			<?php
			while($row = mysqli_fetch_array($query)){
				?>
			<div class="col-md-4">
				<div class="card mt-4 mb-4 border-dark">
					<img src="admin/modulo/repuesto/uploads/files/<?=$row[1]?>" class="card-img-top img-fluid"
					     alt="<?=$row[1]?>">
					<div class="card-body">
						<h5 class="card-title subtitulo text-center"><?=$row[2]?></h5>
						<p class="card-text"><?=$row[3]?></p>
						<div class="text-center">
							<a href="detalle_del_producto?idPro=<?=$row[0];?>" class="btn btn-primary">Mas detalles...</a>
						</div>
					</div>
				</div>
			</div>
				<?php
			}
			?>
			</div>
		
			<div class="row clearfix">
                <div class="col-md-12">
                    <nav aria-label="Page navigation example">
                    <?php echo paginate($reload, $page, $total_pages, $adjacents);?>
                    </nav>
                </div>
			</div>
   
			<?php
			
		} else {
			?>
			<div class="alert alert-warning alert-dismissable">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <h4>Aviso!!!</h4> No hay datos para mostrar
            </div>
			<?php
		}
	}
?>
