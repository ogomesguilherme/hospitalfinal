<?php 

namespace app;

require_once("vendor/autoload.php");

use app\conn;
use mysqli;

class novoPacienteClass {
    public $Name, $MomName, $Birthday;
    public $handleErrors = [];
    public $isValid = false;

    function __construct($Name, $MomName, $Birthday)
    {
        $this->Name = $this->validadeString($Name, "Preencha o nome corretamente");
        $this->MomName = $this->validadeString($MomName, "Preencha o nome da mãe corretamente");
        $this->Birthday = $this->validadeDate($Birthday, "Data inválida");

        if (count($this->handleErrors) == 0) {
            $this->isValid = true;
        }

        echo var_dump($this->handleErrors);
    }

    function validadeString(string $string, string $errorMsg){
        $string = htmlspecialchars(trim($string));
        if (empty($string)){
            $this->handleErrors[] = $errorMsg;
            return;
        }
        return $string;
    }

    function validadeDate(string $string, string $errorMsg) : string {
        $arr = explode("/", $string);
        $day = $arr[0];
        $month = $arr[1];
        $year = $arr[2];
        if (!checkdate($month, $day, $year)){
            $this->handleErrors[] = $errorMsg;
            return "";
        }
        return implode("-", [$year,$month,$day]);
    }

    function register(){
        if ($this->isValid) {
            $mysqli = conn::connect();
            $stmt = $mysqli -> prepare("INSERT INTO pacientes (Name, MomName, Birthday) VALUES (?, ?, ?)");
            $stmt -> bind_param("sss", $this->Name, $this->MomName, $this->Birthday);
            $stmt -> execute();
            $stmt -> close();
            $mysqli -> close();
        }
    }
}

?>