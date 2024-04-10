<?php 

namespace app;

require_once("vendor/autoload.php");

use app\conn;

class novoPacienteClass {
    public $Name, $MomName, $Birthday;
    public $handleErrors = [];
    public $isValid = false;

    function __construct($form)
    {
        $this->Name = $this->validadeString($form['Name'], "Preencha o nome corretamente");
        $this->MomName = $this->validadeString($form['MomName'], "Preencha o nome da mãe corretamente");
        $this->Birthday = $this->validadeDate($form['Birthday'], "Data inválida");

        if (count($this->handleErrors) == 0) {
            $this->isValid = true;
            $this->register();
        }
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
        $arr = explode("-", $string);
        $day = $arr[2];
        $month = $arr[1];
        $year = $arr[0];
        if (!checkdate(intval($month), intval($day), intval($year))){
            $this->handleErrors[] = $errorMsg;
            return "";
        }
        return implode("-", [$year,$month,$day]);
    }

    private function register(){
        try {
            $mysqli = conn::connect();
            $stmt = $mysqli -> prepare("INSERT INTO pacientes (Name, MomName, Birthday) VALUES (?, ?, ?)");
            $stmt -> bind_param("sss", $this->Name, $this->MomName, $this->Birthday);
            $stmt -> execute();
            $stmt -> close();
            $mysqli -> close();
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}

?>