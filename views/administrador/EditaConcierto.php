<?
if ($resultado){
	$id = $resultado[0]->id;
	$titulo = $resultado[0]->titulo;
	$locacion = $resultado[0]->locacion;
	$latitud = $resultado[0]->latitud;
	$longitud = $resultado[0]->longitud;
	$inicio = $resultado[0]->inicio;
	$duracion = $resultado[0]->duracion;
	$programa = $resultado[0]->programa;
	$notas = $resultado[0]->notas;
	$solista = $resultado[0]->solista;
	$video = $resultado[0]->video;

	$main = $resultado[0]->main;
	$boletothumb = $resultado[0]->boletothumb;
	$boleto = $resultado[0]->boleto;
	$flyer= $resultado[0]->flyer;
	$tipo= $resultado[0]->tipo;
	
	$fieldId = '<input type="hidden" name="id" value="'.$id.'">';
	$fieldboletothumb = '<input type="hidden" name="boletothumb" value="'.$boletothumb.'">';
	$fieldboleto = '<input type="hidden" name="boleto" value="'.$boleto.'">';
	$fieldflyer = '<input type="hidden" name="flyer" value="'.$flyer.'">';
	$fieldMain = '<input type="hidden" name="main" value="'.$main.'">';
	
	$tituloBoton = 'Editar';
	$tituloH = 'Edita Concierto';
}else{
	$fieldId = '';
	$fieldboletothumb = '';
	$fieldboleto = '';
	$fieldflyer = '';
	$fieldMain = '';
	$tituloBoton = 'Agregar';
	$tituloH = 'Nuevo Concierto';
	$tipo='';
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


                        <form role="form" enctype="multipart/form-data" method="post" action="<?=base_url()?>Concierto/AgregaConcierto">
						<?=$fieldId.$fieldboletothumb.$fieldboleto.$fieldflyer.$fieldMain?>
						
						 <label>Tipo:</label>
						  <select class="form-control" id="tipo" name="tipo">
						    <option value="1" <?=($tipo == 1 ? 'selected' : '')?>>Temporada</option>
						    <option value="2" <?=($tipo == 2 ? 'selected' : '')?>>Municipales</option>
						    <option value="3" <?=($tipo == 3 ? 'selected' : '')?>>Didácticos</option>
						    <option value="4" <?=($tipo == 4 ? 'selected' : '')?>>Especiales</option>
						  </select>

                            <div class="form-group">
                                <label>Título</label>
                                <input type="text" class="form-control" name="titulo" <?=($resultado ? 'value="'.$titulo.'"' : '')?>>
                            </div>
                            
                              <div class="form-group">
                                <label>Imagen Principal(1920 x 760)</label>
                                <input type="file" name="fileMain">
                            </div>
                            
                             <div class="form-group">
                                <label>Locación</label>
                                <textarea class="form-control" rows="3" name="locacion"><?=($resultado ? $locacion : '')?></textarea>
                              
                            </div>
                            
                            <div class="form-group">
                                <label>Latitud</label>
                                <input type="text" class="form-control" name="latitud" <?=($resultado ? 'value="'.$latitud.'"' : '')?>>
                            </div>
                            
                             <div class="form-group">
                                <label>Longitud</label>
                                <input type="text" class="form-control" name="longitud" <?=($resultado ? 'value="'.$longitud.'"' : '')?>>
                            </div>
                            
                         <div class="form-group">
                                <label>Inicio</label>
                                <textarea class="form-control" rows="3" name="inicio"><?=($resultado ? $inicio : '')?></textarea>
                              
                            </div>
                            
                            <div class="form-group">
                                <label>Duración</label>
                                <textarea class="form-control" rows="3" name="duracion"><?=($resultado ? $duracion: '')?></textarea>
                  
                            </div>


                        
                        <div class="form-group">
                                <label>Boleto Thumb JPG (183 x 366)</label>
                                <input type="file" name="fileThumb">
                            </div>
                            
                          <div class="form-group">
                                <label>Boleto</label>
                                <input type="file" name="fileBoleto">
                            </div>
                            
                            
                            <div class="form-group">
                                <label>Programa</label>
                                <textarea class="form-control" rows="3" name="programa"><?=($resultado ? $programa : '')?></textarea>  
                            </div>
                            
                            <div class="form-group">
                                <label>Notas</label>
                                <textarea class="form-control" rows="3" name="notas"><?=($resultado ? $notas : '')?></textarea>  
                            </div>
                            
                           <div class="form-group">
                                <label>Solista</label>
                                <textarea class="form-control" rows="3" name="solista"><?=($resultado ? $solista : '')?></textarea>  
                            </div>
                            
                         <div class="form-group">
                                <label>Flyer</label>
                                <input type="file" name="fileFlyer">
                         </div>
                         
                            <div class="form-group">
                                <label>Video</label>
                                <input type="text" class="form-control" name="video" <?=($resultado ? 'value="'.$video.'"' : '')?>>
                            </div>
                            
                            <button type="submit" class="btn btn-default"><?=$tituloBoton?></button>

                       </form>
   

                    </div>
</div>
					


</div>
<!-- /.container-fluid -->