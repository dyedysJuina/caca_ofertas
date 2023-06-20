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
















