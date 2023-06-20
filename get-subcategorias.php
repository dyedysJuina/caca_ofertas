<?php
// Conexão com o banco de dados
include_once("conexao.php");

$categoria = $_POST['categoria'];
$sql = "SELECT * FROM subcategorias WHERE categoria_id = $categoria";
$query = mysqli_query($conn, $sql);
while ($resultado = mysqli_fetch_assoc($query)) {
  ?>
  <option value="<?php echo $resultado['id']; ?>"><?php echo $resultado['nome']; ?></option>
  <?php
}
?>
