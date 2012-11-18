                            $(document).on("ready", function() {
                                $('.error').hide();
                                $("label").width(72);
                                $(".button").live('click', function(e) {
                                    e.preventDefault();
                                    var nombre     = $("input#nombre"),
                                        apellidos  = $("input#apellidos"),
                                        telefono   = $("input#telefono"),
                                        direccion  = $("input#direccion"),
                                        email      = $("input#email"),
                                        comentario = $("textarea#comentario")
                                    if (nombre.val() == "") {
                                        /*$("label#nombre_error").show(e,setTimeout(function(){
                                            $("label#nombre_error").hide, 1000;
                                        }));*/
                                        nombre.focus();
                                    } else if (apellidos.val() == "") {
                                        //$("label#apellidose_error").show();
                                        apellidos.focus();
                                    } else if (telefono.val() == "") {
                                        //$("label#telefono_error").show();
                                        telefono.focus();
                                    } else if (direccion.val() == "") {
                                        //$("label#direccion_error").show();
                                        direccion.focus();
                                    } else if (email.val() == "") {
                                        //$("label#email_error").show();
                                        email.focus();
                                    } else if (comentario.val() == "") {
                                        //$("label#comentario_error").show();
                                        comentario.focus();
                                    }
                                });
                            });