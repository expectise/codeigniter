<?
					       if ($resultado){
					       	$titulo = $resultado[0]->titulo;
					       	$url = $resultado[0]->url;
					       	$id = $resultado[0]->id;
					       	$fieldId = '<input type="hidden" name="id" value="'.$id.'">';
					       	$tituloBoton = 'Editar';
					       	$tituloH = 'Edita Redes Sociales';
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


                        <form role="form" enctype="multipart/form-data" method="post" action="<?=base_url()?>RedesSociales/Editalo">
						<?=$fieldId?>

                            <div class="form-group">
                                <label>Título</label>
                                <input type="text" class="form-control" name="titulo" <?=($resultado ? 'value="'.$titulo.'"' : '')?>>
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