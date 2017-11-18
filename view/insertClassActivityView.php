<?php
$session = SSession::getInstance();

if (isset($session->permissions)) {
    if ($session->permissions == 'T') {
        include_once 'public/headerProfessor.php';
    } else {
        header("Location:?controller=Index&action=notFound");
    }
} else {
    include_once 'public/header.php';
}
?>

<!-- Page Title
============================================= -->
<section id="page-title">

    <div class="container clearfix">
        <h1>Registrar Actividad y Asistencia en Clase</h1>
    </div>
</section><!-- #page-title end -->

<!-- Content
============================================= -->
<section id="content">
    <div class="content-wrap">
        <div class="container clearfix">
            <div class="accordion-lg divcenter nobottommargin " style="max-width: 550px;">
                <div class="acctitle">
                    <div class="acc_content clearfix">
                        <form id="form" class="nobottommargin">                            
                            <div class="white-section">
                                <label for="form-courses">Cursos Disponibles:</label>
                                <select id="form-courses" class="selectpicker form-control" data-live-search="true">
                                    <option value="-1" data-tokens="">Seleccione un Curso</option>
                                    <?php
                                    foreach ($vars as $var) {
                                        if (isset($var["ID"])) {
                                            ?>
                                            <option value="<?php echo $var["ID"] ?> " data-tokens="">
                                                <?php echo $var["name"] ?>
                                            </option>
                                            <?php
                                        }
                                    }
                                    ?>
                                </select>
                                <input type="hidden" id="failed-form-courses" data-notify-type= "error" data-notify-position="bottom-full-width"/>
                            </div>
                            <br>
                            <div class="white-section">
                                <label for="form-student">Estudiantes Disponibles:</label>
                                <select id="form-student" class="form-control selectpicker" data-live-search="true">
                                    <option value="-1" data-tokens="">Seleccione un Estudiante</option>
                                </select>
                                <input type="hidden" id="failed-form-student" data-notify-type= "error" data-notify-position="bottom-full-width"/>
                            </div>                          
                            <div class="col_full">
                                <label for="form-consecutive">Consecutivo de Actividad:</label>
                                <input type="text" id="form-consecutive" class="form-control" readonly="readonly" />
                                <input type="hidden" id="failed-consecutive" data-notify-type= "error" data-notify-position="bottom-full-width"/>
                            </div>
                            <div class="col_full">
                                <label for="form-date">Fecha de Realizaci&oacute;n:</label>
                                <input type="date" id="form-date" class="form-control" required/>
                                <input type="hidden" id="failed-date" data-notify-type= "error" data-notify-position="bottom-full-width"/>
                            </div>
                            <div class="col_full">
                                <label for="form-typeId">Control de Asistencia:</label>
                                <input type="radio" name="form-typeA" value="P" checked/><label>Puntual</label>
                                <input type="radio" name="form-typeA" value="I"/> <label>Ausencia Injustificada</label>
                                <input type="radio" name="form-typeA" value="J"/><label>Ausencia Justificada</label>
                            </div>
                            <br>
                            <div class="col_full">
                                <label for="form-content">Contenido de Clase:</label>
                                <input type="text" id="form-content" class="form-control" required/>
                                <input type="hidden" id="failed-content" data-notify-type= "error" data-notify-position="bottom-full-width"/>
                            </div>
                            <br>
                            <div class="col_full nobottommargin">
                                <a id="form-save"  class="button button-3d button-black nomargin" style="display : block; text-align: center;" >Guardar Contenido</a>
                                <input type="hidden" id="warning" value="w"/>
                                <input type="hidden" id="success" value="s"/>
                                <input type="hidden" id="failed" value="f"/>
                            </div> 
                            <br>
                            <div class="white-section" style="text-align: center;">
                                <label for="form-addContent" >Contenidos Agregados</label>
                                <input type="hidden" id="failed-addContent" data-notify-type= "error" data-notify-position="bottom-full-width"/>
                            </div> 
                            <br>
                            <div class="table-responsive">
                                <table  class="table table-bordered table-striped" style="clear: both;">
                                    <tbody id="bodyTable">
                                        <tr>
                                            <th  width="55%" style="text-align: center;">Actividades</th>
                                            <th width="10%" style="text-align: center;">Acci&oacute;n</th>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <br>
                            <div class="col_full">
                                <label for="form-observation">Observaci&oacute;n General:</label>
                                <input type="text" rows="4" cols="50"    id="form-observation" class="form-control" required/>
                                <input type="hidden" id="failed-observation" data-notify-type= "error" data-notify-position="bottom-full-width"/>
                            </div>
                            <div class="col_full nobottommargin">
                                <a id="form-submit" data-toggle="modal" class="button button-3d button-black nomargin" style="display : block; text-align: center;" data-target="#myModal">Insertar</a>
                                <input type="hidden" id="warning" value="w"/>
                                <input type="hidden" id="success" value="s"/>
                                <input type="hidden" id="failed" value="f"/>
                            </div>  
                        </form>
                    </div>
                </div>
            </div>
        </div>
