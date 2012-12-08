                            $(function() {
                                $("label").width(72);
                                $(".button").live('click', function(e) {
                                    e.preventDefault();
                                    var nombre       = $("input#nombre"),
                                        apellidos    = $("input#apellidos"),
                                        telefono     = $("input#telefono"),
                                        email        = $("input#email"),
                                        comentario   = $("textarea#comentario"),
                                        nameRegex    = /^[a-zA-Z]+(([\'\,\.\- ][a-zA-Z ])?[a-zA-Z]*)*$/,
                                        phoneRegex   = /[0-9-()+]{3,20}/,
                                        emailRegex   = /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/;

                                    if (nombre.val() == "") {
                                        inlineMsg('nombre','Debe ingresar su nombre.',3);
                                        nombre.focus();
                                        return false;
                                    } else if(!nombre.val().match(nameRegex)) {
                                        inlineMsg('nombre','Ha ingresado un nombre no válido.',3);
                                        nombre.focus();
                                        return false;
                                    } else if (apellidos.val() != '' && !apellidos.val().match(nameRegex)) {
                                        inlineMsg('apellidos','Ha ingresado un apellido no válido.',3);
                                        apellidos.focus();
                                        return false;
                                    } else if (telefono.val() != '' && !telefono.val().match(phoneRegex)) {
                                        inlineMsg('telefono','Ha ingresado un teléfono no válido.',3);
                                        telefono.focus();
                                        return false;
                                    } else if (email.val() == "") {
                                        inlineMsg('email','Debe ingresar su correo electrónico.',3);
                                        email.focus();
                                        return false;
                                    } else if (!email.val().match(emailRegex)) {
                                        inlineMsg('email','Ha ingresado un correo no válido.',3);
                                        email.focus();
                                        return false;
                                    } else if (comentario.val() == "") {
                                        inlineMsg('comentario','Debe ingresar un comentario.',3);
                                        comentario.focus();
                                        return false;
                                    }
                                    $form = $('form');
                                    $.ajax({
                                        type: "POST",
                                        url: $form.attr("action"),
                                        data: $form.serialize(),
                                        dataType: "json"
                                    }).done(function(data){
                                        var response = data.responseCode == 200 ? 'success' : 'fail';
                                        $("#" + response).append($("<span />").text(data.response)).slideDown(500, function(){
                                            setTimeout(function(){
                                                $("#" + response).slideUp(1000, function() {
                                                    $("#" + response + ' span').remove();
                                                });
                                            }, 1500);
                                        });
                                        if (response == 'success') {
                                            $form.each (function(){
                                                this.reset();
                                            });
                                        }
                                    });
                                });
                            });
                            
var MSGTIMER = 20,
    MSGSPEED = 5,
    MSGOFFSET = 3,
    MSGHIDE = 3;

// build out the divs, set attributes and call the fade function //
function inlineMsg(target,string,autohide) {
    var msg;
    var msgcontent;
    if(!document.getElementById('msg')) {
        msg = document.createElement('div');
        msg.id = 'msg';
        msgcontent = document.createElement('div');
        msgcontent.id = 'msgcontent';
        document.body.appendChild(msg);
        msg.appendChild(msgcontent);
        msg.style.filter = 'alpha(opacity=0)';
        msg.style.opacity = 0;
        msg.alpha = 0;
    } else {
        msg = document.getElementById('msg');
        msgcontent = document.getElementById('msgcontent');
    }
    msgcontent.innerHTML = string;
    msg.style.display = 'block';
    var msgheight = msg.offsetHeight;
    var targetdiv = document.getElementById(target);
    targetdiv.focus();
    var targetheight = targetdiv.offsetHeight;
    var targetwidth = targetdiv.offsetWidth;
    var topposition = topPosition(targetdiv) - ((msgheight - targetheight) / 2);
    var leftposition = leftPosition(targetdiv) + targetwidth + MSGOFFSET;
    msg.style.top = topposition + 'px';
    msg.style.left = leftposition + 'px';
    clearInterval(msg.timer);
    msg.timer = setInterval("fadeMsg(1)", MSGTIMER);
    if(!autohide) {
        autohide = MSGHIDE;  
    }
    window.setTimeout("hideMsg()", (autohide * 1000));
}

// hide the form alert //
function hideMsg(msg) {
    var msg = document.getElementById('msg');
    if(!msg.timer) {
        msg.timer = setInterval("fadeMsg(0)", MSGTIMER);
    }
}

// face the message box //
function fadeMsg(flag) {
    if(flag == null) {
        flag = 1;
    }
    var msg = document.getElementById('msg');
    var value;
    if(flag == 1) {
        value = msg.alpha + MSGSPEED;
    } else {
        value = msg.alpha - MSGSPEED;
    }
    msg.alpha = value;
    msg.style.opacity = (value / 100);
    msg.style.filter = 'alpha(opacity=' + value + ')';
    if(value >= 99) {
        clearInterval(msg.timer);
        msg.timer = null;
    } else if(value <= 1) {
        msg.style.display = "none";
        clearInterval(msg.timer);
    }
}

// calculate the position of the element in relation to the left of the browser //
function leftPosition(target) {
    var left = 0;
    if(target.offsetParent) {
        while(1) {
            left += target.offsetLeft;
            if(!target.offsetParent) {
                  break;
            }
            target = target.offsetParent;
        }
    } else if(target.x) {
        left += target.x;
    }
    return left;
}

// calculate the position of the element in relation to the top of the browser window //
function topPosition(target) {
    var top = 0;
    if(target.offsetParent) {
        while(1) {
            top += target.offsetTop;
            if(!target.offsetParent) {
                break;
            }
            target = target.offsetParent;
        }
    } else if(target.y) {
        top += target.y;
    }
    return top;
}

// preload the arrow //
if(document.images) {
  arrow = new Image(7,80); 
  arrow.src = "../images/msg_arrow.gif"; 
}