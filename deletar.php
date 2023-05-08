<?php
include 'db.php';

if (!isset($_GET['id'])) {
    header('Location: listar.php');
    exit;
}

$id = $_GET['id'];
$stmt = $pdo->prepare('SELECT * FROM clientes WHERE id = ?');
$stmt->execute([$id]);
$appointment = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$appointment) {
    header('Location: listar.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $stmt = $pdo->prepare('DELETE FROM clientes WHERE id =?');
    $stmt ->execute([$id]);
    header('Location: listar.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deletar Compromisso</title>
</head>
<body>
  <h1>Deletar Compromiso<h1>
    <p>Tem certeza que deseja deletar o seu cadatro</p>
        <?php echo $appointment['nome'];?>
    <form method="post">
      <button type="submit">Sim</button>
      <a href="listar.php">Não</a>
    </form>
</body>
</html>    