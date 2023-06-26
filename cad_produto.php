<!DOCTYPE html>
<html>
<head>
    <title>Exemplo de Seleções e Inputs Lado a Lado</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
    <?php include_once("conexao.php");?>
    <div class="container">
        <h2>Exemplo de Seleções e Inputs Lado a Lado</h2>
        <form action="" method="post">
            <div class="row">
                <div class="col">
                    <select class="form-control" name="idcatprincipal" id="idcatprincipal">
                        <option>Tip de Oferta</option>
                        <?php
                        // Carrega as opções da categoria principal do banco de dados
                        $sql = "SELECT * FROM categoria_principal";
                        $query = mysqli_query($conn, $sql);
                        while($resultado = mysqli_fetch_assoc($query)){
                            ?>
                            <option value="<?php echo $resultado['idcatprincipal'];?>"><?php echo $resultado['nome'];?></option>
                            <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="col">
                    <select class="form-control" name="idcategoria" id="idcategoria">
                        <option value="">Categoria</option>
                    </select>
                </div>
                <div class="col">
                    <select class="form-control" name="idsubcategoria" id="idsubcategoria">
                        <option value="">Subcategoria</option>
                    </select>
                </div>
            </div>
        </form>
        <br>
        <div class="row">
            <div class="col">
                <input type="text" class="form-control" placeholder="Input 1">
            </div>
            <div class="col">
                <input type="text" class="form-control" placeholder="Input 2">
            </div>
            <div class="col">
                <input type="text" class="form-control" placeholder="Input 3">
            </div>
        </div>
    </div>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
        });


        $(document).ready(function() {
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
        });
    </script>
</body>
</html>
