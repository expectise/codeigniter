<?
					       if ($resultado){
					       	$titulo = $resultado[0]->titulo;
					       	$titulo2 = $resultado[0]->titulo2;
					       	$id = $resultado[0]->id;
					       	$archivo = $resultado[0]->archivo;
					       	$fieldId = '<input type="hidden" name="id" value="'.$id.'">';
					       	$fieldarchivo = '<input type="hidden" name="archivo" value="'.$archivo.'">';
					       	$tituloBoton = 'Editar';
					       	$tituloH = 'Edita Icono Body';
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


                        <form role="form" enctype="multipart/form-data" method="post" action="<?=base_url()?>IconosMain/Editalo">
						<?=$fieldId.$fieldarchivo?>

                            <div class="form-group">
                                <label><?=utf8_encode("T�tulo")?></label>
                                <input type="text" class="form-control" name="titulo" <?=($resultado ? 'value="'.$titulo.'"' : '')?>>
                            </div>
                            
                                                       <div class="form-group">
                                <label><?=utf8_encode("T�tulo 2")?></label>
                                <input type="text" class="form-control" name="titulo2" <?=($resultado ? 'value="'.$titulo2.'"' : '')?>>
                            </div>


                        
                        <div class="form-group">
                                <label>Imagen JPG (706 x 421)</label>
                                <input type="file" name="imagen">
                            </div>
                            
                            <button type="submit" class="btn btn-default"><?=$tituloBoton?></button>

                       </form>
   

                    </div>
</div>
					


</div>
<!-- /.container-fluid -->