</section><!-- #content end -->

<!--MODAL -->
<a id="showModal" style="display: none;"class="button button-3d button-black nomargin" data-target="#myModal" data-toggle="modal">Modal</a>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-body">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">¡Aviso!</h4>
                </div>
                <div class="modal-body">
                    <h4 style="text-align: center;">¿Realmente desea insertar esta Actividad de Clase?</h4>
                    <p>Consejos:
                    <li>Revisar que todos los campos tengan la informaci&oacute;n correcta</li>
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    <input type="button" class="btn btn-primary button-black nomargin" id="form-submity" value="Insertar"/>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    var totalRowNumber = 1;

    function appendRow(text) {
        var tbl = document.getElementById('bodyTable'), // table reference
                row = tbl.insertRow(tbl.rows.length);
        createCell(row.insertCell(0), tbl.rows.length, text, 'row');
        createCell(row.insertCell(1), tbl.rows.length, "", 'row');
        row.id = totalRowNumber;
        totalRowNumber = totalRowNumber + 1;
    }
    ;

    function createCell(cell, len, text, style) {
        if (text !== "") {
            var a = document.createElement('a');
            a.setAttribute('id', "form-id-table-" + len);
            a.setAttribute('class', "bt-editable");
            a.setAttribute('href', "#form-addContent");
            a.setAttribute('data-type', "text");
            a.setAttribute('data-pk', "1");
            a.setAttribute('data-placeholder', "Required");
            a.setAttribute('data-title', " Actualización de la Actividad");
            a.innerHTML = text;
            cell.appendChild(a);
        } else {
            var a = document.createElement('a');
            a.setAttribute('class', "button button-mini button-circle button-red");
            a.setAttribute('style', "display : block; text-align: center;");
            a.setAttribute('onclick', "deleteActivity(" + totalRowNumber + ");return false;");
            a.innerHTML = "Eliminar";
            cell.appendChild(a);
        }
    }
    ;

    function deleteActivity(rowNumber) {
        var row = document.getElementById(rowNumber);
        row.parentNode.removeChild(row);
    }
    ;


</script>


