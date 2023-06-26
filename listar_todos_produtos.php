<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.0.1/js/dataTables.buttons.min.js"></script>
  <script src="https://cdn.datatables.net/select/1.3.3/js/dataTables.select.min.js"></script>
  <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<style>
  html {
    font-size: 80%;
  }

  .ids {
    width: 70px;
  }

  .ids input {
    width: 100%;
    text-align: center;
  }

  .input_nome {
    background-color: blue;
    min-width: 100%;
    position: relative;
  }

  .input_nome input {
    min-width: 100%;
  }
</style>

<div class="container">
  <h2>Bordered Table</h2>
  <p>The .table-bordered class adds borders on all sides of the table and the cells:</p>
  <table id="example" class="table table-bordered">
    <thead>
    <tr>
      <th>Mercado</th>
      <th>Nome</th>
      <th>Preço uni</th>
      <th>R$ Venda</th>
      <th>% des.</th>
      <th>R$ Desc</th>
      <th>Inicio</th>
      <th>Fim</th>
    </tr>
    </thead>
    <tbody>
    <?php
    $sql = "SELECT * FROM produtos";
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
    <td>

    <select name="idempresa" id="idempresa">
      <?php 

    $sql2 = "SELECT * FROM empresas";
    include_once("conexao.php");
    $query2 = mysqli_query($conn, $sql2);
    while ($resultado = mysqli_fetch_assoc($query2)) {?>
      <option value="<?php echo $resultado['idempresa'];?>"><?php echo $resultado['nome'];?></option>
    <?php } ?>
    </select>

    </td>
 
    <input type="hidden" placeholder="idproduto" value="<?php echo $id_produto; ?>" name="idproduto" readonly>
    <td class="input-nome"><input type="text" placeholder="nome produto" value="<?php echo $nome; ?>" name="nome" readonly></td>
    <td class="ids"><input type="text" placeholder="R$ unit" value="<?php echo $preco_unitario; ?>" name="preco_unitario" readonly></td>
    <td class="ids"><input type="text" placeholder="preco  venda" value="<?php echo $preco_venda; ?>" name="preco_venda" readonly></td>
    <td class="ids"> <input type="text" placeholder="R$ " value="" name="preco_oferta"></td>
    <td><input type="text" placeholder="Inicio" value="" name="porcentagem_desconto"></td>
    <td class="ids"> <input type="text" placeholder="R$ " value="" name="valor_atualizado"></td>
    <td><input type="date" placeholder="Inicio" value="" name="inicio_oferta"></td>
    <td><input type="date" placeholder="Fim " value="" name="fim_oferta"></td>
    <td><button type="submit" class="btn btn-success">Ofertar</button></td>
  </tr>
</form>
<?php } ?>

</tbody>
</table>
</div>

<script>
$(document).ready(function() {
  $('#example').DataTable({
    language: {
      "sEmptyTable": "Nenhum registro encontrado",
      "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
      "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
      "sInfoFiltered": "(Filtrados de _MAX_ registros)",
      "sInfoPostFix": "",
      "sInfoThousands": "",
      "sLengthMenu": "Mostrar _MENU_ registros por página",
      "sLoadingRecords": "Carregando...",
      "sProcessing": "Processando...",
      "sSearch": "Buscar:",
      "sZeroRecords": "Nenhum registro encontrado",
      "oPaginate": {
        "sFirst": "Primeiro",
        "sLast": "Último",
        "sNext": "Próximo",
        "sPrevious": "Anterior"
      },
      "oAria": {
        "sSortAscending": ": Ordenar colunas de forma ascendente",
        "sSortDescending": ": Ordenar colunas de forma descendente"
      },
      "buttons": {
        "copy": "Copiar",
        "colvis": "Visibilidade"
      }
    }
  });
});
</script>
</body>
</html>

