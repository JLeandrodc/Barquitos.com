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
        <form action="View/realizarCadastro.php" method="post">
            <div>
                <label style="color: aliceblue;" for="email">Email:</label>
                <input type="email" id="email" name="email" required><br>

                <label style="color: aliceblue;" for="senha">Senha:</label>
                <input type="password" id="senha" name="senha" required><br>


                <td>
                    <label style="color: aliceblue;" for="tipo_usuario">Tipo de usuário:</label>
                </td>
                <td>
                    <select id="tipo_usuario" name="tipo_usuario" required>
                        <?php
                        $usuarioPadrao = 0;
                        $usuarioAdministrador = 1;
                        echo "<option value='{$usuarioPadrao}'>Usuário Padrão</option>";
                        echo "<option value='{$usuarioAdministrador}'>Administrador</option>";
                        ?>
                    </select>
                </td>

            </div>

            <button style="margin-top: 30px"  type="submit" class="button" name="Submit">Cadastrar</button>
        </form>
        <a style="margin-top: 20px; color: aliceblue;" href='index.php'>Fazer login</a>
    </div>
</body>

</html>