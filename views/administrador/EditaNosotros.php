<?
if ($resultado){
	$id = $resultado[0]->id;
	$nota = $resultado[0]->nota;

	$foto = $resultado[0]->foto;
	$tipo= $resultado[0]->tipo;
	
	$fieldId = '<input type="hidden" name="id" value="'.$id.'">';
	$fieldfoto = '<input type="hidden" name="foto" value="'.$foto.'">';
	
	
	
	$tituloBoton = 'Editar';
	$tituloH = 'Edita Nosotros';
}else{
	$fieldId = '';
	$fieldthumb = '';
	$fieldfoto = '';
	$titulo = '';
	$subtitulo = '';
	$nota = '';
	
	$tituloBoton = 'Agregar';
	$tituloH = 'Nuevo Nosotros';
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


                        <form role="form" enctype="multipart/form-data" method="post" action="<?=base_url()?>Nosotros/AgregaNosotros">
						<?=$fieldId.$fieldfoto?>
						
                             <label>Tipo:</label>
						  <select class="form-control" id="tipo" name="tipo">
						    <option value="1" <?=($tipo == 1 ? 'selected' : '')?>>Semblanza</option>
						    <option value="2" <?=($tipo == 2 ? 'selected' : '')?>>Misión y Visión</option>
						    <option value="3" <?=($tipo == 3 ? 'selected' : '')?>>Integrantes</option>
						    <option value="4" <?=($tipo == 4 ? 'selected' : '')?>>Director</option>
						  </select>
						  
                              <div class="form-group">
                                <label>Nota</label>
                                <textarea class="form-control" rows="6" name="nota"><?=($resultado ? $nota: '')?></textarea>
                  
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