<?php
require('../../conexao.php');
session_start();

if(!isset($_SESSION['username'])){
    header('Location: ../login.php');
}

$sql = 'SELECT * FROM tb_clientes WHERE id_cliente = ?';
$stm = $banco->prepare($sql);
$stm->bindValue(1, $_GET["id_cliente"]);

$stm->execute();
$cliente = $stm->fetch(PDO::FETCH_ASSOC);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
    <link rel="stylesheet" type="text/css"  href="../../css/style.css">
    
    <title>Document</title>
</head>
<body>

    <section class="content-header">
      <h1>
        Editar <small>Cliente</small>
      </h1>
     
      <div class="containerCad">
    <a class="links" id="cadastro"></a>

  <div class="contentCad">
      <div id="cadastro">
      <form action="processaEditaCliente.php" method="POST"  >
      <input type="hidden" name="id_cliente" value="<?php echo $cliente["id_cliente"]?>"/>   
  
         
      <p> 
            <label for="nome">Nome do cliente</label>
            <input id="nome" name="nomeCliente"  type="text" placeholder="Nome do cliente"
            value="<?php echo $cliente["nome_cliente"]?>"/>
          </p>
           
          <p> 
            <label for="endereco">Endereço</label>
            <input id="endereco" name="enderecoCliente"  type="text" placeholder="Endereço do cliente"
            value="<?php echo $cliente["endereco_usuario"]?>" /> 
          </p>
           
             
          <p> 
            <label for="rg">Identidade</label>
            <input id="rg" name="rgCliente"  type="text"  onkeypress="$(this).mask('00.000.000-00')" placeholder="RG do cliente"
            value="<?php echo $cliente["rg_cliente"]?>" /> 
          </p>

          <p> 
            <label for="dataNasc">Data de nascimento</label>
            <input id="data_nascimento" name="dataCliente" type="date" placeholder="data nascimento"
            value="<?php echo $cliente["dataNasc_cliente"]?>"/>
          </p>
    
          
          <a>
            <input type="submit" value="Cadastrar" /> 
</a>

</div>
        </form>
<form method="post" action="index.php">
        <input type="submit" value="cancelar" href="index.php">
</form>
      </div>

</body>
</html>