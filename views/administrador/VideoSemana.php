<div id="page-wrapper" style="height:700px;">

            <div class="container-fluid">

                <!-- Page Heading -->
<div class="row">
                    <div class="col-lg-12">

                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-edit"></i> Video de la semana
                            </li>
                        </ol>
                    </div>
                </div>
<div class="row">
<div class="col-lg-3 col-lg-offset-4">
<?=($action == 'agregado' ? '<div class="alert alert-success"><strong>Actualizado Correctamente!</strong></div>' : '')?>
<?=($action == 'actualizado' ? '<div class="alert alert-success"><strong>Actualizado Correctamente!</strong></div>' : '')?>
<?=($action == 'borrado' ? '<div class="alert alert-success"><strong>El registro se ha borrado!</strong></div>' : '')?>
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
                                        <th>Editar/Borrar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?
                                if ($resultado){
                                	foreach($resultado as $row){
	                                    echo '<tr>';
	                                    echo '<td>'.$row->titulo.'</td>';
	                                    echo '<td>'.$row->url.'</td>';
	                                    echo '<td><button type="button" class="btn btn-xs btn-info" onclick="location.href = ';
	                                    echo "'".base_url()."VideoSemana/NuevoVideo/".$row->id."";
										echo "'";
										echo '">Editar</button> ';
										echo '<button type="button" class="btn btn-xs btn-info" onclick="location.href = ';
										echo "'".base_url()."VideoSemana/Borrar/".$row->id."";
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
<button type="Nuevo" class="btn btn-default" onclick="location.href = '<?=base_url()?>VideoSemana/NuevoVideo';">Nuevo</button>
</div>
</div>

            </div>
            <!-- /.container-fluid -->