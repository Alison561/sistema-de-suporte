<?php

namespace App\Controllers;
use App\Model\suportModel;

class indexController{

    public function __construct() {
        $this->suport = new suportModel();
    }

    public function selectAssID(){
        return $this->suport->selectId();
    }

    public function selectAss(){
        $id = explode('/', $_GET['uri']);
        return $this->suport->selectAssId($id[0]);
    }

    public function receberMsg(){
        $id = explode('/', $_GET['uri']);
        return $this->suport->receberMsg($id[0]);
    }
    public function getReceberMsg(){
        $id = explode('/', $_GET['uri']);
        die(json_encode($this->suport->receberMsg($id[1])));
    }



    public function index(){
        if (!isset($_SESSION['id'])) {
            echo "<script>window.location.href = '".url."login'</script>";
        }
        $this->render('index', 'template');

    }
    public function postSuport(){
        $this->suport->insert($_POST['ass'], $_SESSION['id']);
        echo "<script>window.location.href = '".url."'</script>";
    }


    public function getChat(){
        $id = explode('/', $_GET['uri']);
        $true = $this->suport->selectAssId($id[0]);
        if ($true['resolvida'] == 'ok') {
            echo "<script>window.location.href = '".url."'</script>";
        }
        $this->render('suport', 'template');
    }
    public function postChat(){
        $id = explode('/', $_GET['uri']);
        $this->render('suport', 'template');
        $this->suport->enviarMsg($id[0], $_POST['msg']);
            echo "<script>window.location.href = '".url."".$id[0]."'</script>";
    }


    public function content(){
        include $this->view;
    }

    public function render($view, $template){
        $this->view = "App\\View\\www\\".$view.".php";
        include "App\\View\\".$template.".php";
    }
}