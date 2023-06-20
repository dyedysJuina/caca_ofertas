<?php
// Conexão com o banco de dados
include_once("conexao.php");

$idcatprincipal = $_POST['idcatprincipal'];
$sql = "SELECT * FROM categorias WHERE idcatprincipal = $idcatprincipal";
$query = mysqli_query($conn, $sql);
while ($resultado = mysqli_fetch_assoc($query)) {
  ?>
  <option value="<?php echo $resultado['id']; ?>"><?php echo $resultado['nome']; ?></option>
  <?php
}
?>
