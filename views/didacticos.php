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
		<link rel="stylesheet" href="css/custom2.css">
		
				<!-- jQuery -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
				<!-- Bootstrap JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
		<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
 		<script src="js/moment.min.js"></script>
 		<script src="js/underscore.min.js"></script>
 		<script src="js/clndr.js"></script>
	


		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->






	<script>
 		$(document).ready(function() {
			moment.locale('es');
 			// Make sure that your locale is Working correctly
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

			clndr = $('#full-clndr').clndr({
			    template: $('#full-clndr-template').html(),
			    events: events,
			    forceSixRows: true,

			});

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


		  
 		</script>
 		


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
								<li><a href="semblanza">LA OFA</a></li>
								<li><a href="fotos">MULTIMEDÍA</a></li>
								<li><a href="#">AMIGOS DE LA OFA</a></li>
								<li><a href="#">BLOG</a></li>
								<li><a href="contacto">CONTÁCTANOS</a></li>
							</ul>
						</div><!-- /.navbar-collapse -->
					</div>
				</nav>
				<!-- end menu1 -->
				</div>
			<div class="row header2">
			<div class="col-md-2 col-sm-4 col-xs-4 col-lg-2 col-lg-offset-1 concierto_padding2">
							<a href="/nuevo/"><img src="img/logo2.png" alt="" class="logo2 img-responsive center-block"/></a>
			</div>
			<div class="col-lg-9 col-md-10 col-sm-8 col-xs-8">
			<div class="row">
						<div class="col-md-12 col-sm-12 col-xs-10 concierto_padding">
							<h3a>CONCIERTOS</h3a>
							</div>
			</div>
			<div class="row">
			
			<div class="col-lg-12 col-md-12 col-xm-12 col-xs-12">
			
			<!-- menu1 -->
				<nav class="navbar navbar-default" role="navigation" id="menu3">
						<!-- Brand and toggle get grouped for better mobile display -->
						<div class="navbar-header">
							<button type="button" class="navbar-toggle sub" data-toggle="collapse" data-target=".navbar-ex1-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
				
						<!-- Collect the nav links, forms, and other content for toggling -->
						<div class="collapse navbar-collapse navbar-ex1-collapse">
							<ul class="nav nav-justified">
								<li><a href="conciertos">TEMPORADA</a></li>
								<li><a href="municipales">MUNICIPALES</a></li>
								<li class="active"><a href="#">DIDÁCTICOS</a></li>
								<li><a href="especiales">ESPECIALES</a></li>
							</ul>
						</div><!-- /.navbar-collapse -->
				</nav>
				<!-- end menu1 -->
				
				</div>
			</div>
			</div>
			<div class="row">
				<!--start-->


				<div class="col-xs-12 col-sm-12  col-md-12 col-lg-12 concierto">
					<img src="uploads/Concierto/main/<?=$resultado[0]->main?>" class="img-responsive center-block">
				</div>
</div>

    <!--end-->

				
			</div>
		</header>
		<!-- end slider -->
		
		<!-- menu2 -->
			<nav class="navbar navbar-inverse" id="menu2">
			<div class="container-fluid">
			
		
			    <div class="navbar-header">
			    	<button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".js-navbar-collapse">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
				</div>
				
				<div class="collapse navbar-collapse js-navbar-collapse in"  aria-expanded="true">
					<ul class="nav nav-justified">
						<li class="dropdown mega-dropdown">
							<a href="#" class="dropdown-toggle" aria-expanded="true" id="main">INFORMACIÓN GENERAL <span class="caret"></span></a>	
							<div class="dropdown-menu mega-dropdown-menu" style="display: block;">
								<ul class="wrapper">
									<li class="col-sm-3">
										<h4>Locación:</h4>
										<?=$resultado[0]->locacion?>
										<iframe src="http://maps.google.com/maps?q=<?=$resultado[0]->latitud?>,<?=$resultado[0]->longitud?>&z=15&output=embed"></iframe>
									</li>
									<?=$resultado[0]->inicio?>
									<?=$resultado[0]->duracion?>
									<li class="col-sm-3">
										<h4 class="text-center">Descarga tu Boleto</h4>
										<a href="#"><img src="uploads/Concierto/thumb/<?=$resultado[0]->boletothumb?>" onclick="window.open('uploads/Concierto/boleto/<?=$resultado[0]->boleto?>','_blank')" alt="" class="img-responsive center-block"></a>
									</li>
								</ul>	
							</div>					
						</li>
			            <li class="dropdown mega-dropdown">
			    			<a href="#" class="dropdown-toggle" aria-expanded="false">PROGRAMA <span class="caret"></span></a>				
							<div class="dropdown-menu mega-dropdown-menu suba">
								<ul class="wrapper text-white">
									<h4 style="color:white;">PROGRAMA</h4>
									<?=$resultado[0]->programa?>
									<?=$resultado[0]->notas?>
								</ul>		
							</div>		
						</li>

						<li class="dropdown mega-dropdown">
			    			<a href="#" class="dropdown-toggle" aria-expanded="false">SOLISTAS <span class="caret"></span></a>				
							<div class="dropdown-menu mega-dropdown-menu">
								<ul class="wrapper">
									<?=$resultado[0]->solista?>
								</ul>	
							</div>			
						</li>

						<li class="dropdown mega-dropdown">
			    			<a href="#" class="dropdown-toggle" aria-expanded="false">PROMOCIONALES <span class="caret"></span></a>				
							<div class="dropdown-menu mega-dropdown-menu suba">
								<ul class="wrapper">
									<li class="col-sm-6">
				    					<h4 class="text-center" onclick="window.open('uploads/Concierto/flyer/<?=$resultado[0]->flyer?>','_blank')"><a href="#">Descarga el flyer</a></h4>
									</li>
									<li class="col-sm-6">
										<h4 class="text-center" onclick="window.open('<?=$resultado[0]->video?>','_blank')"><a href="#" >Video promocional</a></h4>
									</li>
								</ul>	
							</div>			
						</li>

						<li class="dropdown mega-dropdown">
			    			<a href="#" class="dropdown-toggle" aria-expanded="false">CALENDARIO <span class="caret"></span></a>				
							<div class="dropdown-menu mega-dropdown-menu">
								<ul class="wrapper sub">
									<li class="col-sm-12 col-xs-12">
										<!-- full-clndr -->
				    					<div id="full-clndr" class="clearfix">
								          <script type="text/template" id="full-clndr-template">
								            <div class="clndr-controls">
								              <div class="clndr-previous-button">&lt;</div>
								              <div class="clndr-next-button">&gt;</div>
								              <div class="current-month"><%= month %> <%= year %></div>

								            </div>
								            <div class="clndr-grid">
								              <div class="days-of-the-week clearfix">
								                <% _.each(daysOfTheWeek, function(day) { %>
								                  <div class="header-day"><%= day %></div>
								                <% }); %>
								              </div>
								              <div class="days">
								                <% _.each(days, function(day) { %>
								                  <div class="<%= day.classes %>" id="<%= day.id %>"><span class="day-number"><%= day.day %></span></div>
								                <% }); %>
								              </div>
								            </div>
								            <div class="event-listing">
								              <div class="event-listing-title">EVENTOS ESTE MES</div>
								              <% _.each(eventsThisMonth, function(event) { %>
								                  <div class="event-item">
								                    <div class="event-item-name"><a style="color:black" href="<%= event.url %>" style><%= event.title %></a></div>
								                    <div class="event-item-location"><%= event.location %></div>
								                  </div>
								                <% }); %>
								            </div>
								          </script>
								        </div>
										<!-- end full-clndr -->
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

									</li>
								</ul>				
							</div>
						</li>
					</ul>
				</div><!-- /.nav-collapse -->
			 
			</div>
			</nav>
		<!-- end menu2 -->

		<div class="row padding_concierto">
		
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
					<a href="contacto" class="btn btn-large btn-default">SUSCRÍBETE</a>
				</div>
			</div>
		</div>
		<!-- end contact -->


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
	