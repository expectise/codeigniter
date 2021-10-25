<div id="page-wrapper" style="height:700px;">

            <div class="container-fluid">

                <!-- Page Heading -->
<div class="row">
                    <div class="col-lg-12">

                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-edit"></i>  Edita Redes Sociales
                            </li>
                        </ol>
                    </div>
                </div>
<div class="row">
<div class="col-lg-3 col-lg-offset-4">
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
                                        <th>Url</th>
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
                                			case 7:
                                				$tipo = "Twitter";
                                				break;
                                				
                                			case 8:
                                				$tipo = "Facebook";
                                				break;
                                				
                                			case 9:
                                				$tipo = "Youtube";
                                				break;
                                		}
                                		
	                                    echo '<tr>';
	                                    echo '<td>'.$row->titulo.'</td>';
	                                    echo '<td>'.$row->url.'</td>';
	                                    echo '<td>'.$tipo.'</td>';
	                                    echo '<td><button type="button" class="btn btn-xs btn-info" onclick="location.href = ';
	                                    echo "'".base_url()."RedesSociales/EditaRedes/".$row->id."";
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