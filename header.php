<!DOCTYPE html>
<html lang="de"><!-- use class="debug" here if you develope a template and want to check-->
<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0" />
   	<!-- some meta tags, important for SEO"--> 
    <meta name="description" content="AsistenTIC. Sistema de control de asistencia y convivencia escolar mediante c&oacute;digos QR" />
    <meta name="keywords" content="asistentic, QR, QR codes, c&oacute;digos QR, asistencia, escolar, colegios, escuelas, control, sistema, celulares, m&oacute;viles, tabletas, tablets, responsive, disciplina" />
    <meta name="revisit-after" content="7 days" />
    <meta name="robots" content="index,follow" />
	
	<title><?php echo $title ?></title>			
            
            <link rel="stylesheet" href="css/inuit.css" />
            <link rel="stylesheet" href="css/fluid-grid16-1100px.css" />
            <link rel="stylesheet" href="css/eve-styles.css" />
            <link rel="stylesheet" href="css/estilo.css" />
            <link rel="stylesheet" href="css/formalize.css" /><!--include that only on pages with forms-->
            <link rel="shortcut icon" href="img/favicon.jpg" />
            <link rel="apple-touch-icon-precomposed" href="img/favicon.jpg" />
            
            <script src="js/respond-min.js" type="text/javascript"></script>
            <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js" type="text/javascript"></script>
            <script>window.jQuery || document.write('<script src="scripts/jquery164min.js">\x3C/script>')</script><!--local fallback for JQuery-->
			<script src="js/jquery.flexslider-min.js" type="text/javascript"></script>
            <link rel="stylesheet" href="css/flexslider.css" />
            
            <script type="text/javascript">
				  $(window).load(function() {
					$('.flexslider').flexslider({
						  animation: "slide",<!--you can also choose fade here-->
						  directionNav: false,<!--Attention: if you choose true here, the nav-buttons will also appear in the ticker! -->
						  keyboardNav: true,
						  mousewheel: true
					});
				  });
				</script>
               
                    <!--Hide the hr img because of ugly borders in IE7. You can change the color of border-top to display a line -->
                    <!--[if lte IE 7]>

                        <style>
                    		hr { display:block; height:1px; border:0; border-top:1px solid #fff; margin:1em 0; padding:0; }
                            .grid-4{ width:22% }
                        </style>
                    <![endif]-->

</head>
<!--========================================  Logo, social and menu ========================================================--> 

<body>
	<div class="wrapper">	
                    <a href="/" id="logo"><img src="img/banner.png" alt="AsistenTIC" width="292" height="140" /></a>
                   
                   <!--These are just samples, use your own icons. If you use larger ones, make sure too change the css-file to fit them in.
                       Dont´t forget to place your links -->
                    <div class="social">
                    <a href="http://www.facebook.com/asistentic" title="facebook" target="_blank"><img src="img/facebook.png" width="20" height="20" alt="facebook"></a>
                    <a href="http://twitter.com/asistentic" title="twitter" target="_blank"><img src="img/twitter.png" width="20" height="20" alt="twitter"></a>                    
                    </div>
                 
                    
                    <ul id="nav" class="main">                        
                        <li><a href="asistentic">Qu&eacute; es AsistenTIC</a></li>
                		<li><a href="quienes-somos">Qui&eacute;nes Somos</a></li>
                        <li><a href="contacto">Contacto</a></li>
                        <li><a href="acceso">Acceder</a></li>                        
                    </ul>
                    
            
        </div><!--end of wrapper div-->    
	<div class="clear"></div>