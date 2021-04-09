<?php

namespace App\Model;
use App\Model\MySql;

class userModel{

    public function insert($nome, $senha){
        $con = MySql::con()->prepare("INSERT INTO `user` VALUES(NULL, ?, ?)");
        $con->execute(array($nome, $senha));
        $fethc = $this->selectId(MySql::con()->lastInsertId());
        $_SESSION['id']    = $fethc['id'];
        $_SESSION['nome']  = $fethc['nome'];
        $_SESSION['senha'] = $fethc['senha'];
    }

    public function login($nome, $senha){
        
        $con = MySql::con()->prepare("SELECT * FROM `user` WHERE nome = ? and senha = ?");
        $con->execute(array($nome, $senha));
        $fetch= $con->fetch();

        if ($con->rowCount() == 1) {
            $_SESSION['id']    = $fetch['id'];
            $_SESSION['nome']  = $fetch['nome'];
            $_SESSION['senha'] = $fetch['senha'];
            return true;
        }else{
            return false;
        }
        
    }

    public function selectId($id){
        $con = MySql::con()->prepare("SELECT * FROM `user` WHERE id = ?");
        $con->execute(array($id));
        return $con->fetch();
    }
}