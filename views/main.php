<!DOCTYPE html>
<html lang="">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Orquesta Filarmónica de Acapulco</title>

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
		<link rel="stylesheet" href="css/vspacing.min.css">
		<link href="https://fonts.googleapis.com/css?family=Roboto|Lato" rel="stylesheet">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
		<link rel="stylesheet" href="css/animate.css">
		<link rel="stylesheet" href="css/custom.css">
				<!-- jQuery -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
	


		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->




<!-- bxSlider Javascript file -->
<script src="jquerybxslider/jquery.bxslider.min.js"></script>
<!-- bxSlider CSS file -->
<link href="jquerybxslider/jquery.bxslider.css" rel="stylesheet" />
<style type="text/css">
#quote {
    background: url(uploads/ImageBody/1920px/<?=$ImageBody['archivo']?>);
    background-size: cover;
    min-height: 440px;
    background-position: center;
}
</style>
	</head>
	<body>
	
		<!-- slider -->
		<header class="container-fluid">
			<div class="row header1">
			<div class="col-md-offset-4 col-md-4 col-sm-offset-3 col-sm-6 col-xs-offset-2 col-xs-8 header1 rotador_padding">
							<img src="img/logo.png" alt="" class="logo img-responsive center-block"/>
			</div>
			</div>
			<div class="row">
				<!--start-->


