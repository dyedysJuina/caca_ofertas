<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<?php
include_once("conexao.php");
include_once("functions.php");

$idempresa = isset($_GET['idempresa']) ? $_GET['idempresa'] : ''; // Obtém o valor de idempresa da URL (se existir)

?>

<div class="box-menu">
    <div class="box-esquerda">
      <p>Sup. Pasqualotto</p>
    </div>

 
    <div class="box-direita">
       <a href="">Home</a>
       <a href="">Pedidos</a>
       <a href="">Mensagens</a>
       <a href="">Contato</a>
       <a href="">Perfil</a>
    </div>
</div>

<div class="box-pesquisa">
    <form action="" method="get">
        <input type="hidden" name="idempresa" value="<?php echo $idempresa; ?>">
        <input type="text" placeholder="Pesquisar item" name="nome">
        <button type="submit">Buscar</button>
    </form>
</div>

<div class="container-fluid">
    <table class="table">
        <thead>
            <tr>
                <th>Id Img</th>
                <th>Nom do Item</th>
                <th>Descricao</th>
                <th>R$ Normal</th>
                <th>R$ Oferta</th>
                <th>Inicio Oferta</th>
                <th>Fim Oferta</th>
                <th>Ativar</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (isset($_GET['nome'])) {
                $nome = $_GET['nome'];
                pesquisa_nome($conn, $nome);
            } else{
                pesquisa_inicio_vazio($conn);
            }
            ?>


            <?php

            
            

            ?>


        </tbody>
    </table>
</div>

</body>
</html>
