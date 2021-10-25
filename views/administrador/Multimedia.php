<div id="page-wrapper" style="height:700px;">

            <div class="container-fluid">

                <!-- Page Heading -->
<div class="row">
                    <div class="col-lg-12">

                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-edit"></i>  Edita Imagen Multimedia / Contactos
                            </li>
                        </ol>
                    </div>
                </div>
<div class="row">
<div class="col-lg-3 col-lg-offset-4">
<?=($action == 'archivo' ? '<div class="alert alert-danger"><strong>Error al cargar el archivo, no es JPG o mide menos o más de 1920 pixeles!</strong></div>' : '')?>
<?=($action == 'actualizado' ? '<div class="alert alert-success"><strong>Actualizado Correctamente!</strong></div>' : '')?>

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
                                		
                                		Switch ($row->tipo){
                                			case 20:
                                				$tipo = "Cintillo Fotografías";
                                				break;
                                				
                                			case 21:
                                				$tipo = "Cintillo Videos";
                                				break;
                                				
                                			case 22:
                                				$tipo = "Cintillo Contacto";
                                				break;
                                		}
                                		
	                                    echo '<tr>';
	                                    echo '<td>'.$row->titulo.'</td>';
	                                    echo '<td><a href="'.base_url().'uploads/Multimedia/1920px/'.$row->archivo.'" target="_new">Archivo</a></td>';
	                                    echo '<td>'.$tipo.'</td>';
	                                    echo '<td><button type="button" class="btn btn-xs btn-info" onclick="location.href = ';
	                                    echo "'".base_url()."Multimedia/EditaMultimedia/".$row->id."";
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