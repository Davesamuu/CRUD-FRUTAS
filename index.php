<?php
require_once 'db.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Agendamento Médico</title>
</head>
<body>
    <div class="container-formulario">
        <h1>Cadastro para compra</h1>
        <?php
        if (isset($_POST['submit'])) {
            $nome = $_POST['nome'];
            $email = $_POST['email'];
            $telefone = $_POST['telefone'];
            $data = $_POST['data'];
           

            $stmt = $pdo->prepare('INSERT INTO clientes
            (nome, email, telefone, data)
            VALUES(:nome, :email, :telefone, :data)');
            $stmt->execute(['nome' => $nome,
            'email' => $email,
            'telefone' => $telefone, 'data' => $data]);

            if ($stmt->rowCount()) {
                echo '<span>Compromisso agendado com sucesso!</span>';
            } else {
                echo '<span>Erro ao agendar compromisso. Tente novamente mais tarde<span>';
            }
        }
        if (isset($error)) {
            echo '<span>' . $error . '</span>';
        }
    
        ?>
        <form method="post">

        <label for="nome">Nome:</label>
        <input type="text" name="nome" required><br>

        <label for="email">Email:</label>
        <input type="email" name="email" required><br>

        <label for="telefone">Telefone:</label>
        <input type="text" name="telefone" required><br>

        <label for="data">data:</label>
        <input type="date" name="data" required><br>
    

        <div>
            <button type="submit" name="submit" value="Agendar">Agendar</button>
            <button><a href="listar.php">Listar</a></button>
            </div>
        </form>
</body>
</html>