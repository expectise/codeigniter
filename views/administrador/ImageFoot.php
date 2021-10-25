<div id="page-wrapper" style="height:700px;">

            <div class="container-fluid">

                <!-- Page Heading -->
<div class="row">
                    <div class="col-lg-12">

                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-edit"></i>  <?=utf8_encode('Edita Imagen pie de página')?>
                            </li>
                        </ol>
                    </div>
                </div>
<div class="row">
<div class="col-lg-3 col-lg-offset-4">
<?=($action == 'archivo' ? utf8_encode('<div class="alert alert-danger"><strong>Error al cargar el archivo, no es JPG o mide menos o más de 1920 x 466 pixeles!</strong></div>') : '')?>
<?=($action == 'actualizado' ? utf8_encode('<div class="alert alert-success"><strong>Actualizado Correctamente!</strong></div>') : '')?>

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
                                        <th>Tipo</th>
                                        <th>Editar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?
                                if ($resultado){
                                	
                                	foreach($resultado as $row){
	                                    echo '<tr>';
	                                    echo '<td>'.$row->titulo.'</td>';
	                                    echo '<td><a href="'.base_url().'uploads/ImageFoot/1920px/'.$row->archivo.'" target="_new">Archivo</a></td>';
	                                    echo '<td>'.utf8_encode('Imágen de pie de página').'</td>';
	                                    echo '<td><button type="button" class="btn btn-xs btn-info" onclick="location.href = ';
	                                    echo "'".base_url()."ImageFoot/EditaImageFoot/".$row->id."";
										echo "'";
										echo '">Editar</button> ';
	                                    echo '</tr>';
                                	}
                                }
                                ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
</div>

            </div>
            <!-- /.container-fluid -->