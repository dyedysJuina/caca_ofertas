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

$sql = "SELECT * FROM empresas";
$query = mysqli_query($conn, $sql);?>
<form action="central.php?" method="get">
<select name="idempresa" id="idempresa">
    <?php
while($resultado = mysqli_fetch_assoc($query)){?>
<option value="<?php echo $resultado['idempresa'];?>"><?php echo $resultado['nome'];?></option>

<?php  } ?>
</select>
<button type="submit">Buscar</button>
</form>
    
</body>
</html>
