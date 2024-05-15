<?php
// Incluindo o controlador
include_once '../Controller/ControllerUser.php';

// Verifica se o parâmetro 'id' foi enviado via GET
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Instancia o controlador de usuário
    $userController = new ControllerUser();

    // Chama o método deleteUser para excluir o usuário com o ID fornecido
    $userController->deleteUser($id);
    // Redireciona para a página de visualização de usuários após a exclusão
    header("Location: ../View/view-users.php");
    exit();
}
