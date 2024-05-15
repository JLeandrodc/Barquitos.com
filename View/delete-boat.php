<?php
// Incluindo o controlador
include_once '../Controller/ControllerUser.php';

// Verifica se o parâmetro 'id' foi enviado via GET
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $userController = new ControllerUser();
    
    //Checa se foi referenciado em outra tabela
    $referencesResult = $userController->checkReferencesBoat($id);

    if ($referencesResult > 0) {
        // O item está sendo referenciado, não é possível excluir
        echo "<script>alert('Impossivel excluir, opção referenciada em outro cadastro!'); window.location.href='../View/view-boat.php';</script>";
    } else {
        // Chama o método deleteUser para excluir o usuário com o ID fornecido
        $userController->deleteBoat($id);
        // Redireciona para a página de visualização de usuários após a exclusão
        header("Location: ../View/view-boat.php");
        exit();
    }
}