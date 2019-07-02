<?php
class Anuncios {
    public function getMeusAnuncios(){
        global $pdo;

        $array = array();
        $sql = $pdo->prepare("SELECT *, (select anuncios_imagens.url from anuncios_imagens where anuncios_imagens.id_anuncio = anuncios.id limit 1) as url FROM anuncios WHERE id_usuario = :id_usuario");
        $sql->bindValue(":id_usuario", $_SESSION['cLogin']);
        $sql->execute();

        if($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }
        return $array;
    }

    public function getAnuncio($id){
        $array = array();
        global $pdo;

        $sql = $pdo->prepare("SELECT * FROM anuncios WHERE id = :id");
        $sql->bindValue(":id", $id);
        $sql->execute();

        if($sql->rowCount() > 0){
            $array = $sql->fetch();
        }
        return $array;
    }


    public function addAnuncio($titulo, $categoria, $telefone, $descricao, $fotos){
        global $pdo;

        $sql = $pdo->prepare("INSERT INTO anuncios SET titulo = :titulo, id_categoria = :id_categoria, id_usuario = :id_usuario, telefone = :telefone, descricao = :descricao");
        $sql->bindValue(":titulo", $titulo);
        $sql->bindValue(":id_categoria", $categoria);
        $sql->bindValue(":id_usuario", $_SESSION['cLogin']);
        $sql->bindValue(":telefone", $telefone);
        $sql->bindValue(":descricao", $descricao);
        $sql->execute();

        if(count($fotos) > 0) {
            for($q=0;$q<count($fotos['tmp_name']);$q++) {
                $tipo = $fotos['type'][$q];
                if(in_array($tipo, array('image/jpeg', 'image/png'))){
                    $tmpname = md5(time().rand(0,9999)).'.jpg';
                    move_uploaded_file($fotos['tmp_name'][$q], 'img/anuncios/'.$tmpname);

                    list($width_orig, $height_orig) = getimagesize('img/anuncios/'.$tmpname);
                    $ratio = $width_orig/$height_orig;

                    $width = 500;
                    $height = 500;

                    if($width/$height > $ratio){
                        $width = $height*$ratio;
                    }else{
                        $height = $width/$ratio;
                    }

                    $img = imagecreatetruecolor($width,  $height);
                    if($tipo == 'image/jpeg'){
                        $origi = imagecreatefromjpeg('img/anuncios/'.$tmpname);
                    }elseif($tipo == 'image/png') {
                        $origi = imagecreatefrompng('img/anuncios/'.$tmpname);
                    }

                    imagecopyresampled($img, $origi, 0, 0, 0, 0, $width, $height, $width_orig, $height_orig);
                    imagejpeg($img, 'img/anuncios/'.$tmpname, 80);

                    $sql = $pdo->prepare("INSERT INTO anuncios_imagens SET id_anuncio = :id_anuncio, url = :url");
                    $sql->bindValue(":id_anuncio", $_SESSION['cLogin']);
                    $sql->bindValue(":url", $tmpname);
                    $sql->execute();

                }
            }
        }
    }

    public function editAnuncio($titulo, $categoria, $telefone, $descricao, $id){
        global $pdo;

        $sql = $pdo->prepare("UPDATE anuncios SET titulo = :titulo, id_categoria = :id_categoria, id_usuario = :id_usuario, telefone = :telefone, descricao = :descricao  WHERE id= :id");
        $sql->bindValue(":titulo", $titulo);
        $sql->bindValue(":id_categoria", $categoria);
        $sql->bindValue(":id_usuario", $_SESSION['cLogin']);
        $sql->bindValue(":telefone", $telefone);
        $sql->bindValue(":descricao", $descricao);
        $sql->bindValue(":id", $id);
        $sql->execute();
    }






    public function excluirAnuncio($id){
        global $pdo;

        $sql = $pdo->prepare("DELETE FROM anuncios_imagens WHERE id_anuncio = :id_anuncio");
        $sql->bindValue(":id_anuncio", $id);
        $sql->execute();

        $sql = $pdo->prepare("DELETE FROM anuncios WHERE id = :id");
        $sql->bindValue(":id", $id);
        $sql->execute();
    }





}
?>



