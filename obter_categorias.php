<?php
// Obter a conexão com o banco de dados
include_once("conexao.php");

// Verificar se o ID da categoria principal foi enviado via POST
if (isset($_POST['idcatprincipal'])) {
    $idcatprincipal = $_POST['idcatprincipal'];

    // Consultar as categorias com base no ID da categoria prind
    $sql = "SELECT * FROM categorias WHERE idcatprincipal = '$idcatprincipal'";
    $query = mysqli_query($conn, $sql);

    // Construir as opções do select das categorias
    $options = "<option value=''>Categoria</option>";
    while ($resultado = mysqli_fetch_assoc($query)) {
        $options .= "<option value='".$resultado['idcategoria']."'>".$resultado['nome']."</option>";
    }

    // Retornar as opções como resposta para o JavaScript
    echo $options;
}
?>
