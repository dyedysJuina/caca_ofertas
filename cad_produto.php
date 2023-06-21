<!DOCTYPE html>
<html>
<head>
  <title>Exemplo de Selects com Bootstrap e AJAX</title>
  <!-- Importando bibliotecas -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
  <div class="container">
    <form method="POST" action="">
      <div class="row">
          
          
          <div class="col-md-4">
          <label for="empresas">Supermercados</label>
          <select id="txt-id-empresa" class="form-control" name="txt-id-empresa">
            <option value="">Selecione Supermercado</option>
            <?php
            include_once("conexao.php");
            $sql = "SELECT * FROM empresas";
            $query = mysqli_query($conn, $sql);
            while($resultado = mysqli_fetch_assoc($query)) {
              ?>
              <option value="<?php echo $resultado['idempresa']; ?>"><?php echo $resultado['nome']; ?></option>
              <?php
            }
            ?>
          </select>
        </div>
          
          
          
          
          
        <div class="col-md-4">
          <label for="estadoSelect">Categoria Principal</label>
          <select id="categoriaprincipal" class="form-control" name="categoriaprincipal">
            <option value="">Selecione Categoria Principal</option>
            <?php
            include_once("conexao.php");
            $sql = "SELECT * FROM categoria_principal";
            $query = mysqli_query($conn, $sql);
            while($resultado = mysqli_fetch_assoc($query)) {
              ?>
              <option value="<?php echo $resultado['idcatprincipal']; ?>"><?php echo $resultado['nome']; ?></option>
              <?php
            }
            ?>
          </select>
        </div>
        <div class="col-md-4">
          <label for="cidadeSelect">Categorias</label>
          <select id="categoria" class="form-control" name="categoria">
            <option value="">Selecione Categoria</option>
          </select>
        </div>
        
        
        <div class="col-md-4">
          <label for="cidadeSelect">Subcategorias</label>
          <select id="subcategoria" class="form-control" name="subcategoria">
            <option value="">Selecione Subcategoria</option>
          </select>
        </div>
        
        
        <div class="col-md-4">
          <label for="cidadeSelect">Nome do Produto</label>
            <input type="text" placeholder="Nome do Produto" name="txt-nome-produto">
        </div>
        
        <div class="col-md-4">
          <label for="cidadeSelect">Descrição do Item</label>
            <input type="text" placeholder="Descreva sobre o item" name="txt-descricao">
        </div>
        
        <div class="col-md-4">
          <label for="cidadeSelect">Preco de Compra</label>
            <input type="text" placeholder="R$" name="txt-preco-compra">
        </div>
        
        <div class="col-md-4">
          <label for="cidadeSelect">Preco de Venda</label>
            <input type="text" placeholder="R$" name="txt-preco-venda">
        </div>
        
        <div class="col-md-4">
          <label for="cidadeSelect">qtd comprada</label>
            <input type="number" placeholder="Qtd-comprada" name="qtd-comprada">
        </div>
        
       <?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['txt-nome-produto'];
    $subcategoria_id = $_POST['categoria'];
    $descricao = $_POST['txt-descricao'];

    // Obter os preços de compra e venda substituindo vírgula por ponto
    $preco_compra = str_replace(',', '.', $_POST['txt-preco-compra']);
    $preco_venda = str_replace(',', '.', $_POST['txt-preco-venda']);

    $empresa_id = $_POST['txt-id-empresa'];
    $data_cadastro = date('Y-m-d H:i:s');
    $qtd_comprada = $_POST['qtd-comprada'];

    // Calcular o total da compra
    $total_da_compra = $preco_compra * $qtd_comprada;

    $sql = "INSERT INTO produtos (nome, subcategoria_id, descricao, preco_compra, preco_venda, idsupermercado, data_cadastro, qtd_comprada, total_da_compra) values 
    ('$nome','$subcategoria_id','$descricao','$preco_compra','$preco_venda','$empresa_id','$data_cadastro','$qtd_comprada','$total_da_compra')";
    $query = mysqli_query($conn, $sql);
    $linha = mysqli_affected_rows($conn);
        
        if($linha === 1){
            echo"cadastrou com sucesso";
        }else{
            echo"nao cadastrou";
        }
        }
        ?>

        <button type="submit">Cadastrar Item</button>
        
        
      </div>
    </form>
  </div>

  <script>
    $(document).ready(function() {
      $('#categoriaprincipal').on('change', function() {
        let idcatprincipal = this.value;
        $.ajax({
          url: "get-categorias.php",
          type: "POST",
          data: { idcatprincipal: idcatprincipal },
          cache: false,
          success: function(result) {
            $('#categoria').html(result);
          }
        });
      });
    });
    
    
      $(document).ready(function() {
      $('#categoria').on('change', function() {
        let categoria = this.value;
        $.ajax({
          url: "get-subcategorias.php",
          type: "POST",
          data: { categoria: categoria },
          cache: false,
          success: function(result) {
            $('#subcategoria').html(result);
          }
        });
      });
    });
    
    
  </script>
</body>
</html>
















