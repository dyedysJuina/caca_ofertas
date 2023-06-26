<?php
// Obter a conexão com o banco de dados
include_once("conexao.php");

// Verificar se o ID da categoria principal foi enviado via POST
if (isset($_POST['idcategoria'])) {
    $idcategoria = $_POST['idcategoria'];

    // Consultar as categorias com base no ID da categoria principal
    $sql = "SELECT * FROM subcategorias WHERE idcat= '$idcategoria'";
    $query = mysqli_query($conn, $sql);

    // Construir as opções do select das categorias
    $options = "<option value=''>SubCategoria</option>";
    while ($resultado = mysqli_fetch_assoc($query)) {
        $options .= "<option value='".$resultado['idsubcat']."'>".$resultado['nome']."</option>";
    }

    // Retornar as opções como resposta para o JavaScript
    echo $options;
}
?>
