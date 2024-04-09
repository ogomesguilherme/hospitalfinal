<?php 

namespace app;

include_once("vendor/autoload.php");

class db {
    
    static function execute($query, $connector){
        if ($connector->query($query)){
            return $connector->query($query);
        } else {
            return die($connector->error);
        }
    }
}

?>