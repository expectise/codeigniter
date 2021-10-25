					       <?
					       if ($resultado){
					       	$id = $resultado[0]->id;
					       	$fecha = $resultado[0]->fecha;
					       	$texto = $resultado[0]->texto;
					       	$url = $resultado[0]->url;
					       	$fieldId = '<input type="hidden" name="id" value="'.$id.'">';
					       	$tituloBoton = 'Editar';
					       	$tituloH = 'Edita Calendario';
					       }else{
					       	$fieldId = '';
					       	$fecha = '';
					       	$texto = '';
					       	$url = '';
					       	$tituloBoton = 'Agregar';
					       	$tituloH = 'Nuevo Calendario';
					       }
				       ?>

<div id="page-wrapper" style="height:700px;">
<div class="container-fluid">

                <!-- Page Heading -->
<div class="row">
                    <div class="col-lg-12">

                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-edit"></i>  <?=$tituloH?>
                            </li>
                        </ol>
                    </div>
                </div>

<div class="row">
					<div class="col-lg-6 col-lg-offset-3">


                        <form role="form" enctype="multipart/form-data" method="post" action="<?=base_url()?>Calendario/AgregaCalendario">
						<?=$fieldId?>
                            <div class="form-group">
                                <label>Fecha</label>
                                <input type="text" class="form-control" id="date" name="fecha" <?=($resultado ? 'value="'.$fecha.'"' : '')?>>
                            </div>
                            
                             <div class="form-group">
                                <label>Texto</label>
                                <input type="text" class="form-control" name="texto" <?=($resultado ? 'value="'.$texto.'"' : '')?>>
                            </div>
                            
                             <div class="form-group">
                                <label>Url</label>
                                <input type="text" class="form-control" name="url" <?=($resultado ? 'value="'.$url.'"' : '')?>>
                            </div>


                        
                       
                            
                            <button type="submit" class="btn btn-default"><?=$tituloBoton?></button>

                       </form>
   

                    </div>
</div>
					


</div>
<!-- /.container-fluid -->