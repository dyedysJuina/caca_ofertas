<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
  <style>
    body{
      background-color: #f9f9f9;
    }
    .valor input{
      width:50px;
      font-size:12px;
    }

    input{
      font-size:12px;
    }
    #cabecalho{
      background-color: #666666;
      color:white;
    }
    </style>


<div class="container-fluid">
  <h2 class="text-dark">Cadastrar Oferta</h2>
  <p>Bem vindo ao supermercado Pasqualotto</p>

<form action="" method="get">


  <div class="table">
    <table class="table table-bordered ">
      <thead>
        <tr>
          <th id="cabecalho">PRODUTO</th>
          <th id="cabecalho">UNID</th>
          <th id="cabecalho">VENDA</th>
          <th id="cabecalho">OFERTA</th>
          <th id="cabecalho">DESC %</th>
          <th id="cabecalho">DESC R$</th>
          <th id="cabecalho">INICIO</th>
          <th id="cabecalho">FIM</th>
          <th id="cabecalho">INSERIR</th>
        
          
        </tr>
      </thead>
      <tbody>
    <?php
    if(isset($_GET['idempresa'])){
      $pegaid = $_GET['idempresa'];
    
    $sql = "SELECT * FROM produtos where idempresa = $pegaid";
    include_once("conexao.php");
    $query = mysqli_query($conn, $sql);
    while ($resultado = mysqli_fetch_assoc($query)) {
      $idempresa = $resultado['idempresa'];
      $id_produto = $resultado['idproduto'];
      $nome = $resultado['nome'];
      $preco_unitario = $resultado['preco_unitario'];
      $preco_venda = $resultado['preco_venda'];
?>

<form action="processa_oferta.php" method="GET">

  <tr>
    <input type="hidden" placeholder="idempresa" value="<?php echo $idempresa; ?>" name="idempresa" readonly>
    <input type="hidden" placeholder="idproduto" value="<?php echo $id_produto; ?>" name="idproduto" readonly>
    <td class="input-nome"><input type="text" placeholder="nome produto" value="<?php echo $nome; ?>" name="nome" readonly></td>
    <td class="valor"><input type="text" placeholder="R$ unit" value="<?php echo $preco_unitario; ?>" name="preco_unitario" readonly></td>
    <td class="valor"><input type="text" placeholder="preco  venda" value="<?php echo $preco_venda; ?>" name="preco_venda" readonly></td>
    <td class="valor"> <input type="text" placeholder="R$ " value="" name="preco_oferta"></td>
    <td class="valor" ><input type="text" placeholder="Inicio" value="" name="porcentagem_desconto"></td>
    <td class="valor"> <input type="text" placeholder="R$ " value="" name="valor_atualizado"></td>
    <td><input type="date" placeholder="Inicio" value="" name="inicio_oferta"></td>
    <td><input type="date" placeholder="Fim " value="" name="fim_oferta"></td>
    
    <td><button type="submit" class="btn btn-primary">Ofertar</button></td>
  </tr>
</form>
<?php } } ?>

</tbody>
    </table>
  </div>
</div>
<script>
  $(document).ready(function () {
    $('#example').DataTable();
});
 </script>

</body>
</html>
