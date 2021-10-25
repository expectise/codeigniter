 <div id="page-wrapper" style="height:700px;">

            <div class="container-fluid">

                <!-- Page Heading -->
<div class="row">
                    <div class="col-lg-12">

                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-edit"></i>  Nosotros
                            </li>
                        </ol>
                    </div>
                </div>
<div class="row">
<div class="col-lg-3 col-lg-offset-4">
<?=($action == 'agregado' ? utf8_encode('<div class="alert alert-success"><strong>Actualizado Correctamente!</strong></div>') : '')?>
<?=($action == 'archivo' ? utf8_encode('<div class="alert alert-danger"><strong>Error al cargar el archivo no es JPG o mide diferente a lo permitido</strong></div>') : '')?>
<?=($action == 'actualizado' ? utf8_encode('<div class="alert alert-success"><strong>Actualizado Correctamente!</strong></div>') : '')?>
<?=($action == 'borrado' ? utf8_encode('<div class="alert alert-success"><strong>El registro se ha borrado!</strong></div>') : '')?>
</div>
</div>
<div class="row">
<div class="col-lg-3 col-lg-offset-4">
<div class="form-group">
 <label>Filtrar por tipo:</label>
  <select class="form-control" id="tipo">
  	<option value="0">Todos</option>
    <option value="1" <?=($this->input->get('tipo') == 1 ? 'selected' : '')?>>Semblanza</option>
    <option value="2" <?=($this->input->get('tipo') == 2 ? 'selected' : '')?>>Mision y Visión</option>
    <option value="3" <?=($this->input->get('tipo') == 3 ? 'selected' : '')?>>Integrantes</option>
    <option value="4" <?=($this->input->get('tipo') == 4 ? 'selected' : '')?>>Director</option>
  </select>
</div>
</div>
</div>
<div class="row">
					<div class="col-lg-8 col-lg-offset-2">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Editar/Borrar</th>
                                        <th>Tipo</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?
                                if ($resultado){
                                	$tipo = "";
                                	foreach($resultado as $row){
                                		switch ($row->tipo){
                                			case 1:
                                				$tipo = "Semblanza";
                                				break;
                                			case 2:
                                				$tipo = "Misión y Visión";
                                				break;
                                			case 3:
                                				$tipo = "Integrantes";
                                				break;
                                			case 4:
                                				$tipo = "Director";
                                				break;
                                		}
	                                    echo '<tr>';
	                                    echo '<td><button type="button" class="btn btn-xs btn-info" onclick="location.href = ';
	                                    echo "'".base_url()."Nosotros/EditaNosotros/".$row->id."";
										echo "'";
										echo '">Editar</button> ';
										echo '<button type="button" class="btn btn-xs btn-info" onclick="location.href = ';
										echo "'".base_url()."Nosotros/Borrar/".$row->id."";
										echo "'";
										echo '">Borrar</button></td>';
										echo '<td>'.$tipo.'</td>';
	                                    echo '</tr>';
                                	}
                                }
                                ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
</div>
<div class="row">
<div class="col-lg-2 col-lg-offset-5">
 <?php echo $paginglinks; ?>
</div>
</div>
<div class="row">
<div class="col-lg-1 col-lg-offset-9">
<button type="Nuevo" class="btn btn-default" onclick="location.href = '<?=base_url()?>Nosotros/EditaNosotros';">Nuevo</button>
</div>
</div>

            </div>
            <!-- /.container-fluid -->