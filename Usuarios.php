
<?php

class Usuario
{
    private $pdo;
    public $msgErro= "";

	public function conectar($nomeBD,$host,$usuario,$senha)
	{
      global $pdo;
      global $msgErro;
      try
      {
          $pdo = new PDO("sqlsrv:database=".$nomeBD.";server=".$host,$usuario,$senha);
	    }catch(PDOException $e)
	     {
           $msgErro = $e->getMessage();
	     }
    }


	public function cadastrar($login,$senha)
	{
		 global $pdo;
		 $sql =$pdo->prepare("SELECT idusuario FROM tb_usuarios WHERE login = :e");
		 $sql->bindValue(":e",$login);
		 $sql->execute();
		 if($sql->rowCount() > 0)
		 {
		 	return false;
		 }
		 else
		 {
             $sql=$pdo->prepare("INSERT INTO tb_usuarios(login,senha) VALUES(:u,:s)");
                
                $sql->bindValue(":u",$login);
                $sql->bindValue(":s",$senha);
                $sql->execute();
                return true;
		 }

	}
	public function logar($login,$senha){
		global $pdo;
		$sql = $pdo->prepare("SELECT idusuario FROM tb_usuarios WHERE login=:e AND senha=:s");
		$sql->bindValue(":e",$login);
		$sql->bindValue(":s",$senha);
		$sql->execute();
		if($sql->rowCount() >0)
		{
           $dado=$sql->fetch();
           session_start();
           $_SESSION['idusuario'] = $dado['idusuario'];
           return true;
		}
		else
		{
          return false;
		}

	}

}
?>