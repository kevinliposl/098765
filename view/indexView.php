<?php
$session = SSession::getInstance();

if (isset($session->email)) {
    //include_once 'public/headerUser.php';
} else {
    include_once 'public/header.php';
}
?>
<!-- Content
============================================= -->





<!-- End Content
============================================= -->    
<?php
include_once 'public/footer.php';
