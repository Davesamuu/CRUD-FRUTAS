<?php include 'db.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>frutoids</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<h1>Cadastro de Frutas</h1>
<?php
$stmt = $pdo->query('SELECT * FROM produtos ORDER BY nome');
$produto = $stmt->fetchAll(PDO::FETCH_ASSOC);

if(count($produto) == 0) {
    echo '<p>Nenhum compromisso agendado </p>';
} else {
    echo '<table border="1">';
    echo '<thead><tr><th>Nome</th><th>E-mail</th><th>Telefone</th><th>Data</th><th>Horário</th><th colspan="2">Opções</th></tr></thead>';
    echo '<tbody>';

    foreach ($produto as $produtos) {
        echo '<tr>';
        echo '<td>' . $produtos['nome'] . '</td>';
        echo '<td>' . $produtos['tamanho'] . '</td>';
        echo '<td>' . $produtos['peso'] . '</td>';
        echo '<td>' . $produtos['quantidade'] . '</td>';
        echo '<td>' . $produtos['preco'] . '</td>';
        echo '<td><a style="color:black;" href="atualizar2.php?id=' . $produtos['id'] . '">Atualizar</a></td>';
        echo '<td><a style="color:black;" href="deletar2.php?id=' . $produtos['id'] . '">Deletar</a></';
        echo '</tr>';
    }
    echo '</tbody>';
    echo '</table>';
}
?>
</body>
</html>