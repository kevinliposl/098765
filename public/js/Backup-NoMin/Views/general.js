window.fbAsyncInit = function () {
    FB.init({
        appId: '2016568741962286',
        xfbml: true,
        version: 'v2.11'
    });

    FB.AppEvents.logPageView();

};

(function (d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) {
        return;
    }
    js = d.createElement(s);
    js.id = id;
    js.src = "https://connect.facebook.net/en_LA/sdk.js";
    fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));


$(document).ready(function () {
    $('#datatable').DataTable();
});
$(document).ready(function () {
    $('.bt-editable').editable();
});
$("#form-submit").click(function () {
    $('#form-submit').attr('data-target', '#myModal');
});
$(document).ready(function () {
    $('.bt-editable').editable();
    $('.bt-group').editable({
        showbuttons: false,
        source: [
            {value: 1, text: 'M'},
            {value: 2, text: 'F'}
        ]
    });
});