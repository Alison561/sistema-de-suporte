<?php

namespace App\Controllers;
use App\Model\userModel;

class userController{

    public function __construct() {
        $this->user = new userModel();
    }

    public function getLogin(){
        if (isset($_SESSION['id'])) {
            echo "<script>window.location.href = '".url."'</script>";
        }
        $this->render('login', 'template');
    }

    public function postLogin(){
        $true =  $this->user->login($_POST['user'], md5($_POST['pass']));

        if ($true) {
            echo "<script>window.location.href = '".url."'</script>";
        } else {
            echo "<script>window.location.href = '".url."login'</script>";
        }

    }


    public function getCadastro(){
        $this->render('cadastro', 'template');
    }

    public function postCadastro(){
        $this->user->insert($_POST['user'], md5($_POST['pass']));
        echo "<script>window.location.href = '".url."'</script>";
    }

    public function content(){
        include $this->view;
    }

    public function render($view, $template){
        $this->view = "App\\View\\www\\".$view.".php";
        include "App\\View\\".$template.".php";
    }
}