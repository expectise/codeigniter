<div id="page-wrapper" style="height:700px;">

            <div class="container-fluid">

                <!-- Page Heading -->
<div class="row">
                    <div class="col-lg-12">

                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-edit"></i>  Fotos
                            </li>
                        </ol>
                    </div>
                </div>
<div class="row">
<div class="col-lg-3 col-lg-offset-4">
<?=($action == 'agregado' ? utf8_encode('<div class="alert alert-success"><strong>Actualizado Correctamente!</strong></div>') : '')?>
<?=($action == 'archivo' ? utf8_encode('<div class="alert alert-danger"><strong>Error al cargar el archivo, no es JPG o mide menos o más de 1045 x 695 pixeles!</strong></div>') : '')?>
<?=($action == 'actualizado' ? utf8_encode('<div class="alert alert-success"><strong>Actualizado Correctamente!</strong></div>') : '')?>
<?=($action == 'borrado' ? utf8_encode('<div class="alert alert-success"><strong>El registro se ha borrado!</strong></div>') : '')?>
</div>
</div>
<div class="row">
					<div class="col-lg-8 col-lg-offset-2">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Titulo</th>
                                        <th>Imagen</th>
                                        <th>Editar/Borrar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?
                                if ($resultado){
                                	foreach($resultado as $row){
	                                    echo '<tr>';
	                                    echo '<td>'.$row->titulo.'</td>';
	                                    echo '<td><a href="'.base_url().'uploads/Fotos/1045px/'.$row->archivo.'" target="_new">Archivo</a></td>';
	                                    echo '<td><button type="button" class="btn btn-xs btn-info" onclick="location.href = ';
	                                    echo "'".base_url()."Foto/NuevoFoto/".$row->id."";
										echo "'";
										echo '">Editar</button> ';
										echo '<button type="button" class="btn btn-xs btn-info" onclick="location.href = ';
										echo "'".base_url()."Foto/Borrar/".$row->id."";
										echo "'";
										echo '">Borrar</button></td>';
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
<button type="Nuevo" class="btn btn-default" onclick="location.href = '<?=base_url()?>Foto/NuevoFoto';">Nuevo</button>
</div>
</div>

            </div>
            <!-- /.container-fluid -->