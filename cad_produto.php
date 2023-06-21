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
    <form method="POST" action="" enctype="multipart/form-data">
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
          <input type="text" class="form-control" placeholder="Nome do Produto" name="txt-nome-produto">
        </div>
        
        <div class="col-md-4">
          <label for="cidadeSelect">Descrição do Item</label>
          <input type="text" class="form-control" placeholder="Descreva sobre o item" name="txt-descricao">
        </div>
        
        <div class="col-md-4">
          <label for="cidadeSelect">Preco de Compra</label>
          <input type="text" class="form-control" placeholder="R$" name="txt-preco-compra">
        </div>
        
        <div class="col-md-4">
          <label for="cidadeSelect">Preco de Venda</label>
          <input type="text" class="form-control" placeholder="R$" name="txt-preço-venda">
</div>

    <div class="col-md-4">
      <label for="cidadeSelect">Qtd Comprada</label>
      <input type="number" class="form-control" placeholder="Qtd-comprada" name="qtd-comprada">
    </div>
    
    <div class="col-md-4">
      <label for="cidadeSelect">Fotos do Produto</label>
      <input type="file" class="form-control-file" name="imagens[]" multiple>
    </div>
    
    <div class="col-md-12 mt-4">
      <button type="submit" class="btn btn-primary">Cadastrar</button>
    </div>
  </div>
</form>
</div>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include_once("conexao.php");

    $nome = $_POST['txt-nome-produto'];
    $subcategoria_id = $_POST['categoria'];
    $descricao = $_POST['txt-descricao'];
    $preco_compra = str_replace(',', '.', $_POST['txt-preco-compra']);
    $preco_venda = str_replace(',', '.', $_POST['txt-preco-venda']);
    $empresa_id = $_POST['txt-id-empresa'];
    $data_cadastro = date('Y-m-d H:i:s');
    $qtd_comprada = $_POST['qtd-comprada'];

    // Calcular o total da compra
    $total_da_compra = $preco_compra * $qtd_comprada;

    $sql = "INSERT INTO produtos (nome, subcategoria_id, descricao, preco_compra, preco_venda, idsupermercado, data_cadastro, qtd_comprada, total_da_compra) VALUES 
    ('$nome','$subcategoria_id','$descricao','$preco_compra','$preco_venda','$empresa_id','$data_cadastro','$qtd_comprada','$total_da_compra')";
    $query = mysqli_query($conn, $sql);
    $linha = mysqli_affected_rows($conn);
    $ultimo_id = mysqli_insert_id($conn);

    if ($linha === 1) {
        $imagens = $_FILES['imagens'];
        $numImagens = count($imagens['name']);

        for ($i = 0; $i < $numImagens; $i++) {
            $nome_imagem = uniqid() . '_' . $imagens['name'][$i];
            $url_caminho = "img_imagens/" . $nome_imagem;

            // Faz o upload da imagem para a pasta "img_imagens"
            $destino = "img_imagens/" . $nome_imagem;
            $arquivo_temporario = $imagens['tmp_name'][$i];
            
            if (move_uploaded_file($arquivo_temporario, $destino)) {
                $sqlimg = "INSERT INTO img_produtos (nome, url_caminho, idproduto) VALUES ('$nome_imagem','$url_caminho','$ultimo_id')";
                $queryimg = mysqli_query($conn, $sqlimg);
                $linhaimg = mysqli_affected_rows($conn);

                if ($linhaimg !== 1) {
                    echo "Erro ao cadastrar a imagem";
                }
            } else {
                echo "Erro ao fazer o upload da imagem";
            }
        }

        echo "Cadastrou com sucesso";
    } else {
        echo "Erro ao cadastrar o produto";
    }
}
?>

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



































