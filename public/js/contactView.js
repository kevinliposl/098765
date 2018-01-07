function val() {
    var parameters = {
        'form-name': $("#form-name").val(),
        'form-email': $("#form-email").val().trim(),
        'form-phone': $("#form-phone").val().trim(),
        'form-service': $("#form-service").val().trim(),
        'form-subject': $("#form-subject").val().trim(),
        'form-message': $("#form-message").val().trim()
    };

    SEMICOLON.widget.notifications($("#wait"));

    $.post("?controller=Index&action=contactSendEmail", parameters, function (data) {
        if (data.result === "1") {
            SEMICOLON.widget.notifications($("#success"));
            setTimeout("location.href = '?';", 1500);
        } else {
            SEMICOLON.widget.notifications($("#warning"));
        }
    }, "json");
    return false;
}

$('#google-map').gMap({
    address: 'Fusión Academia de Música, Turrialba, Provincia de Cartago, Costa Rica',
    maptype: 'ROADMAP',
    zoom: 15,
    markers: [
        {
            address: "Fusión Academia de Música, Turrialba, Provincia de Cartago, Costa Rica",
            html: '<div style="width: 300px;"><h4 style="margin-bottom: 8px;">¡Hola <span>viajero!</span></h4><p class="nobottommargin">Est&aacute es nuestra <strong>ubicaci&oacuten</strong> fisica.</p></div>',
            icon: {
                image: "public/images/icons/map-icon-red.png",
                iconsize: [32, 39],
                iconanchor: [32, 39]
            }
        }
    ],
    doubleclickzoom: true,
    controls: {
        panControl: true,
        zoomControl: true,
        mapTypeControl: true,
        scaleControl: false,
        streetViewControl: false,
        overviewMapControl: false
    }
});
