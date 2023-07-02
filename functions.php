<link rel="stylesheet" href="style.css">

<?php
/*
function pesquisar_prod_empresa($conn,$nome) {
    $sql = "SELECT * FROM produtos where nome LIKE '%$nome%'";
    $query = mysqli_query($conn, $sql);
    while($resultado =  mysqli_fetch_assoc($query)){

        echo "<tr>";
      
        echo "<td>{$resultado['idimg']}</td>";
        echo "<td>{$resultado['nome']}</td>";
        echo "<td>{$resultado['descricao']}</td>";
        echo "<td>{$resultado['preco_venda']}</td>";
        echo "<td><input type='text' placeholder='R$ --' name='valor_oferta' id='preco'></td>";
        echo "<td><input type='date' name='inicio'></td>";
        echo "<td><input type='date' name='fim' id='fim'></td>";
        echo "<td><button type='submit'>Ofertar</button></td>";
    
        // Adicione aqui as outras colunas que deseja exibir
        echo "</tr>";
    }

}
*/
?>



<?php


function pesquisa_nome($conn, $nome) {
    $sql = "SELECT idproduto, idempresa, idimg, nome, descricao, preco_venda FROM produtos WHERE nome LIKE '%$nome%' GROUP BY idproduto";
    $query = mysqli_query($conn, $sql);

    while ($resultado = mysqli_fetch_assoc($query)) {
        $idempresa = $resultado['idempresa'];
        $idproduto = $resultado['idproduto'];
        $idimg = $resultado['idimg'];
        $nome = $resultado['nome'];
        $descricao = $resultado['descricao'];
        $preco_venda = $resultado['preco_venda'];
        ?>
        <tr>
            <form action="processa_oferta.php" method="get">
            <td>  <input type="text" value="<?php echo $_GET['idempresa'];?>" name="idempresa"></td>
            <input type="hidden" value="<?php echo $idproduto;?>" name="idproduto">
                <input type="hidden" value="<?php echo $idimg;?>" id="imagem">
                <td><textarea cols="20" rows="2" name="nome"><?php echo $nome;?></textarea></td>
                <td><textarea cols="20" rows="2" name="descricao"><?php echo $descricao;?></textarea></td>
                <td><input type="text" value="<?php echo $preco_venda;?>" id="preco" name="preco_unitario"></td>
                <td><input type='text' placeholder='R$ --' name='preco_oferta' id='preco'></td>
                <td><input type='date' name='inicio_oferta'></td>
                <td><input type='date' name='fim_oferta' id='fim'></td>
                <td><button type='submit'>Ofertar</button></td>
            </form>
        </tr>
        <?php
    }
}   
 ?>









<?php

function pesquisa_inicio_vazio($conn) {
    $sql = "SELECT * FROM produtos GROUP By idproduto";
    $query = mysqli_query($conn, $sql);

    while ($resultado = mysqli_fetch_assoc($query)) {
        $idempresa = $resultado['idempresa'];
        $idproduto = $resultado['idproduto'];
        $idimg = $resultado['idimg'];
        $nome = $resultado['nome'];
        $descricao = $resultado['descricao'];
        $preco_venda = $resultado['preco_venda'];
        ?>
        <tr>
            <form action="processa_oferta.php" method="get">
                
                <input type="hidden" value="<?php echo $idempresa;?>" name="idempresa">
                 <input type="hidden" value="<?php echo $idproduto;?>" name="idproduto">
                <td><input type="text"  value="<?php echo $idimg;?>" id="imagem" name="idimg"></td>
                <td><textarea cols="20" rows="2" name="nome"><?php echo $nome;?></textarea></td>
                <td><textarea cols="20" rows="2" name="descricao"><?php echo $descricao;?></textarea></td>
                <td><input type="text" value="<?php echo $preco_venda;?>" id="preco" name="preco_unitario"></td>
                <td><input type='text' placeholder='R$ --' name='preco_oferta' id='preco'></td>
                <td><input type='date' name='inicio_oferta'></td>
                <td><input type='date' name='fim_oferta' id='fim'></td>
                <td><button type='submit'>Ofertar</button></td>
            </form>
        </tr>
        <?php
    }
}   

?>
