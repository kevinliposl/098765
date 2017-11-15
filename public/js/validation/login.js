
$('#form-email').change(function () {
    $('#permissions').val(0);
});


$("#submit").click(function () {

    var email = $('#form-email').val().trim();
    var password = $('#form-password').val().trim();

    if (!/\w+@\w+\.+[a-z]/.test(email) || email.split(' ', 2).length > 1) {
        $('#failed-email').attr('data-notify-msg', '<i class=icon-remove-sign></i> Correo Incorrecto. Complete correctamente e intente de nuevo!');
        SEMICOLON.widget.notifications($('#failed-email'));
        return false;
    }
    if (password.length < 1 || email.split(' ', 2).length > 1) {
        $('#failed-password').attr('data-notify-msg', '<i class=icon-remove-sign></i> Contrase&ncaron;a Incorrecta. Complete correctamente e intente de nuevo!');
        SEMICOLON.widget.notifications($('#failed-password'));
        return false;
    }

    if ($('#permissions').val() <= 0) {
        $('#permissions').val(1);

        var parameters = {
            'email': email,
            'password': password
        };
        $.post('?controller=User&action=logIn', parameters, function (data) {
            if (data.result === '0') {
                $('#failed').attr({
                    'data-notify-msg': '<i class=icon-warning-sign></i> Correo o Contrase&ncaron;a Incorrectos. Complete correctamente e intente de nuevo!'
                });
                $('#permissions').val(0);
                SEMICOLON.widget.notifications($('#failed'));
            } else if (data.result === '1') {
                location.href = '?';
            } else if (data[0].permissions) {
                for (var i = 0; i < data.length; i++) {
                    var per;
                    data[i].permissions === 'A' ? per = 'Administrador' : data[i].permissions === 'S' ? per = 'Estudiante' : per = 'Profesor';
                    $('#form-permissions').append($("<option></option>").attr("value", data[i].permissions).text(per));
                }
                $('#div-permissions').css('display', 'block');
                $('#permissions').val(2);
            }
        }, 'json');
    }
    if ($('#permissions').val() >= 2) {
        if ($('#form-permissions').val()) {
            var param = {
                'permissions': $('#form-permissions').val()
            };
            $.post('?controller=User&action=setPermissions', param, function (data) {
                location.href = '?';
            }, 'json');
        } else {
            $('#failed-permissions').attr('data-notify-msg', '<i class=icon-remove-sign></i> Seleccione un Rol. Complete correctamente e intente de nuevo!');
            SEMICOLON.widget.notifications($('#failed-permissions'));
        }
        ;
    }
    ;
});


