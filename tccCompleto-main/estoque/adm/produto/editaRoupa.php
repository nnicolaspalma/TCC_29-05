<?php
require('../../conexao.php');
session_start();

if(!isset($_SESSION['username'])){
    header('Location: ../login.php');
}

$sql = 'SELECT * FROM tb_produtos WHERE id_produto = ?';
$stm = $banco->prepare($sql);
$stm->bindValue(1, $_GET["id_produto"]);

$stm->execute();
$roupa = $stm->fetch(PDO::FETCH_ASSOC);

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
        Editar <small>Roupa</small>
      </h1>
     
      <div class="containerCad">
    <a class="links" id="cadastro"></a>

  <div class="contentCad">
      <div id="cadastro">
      <form action="processoEditaRoupa.php" method="POST"  >
      <input type="hidden" name="id_produto" value="<?php echo $roupa["id_produto"]?>"/>   
  
          <p> 
            <label for="nome">Nome do produto</label>
            <input id="nomeRoupa" name="nomeProduto"  type="text" placeholder="Nome do produto"
            value="<?php echo $roupa["nome_produto"]?>"/>
          </p>
           
          <p> 
            <label for="descricao">Descrição</label>
            <input id="descricao" name="descricaoProduto"  type="text" placeholder="Descrição do produto"
            value="<?php echo $roupa["descricao_produto"]?>"/>
          </p>
           
          <p> 
            <label for="preco">Preço</label>
            <input id="preco" name="precoProduto"  type="text" onkeypress="$(this).mask('R$ #.##0,00', {reverse: true});" placeholder="Preço do produto" 
            value="<?php echo $roupa["preco_produto"]?>"/>
          </p>

          <p> 
            <label for="quantidade">Quantidade</label>
            <input id="quantidade" name="estoqueProduto" type="number" placeholder="Quantidade no estoque"
            value="<?php echo $roupa["qtd_produto"]?>" /> 
          </p>
    
          <a>
            <input type="submit" value="Editar" /> 
</a>

</div>
        </form>
<form method="post" action="listaProduto.php">
        <input type="submit" value="Voltar" href="listaProduto">
</form>
      </div>
   
</div>


</body>
</html>