<?php
$session= SSession::getInstance();

if (isset($session->email)) {
    header('Location:?');
} else {
    include_once 'public/header.php';
}
?>
<!-- Content
============================================= -->
<section id="content">
    <div class="content-wrap">
        <div class="container clearfix">
            <div class="accordion accordion-lg divcenter nobottommargin clearfix" style="max-width: 550px;">

                <div class="acctitle"><i class="acc-closed icon-lock3"></i><i class="acc-open icon-unlock"></i>Login to your Account</div>
                <div class="acc_content clearfix">
                    <form class="nobottommargin" id="login-form">

                        <div class="col_full">
                            <label for="login-email">Email:</label>
                            <input type="email" id="login-email" class="form-control" required/>
                        </div>

                        <div class="col_full">
                            <label for="login-password">Password:</label>
                            <input type="password" id="login-password" class="form-control" required/>
                        </div>

                        <div class="col_full nobottommargin">
                            <input type="button" class="button button-3d button-black nomargin" id="login-submit" value="Login"/>
                        </div>
                        <div id="login-message"></div>
                    </form>
                </div>

                <div class="acctitle">
                    <i class="acc-closed icon-user4"></i>
                    <i class="acc-open icon-ok-sign"></i>
                    New Signup? Register for an Account
                </div>
                <div class="acc_content clearfix">
                    <form aclass="nobottommargin" id="register-form">

                        <div class="col_full">
                            <label for="register-email">Email:</label>
                            <input type="email" id="register-email" class="form-control" required/>
                        </div>

                        <div class="col_full">
                            <label for="register-address">Address:</label>
                            <input type="text" id="register-address" class="form-control" required/>
                        </div>

                        <div class="col_full">
                            <label for="register-name">Name:</label>
                            <input type="text" id="register-name" class="form-control" required />
                        </div>

                        <div class="col_full">
                            <label for="register-lastname">LastName:</label>
                            <input type="text" id="register-lastname" class="form-control" required />
                        </div>
                        <div class="col_full">
                            <label for="register-password">Choose Password:</label>
                            <input type="password" id="register-password" class="form-control" required />
                        </div>

                        <div class="col_full">
                            <label for="register-repassword">Re-enter Password:</label>
                            <input type="password" id="register-repassword" class="form-control" required />
                        </div>

                        <div class="col_full">
                            <input type="button" class="button button-3d button-black nomargin" id="register-submit" value="Register Now">
                        </div>
                        <div id="register-message"></div>
                    </form>
                </div>
            </div>
        </div>


<!-- Ajax logIn
============================================= -->
<script type="text/javascript">

    $("#login-submit").click(function () {

        if (validateForm(document.getElementById("login-form"))) {

            var parameters = {
                "email": $("#login-email").val(),
                "password": $("#login-password").val()
            };

            $("#login-message").html("Processing, please wait...");

            $.post("?controller=User&action=logIn", parameters, function (data) {
                if (data.result === "true") {
                    $("#login-message").html("Success");
                    location.href="?";
                } else {
                    $("#login-message").html("Failed");
                }
                ;
            }, "json");
        } else {
            $("#login-message").html("Complete the form please...");
        }
        ;
    });
</script>


<!-- Ajax Register
============================================= -->
<script type="text/javascript">

    $("#register-submit").click(function () {

        if (validateForm(document.getElementById("register-form"))) {

            var parameters = {
                "email": $("#register-email").val(),
                "name": $("#register-name").val(),
                "lastname": $("#register-name").val(),
                "address": $("#register-address").val(),
                "password": $("#register-password").val()
            };

            if ($("#register-password").val() === $("#register-repassword").val()) {

                $("#register-message").html("Processing, please wait...");

                $.post("?controller=User&action=insertUser", parameters, function (data) {
                    if (data.result === "true") {
                        $("#register-message").html("Success");
                        location.href="?controller=User&action=loginUser";
                    } else {
                        $("#register-message").html("Failed");
                    }
                    ;
                }, "json");
            } else {
                $("#register-message").html("Passwords do not match");
            }
        } else {
            $("#register-message").html("Complete the form please...");
        }
    });

</script>

<?php
include_once 'public/footer.php';