<ul class="bxslider">
<?
foreach($rotador as $rot){
	
	echo '<li><img src="uploads/Rotador/1920px/'.$rot->archivo.'" class="img-responsive"></li>';
	
}
?>
</ul>
</div>

    <!--end-->

				<!-- menu1 -->
				<nav class="navbar navbar-default" role="navigation" id="menu1">
					<div class="container-fluid">
						<!-- Brand and toggle get grouped for better mobile display -->
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
				
						<!-- Collect the nav links, forms, and other content for toggling -->
						<div class="collapse navbar-collapse navbar-ex1-collapse">
							<ul class="nav nav-justified">
								<li><a href="semblanza">LA OFA</a></li>
								<li><a href="conciertos">CONCIERTOS</a></li>
								<li><a href="fotos">MULTIMEDIA</a></li>
								<li><a href="#">AMIGOS DE LA OFA</a></li>
								<li><a href="#">BLOG</a></li>
								<li><a href="contacto">CONTACTANOS</a></li>
							</ul>
						</div><!-- /.navbar-collapse -->
					</div>
				</nav>
				<!-- end menu1 -->
			</div>
		</header>
		<!-- end slider -->
		


		<!-- events -->
		<div id="afterMenu" class="container pt40 pb40">
			<div class="row">
			<?
			foreach ($notas as $nota){
				?>
				<div class="col-md-3 col-sm-6 col-xs-12">
					<a href="nota/<?=$nota->id?>"><img src="uploads/Notas/thumb/<?=$nota->thumb?>" alt="" class="img-responsive center-block"></a>
					<a href="nota/<?=$nota->id?>" style="color:black;"><h3 class="text-center"><?=$nota->titulo?></h3></a>
					<a href="nota/<?=$nota->id?>" style="color:black;"><p class="text-center"><?=$nota->subtitulo?></p></a>
				</div>
				<?
			}
			?>
				<div class="col-md-3 col-sm-6 col-xs-12">
					<!-- mini clndr -->
					<div id="mini-clndr">
			          <script id="mini-clndr-template" type="text/template">

			            <div class="controls">
			              <div class="clndr-previous-button">&lsaquo;</div><div class="month"><%= month %></div><div class="clndr-next-button">&rsaquo;</div>
			            </div>

			            <div class="days-container">
			              <div class="days">
			                <div class="headers">
			                  <% _.each(daysOfTheWeek, function(day) { %><div class="day-header"><%= day %></div><% }); %>
			                </div>
			                <% _.each(days, function(day) { %><div class="<%= day.classes %>" id="<%= day.id %>"><%= day.day %></div><% }); %>
			              </div>
			              <div class="events">
			                <div class="headers">
			                  <div class="x-button">x</div>
			                  <div class="event-header">EVENTOS</div>
			                </div>
			                <div class="events-list">
			                  <% _.each(eventsThisMonth, function(event) { %>
			                    <div class="event">
			                      <a href="<%= event.url %>"><%= moment(event.date).format('MMMM Do') %>: <%= event.title %></a>
			                    </div>
			                  <% }); %>
			                </div>
			              </div>
			            </div>

			          </script>
			        </div><!-- end clndr -->
					<h3 class="text-center">CALENDARIO</h3>
					<p class="text-center">Consulta nuestros próximos Conciertos</p>
					<a href="uploads/Concierto/boleto/<?=$boleto?>" target="_blank" class="btn btn-default center-block">DESCARGA TU BOLETO</a>
				</div>
			</div>
		</div>
		<!-- end events -->

		<!-- quote -->
		<div id="quote" class="container-fluid pt60 pb60">
			<div class="row wrapper">
				<p class="quote text-white mb10"><?=$ImageBody['titulo']?></p>
				<p class="quoteTitle text-white mb400"><?=$ImageBody['titulo2']?></p>
				<p class="description col-md-5 col-md-offset-7 text-white"><?=$ImageBody['titulo3']?></p>
			</div>
		</div>
		<!-- end quote -->
		
		<!-- news -->
		<div class="container pt60 pb60">
			<div class="row">
				<div class="col-sm-6 col-xs-12 mb20">
					<div class="news">
						<a href="<?=$VideoSemanaData[0]->url?>" target="_blank"><img src="uploads/IconosMain/706px/<?=$VideoSemana['archivo']?>" alt="" class="img-responsive center-block"></a>
						<div class="newsTitle">
							<h4 class="text-center text-white"><?=$VideoSemana['titulo']?></h4>
						</div>
					</div>
					<p class="text-center"><?=$VideoSemana['titulo2']?></p>
				</div>
				<div class="col-sm-6 col-xs-12 mb20">
					<div class="news">
						<a href="fotos"><img src="uploads/IconosMain/706px/<?=$GaleriaFotografica['archivo']?>" alt="" class="img-responsive center-block"></a>
						<div class="newsTitle">
							<h4 class="text-center text-white"><?=$GaleriaFotografica['titulo']?></h4>
						</div>
					</div>
					<p class="text-center"><?=$GaleriaFotografica['titulo2']?></p>
				</div>
				<div class="col-sm-6 col-xs-12 mb20">
					<div class="news">
						<img src="uploads/IconosMain/706px/<?=$blog['archivo']?>" alt="" class="img-responsive center-block">
						<div class="newsTitle">
							<h4 class="text-center text-white"><?=$blog['titulo']?></h4>
						</div>
					</div>
					<p class="text-center"><?=$blog['titulo2']?></p>
				</div>
				<div class="col-sm-6 col-xs-12 mb20">
					<div class="news">
						<img src="uploads/IconosMain/706px/<?=$AmigosOfa['archivo']?>" alt="" class="img-responsive center-block">
						<div class="newsTitle">
							<h4 class="text-center text-white"><?=$AmigosOfa['titulo']?></h4>
						</div>
					</div>
					<p class="text-center"><?=$AmigosOfa['titulo2']?></p>
				</div>
			</div>
		</div>
		<!-- end news -->

		<!-- contact -->
		<div id="contact" class="container-fluid pt40 pb40 text-white">
			<div class="row wrapper">
				<div class="col-md-6">
					<h3 class="text-white">SÍGUENOS EN NUESTRAS REDES SOCIALES</h3>
					<p><i class="fa fa-facebook-square text-3em mr20" aria-hidden="true"></i><a href="<?=$FaceBookUrl?>" style="color:white;"><?=$FaceBookText?></a></p>
					<p><i class="fa fa-twitter-square text-3em mr20" aria-hidden="true"></i><a href="<?=$TwitterUrl?>" style="color:white;"><?=$TwitterText?></a></p>
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
					<a href="contacto" class="btn btn-large btn-default">SUSCRÍBETE</a>
				</div>
			</div>
		</div>
		<!-- end contact -->

		<!-- photo -->
		<div class="container-fluid pt10 pb10" id="photo">
			<div class="row">
				<img src="uploads/ImageFoot/1920px/<?=$ImageFoot?>" alt="" class="img-responsive center-block">
			</div>
		</div>
		<!-- end photo -->

		<!-- sponsors -->
		<div class="container pt20 pb20">
			<div class="row">
				<div class="col-xs-12 col-sm-6">
					<img src="img/sponsors-1.jpg" alt="" class="img-responsive center-block">
				</div>
				<div class="col-xs-12 col-sm-6">
					<img src="img/sponsors-2.jpg" alt="" class="img-responsive center-block">
				</div>
				
				
			</div>
		</div>
		<!-- end sponsors -->
		
		<!-- last picture -->
		<div class="container-fluid pt10 pb10">
			<div class="row"><img src="img/last-picture.jpg" alt="" class="img-responsive center-block"></div>
		</div>
		<!-- end last picture -->


		<!-- Bootstrap JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
		<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
 		<script src="js/moment.min.js"></script>
 		<script src="js/underscore.min.js"></script>
 		<script src="js/clndr.js"></script>
	<script>
 		$(document).ready(function() {
 			moment.locale('es');
		  	//clndr
			var clndr = {};

		  	var currentMonth = moment().format('YYYY-MM');
			var nextMonth    = moment().add('month', 1).format('YYYY-MM');
			var events = [
				<?
						$cuantos = count($calendario);
						$count = 0;
						foreach ($calendario as $cal){
							$count++;
							echo '{date: "'.$cal->fecha.'", title: "'.$cal->texto.'", url: "'.$cal->url.'"}';
							echo ($cuantos > $count ? ',' : '');
						}
			 ?>
			];

	

			$('#mini-clndr').clndr({
			    template: $('#mini-clndr-template').html(),
			    events: events,
			    clickEvents: {
			      click: function(target) {
			        if(target.events.length) {
			          var daysContainer = $('#mini-clndr').find('.days-container');
			          daysContainer.toggleClass('show-events', true);
			          $('#mini-clndr').find('.x-button').click( function() {
			            daysContainer.toggleClass('show-events', false);
			          });
			        }
			      }
			    },
			    adjacentDaysChangeMonth: true,
			    forceSixRows: true
			  });
			
		
		});

 		$('.bxslider').bxSlider({
 			  auto: true,
 			  autoStart: true
 			  });

		  
 		</script>

 		<script>
 			// Megamenu push-down
		    // On li.main hover:
		    // 1. Give it 200 milliseconds before doing anything
		    // 2. Check if another megamenu is already visible (the user is quickly going from link to link). If so, show the content of the new megamenu without any slide animation and hide the previous one. If no megamenu is currently visible and the hovered li.main has a megamenu, slide it down

		    var $siteheader = $('#menu2');
		    var $megamenu = $siteheader.find('ul li .mega-dropdown-menu');
		    var $pagecontent = $('#afterMenu');

		    // initiate timeout variables
		    hoverTimeout = "";
		    leaveTimeout = "";
		    $siteheader.find('ul li.dropdown a').on('click', function(e) {
		    	e.preventDefault();
		        var $thisMegamenu = $(this).parent().find('.mega-dropdown-menu')	        
		        // stop any leaveTimeouts if they were triggered through guick back-and-forth hovering
		        //Check whether the menu is open or not
		        var $openFlag = $(this).attr('aria-expanded');
		        // alert($openFlag);
	        	if($openFlag != "true"){
	        	$(this).attr('aria-expanded', 'true');
		        clearTimeout(leaveTimeout);
		        // 1.
		        hoverTimeout = setTimeout(function() {
		          // 2. Another megamenu already open?
		          if( $megamenu.is(':visible') ) {
		            // if new hovered li has megamenu, hide old menu and show the new, otherwise slide everything back up
		            if( $thisMegamenu.length ) {
		              // stop any other hoverTimeouts triggered through guick back-and-forth hovering
		              clearTimeout(hoverTimeout); 
		              $megamenu.filter(':visible').stop(true, true).hide();
		              //$(this).attr('aria-expanded', 'false');
		              $megamenu.parent().find('a[aria-expanded]').attr('aria-expanded', 'false');
		              $thisMegamenu.stop(true, true).show();
		              $thisMegamenu.parent().find('a[aria-expanded]').attr('aria-expanded', 'true');
		              setTimeout(function() {
		              	var $thisMegamenuHeight = $thisMegamenu.height();
		              	$thisMegamenuHeight += 30;
		              	$pagecontent.stop(true, true).animate({ paddingTop: $thisMegamenuHeight + 'px'}, 0);
		              	// alert('test');
		              }, 100);
		            } else 
		            {
		              $megamenu.filter(':visible').stop(true, true).slideUp(500);
		              $pagecontent.stop(true, true).animate({ paddingTop: '0'}, 500);
		            }
		          } else {
		            if( $thisMegamenu.length ) {
		              // stop any other hoverTimeouts triggered through guick back-and-forth hovering
		              clearTimeout(hoverTimeout); 
		              $thisMegamenu.stop(true, true).slideDown(500);
		              /* 16.5em is the set height of the megamenu + negative margin of nav ul */
		              setTimeout(function() {
		              	var $thisMegamenuHeight = $thisMegamenu.height();
		              	$thisMegamenuHeight += 30;
		              	$pagecontent.stop(true, true).animate({ paddingTop: $thisMegamenuHeight + 'px'}, 0);
		              	// alert('3');
		              }, 500);
		              
		            }
		          }
		        }, 200);
		        // alert("1");
		        }
		        // Leaving li item (if another li is hovered over quickly after, this is cleared)
			    else{

			      clearTimeout(hoverTimeout);
			      $(this).attr('aria-expanded', 'false');
			      leaveTimeout = setTimeout(function() {
			        if( $megamenu.is(':visible') ) {
			          $megamenu.filter(':visible').stop(true, true).slideUp(500);
			          $pagecontent.stop(true, true).animate({ paddingTop: '0'}, 500);
			        }
			      }, 200);
			      // alert("2");
				}


		    }

		    );
		    
 		</script>


	</body>
</html>
	