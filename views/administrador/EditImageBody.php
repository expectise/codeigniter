<?
					       if ($resultado){
					       	$titulo = $resultado[0]->titulo;
					       	$titulo2 = $resultado[0]->titulo2;
					       	$titulo3 = $resultado[0]->titulo3;
					       	$id = $resultado[0]->id;
					       	$archivo = $resultado[0]->archivo;
					       	$fieldId = '<input type="hidden" name="id" value="'.$id.'">';
					       	$fieldarchivo = '<input type="hidden" name="archivo" value="'.$archivo.'">';
					       	$tituloBoton = 'Editar';
					       	$tituloH = 'Edita Imagen cuerpo de p�gina';
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


                        <form role="form" enctype="multipart/form-data" method="post" action="<?=base_url()?>ImageBody/Editalo">
						<?=$fieldId.$fieldarchivo?>

                            <div class="form-group">
                                <label>Título</label>
                                <input type="text" class="form-control" name="titulo" <?=($resultado ? 'value="'.$titulo.'"' : '')?>>
                            </div>
                            
                                                   <div class="form-group">
                                <label>Sub Título</label>
                                <input type="text" class="form-control" name="titulo2" <?=($resultado ? 'value="'.$titulo2.'"' : '')?>>
                            </div>
                            
                                                                               <div class="form-group">
                                <label>Sub Título 2</label>
                                <input type="text" class="form-control" name="titulo3" <?=($resultado ? 'value="'.$titulo3.'"' : '')?>>
                            </div>
                  


                        
                        <div class="form-group">
                                <label>Imagen JPG (1920 x 762)</label>
                                <input type="file" name="imagen">
                            </div>
                            
                            <button type="submit" class="btn btn-default"><?=$tituloBoton?></button>

                       </form>
   

                    </div>
</div>
					


</div>
<!-- /.container-fluid -->