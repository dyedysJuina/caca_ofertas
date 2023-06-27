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
          <select id="idempresa" class="form-control" name="idempresa">
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
          <select class="form-control" name="idcatprincipal" id="idcatprincipal" class="form-control">
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
          <select class="form-control" name="idcategoria" id="idcategoria" class="form-control" >
            <option value="">Selecione Categoria</option>
          </select>
        </div>
        
        <div class="col-md-4">
          <label for="cidadeSelect">Subcategorias</label>
          <select id="idsubcategoria" class="form-control" name="idsubcategoria">
            <option value="">Selecione Subcategoria</option>
          </select>
        </div>
        
        <div class="col-md-4">
          <label for="cidadeSelect">Nome do Produto</label>
          <input type="text" class="form-control" placeholder="Nome do Produto" name="nome">
        </div>


        <div class="col-md-4">
          <label for="cidadeSelect">Fornecedor</label>
          <input type="text" class="form-control" placeholder="Nome Fornecedor" name="idfornecedor">
        </div>

        
        <div class="col-md-4">
          <label for="cidadeSelect">Descrição do Item</label>
          <input type="text" class="form-control" placeholder="Descreva sobre o item" name="txt-descricao">
        </div>
        
        <div class="col-md-4">
          <label for="cidadeSelect">Preço de Compra</label>
          <input type="text" class="form-control" placeholder="R$" name="txt-preco-compra">
        </div>
        
        <div class="col-md-4">
          <label for="cidadeSelect">Preço de Venda</label>
          <input type="text" class="form-control" placeholder="R$" name="txt-preco-venda">
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

  <!-- Modal -->
  <div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="successModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="successModalLabel">Sucesso!</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>Cadastrado com sucesso!</p>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="errorModal" tabindex="-1" role="dialog" aria-labelledby="errorModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="errorModalLabel">Erro!</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>Erro ao cadastrar o produto!</p>
          <?php echo mysqli_error($conn); ?>
        </div>
      </div>
    </div>
  </div>

<script>
  $(document).ready(function() {
    $('#idcatprincipal').on('change', function() {
      let idcatprincipal = this.value;
      $.ajax({
        url: "obter_categorias.php", // Arquivo PHP para carregar as categorias
        type: "POST",
        data: { idcatprincipal: idcatprincipal },
        cache: false,
        success: function(result) {
          $('#idcategoria').html(result); // Insere as opções de categoria retornadas no select
        }
      });
    });

    $('#idcategoria').on('change', function() {
      let idcategoria = this.value;
      $.ajax({
        url: "obter_subcategoria.php", // Arquivo PHP para carregar as categorias
        type: "POST",
        data: { idcategoria: idcategoria },
        cache: false,
        success: function(result) {
          $('#idsubcategoria').html(result); // Insere as opções de categoria retornadas no select
        }
      });
    });

    $('form').submit(function(e) {
      e.preventDefault(); // Evita o envio padrão do formulário

      var form = $(this);
      var url = form.attr('action');
      var formData = new FormData(form[0]);

      $.ajax({
        type: "POST",
        url: url,
        data: formData,
        processData: false,
        contentType: false,
        success: function(response) {
          $('#successModal').modal('show'); // Exibe a janela modal de sucesso
          form[0].reset(); // Limpa os campos do formulário
        },
        error: function(xhr, status, error) {
          $('#errorModal').modal('show'); // Exibe a janela modal de erro
          console.log(xhr.responseText);
        }
      });
    });
  });
</script>

</body>
</html>
