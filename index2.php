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
        <h1>Escolha suas Frutas</h1>
        <?php
        if (isset($_POST['submit'])) {
            $nome = $_POST['nome'];
            $tamanho = $_POST['tamanho'];
            $peso = $_POST['peso'];
            $quantidade = $_POST['quantidade'];
            $preco = $_POST['preco'];
           

            $stmt = $pdo->prepare('INSERT INTO produtos (nome,tamanho,peso,quantidade,preco)
                                        VALUES(:nome, :tamanho, :peso, :quantidade, :preco)');
            $stmt->execute(['nome' => $nome,
            'tamanho' => $tamanho,
            'peso' => $peso, 
            'quantidade' => $quantidade, 
            'preco' => $preco]);

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

        <label for="nome">Nome da fruta:</label>
        <input type="text" name="nome" required><br>

        <label for="tamanho">Tamanho:</label>
        <input type="text" name="tamanho" required><br>

        <label for="peso">Peso:</label>
        <input type="text" name="peso" required><br>

        <label for="quantidade">Quantidade:</label>
        <input type="text" name="quantidade" required><br>

        <label for="preco">preco:</label>
        <input type="text" name="preco" required><br>

    

        <div>
            <button type="submit" name="submit" value="Agendar">Agendar</button>
            <button><a href="listar2.php">Listar</a></button>
            </div>
        </form>
</body>
</html>