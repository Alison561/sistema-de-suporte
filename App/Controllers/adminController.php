<?php

namespace App\Controllers;
use App\Model\suportModel;

class adminController{

    public function __construct() {
        $this->suport = new suportModel();
    }

    public function selectAss(){
        $id = explode('/', $_GET['uri']);
        return $this->suport->selectAssId($id[1]);
    }

    public function selectAssID(){
        return $this->suport->selectAss();
    }
    // 
    // 
    public function receberMsg(){
        $id = explode('/', $_GET['uri']);
        return $this->suport->receberMsg($id[1]);
    }
    public function getReceberMsg(){
        $id = explode('/', $_GET['uri']);
        die(json_encode($this->suport->receberMsg($id[1])));
    }
    // 
    // 
    public function index(){
        if (!isset($_SESSION['id'])) {
            echo "<script>window.location.href = '".url."login'</script>";
        }
        $this->render('admin', 'template');
    }

    public function getChat(){
        $id = explode('/', $_GET['uri']);
        $true = $this->suport->selectAssId($id[1]);
        if ($true['resolvida'] == 'ok') {
            echo "<script>window.location.href = '".url."admin/'</script>";
        }
        $this->render('suportAd', 'template');
    }

    public function postChat(){
        $id = explode('/', $_GET['uri']);
        $this->render('suportAd', 'template');
        if (isset($_POST['finalizar'])) {
            $this->suport->finalizarAss($id[1]);
            echo "<script>window.location.href = '".url."admin/'</script>";
        }else {
            $this->suport->enviarMsg($id[1], $_POST['msg']);
            echo "<script>window.location.href = '".url."admin/".$id[1]."'</script>";
        }
        
    }


    public function content(){
        include $this->view;
    }

    public function render($view, $template){
        $this->view = "App\\View\\www\\".$view.".php";
        include "App\\View\\".$template.".php";
    }
}