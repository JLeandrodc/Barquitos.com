<?php
session_start()
?>
<header>
    <nav>
        <ul>
            <?php if (isset($_SESSION['tipoUsuario']) && $_SESSION['tipoUsuario'] == 1) {
                echo '<li style="margin-left: 90px;"></li>';
            } else {
                echo '<li style="margin-left: 147px;"></li>';
            } ?>
            <li><a href="add-users.php">Cadastrar pedido</a></li>
            <li><a href="add-boat.php">Cadastrar barcos</a></li>
            <li><a href="view-users.php">Barcos alugados</a></li>
            <li><a href="./../index.php">Sair da conta</a></li>
            <li style="margin-left: 10px;"></li>
            <tr style="display: flex; margin-left: 100px; align-items: center;">
                <span style="padding: 8px 12px; background-color: black; color: #fff; border-radius: 4px;">
                    <?php if (isset($_SESSION['tipoUsuario']) && $_SESSION['tipoUsuario'] == 1) {
                        echo 'Tela de ADM';
                    } else {
                        echo 'Tela de usuário padrão';
                    } ?>
                </span>
            </tr>
        </ul>
    </nav>
</header>