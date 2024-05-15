<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Locação de Barcos</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="index">
        <h1>Barquitos.com</h1>
        <form action="View/realizarLogin.php" method="post">
            
            <label style="color: aliceblue;" for="email">Email:</label>
            <input type="email" id="email" name="email" required><br>

            <label style="color: aliceblue;" for="senha">Senha:</label>
            <input type="password" id="senha" name="senha" required><br>

            <button type="submit" class="button" name="Submit">Entrar</button>
        </form>
        <a style="margin-top: 20px; color: aliceblue;" href='cadastroEmail.php'>Cadastrar-se</a>
    </div>
</body>

</html>
