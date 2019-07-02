<?php
class infocad{

    public function getListaCad(){
        $array = array();
        global $pdo;

        $sql = $pdo->query("SELECT * FROM usuarios");
        if($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }
        return $array;
    }

}

?>