<script>
    $("#form-courses").change(function () {
        if ($("#form-courses").val() === "-1") {
            $("#failed-form-courses").attr("data-notify-msg", "<i class=icon-remove-sign></i> Curso inválido. Seleccione e intente de nuevo!");
            SEMICOLON.widget.notifications($("#failed-form-courses"));
            return false;
        } else {
            var parameters = {
                "appointment": $("#form-courses").val()
            };
            document.getElementById("form-student").options.length = 0;
            $.post("?controller=ClassActivity&action=selectStudentClassActivity", parameters, function (data) {
                $('#form-student').append($("<option></option>").attr("value", "-1").text("Seleccione un Estudiante"));
                for (var i = 0; i < data.length; i++) {
                    $('#form-student').append($("<option></option>").attr("value", data[i].identification).text(data[i].name));//AGREGAR OPCIONES
                }
                $("#form-student").selectpicker("refresh");///REFRESCA SELECT PARA QUE AGARRE AGREGADOS
            }, "json");
        }
    });

    $("#form-student").change(function () {
        if ($("#form-courses").val() === "-1") {
            $("#failed-form-courses").attr("data-notify-msg", "<i class=icon-remove-sign></i> Curso inválido. Seleccione e intente de nuevo!");
            SEMICOLON.widget.notifications($("#failed-form-courses"));
            return false;
        } else if ($("#form-student").val() === "-1") {
            $("#failed-form-student").attr("data-notify-msg", "<i class=icon-remove-sign></i> Estudiante inválido. Seleccione e intente de nuevo!");
            SEMICOLON.widget.notifications($("#failed-form-student"));
            return false;
        } else {
            var parameters = {
                "appointment": $("#form-courses").val(),
                "identification": $("#form-student").val()
            };
            $.post("?controller=ClassActivity&action=selectConsecutiveClassActivity", parameters, function (data) {
                document.getElementById("form-consecutive").value = parseInt(data.consecutive_class) + 1;
            }, "json");
        }
    });

    $("#form-submit").click(function () {
        $('#form-submit').attr('data-target', '#myModal');
    });

    $("#form-save").click(function () {
        var content;
        content = $("#form-content").val().trim();
        if (!isNaN(content) || content.length < 4 || content.length > 255) {
            $("#failed-content").attr("data-notify-msg", "<i class=icon-remove-sign></i> Contenido Incorrecto. Complete e intente de nuevo!");
            SEMICOLON.widget.notifications($("#failed-content"));
        } else {
            appendRow(content);

        }
    });

    $("#form-submity").click(function () {
        var content;
        content = $("#form-observation").val().trim();

        var tableReg = document.getElementById('bodyTable');
        var cellsOfRow = "";
        var cont = "";
        var dat = "";
        for (var i = 1; i < tableReg.rows.length; i++) {
            cellsOfRow = tableReg.rows[i].getElementsByTagName('td');
            cont = cellsOfRow[0].getElementsByTagName('a');
            dat += cont[0].textContent + ",";
        }

        dat = dat.substring(0, dat.length - 1);


        if ($("#form-courses").val() === "-1") {
            $("#failed-form-courses").attr("data-notify-msg", "<i class=icon-remove-sign></i> Curso inválido. Seleccione e intente de nuevo!");
            SEMICOLON.widget.notifications($("#failed-form-courses"));
            return false;
        } else if ($("#form-student").val() === "-1") {
            $("#failed-form-student").attr("data-notify-msg", "<i class=icon-remove-sign></i> Estudiante inválido. Seleccione e intente de nuevo!");
            SEMICOLON.widget.notifications($("#failed-form-student"));
            return false;
        } else if (!isNaN(content) || content.length < 4 || content.length > 255) {
            $("#failed-observation").attr("data-notify-msg", "<i class=icon-remove-sign></i> Observación Incorrecta. Complete e intente de nuevo!");
            SEMICOLON.widget.notifications($("#failed-observation"));
        } else if (tableReg.rows.length < 2) {
            $("#failed-addContent").attr("data-notify-msg", "<i class=icon-remove-sign></i> Cantidad de Contenidos inválidos. Complete e intente de nuevo!");
            SEMICOLON.widget.notifications($("#failed-addContent"));
        } else {
            var parameters = {
                "appointment": $("#form-courses").val(),
                "student": $("#form-student").val(),
                "consecutive": $("#form-consecutive").val(),
                "date": $("#form-date").val().trim(),
                "typeA": $("input:radio[name='form-typeA']:checked").val().trim(),
                "contents": dat,
                "count": ((tableReg.rows.length) - 1),
                "observation": $("#form-observation").val()
            };
            $.post("?controller=ClassActivity&action=insert", parameters, function (data) {
                if (data.result === "1") {
                    $("#success").attr({
                        "data-notify-type": "success",
                        "data-notify-msg": "<i class=icon-ok-sign></i> Operacion Exitosa!",
                        "data-notify-position": "bottom-full-width"
                    });
                    SEMICOLON.widget.notifications($("#success"));
                    setTimeout("location.href = '?controller=ClassActivity&action=insert';", 2000);
                } else {
                    $("#warning").attr({
                        "data-notify-type": "warning",
                        "data-notify-msg": "<i class=icon-warning-sign></i> Operacion Incompleta, intente de nuevo!",
                        "data-notify-position": "bottom-full-width"
                    });
                    SEMICOLON.widget.notifications($("#warning"));
                }
            }, "json");
        }
    });
</script>

