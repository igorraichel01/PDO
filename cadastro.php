<?php

require_once 'Usuarios.php';
$u = new Usuario;
?>

<html lang="pt-br">
  <head>
    <meta charset="utf-8"/>
    <title>Cadastro</title>
    <link rel="stylesheet" href="estilo.css">
  </head>
  <body>
  	<div id="formulario">
      <h1>Cadastrar</h1>
  	<form method="POST">
      
      <input type="text" name="login"placeholder="Digite usuário" maxlength="30">
       <input type="password" name="senha" placeholder="Digite senha" maxlength="15">
       <input type="password" name="confirS" placeholder="Confirme senha" maxlength="15">
       <input type="submit" value="Cadastrar">
       <input type="reset" value="Limpar">
      
  	</form >	
    </div>
<?php
    if(isset($_POST['nome']))
    {
      $login=addslashes($_POST['login']); 
      $senha=addslashes($_POST['senha']);
      $confirsenha=addslashes($_POST['confirS']);
    
     if(!empty($login) && !empty($senha) && !empty($confirsenha))
     {
                     $u->conectar("dbphp7","localhost\SQLEXPRESS;ConnectionPooling=0","sa","root");
                     if($u->msgErro== "")
                     { 

                       if($senha==$confirsenha) {
                           if($u->cadastrar($login,$senha))
                           {
                            ?>
                            <div id="msg-sucesso">
                            cadastrado com sucesso! acesse para entrar
                            </div>
                            <?php 
                           }

                           else
                           {
                             ?>
                             <div id="msg-erro">
                              usuário já cadastrado
                              </div>

                              <?php
                           }
                        }
                        else{
                          ?>
                             <div class="msg-erro">
                              As senhas não são iguais
                              </div>
                              <?php
                          
                        }
                     }
                     else
                     {
                        ?>
                             <div class="msg-erro" >
                            <?php  echo "Erro: ".$u->msgErro;?>
                              </div>
                              <?php
                        
                     }
     
       } 
       else

      {
        ?>
        <div class="msg-erro">
            Preencha todos os campos!
        </div>
       <?php
      }

  }
    
 ?>
  </body>
  </html>


