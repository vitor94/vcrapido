<?php
class Usuarios
{

    public function cadastrar($nome, $email, $cep, $endereco, $numero, $bairro, $cidade, $estado, $telefone, $cpf, $senha)
    {
        global $pdo;
        $sql = $pdo->prepare("SELECT id FROM usuarios WHERE email = :email, cpf = :cpf");
        $sql->bindValue(":email", $email);
        $sql->bindValue(":cpf", $cpf);
        $sql->execute();

        if ($sql->rowCount() == 0) { 

            $sql = $pdo->prepare("INSERT INTO usuarios SET nome = :nome, email = :email, cep = :cep, endereco = :endereco, numero = :numero,
            bairro = :bairro, cidade = :cidade, estado = :estado, telefone = :telefone, cpf = :cpf, senha = :senha");
            $sql->bindValue(":nome", $nome);
            $sql->bindValue(":email", $email);
            $sql->bindValue(":cep", $cep);
            $sql->bindValue(":endereco", $endereco);
            $sql->bindValue(":numero", $numero);
            $sql->bindValue(":bairro", $bairro);
            $sql->bindValue(":cidade", $cidade);
            $sql->bindValue(":estado", $estado);
            $sql->bindValue(":telefone", $telefone);
            $sql->bindValue(":cpf", $cpf);
            $sql->bindValue(":senha", md5($senha));
            $sql->execute();

            return true;
    }else{
            return false;
        }
    }

    public function login($email, $senha) {
        global $pdo;

        $sql = $pdo->prepare("SELECT id FROM usuarios WHERE email = :email AND senha = :senha");
        $sql->bindValue(":email", $email);
        $sql->bindValue(":senha", md5($senha));
        $sql->execute();

        if($sql->rowCount() > 0) {
            $dado = $sql->fetch();
            $_SESSION['cLogin'] =$dado['id'];

        return true;
    }else{
        return false;
    }
   
    }

    public function pegarDados($id, $dados){
		global $pdo;

		$id = addslashes($id);

		$sql = $pdo->prepare("SELECT * FROM usuarios WHERE id = :id");
		$sql->bindValue(":id", $id);
		$sql->execute();
		$dadosUser = $sql->fetch();
		$dados = addslashes($dados);

		return $dadosUser[$dados];
	}

    // public function esquecisenha($email){
    //     global $pdo;

    //     $sql = $pdo->prepare("SELECT * FROM usuarios WHERE email = :email");
    //     $sql->bindValule(":email", $email);
    //     $sql-execure();

    //     if($sql->rowCount() > 0){

    //         $sql = $sql->fetch();
    //         $id = $sql['id'];
    //     }

    // }

}
