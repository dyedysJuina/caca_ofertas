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

  if(isset($_GET['idempresa']) && isset($_GET['idproduto'])){
    $idimg = $_GET['idimg'];
    $descricao = $_GET['descricao'];
    $idproduto = $_GET['idproduto'];
    $idempresa = $_GET['idempresa'];
    $nomeproduto = $_GET['nome'];
    $preco_unitario = $_GET['preco_unitario'];
    $preco_oferta = $_GET['preco_oferta'];
    $inicio_oferta = $_GET['inicio_oferta'];
    $fim_oferta = $_GET['fim_oferta'];
    $data_cadastro = date('Y-m-d H:i:s');



   
    $sql = "INSERT INTO promocoes (idimg, idproduto, idempresa, nome, preco_unitario, preco_oferta, inicio_oferta, fim_oferta, data_cadastro,descricao)
     VALUES                      ('$idimg','$idproduto','$idempresa','$nomeproduto','$preco_unitario','$preco_oferta','$inicio_oferta','$fim_oferta','$data_cadastro','$descricao')";
    $query = mysqli_query($conn, $sql);
    $afetada = mysqli_affected_rows($conn);
  
    if ($afetada > 0) {
      echo "Cadastrou com sucesso!";
    } else {
      echo "Não foi possível cadastrar. Erro: " . mysqli_error($conn);
    }
  }
  ?>
  



      

  
</body>
</html>
