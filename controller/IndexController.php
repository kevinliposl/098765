<?php

class IndexController {

    public function __construct() {
        $this->view = new View();
    }

    public function defaultAction() {
        $this->view->show("indexView.php");
    }

    public function notFound() {
        $this->view->show("404View.php");
    }

    public function login() {
        $this->view->show("loginView.php");
    }

    public function admin() {
        $this->view->show("adminView.php");
    }

    public function galeria() {
        $this->view->show("galeryView.php");
    }

    public function contact() {
        $this->view->show("contactView.php");
    }

    public function aboutus() {
        $this->view->show("aboutView.php");
    }

    public function instruments() {
        $this->view->show("coursesView.php");
    }

    public function profesors() {
        $this->view->show("coursesView.php");
    }

    public function ejemploProfesor() {
        $this->view->show("profileProfesorView.php");
    }
}

// fin clase
