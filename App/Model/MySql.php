<?php

namespace App\Model;

use Exception;
use PDO;

class MySql{

    public static $pdo;

    public static function con(){
        if (Self::$pdo == null) {
            try {
                self::$pdo = new PDO('mysql:host='.BD['host'].';dbname='.BD['bd'],BD['user'],BD['password'],array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
				self::$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            } catch (Exception $err) {
                echo "<h1>ERRO NO SERVIDOR</h1>";
            }
        }
        return Self::$pdo;
    }
}