<!DOCTYPE html>
<html lang="">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Orquesta Filarmónica de Acapulco</title>

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
<link rel="stylesheet" href="../css/vspacing.min.css">
<link href="https://fonts.googleapis.com/css?family=Roboto|Lato" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
<link rel="stylesheet" href="../css/animate.css">
<link rel="stylesheet" href="../css/custom2.css">

<!-- jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<!-- Bootstrap JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->



<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->


</head>
<body>

<header class="container-fluid">
<div class="row">
<!-- menu1 -->
<nav class="navbar navbar-default" role="navigation" id="menu4">
<div class="container-fluid">
<!-- Brand and toggle get grouped for better mobile display -->
<div class="navbar-header">
<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex4-collapse">
<span class="sr-only">Toggle navigation</span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
</button>
</div>

<!-- Collect the nav links, forms, and other content for toggling -->
<div class="collapse navbar-collapse navbar-ex4-collapse">
<ul class="nav nav-justified">
<li><a href="../semblanza">LA OFA</a></li>
<li><a href="../fotos">MULTIMEDÍA</a></li>
<li><a href="#">AMIGOS DE LA OFA</a></li>
<li><a href="#">BLOG</a></li>
<li><a href="../contacto">CONTÁCTANOS</a></li>
</ul>
</div><!-- /.navbar-collapse -->
</div>
</nav>

</div>
<div class="row header2">
			<div class="col-md-2 col-sm-4 col-xs-4 col-lg-2 col-lg-offset-1 concierto_padding2">
							<a href="../../nuevo/"><img src="../img/logo2.png" alt="" class="logo2 img-responsive center-block"/></a>
			</div>
			<div class="col-lg-9 col-md-10 col-sm-8 col-xs-8">
			<div class="row">
						<div class="col-md-12 col-sm-12 col-xs-10 concierto_padding">
							<h3a><?=$nota[0]->titulo?></h3a>
							<h2a><?=$nota[0]->subtitulo?></h2a>
							</div>
			</div>
</div>
<div class="row">
<!--start-->


<div class="col-xs-12 col-sm-12  col-md-12 col-lg-12 concierto">
<img src="../uploads/Notas/foto/<?=$nota[0]->foto?>" class="img-responsive center-block">
</div>
</div>
<div class="row gray">

</div>

<div class="row nota_padding">
<div class="col-xs-12 col-sm-12 col-lg-12">
<?=$nota[0]->nota?>
</div>
</div>

<!--end-->



</div>
</header>

		<div class="row">
		
		</div>


		<!-- contact -->
		<div id="contact" class="container-fluid pt40 pb40 text-white">
			<div class="row wrapper">
				<div class="col-md-6">
					<h3 class="text-white">SÍGUENOS EN NUESTRAS REDES SOCIALES</h3>
					<p><i class="fa fa-facebook-square text-3em mr20" aria-hidden="true"></i><a href="<?=$FaceBookUrl?>" style="color:white;"><?=$FaceBookText?></a></p>
					<p><i class="fa fa-twitter-square text-3em mr20" aria-hidden="true"></i><a href="<?=$TwitterUrl?>"  style="color:white;"><?=$TwitterText?></a></p>
					<p><i class="fa fa-youtube-square text-3em mr20" aria-hidden="true"></i><a href="<?=$youtubeUrl?>" style="color:white;"><?=$youtubeText?></a></p>

				</div>
				<div class="col-md-6 text-right">
					<h3 class="text-white">CONTÁCTANOS</h3>
					<p>Oficinas:</p>
					<p>Av. Costera Miguel Alemán #4455</p>
					<p>Tel: 484 4854 y 481 2935</p>
					<p>contacto@ofa.org.mx</p>
					<p></p>
					<p>SUSCRÍBETE Y RECIBE  NUESTRAS NOTICIAS</p>
					<p>ANTES QUE NADIE</p>
					<a href="../contacto" class="btn btn-large btn-default">SUSCRÍBETE</a>
				</div>
			</div>
		</div>
		<!-- end contact -->


		<!-- sponsors -->
		<div class="container pt20 pb20">
			<div class="row">
				<div class="col-xs-12 col-sm-6">
					<img src="../img/sponsors-1.jpg" alt="" class="img-responsive center-block">
				</div>
				<div class="col-xs-12 col-sm-6">
					<img src="../img/sponsors-2.jpg" alt="" class="img-responsive center-block">
				</div>
				
				
			</div>
		</div>
		<!-- end sponsors -->
		
		<!-- last picture -->
		<div class="container-fluid pt10 pb10">
			<div class="row"><img src="../img/last-picture.jpg" alt="" class="img-responsive center-block"></div>
		</div>
		<!-- end last picture -->





 		

	</body>
</html>
	