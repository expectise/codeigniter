<?
if ($resultado){
	$id = $resultado[0]->id;
	$titulo = $resultado[0]->titulo;
	$subtitulo = $resultado[0]->subtitulo;
	$nota = $resultado[0]->nota;



	
	$thumb = $resultado[0]->thumb;
	$foto = $resultado[0]->foto;
	
	$fieldId = '<input type="hidden" name="id" value="'.$id.'">';
	$fieldthumb = '<input type="hidden" name="thumb" value="'.$thumb.'">';
	$fieldfoto = '<input type="hidden" name="foto" value="'.$foto.'">';
	
	
	
	$tituloBoton = 'Editar';
	$tituloH = 'Edita Concierto';
}else{
	$fieldId = '';
	$fieldthumb = '';
	$fieldfoto = '';
	$titulo = '';
	$subtitulo = '';
	$nota = '';
	
	$tituloBoton = 'Agregar';
	$tituloH = 'Nueva Nota';
}
?>
<div id="page-wrapper" style="height:100%">
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


                        <form role="form" enctype="multipart/form-data" method="post" action="<?=base_url()?>Notas/AgregaNota">
						<?=$fieldId.$fieldthumb.$fieldfoto?>

                            <div class="form-group">
                                <label>Título</label>
                                <input type="text" class="form-control" name="titulo" <?=($resultado ? 'value="'.$titulo.'"' : '')?>>
                            </div>
                            
                             <div class="form-group">
                                <label>Sub Título</label>
                                <input type="text" class="form-control" name="subtitulo" <?=($resultado ? 'value="'.$subtitulo.'"' : '')?>>
                            </div>
                            
                              <div class="form-group">
                                <label>Nota</label>
                                <textarea class="form-control" rows="6" name="nota"><?=($resultado ? $nota: '')?></textarea>
                  
                            </div>
                             
                        
                        <div class="form-group">
                                <label>Thumbnail JPG (348px x 256px)</label>
                                <input type="file" name="fileThumb">
                            </div>
                            
                          <div class="form-group">
                                <label>Foto JPG (1920px x 760px)</label>
                                <input type="file" name="fileFoto">
                            </div>
                            
                            
                            
                            
                            <button type="submit" class="btn btn-default"><?=$tituloBoton?></button>

                       </form>
   

                    </div>
</div>
					


</div>
<!-- /.container-fluid -->