<script>
    $(document).ready(function () {
        $('.bt-editable').editable();

        $('.bt-sex').editable({
            prepend: "not selected",
            source: [
                {value: 1, text: 'Male'},
                {value: 2, text: 'Female'}
            ],
            display: function (value, sourceData) {
                var colors = {"": "gray", 1: "green", 2: "blue"},
                        elem = $.grep(sourceData, function (o) {
                            return o.value == value;
                        });

                if (elem.length) {
                    $(this).text(elem[0].text).css("color", colors[value]);
                } else {
                    $(this).empty();
                }
            }
        });

        $('.bt-group').editable({
            showbuttons: false,
            source: [
                {value: 1, text: 'M'},
                {value: 2, text: 'F'}
            ],
        });

        $('.bt-event').editable({
            placement: 'right',
            combodate: {
                firstItem: 'name'
            }
        });

        $('.bt-state').editable({
            value: 'California',
            typeahead: {
                name: 'state',
                local: ["Alabama", "Alaska", "Arizona", "Arkansas", "California", "Colorado", "Connecticut", "Delaware", "Florida", "Georgia", "Hawaii", "Idaho", "Illinois", "Indiana", "Iowa", "Kansas", "Kentucky", "Louisiana", "Maine", "Maryland", "Massachusetts", "Michigan", "Minnesota", "Mississippi", "Missouri", "Montana", "Nebraska", "Nevada", "New Hampshire", "New Jersey", "New Mexico", "New York", "North Dakota", "North Carolina", "Ohio", "Oklahoma", "Oregon", "Pennsylvania", "Rhode Island", "South Carolina", "South Dakota", "Tennessee", "Texas", "Utah", "Vermont", "Virginia", "Washington", "West Virginia", "Wisconsin", "Wyoming"]
            }
        });

        $('.bt-comments').editable({
            showbuttons: 'bottom'
        });

        $('.bt-fruits').editable({
            pk: 1,
            limit: 3,
            source: [
                {value: 1, text: 'banana'},
                {value: 2, text: 'peach'},
                {value: 3, text: 'apple'},
                {value: 4, text: 'watermelon'},
                {value: 5, text: 'orange'}
            ]
        });

        $('.bt-tags').editable({
            inputclass: 'input-large',
            select2: {
                tags: ['html', 'javascript', 'css', 'ajax'],
                tokenSeparators: [",", " "]
            }
        });

        var countries = [];
        $.each({"BD": "Bangladesh", "BE": "Belgium", "BF": "Burkina Faso", "BG": "Bulgaria", "BA": "Bosnia and Herzegovina", "BB": "Barbados", "WF": "Wallis and Futuna", "BL": "Saint Bartelemey", "BM": "Bermuda", "BN": "Brunei Darussalam", "BO": "Bolivia", "BH": "Bahrain", "BI": "Burundi", "BJ": "Benin", "BT": "Bhutan", "JM": "Jamaica", "BV": "Bouvet Island", "BW": "Botswana", "WS": "Samoa", "BR": "Brazil", "BS": "Bahamas", "JE": "Jersey", "BY": "Belarus", "O1": "Other Country", "LV": "Latvia", "RW": "Rwanda", "RS": "Serbia", "TL": "Timor-Leste", "RE": "Reunion", "LU": "Luxembourg", "TJ": "Tajikistan", "RO": "Romania", "PG": "Papua New Guinea", "GW": "Guinea-Bissau", "GU": "Guam", "GT": "Guatemala", "GS": "South Georgia and the South Sandwich Islands", "GR": "Greece", "GQ": "Equatorial Guinea", "GP": "Guadeloupe", "JP": "Japan", "GY": "Guyana", "GG": "Guernsey", "GF": "French Guiana", "GE": "Georgia", "GD": "Grenada", "GB": "United Kingdom", "GA": "Gabon", "SV": "El Salvador", "GN": "Guinea", "GM": "Gambia", "GL": "Greenland", "GI": "Gibraltar", "GH": "Ghana", "OM": "Oman", "TN": "Tunisia", "JO": "Jordan", "HR": "Croatia", "HT": "Haiti", "HU": "Hungary", "HK": "Hong Kong", "HN": "Honduras", "HM": "Heard Island and McDonald Islands", "VE": "Venezuela", "PR": "Puerto Rico", "PS": "Palestinian Territory", "PW": "Palau", "PT": "Portugal", "SJ": "Svalbard and Jan Mayen", "PY": "Paraguay", "IQ": "Iraq", "PA": "Panama", "PF": "French Polynesia", "BZ": "Belize", "PE": "Peru", "PK": "Pakistan", "PH": "Philippines", "PN": "Pitcairn", "TM": "Turkmenistan", "PL": "Poland", "PM": "Saint Pierre and Miquelon", "ZM": "Zambia", "EH": "Western Sahara", "RU": "Russian Federation", "EE": "Estonia", "EG": "Egypt", "TK": "Tokelau", "ZA": "South Africa", "EC": "Ecuador", "IT": "Italy", "VN": "Vietnam", "SB": "Solomon Islands", "EU": "Europe", "ET": "Ethiopia", "SO": "Somalia", "ZW": "Zimbabwe", "SA": "Saudi Arabia", "ES": "Spain", "ER": "Eritrea", "ME": "Montenegro", "MD": "Moldova, Republic of", "MG": "Madagascar", "MF": "Saint Martin", "MA": "Morocco", "MC": "Monaco", "UZ": "Uzbekistan", "MM": "Myanmar", "ML": "Mali", "MO": "Macao", "MN": "Mongolia", "MH": "Marshall Islands", "MK": "Macedonia", "MU": "Mauritius", "MT": "Malta", "MW": "Malawi", "MV": "Maldives", "MQ": "Martinique", "MP": "Northern Mariana Islands", "MS": "Montserrat", "MR": "Mauritania", "IM": "Isle of Man", "UG": "Uganda", "TZ": "Tanzania, United Republic of", "MY": "Malaysia", "MX": "Mexico", "IL": "Israel", "FR": "France", "IO": "British Indian Ocean Territory", "FX": "France, Metropolitan", "SH": "Saint Helena", "FI": "Finland", "FJ": "Fiji", "FK": "Falkland Islands (Malvinas)", "FM": "Micronesia, Federated States of", "FO": "Faroe Islands", "NI": "Nicaragua", "NL": "Netherlands", "NO": "Norway", "NA": "Namibia", "VU": "Vanuatu", "NC": "New Caledonia", "NE": "Niger", "NF": "Norfolk Island", "NG": "Nigeria", "NZ": "New Zealand", "NP": "Nepal", "NR": "Nauru", "NU": "Niue", "CK": "Cook Islands", "CI": "Cote d'Ivoire", "CH": "Switzerland", "CO": "Colombia", "CN": "China", "CM": "Cameroon", "CL": "Chile", "CC": "Cocos (Keeling) Islands", "CA": "Canada", "CG": "Congo", "CF": "Central African Republic", "CD": "Congo, The Democratic Republic of the", "CZ": "Czech Republic", "CY": "Cyprus", "CX": "Christmas Island", "CR": "Costa Rica", "CV": "Cape Verde", "CU": "Cuba", "SZ": "Swaziland", "SY": "Syrian Arab Republic", "KG": "Kyrgyzstan", "KE": "Kenya", "SR": "Suriname", "KI": "Kiribati", "KH": "Cambodia", "KN": "Saint Kitts and Nevis", "KM": "Comoros", "ST": "Sao Tome and Principe", "SK": "Slovakia", "KR": "Korea, Republic of", "SI": "Slovenia", "KP": "Korea, Democratic People's Republic of", "KW": "Kuwait", "SN": "Senegal", "SM": "San Marino", "SL": "Sierra Leone", "SC": "Seychelles", "KZ": "Kazakhstan", "KY": "Cayman Islands", "SG": "Singapore", "SE": "Sweden", "SD": "Sudan", "DO": "Dominican Republic", "DM": "Dominica", "DJ": "Djibouti", "DK": "Denmark", "VG": "Virgin Islands, British", "DE": "Germany", "YE": "Yemen", "DZ": "Algeria", "US": "United States", "UY": "Uruguay", "YT": "Mayotte", "UM": "United States Minor Outlying Islands", "LB": "Lebanon", "LC": "Saint Lucia", "LA": "Lao People's Democratic Republic", "TV": "Tuvalu", "TW": "Taiwan", "TT": "Trinidad and Tobago", "TR": "Turkey", "LK": "Sri Lanka", "LI": "Liechtenstein", "A1": "Anonymous Proxy", "TO": "Tonga", "LT": "Lithuania", "A2": "Satellite Provider", "LR": "Liberia", "LS": "Lesotho", "TH": "Thailand", "TF": "French Southern Territories", "TG": "Togo", "TD": "Chad", "TC": "Turks and Caicos Islands", "LY": "Libyan Arab Jamahiriya", "VA": "Holy See (Vatican City State)", "VC": "Saint Vincent and the Grenadines", "AE": "United Arab Emirates", "AD": "Andorra", "AG": "Antigua and Barbuda", "AF": "Afghanistan", "AI": "Anguilla", "VI": "Virgin Islands, U.S.", "IS": "Iceland", "IR": "Iran, Islamic Republic of", "AM": "Armenia", "AL": "Albania", "AO": "Angola", "AN": "Netherlands Antilles", "AQ": "Antarctica", "AP": "Asia/Pacific Region", "AS": "American Samoa", "AR": "Argentina", "AU": "Australia", "AT": "Austria", "AW": "Aruba", "IN": "India", "AX": "Aland Islands", "AZ": "Azerbaijan", "IE": "Ireland", "ID": "Indonesia", "UA": "Ukraine", "QA": "Qatar", "MZ": "Mozambique"}, function (k, v) {
            countries.push({id: k, text: v});
        });
        $('.bt-country').editable({
            source: countries,
            select2: {
                width: 200,
                placeholder: 'Select country',
                allowClear: true
            }
        });
    });
</script>

<!-- End Content
============================================= -->    
<?php
include_once 'public/footer.php';
