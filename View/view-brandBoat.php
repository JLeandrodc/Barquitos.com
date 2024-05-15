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
    $users = $userController->readBrandBoat();
    ?>

    <h2 style="font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 1.2em; color: white; margin-top: 20px; background-color: rgba(0, 0, 0, 0.5); padding: 10px; text-align: center;">Banco de dados (Marcas de barcos)</h2>
    
    <table class='styled-table'>
        <thead>
            <tr>
                <th>Código:</th>
                <th>Marca do barco:</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $rowColor = true; // Variável para alternar as cores das linhas
            foreach ($users as $user) {
                // Aplicação das classes de cores alternadas para as linhas
                $rowColorClass = $rowColor ? 'odd-row' : 'even-row';
                echo "<tr class='$rowColorClass'>";
                echo "<td>" . $user['id'] . "</td>";
                echo "<td>" . $user['marcaBarco'] . "</td>";
                echo "<td>
                        <a href=\"edit-brandBoat.php?id={$user['id']}\" onClick=\"return confirm('Tem certeza que deseja editar?')\">Editar</a> | 
                        <a href=\"delete-brandBoat.php?id={$user['id']}\" onCLick=\"return confirm('Tem certeza que deseja excluir?')\">Excluir</a> | 
                        <a href=\"add-brandBoat.php\">Adicionar</a>
                    </td>";
                echo "</tr>";

                $rowColor = !$rowColor; // Alternar entre linhas pares e ímpares
            }
            ?>
        </tbody>
    </table>
</body>

</html>