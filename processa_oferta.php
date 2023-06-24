<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>



<?php
include_once("conexao.php");

if (isset($_GET['idproduto'])) {
    $idprodutos = $_GET['idproduto'];
    $idempresas = $_GET['idempresa'];
    $nomes = $_GET['nome'];
    $precos_unitarios = $_GET['preco_unitario'];
    $precos_oferta = $_GET['preco_da_oferta'];
    $inicio_ofertas = $_GET['inicio_oferta'];
    $fim_ofertas = $_GET['fim_oferta'];

    // Verificar se os arrays possuem a mesma quantidade de elementos
    if (count($idprodutos) === count($idempresas) &&
        count($idprodutos) === count($nomes) &&
        count($idprodutos) === count($precos_unitarios) &&
        count($idprodutos) === count($precos_oferta) &&
        count($idprodutos) === count($inicio_ofertas) &&
        count($idprodutos) === count($fim_ofertas)) {

        // Percorrer os arrays com um loop
        for ($i = 0; $i < count($idprodutos); $i++) {
            $idproduto = $idprodutos[$i];
            $idempresa = $idempresas[$i];
            $nome = $nomes[$i];
            $preco_unitario = $precos_unitarios[$i];
            $preco_oferta = $precos_oferta[$i];
            $inicio_oferta = $inicio_ofertas[$i];
            $fim_oferta = $fim_ofertas[$i];

            $sql = "INSERT INTO promocoes (idproduto, idempresa, nome, preco_unitario, preco_oferta, inicio_oferta, fim_oferta)
            VALUES ('$idproduto', '$idempresa', '$nome', '$preco_unitario', '$preco_oferta', '$inicio_oferta', '$fim_oferta')";
            $query = mysqli_query($conn, $sql);
            $afetada = mysqli_affected_rows($conn);

            if ($afetada > 0) {
                echo "Cadastrou com sucesso!";
            } else {
                echo "Não foi possível cadastrar. Erro: " . mysqli_error($conn);
            }
        }
    } else {
        echo "Os arrays não possuem a mesma quantidade de elementos.";
    }
}
?>



      

  
</body>
</html>
