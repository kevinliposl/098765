<?php
$session= SSession::getInstance();

if (isset($session->email)) {
    include_once 'public/headerUser.php';
} else {
    header('Location:?');
}
?>
<!-- Page Title
============================================= -->
<section id="page-title">
    <div class="container clearfix">
        <h1>My Account</h1>
    </div>
</section><!-- #page-title end -->
<!-- Content
============================================= -->
<section id="content">
    <div class="content-wrap">
        <div class="container clearfix">
            <div class="col_two_third col_last nobottommargin">
                <h3>Update the information you want</h3>
                <form id="register-form" class="nobottommargin">
                    <div class="col_half">
                        <label for="email">Email:</label>
                        <input type="email" id="email" class="form-control" value="<?php if(isset($vars)){ echo $vars["email"];} ?>" required/>
                    </div>

                    <div class="col_half col_last">
                        <label for="address">Address:</label>
                        <input type="text" id="address" class="form-control" value="<?php if(isset($vars)){ echo $vars["address"];} ?>" required/>
                    </div>

                    <div class="clear"></div>

                    <div class="col_half">
                        <label for="name">Name:</label>
                        <input type="text" id="name" class="form-control" value="<?php if(isset($vars)){ echo $vars["name"];} ?>" required/>
                    </div>

                    <div class="col_half col_last">
                        <label for="lastname">LastName:</label>
                        <input type="text" id="lastname" class="form-control" value="<?php if(isset($vars)){ echo $vars["lastname"];} ?>" required/>
                    </div>

                    <div class="clear"></div>

                    <div class="col_half">
                        <label for="password">Choose Password:</label>
                        <input type="password" id="password" class="form-control" value="<?php if(isset($vars)){ echo $vars["password"];} ?>" required/>
                    </div>

                    <div class="col_half col_last">
                        <label for="repassword">Re-enter Password:</label>
                        <input type="password" id="repassword" class="form-control" value="<?php if(isset($vars)){ echo $vars["password"];} ?>" required/>
                    </div>

                    <div class="clear"></div>

                    <div class="col_full nobottommargin">
                        <button type="button" class="button button-3d button-black nomargin" id="submit" >Update Now</button>
                    </div>
                    <div id="message"></div>
                </form>
            </div>
        </div>
<!-- #content end -->

<script>

    $("#submit").click(function () {
        var parameters = {
            "email": $("#email").val(),
            "name": $("#name").val(),
            "lastname": $("#lastname").val(),
            "address": $("#address").val(),
            "password": $("#password").val()
        };

        if ($("#password").val() === $("#repassword").val()) {

            $("#message").html("Processing, please wait...");

            $.post("?controller=User&action=updateUser", parameters, function (data) {
                if (data.result === "true") {
                    $("#message").html("Success");
                } else {
                    $("#message").html("Failed");
                }
                ;
            }, "json");
        } else {
            $("#message").html("Passwords do not match");
        }
        ;
    });
</script>

<?php
include_once 'public/footer.php';
