<div id="page-wrapper" style="height:700px;">

            <div class="container-fluid">

                <!-- Page Heading -->
<div class="row">
                    <div class="col-lg-12">

                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-edit"></i>  Edita Icono Body
                            </li>
                        </ol>
                    </div>
                </div>
<div class="row">
<div class="col-lg-3 col-lg-offset-4">
<?=($action == 'archivo' ? utf8_encode('<div class="alert alert-danger"><strong>Error al cargar el archivo, no es JPG o mide menos o más de 706 x 421 pixeles!</strong></div>') : '')?>
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
                                        <th>Titulo 2</th>
                                        <th>Imagen</th>
                                        <th>Tipo</th>
                                        <th>Editar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?
                                if ($resultado){
                                	$tipo = '';
                                	foreach($resultado as $row){
                                		Switch ($row->tipo){
                                			case 1:
                                				$tipo = utf8_encode('VIDEO DE LA SEMANA');
                                				break;
                                			
                                			case 2:
                                				$tipo = utf8_encode('GALERÍA FOTOGRÁFICA');
                                				break;
                                				
                                			case 3:
                                				$tipo = utf8_encode('BLOG');
                                				break;
                                			
                                			case 4:
                                				$tipo = utf8_encode('AMIGOS OFA');
                                				break;
                                		}
                                		
	                                    echo '<tr>';
	                                    echo '<td>'.$row->titulo.'</td>';
	                                    echo '<td>'.$row->titulo2.'</td>';
	                                    echo '<td><a href="'.base_url().'uploads/IconosMain/706px/'.$row->archivo.'" target="_new">Archivo</a></td>';
	                                    echo '<td>'.$tipo.'</td>';
	                                    echo '<td><button type="button" class="btn btn-xs btn-info" onclick="location.href = ';
	                                    echo "'".base_url()."IconosMain/EditaIconosMain/".$row->id."";
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