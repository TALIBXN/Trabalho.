
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Css/Style_listarclientes.css">
    <title>Lista de Clientes</title>
</head>
<body>

<a href="adicionar_cliente.php" class="btn-adicionar">Adicionar</a>

<section>
<div class="Lista">
    <!-- Botão para adicionar cliente -->
    <h2>Lista de Clientes</h2><br>
    <div class="tabela">
        <table>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Telefone</th>
                <th>Empresa</th>
                <th>Ações</th>
            </tr>

<?php
include 'conexao.php'; 
// Consultar todos os usuarios
$sql = "SELECT * FROM CLIENTES";
$resultado = $conexao->query($sql);


if ($resultado->num_rows > 0) {
  while ($row = $resultado->fetch_assoc()) {
      echo "<tr class='linha'>
                <td class='coluna'>{$row['ID']}</td>
                <td class='coluna'>{$row['NOME']}</td>
                <td class='coluna'>{$row['EMAIL']}</td>
                <td class='coluna'>{$row['TELEFONE']}</td>
                <td class='coluna'>{$row['EMPRESA']}</td>
                <td class='coluna_btn'>
                  <a href='?acao=deletar&id={$row['ID']}' class='deletar'>Deletar</a>
                  <a href='editar_clientes.php?id={$row['ID']}' class='editar'>Editar</a>
                </td>
          </tr>";
  }
} else {
  echo "<tr><td colspan='6'>Nenhum cliente encontrado</td></tr>";
}

// Deletar usuario
if (isset($_GET['acao']) && $_GET['acao'] == 'deletar' && isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM CLIENTES WHERE ID = $id";
    $conexao->query($sql);
    header("Location: listar_clientes.php");
}

// Fecha a conexão
$conexao->close();
?>

    </table><br>
    </div> 
</div> <!-- Fechamento correto da div Lista -->
</section>
</body>
</html>


