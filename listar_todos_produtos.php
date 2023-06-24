<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>

<?php include_once("conexao.php");

$sql = "SELECT * FROM produtos";
$query = mysqli_query($conn, $sql);

while($resultado = mysqli_fetch_assoc($query)) {
    $idproduto = $resultado['idproduto'];
    $nome = $resultado['nome'];
    $idempresa = $resultado['idempresa'];
    $preco_unitario = $resultado['preco_unitario'];
    $preco_venda = $resultado['preco_venda'];
?>
    <form action="processa_oferta.php" method="GET">
        <input type="hidden" name="idproduto[]" value="<?php echo $idproduto; ?>">
        <input type="hidden" name="idempresa[]" value="<?php echo $idempresa; ?>">
        <input type="text" placeholder="Nome produto" value="<?php echo $nome; ?>" name="nome[]">
        <input type="text" placeholder="Preço unitário" value="<?php echo $preco_unitario; ?>" name="preco_unitario[]">
        <input type="text" placeholder="Preço venda" value="<?php echo $preco_venda; ?>" name="preco_venda[]">
        <input type="text" placeholder="Preço da oferta" value="" name="preco_da_oferta[]">
        <input type="date" placeholder="Início da Oferta" value="" name="inicio_oferta[]">
        <input type="date" placeholder="Fim da Oferta" value="" name="fim_oferta[]">
        <button type="submit">Cadastrar</button>
        <hr>
    </form>
<?php
}
?>

</body>
</html>
