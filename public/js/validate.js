// Validate Form
//=============================================
function validateForm(f) {

    var form = f;
    var returnValue = true;

    for (var i = 0; i < form.elements.length; i++) {
        if (!form.elements[i].value.length) {
            returnValue = false;
            break;
        }
    }
    return returnValue;
}