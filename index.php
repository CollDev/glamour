<?php
session_start();
if(isset($_GET['option']))
    $option = $_GET['option'];
else $option = '';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link href='http://fonts.googleapis.com/css?family=ABeeZee' rel='stylesheet' type='text/css'>
        <!-- styles needed by jScrollPane - include in your own sites -->
        <link type="text/css" href="css/styles.css" rel="stylesheet" media="all" />
        <link type="text/css" href="css/sprites.css" rel="stylesheet" media="all" />
        <link type="text/css" href="css/jScrollPane.css" rel="stylesheet" media="all" />
        <style type="text/css" id="page-css">
            /* Styles specific to this particular page */
            .scroll-pane {
                width: 676px;
                height: 190px;
                padding-left: 20px;
                overflow: auto;
            }
        </style>
        <!-- latest jQuery direct from google's CDN -->
        <script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/jquery.lightbox-0.5.pack.js"></script>
        <!-- the mousewheel plugin -->
        <script type="text/javascript" src="js/jquery.mousewheel.js"></script>
        <!-- the jScrollPane script -->
        <script type="text/javascript" src="js/jquery.jscrollpane.min.js"></script>
        <script id="sourcecode" type="text/javascript">
            $(function() {
                $('.scroll-pane').jScrollPane({
                    verticalDragMaxHeight: 49,
                    verticalDragMinHeight: 49,
                    showArrows: false
                });
            });
        </script>
<link rel="stylesheet" type="text/css" href="css/jquery.lightbox-0.5.css" media="screen" />
    </head>
    
    <body>
    	<div id="canvas">
            <div id="main">
                <div id="left">
                    <div id="main-menu" class="sprite">
                        <div id="logo" class="sprite"></div>
                        <div id="options">
                            <a href="/"><div id="inicio" class="sprite"><?php if ($option == '') { ?><div></div><?php } ?></div></a>
                            <a href="/quienes-somos"><div id="quienes-somos" class="sprite"><?php if ($option == 'quienes-somos') { ?><div></div><?php } ?></div></a>
                            <a href="/staff"><div id="staff" class="sprite"><?php if ($option == 'staff') { ?><div></div><?php } ?></div></a>
                            <a href="/servicios"><div id="servicios" class="sprite"><?php if ($option == 'servicios') { ?><div></div><?php } ?></div></a>
                            <a href="/productos"><div id="productos" class="sprite"><?php if ($option == 'productos') { ?><div></div><?php } ?></div></a>
                            <a href="/contactos"><div id="contactos" class="sprite"><?php if ($option == 'contactos') { ?><div></div><?php } ?></div></a>
                            <a href="/ubiquenos"><div id="ubiquenos" class="sprite"><?php if ($option == 'ubiquenos') { ?><div></div><?php } ?></div></a>
                        </div>
                    </div>
                    <div id="actual" class="sprite actual-<?php if ($option == '') echo 'inicio'; else echo $option; ?>"></div>
                    <div id="info">
                        <div class="red-small">Información técnica:</div>
                        <span class="white-micro">Nuestros productos buscan brindarte la mayor satisfacción para que te permitan mantener tu imágen de forma permanete con calidad, garantía y </span><span class="red-micro">el uso de las mejores marcas del medio.</span>
                    </div>
                    <div id="down-separator" class="sprite"></div>
                </div>
                <div id="right">
                    <div id="top-head">
                        <div id="controls"></div>
                        <div id="top-menu">
                            <a href="#"><div id="home" class="sprite"></div></a>
                            <a href="#"><div id="favoritos" class="sprite"></div></a>
                            <a href="#"><div id="contactenos" class="sprite"></div></a>
                        </div>
                    </div>
                    <div id="banner" class="banner ban-<?php if ($option == '') echo 'inicio'; else echo $option; ?>"><div class="sprite"></div></div>
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
                            require_once 'content/' . $require . '.html';
                        ?>
                    </div>
                </div>
            </div>
            <div id="footer">
                <div id="left-foot">
                    <div class="sprite"></div>
                    <span id="promo-title" class="red-font">Promociones 24-09-2012:</span><br />
                    <span id="promo-1" class="white">Laceado Japones</span> <span id="promo-1-price" class="red-font">20 soles</span><br />
                    <span id="promo-2" class="white">Tinte especial Koleston</span> <span id="promo-2-price" class="red-font">35 soles</span><br />
                    <span id="promo-3" class="white">Permanente</span> <span id="promo-3-price" class="red-font">23 soles</span><br />
                    <span id="promo-4" class="white">Pedicure francés</span> <span id="promo-4-price" class="red-font">35 soles</span>
                </div>
                <div id="mid-foot">
                    <div class="sprite"></div>
                    <span id="address-1">
                    Ca. Loma linda 272<br />
                    Dpto. 201<br />
                    Urb. Prol. Benavides - Santiago de Surco<br />
                    e-mail: <span class="red-font">glamoursalon@gmail.com</span></span>
                    

                </div>
                <div id="right-foot">
                    <div id="findus-down" class="sprite"></div>
                    <div id="facebook" class="sprite"></div>
                    <div id="youtube" class="sprite"></div>
                    <div id="twitter" class="sprite"></div>
                </div>
            </div>
        </div>
    </body>
</html>

