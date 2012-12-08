<?php if(isset($_GET['option']))
    $option = $_GET['option'];
else $option = ''; ?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <link type="text/css" href="http://fonts.googleapis.com/css?family=Pontano+Sans" rel="stylesheet" media="all">
        <link type="text/css" href="http://css.glamourspa.pe/styles.css" rel="stylesheet" media="all" />
        <link type="text/css" href="http://css.glamourspa.pe/sprites.css" rel="stylesheet" media="all" />
        <link type="text/css" href="http://css.glamourspa.pe/lib/jScrollPane.css" rel="stylesheet" media="all" />
        <link type="text/css" href="http://css.glamourspa.pe/lib/jquery.lightbox-0.5.css" rel="stylesheet" media="all" />
        <link type="text/css" href="http://css.glamourspa.pe/lib/html5audio2.css" rel="stylesheet" media="all" />
        
        <style type="text/css" id="page-css">
<?php
        if ($option == 'productos') {
?>
            .jspVerticalBar {
                left: 0;
            }
            .jspTrack{
                background: url("http://images.glamourspa.pe/scroll-area-small.png") no-repeat;
            }
            .scroll-pane {
                width: 180px;
                height: 153px;
                overflow: auto;
            }
<?php
        }else{
?>
            .scroll-pane {
                width: 676px;
                height: 182px;
                padding-left: 20px;
                overflow: auto;
            }            
<?php
        }
?>
        </style>
    </head>
    
    <body>
    	<div id="canvas">
            <div id="wrapper">
                <div id="fail" class="modal-message" style="display: none;">
                    <div></div>
                </div>
                <div id="success" class="modal-message" style="display: none;">
                    <div></div>
                </div>
                <div id="warning" class="modal-message" style="display: none;">
                    <div></div>
                </div>
                <div id="notice" class="modal-message" style="display: none;">
                    <div></div>
                </div>
                <div id="main">
                    <div id="left">
                        <div id="main-menu" class="sprite">
                            <div id="logo" class="sprite"></div>
                            <nav>
                                <a href="/"><div id="inicio" class="sprite"><?php if ($option == '') { ?><div></div><?php } ?></div></a>
                                <a href="/quienes-somos"><div id="quienes-somos" class="sprite"><?php if ($option == 'quienes-somos') { ?><div></div><?php } ?></div></a>
                                <a href="/staff"><div id="staff" class="sprite"><?php if ($option == 'staff') { ?><div></div><?php } ?></div></a>
                                <a href="/servicios"><div id="servicios" class="sprite"><?php if ($option == 'servicios') { ?><div></div><?php } ?></div></a>
                                <a href="/productos"><div id="productos" class="sprite"><?php if ($option == 'productos') { ?><div></div><?php } ?></div></a>
                                <a href="/contactos"><div id="contactos" class="sprite"><?php if ($option == 'contactos') { ?><div></div><?php } ?></div></a>
                                <a href="/ubiquenos"><div id="ubiquenos" class="sprite"><?php if ($option == 'ubiquenos') { ?><div></div><?php } ?></div></a>
                            </nav>
                        </div>
                        <div id="actual" class="sprite actual-<?php if ($option == '') echo 'inicio'; else echo $option; ?>"></div>
                        <div id="info">
                            <div class="red-small">Información técnica:</div>
                            <span class="white-micro">Nuestros productos buscan brindarte la mayor satisfacción para que te permitan mantener tu imágen de forma permanete con calidad, garantía y </span><span class="red-micro">el uso de las mejores marcas del medio.</span>
                        </div>
                        <div id="down-separator" class="sprite"></div>
                    </div>
                    <div id="right">
                        <header>
                            <div id="controls">
    <?php
                    require_once 'contenido/player.html';
    ?>
                            </div>
                            <aside>
                                <a href="/"><div id="home" class="sprite"></div></a>
                                <a href="#"><div id="favoritos" class="sprite"></div></a>
                                <a href="#"><div id="contactenos" class="sprite"></div></a>
                            </aside>
                        </header>
                        <div id="bannerContainer">
                            <div id="bannerWrap">
    <?php
                            switch ($option) {
                                case 'staff':
                                    $slides = 10;
                                    break;
                                case 'ubiquenos':
                                    $slides = 5;
                                    break;
                                default:
                                    $slides = 6;
                                    break;
                            }
                            for ($i = 0; $i < $slides + 1; ++$i) {
    ?>
                                <div class="slide <?php if ($option == '') echo 'inicio'; else echo $option; ?> ban-<?php if ($i == $slides) echo 1; else echo $i + 1 ?>"></div>
    <?php
                            }
    ?>
                            </div>
                        </div>
                        <div id="banner-number">
                            <a href="/"><div id="s-1" class="sprite s-1<?php if ($option == '') { ?>-active<?php } ?>"></div></a>
                            <a href="/quienes-somos"><div id="s-2" class="sprite s-2<?php if ($option == 'quienes-somos') { ?>-active<?php } ?>"></div></a>
                            <a href="/staff"><div id="s-3" class="sprite s-3<?php if ($option == 'staff') { ?>-active<?php } ?>"></div></a>
                            <a href="/servicios"><div id="s-4" class="sprite s-4<?php if ($option == 'servicios') { ?>-active<?php } ?>"></div></a>
                            <a href="/productos"><div id="s-5" class="sprite s-5<?php if ($option == 'productos') { ?>-active<?php } ?>"></div></a>
                            <a href="/contactos"><div id="s-6" class="sprite s-6<?php if ($option == 'contactos') { ?>-active<?php } ?>"></div></a>
                            <a href="/ubiquenos"><div id="s-7" class="sprite s-7<?php if ($option == 'ubiquenos') { ?>-active<?php } ?>"></div></a>
                        </div>
                        <div id="container">
    <?php
                        if ($option == '') $require = 'inicio';
                        else $require = $option;
                        require_once 'contenido/' . $require . '.html';
    ?>
                        </div>
                    </div>
                </div>
                <footer>
                    <div id="left-foot">
                        <div class="sprite"></div>
                        <span id="promo-title" class="red-font">Promociones 24-09-2012:</span>
                        <span class="promo white">Laceado Japones</span> <span class="price red-font">20 soles</span>
                        <span class="promo white">Tinte especial Koleston</span> <span class="price red-font">35 soles</span>
                        <span class="promo white">Permanente</span> <span class="price red-font">23 soles</span>
                    </div>
                    <div id="mid-foot">
                        <div class="sprite"></div>
                        <span id="address-1">
                            Ca. Loma linda 272<br />
                            Dpto. 201<br />
                            Urb. Prol. Benavides - Santiago de Surco<br />
                            e-mail: <span class="red-font">glamoursalon@gmail.com</span>
                        </span>
                    </div>
                    <div id="right-foot">
                        <div id="findus-down" class="sprite"></div>
                        <div id="facebook" class="sprite"></div>
                        <div id="youtube" class="sprite"></div>
                        <div id="twitter" class="sprite"></div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
        <script type="text/javascript" src="http://js.glamourspa.pe/lib/jquery.mousewheel.js"></script>
        <script type="text/javascript" src="http://js.glamourspa.pe/lib/jquery.jscrollpane.min.js"></script>
