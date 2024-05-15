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
    ?>

    <title>Editar Marcas</title>

    <?php
    include_once '../Controller/ControllerUser.php';

    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        $userController = new ControllerUser();

        $user = $userController->getBrandBoatById($id);

        if (!$user) {
            echo "Usuário não encontrado";
            exit;
        }

        if (isset($_POST['Submit'])) {
            $marcaBarco = $_POST['marca_barco'];

            $userController->updateBrandBoat($id, $marcaBarco);
            echo "<script>alert('Marca atualizada com sucesso!'); window.location.href='view-brandBoat.php';</script>";
        }
    } else {
        echo 'ID de usuário não fornecido';
        exit;
    }
    ?>
    <div class="form_update">
        <form name="form1" method="post" action="">
            <table border="0">
                <tr>
                    <td>Email</td>
                    <td><input type="text" name="marca_barco" value="<?php echo $user['marcaBarco']; ?>"></td>
                </tr>
                <tr>
                    <td>
                        <input type="submit" name="Submit" value="Atualizar">
                    </td>
                    <td>
                        <input type='submit' formaction='../View/view-brandBoat.php' value="Voltar">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</body>

</html>