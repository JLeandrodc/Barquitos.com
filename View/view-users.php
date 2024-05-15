<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Locação de Barcos</title>
    <link rel="stylesheet" href="./../style.css">
    <style>
        /* Estilos CSS para a tabela */
        .styled-table {
            width: 80%;
            border-collapse: collapse;
            margin: 25px auto;
            font-size: 0.9em;
            font-family: sans-serif;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
        }

        .styled-table th,
        .styled-table td {
            padding: 12px 15px;
            text-align: left;
        }

        .styled-table thead tr {
            background-color: #CCCCCC;
            color: #000000;
        }

        /* Definição de cores para linhas pares e ímpares */
        .odd-row {
            background-color: #f3f3f3;
        }

        .even-row {
            background-color: #FFFFFF;
        }

        .styled-table tbody tr:hover {
            background-color: #d6e9f9;
        }

        .styled-table tbody tr td a {
            text-decoration: none;
            color: #007bff;
        }
    </style>
</head>

<body>
    <?php
    include_once 'header.php';
    include_once '../Controller/ControllerUser.php';
    $userController = new ControllerUser();
    $users = $userController->viewUsers();
    ?>

    <h2 style="font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 1.2em; color: white; margin-top: 20px; background-color: rgba(0, 0, 0, 0.5); padding: 10px; text-align: center;">Banco de dados (Aluguel de barcos)</h2>


    <table class='styled-table'>
        <tr bgcolor='#CCCCCC'>
            <td>
                <font size="3" face="Verdama, Arial, Helvetica, sans-serif"><strong>Código:</strong></font>
            </td>
            <td>
                <font size="3" face="Verdama, Arial, Helvetica, sans-serif"><strong>Nome do Cliente:</strong></font>
            </td>
            <td>
                <font size="3" face="Verdama, Arial, Helvetica, sans-serif"><strong>CPF:</strong></font>
            </td>
            <td>
                <font size="3" face="Verdama, Arial, Helvetica, sans-serif"><strong>Email:</strong></font>
            </td>
            <td>
                <font size="3" face="Verdama, Arial, Helvetica, sans-serif"><strong>Tipo do barco:</strong></font>
            </td>
            <td>
                <font size="3" face="Verdama, Arial, Helvetica, sans-serif"><strong>Marca do barco:</strong></font>
            </td>
            <td>
                <font size="3" face="Verdama, Arial, Helvetica, sans-serif"><strong>Valor do barco:</strong></font>
            </td>
            <td>
                <font size="3" face="Verdama, Arial, Helvetica, sans-serif"><strong>Descrição:</strong></font>
            </td>
            <td>
                <?php if (isset($_SESSION['tipoUsuario']) && $_SESSION['tipoUsuario'] == 1) {
                    echo '<font size="3" face="Verdama, Arial, Helvetica, sans-serif"><strong>Ações</strong></font>';
                } ?>
            </td>

        </tr>
        <?php
        $rowColor = true; // Variável para alternar as cores das linhas

        if (isset($_SESSION['tipoUsuario']) && $_SESSION['tipoUsuario'] == 1) {
            foreach ($users as $user) {
                $rowColorClass = $rowColor ? 'odd-row' : 'even-row';
                echo "<tr class='$rowColorClass'>";
                echo "<td>" . $user['id'] . "</td>";
                echo "<td>" . $user['nome'] . "</td>";
                echo "<td>" . $user['cpf'] . "</td>";
                echo "<td>" . $user['email'] . "</td>";
                echo "<td>" . $user['tipo_barco'] . "</td>";
                echo "<td>" . $user['marca_barco'] . "</td>";
                echo "<td>" . $user['valorBarco'] . "</td>";
                echo "<td>" . $user['descricao'] . "</td>";
                echo "<td>
                    <a href=\"edit-users.php?id={$user['id']}\" onClick=\"return confirm('Tem certeza que deseja editar?')\">Editar</a> | 
                    <a href=\"delete-user.php?id={$user['id']}\" onCLick=\"return confirm('Tem certeza que deseja excluir?')\">Excluir</a> | 
                    <a href=\"add-users.php\">Adicionar</a></td>";
                echo "</tr>";
            }
        } else {
            foreach ($users as $user) {
                $rowColorClass = $rowColor ? 'odd-row' : 'even-row';
                echo "<tr class='$rowColorClass'>";
                echo "<td>" . $user['id'] . "</td>";
                echo "<td>" . $user['nome'] . "</td>";
                echo "<td>" . $user['cpf'] . "</td>";
                echo "<td>" . $user['email'] . "</td>";
                echo "<td>" . $user['tipo_barco'] . "</td>";
                echo "<td>" . $user['marca_barco'] . "</td>";
                echo "<td>" . $user['valorBarco'] . "</td>";
                echo "<td>" . $user['descricao'] . "</td>";
                echo "<td>";
            }
        }
        ?>
    </table>
</body>

</html>