<?php
        switch ($option) {
            case 'productos':
?>
        <script type="text/javascript" src="http://js.glamourspa.pe/lib/jquery.lightbox-0.5.js"></script>
        <script type="text/javascript" src="http://js.glamourspa.pe/lib/reflection.js"></script>
        <script type="text/javascript" src="http://js.glamourspa.pe/productos.js"></script>
<?php
                break;
            case 'contactos':
?>
        <script type="text/javascript" src="http://js.glamourspa.pe/contactos.js"></script>
<?php
                break;
            case 'ubiquenos':
?>
        <script type="text/javascript" src="http://js.glamourspa.pe/lib/jquery.lightbox-0.5.js"></script>
        <script type="text/javascript" src="http://js.glamourspa.pe/lib/reflection.js"></script>
        <script type="text/javascript" src="http://js.glamourspa.pe/ubiquenos.js"></script>
<?php
                break;
            default:
?>
        <script type="text/javascript" src="http://js.glamourspa.pe/inicio.js"></script>
<?php
        }
?>
        <script type="text/javascript" src="http://js.glamourspa.pe/lib/soundmanager2-nodebug-jsmin.js" ></script>
        <script type="text/javascript" src="http://js.glamourspa.pe/lib/jquery.html5audio.min.js"></script>
        <script type="text/javascript" src="http://js.glamourspa.pe/lib/jquery.apPlaylistManager.min.js"></script>
        <script type="text/javascript" src="http://js.glamourspa.pe/lib/jquery.apTextScroller.min.js"></script>
        <script type="text/javascript" src="http://js.glamourspa.pe/mediaPlayer.js"></script>
        <script type="text/javascript">
            var time = 3000,
                slides = $('.slide'),
                numberSlides = slides.length,
                slideWidth = $('.slide').width(),
                wrap = $('#bannerWrap');

            wrap.width(numberSlides * slideWidth);

            function moveMent() {
                for (r = 0; r < 100; r++) {
                    for (i = 0; i < numberSlides - 1; i++) {
                        wrap
                            .delay(time)
                            .animate({				 
                                left : '-=651px'
                            })
                    }
                    wrap.animate({
                        left : '0'
                    },0);
                }
            };
            $(window).on('load', function(){
                moveMent();
            })
        </script>
    </body>
</html>