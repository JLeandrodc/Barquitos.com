<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Locação de Barcos</title>
    <link rel="stylesheet" href="./../style.css">
</head>

<body>

    <?php
    include_once 'header.php';
    include_once '../Controller/ControllerUser.php';
    $userController = new ControllerUser();

    if (isset($_POST['Submit'])) {
        $userController->addBoat();
        echo "<script>alert('Barco cadastrado com sucesso!'); window.location.href='add-boat.php';</script>";
    }
    ?>
    <div class="form_CADASTRO">
        <form method="post" name="form1" action="">
            <center>
                <h1>Registre o tipo de barco</h1>
            </center>
            <table>
                <tr>
                    <td><label for="tipo_barco">Tipo do Barco:</label></td>
                    <td><input id="tipo_barco" name="tipo_barco" required></td>
                </tr>
            </table>
            <table>
                <div>
                    <button type="submit" name="Submit" value="Cadastrar">Salvar registro</button>
                    <?php if (isset($_SESSION['tipoUsuario']) && $_SESSION['tipoUsuario'] == 1) {
                        echo '<button type="button" onclick="window.location.href=\'view-boat.php\'">Editar tipos de barco</button>';
                    } ?>
                    <button type="button" onclick="window.location.href='add-brandBoat.php'">Registrar marcas de barco</button>
                </div>
            </table>
        </form>
    </div>
</body>

</html>