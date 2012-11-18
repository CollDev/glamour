            $(function() {
                $('.scroll-pane').jScrollPane({
                    verticalDragMaxHeight: 49,
                    verticalDragMinHeight: 49,
                    showArrows: false
                });
                var time = 3000;
                var slides = $('.slide');
                var numberSlides = slides.length;
                var slideWidth = $('.slide').width();
                var wrap = $('#bannerWrap')

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
                moveMent();	
            });