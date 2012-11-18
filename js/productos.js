                            $(document).on('ready', function(){
                                $.getJSON('includes/json.php?products=all', function(products) {
                                    var productList = '';
                                    for (var product in products)
                                        productList += '<span data-prod="' + products[product].id + '" class="red-micro">' + products[product].nombre + '</span><br />\n';
                                    $('#productos-list').html(productList);
                                    $('div#productos-list span').eq(0).trigger('click');
                                });
                                $('#producto-small a').lightBox({
                                    fixedNavigation:false,
                                    price: $('#descripcion-producto').attr('data-amount'),
                                    offer: $('#data-offer').html(),
                                    title: $('div#productos-list span').attr('data-prod', $(this).attr('rel')).html(),
                                    details: $('#descripcion-producto').html(),
                                    priceBlocks: true
                                });
                            });
                            $('div#productos-list span').live('click', function(){
                                var $this = $(this);
                                $('div#productos-list span').removeClass().addClass('red-micro');
                                $this.removeClass().addClass('white-micro');
                                $.getJSON('includes/json.php?product_id=' + $this.attr('data-prod'), function(product) {
                                    $('#producto-small').html('\
                                        <a href="images/productos/producto-' + product.id + '-big.png">\n\
                                            <img src="images/productos/producto-' + product.id + '-small.jpg"/>\n\
                                        </a>');
                                    $('#descripcion-producto').html(product.descripcion).text();
                                    $('#descripcion-producto').attr('data-amount', 'S/.' + product.precio);
                                    $('#data-offer').html(product.oferta).text();
                                    $('#producto-small a').lightBox({
                                        fixedNavigation:false,
                                        price: $('#descripcion-producto').attr('data-amount'),
                                        offer: $('#data-offer').html(),
                                        title: $this.text(),
                                        details: $('#descripcion-producto').html(),
                                        priceBlocks: true
                                    });
                                });
                            });