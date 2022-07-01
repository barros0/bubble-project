<?php include './src/definicoes/definicoes.php'; ?>

</div>
<div class="direita_opcoes">
    <div class="titulo">
        <h4>Definições Gerais de Conta</h4>
        <div class="campoone">
            <div class="titulo_campo">Nome</div>
            <div class="atributo_campo"><?php echo $userq['nome']; ?></div>
            <div class="editar">Editar</div>
        </div>
        <div class="atualizar_nome">
            <h5>Atualizar Nome</h5>
            <form action="./src/definicoes/definicoes_nome.php?userid=<?= $userq['id_user'] ?>" method="post">
                <input type="text" name="nome" value="<?php echo $userq['nome']; ?>" required>
                <div class="buttons_atualizar_cancelar">
                    <input type="submit" value="Atualizar">
                    <input type="button" class="btn-danger" value="Cancelar" onclick="location.href='definicoes_geral.php';">
                </div>
            </form>
        </div>
        <div class="campotwo">
            <div class="titulo_campo">Username</div>
            <div class="atributo_campo"><?php echo $userq['username']; ?></div>
            <div class="editar">Editar</div>
        </div>
        <div class="atualizar_username">
            <h5>Atualizar Username</h5>
            <form action="./src/definicoes/definicoes_username.php?userid=<?= $userq['id_user'] ?>" method="post">
                <input type="text" name="username" value="<?php echo $userq['username']; ?>" required>
                <div class="buttons_atualizar_cancelar">
                    <input type="submit" value="Atualizar">
                    <input type="button" class="btn-danger" value="Cancelar" onclick="location.href='definicoes_geral.php';">
                </div>
            </form>
        </div>
        <div class="campothree">
            <div class="titulo_campo">Email</div>
            <div class="atributo_campo"><?php echo $userq['email']; ?></div>
            <div class="editar">Editar</div>
        </div>
        <div class="atualizar_email">
            <h5>Atualizar Email</h5>
            <form action="./src/definicoes/definicoes_email.php?userid=<?= $userq['id_user'] ?>" method="post">
                <input type="text" name="email" value="<?php echo $userq['email']; ?>" required>
                <div class="buttons_atualizar_cancelar">
                    <input type="submit" value="Atualizar">
                    <input type="button" class="btn-danger" value="Cancelar" onclick="location.href='definicoes_geral.php';">
                </div>
            </form>
        </div>
    </div>
</div>
</div>

<?php include 'page_parts/footer.php'; ?>