<?php
require_once 'Usuarios.php';
$u= new Usuario;
?>
<html lang="pt-br">
  <head>
    <meta charset="utf-8"/>
    <title>login</title>
    <link rel="stylesheet" href="CSS/estilo.css">
  </head>
  <body>
  	<div id="formulario">
  	<form method="POST" >
       <input type="text" name="login" placeholder="Digite usuário"><br>
       <input type="password" name="senha" placeholder="Digite senha">
       <input type="submit" value="Continuar">
       <input type="reset" value="Limpar">
       <a href="cadastro.php">Criar conta</a>
  	</form >	
    </div>
    
    <?php
  if(isset($_POST['login']))
    {
     
      $login=addslashes($_POST['login']); 
      $senha=addslashes($_POST['senha']);

         
     if(!empty($login) && !empty($senha))
     {
             $u->conectar("dbphp7","localhost\SQLEXPRESS;ConnectionPooling=0","sa","root") ;
            if($u->msgErro== "")
              {
                       if($u->logar($login,$senha))
                          {
                           header("location:areaPrivada.php");
           
                            }
                       else
                          {
                           echo " login ou senha estão incorretos!";
                           }
                 
            
          } else
               {
                 echo "Erro: ";
               } 
        
        } else
               {
                 echo "Preencha todos campos ";
               } 
      }         
?>


  </body>
  </html>

