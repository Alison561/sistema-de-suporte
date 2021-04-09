<?php

namespace App\Model;
use App\Model\MySql;

class suportModel{
    public function insert($ass, $id){
        $con = MySql::con()->prepare("INSERT INTO  `assunto` VALUES (NULL, ?, ?, ?)");
        $con->execute(array($ass, $id, ''));
    }

    public function selectId(){
        $con = MySql::con()->prepare("SELECT * FROM `assunto` WHERE id = ? and resolvida = ''");
        $con->execute(array($_SESSION['id'] ));
        return $con->fetchall();
    }

    public function selectAssId($id){
        $con = MySql::con()->prepare("SELECT * FROM `assunto` WHERE id = ?");
        $con->execute(array($id));
        return $con->fetch();
    }

    public function enviarMsg($id_ass, $ass){
        $con = MySql::con()->prepare("INSERT INTO `chat_assunto` VALUES(NULL, ?, ?, ?)");
        $con->execute(array($id_ass, $_SESSION['id'], $ass));
        return $con->fetch();
    }

    public function receberMsg($id_ass){
        $con = MySql::con()->prepare("SELECT msg.texto, us.nome FROM `chat_assunto` AS `msg` INNER JOIN `user` AS `us` ON msg.id_pessoa = us.id   WHERE msg.id_assunto  = ?");
        $con->execute(array($id_ass));
        return $con->fetchall();
    }

    public function finalizarAss($id){
        $con = MySql::con()->prepare("UPDATE `assunto` SET resolvida = 'ok'  WHERE id = ?");
        $con->execute(array($id));
    }
}