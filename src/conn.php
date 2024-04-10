<?php 

namespace app;

require_once("vendor/autoload.php");

use mysqli;

class conn {
    
    public static $hostname = "localhost";
    public static $bancodedados = "hospitalfinal";
    public static $usuario = "root";
    public static $senha = "";

    static function connect(){
        $mysqli = new mysqli(self::$hostname,self::$usuario,self::$senha, self::$bancodedados);

        if ($mysqli->connect_errno){          
            die("Falha ao conectar o banco de dados: " . $mysqli->connect_error);
        }

        return $mysqli;

    }
}

?>