<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Panel de Control</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?=($tipo != 'index' ? '../' : '') ?><?=($offset > 0 ? '../' : '')?>css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?=($tipo != 'index' ? '../' : '') ?><?=($offset > 0 ? '../' : '')?>css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="<?=($tipo != 'index' ? '../' : '') ?><?=($offset > 0 ? '../' : '')?>css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?=($tipo != 'index' ? '../' : '') ?><?=($offset > 0 ? '../' : '')?>font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    
 <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
						<script>
						   <? if ($class == 'Concierto' && $tipo == "index"){ ?>
						   $(document).on('change','#tipo',function(){
							    if (this.value == 0){
							    	window.location.replace("<?=base_url()?>Concierto");
							    }else{
							    	window.location.replace("<?=base_url()?>Concierto?tipo="+this.value);
							    }
							});
						   <? } ?>


						   <? if ($class == 'Nosotros' && $tipo == "index"){ ?>
						   $(document).on('change','#tipo',function(){
							    if (this.value == 0){
							    	window.location.replace("<?=base_url()?>Nosotros");
							    }else{
							    	window.location.replace("<?=base_url()?>Nosotros?tipo="+this.value);
							    }
							});
						   <? } ?>
						   
					       $(function () {
					       	$("#date").datepicker({ dateFormat: 'yy-mm-dd' }).val();
					       });
					
					    </script>
</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
   
                <li class="dropdown">
                    <a href="<?=base_url()?>Administrador/logout"><i class="fa fa-user"></i> Salir</a>
                </li>
            </ul>