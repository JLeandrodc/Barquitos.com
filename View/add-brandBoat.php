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
        $userController->addBrandBoat();
        echo "<script>alert('Marca cadastrada com sucesso!'); window.location.href='add-brandBoat.php';</script>";
    }
    ?>
    <div class="form_CADASTRO">
        <h1 style="margin-top: 20px;">Registre uma marca de barco</h1>
        <form method="post" name="form1" action="">
            <table>
                <tr>
                    <td><label for="marca_barco">Marca do Barco:</label></td>
                    <td><input id="marca_barco" name="marca_barco" required></td>
                </tr>
            </table>
            <table style="margin: 0 auto;">
                <tr>
                    <td style="text-align: center;">
                        <button type="submit" name="Submit" value="Cadastrar">Salvar registro</button>
                        <?php if (isset($_SESSION['tipoUsuario']) && $_SESSION['tipoUsuario'] == 1) {
                            echo '<button type="button" onclick="window.location.href=\'view-brandBoat.php\'">Editar marcas de barco</button>';
                        } ?>
                        <button type="button" onclick="window.location.href='add-boat.php'">Registrar tipo de barco</button>
                    </td>
                </tr>
            </table>

        </form>
    </div>
</body>

</html>