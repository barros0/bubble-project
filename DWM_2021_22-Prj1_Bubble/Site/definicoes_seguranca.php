<?php include './src/definicoes/definicoes.php'; ?>

</div>
<div class="direita_opcoes">
    <div class="titulo">
        <h4>Definições de Segurança</h4>
        <div class="campoone">
            <div class="titulo_campo">Password</div>
            <div class="editar">Editar</div>
        </div>
        <div class="atualizar_nome">
            <h5>Atualizar Password</h5>
            <form action="./src/definicoes/definicoes_nome.php?userid=<?= $userq['id_user'] ?>" method="post">
                <div class="campo_password">
                    <label for="old_password">Password Atual</label>
                    <input type="password" name="old_password">
                    <label for="new_password">Password Nova</label>
                    <input type="password" name="new_password">
                    <label for="confirm_password">Confirmar Password</label>
                    <input type="password" name="confirm_password">
                </div>
                <div class="buttons_atualizar_cancelar">
                    <input type="submit" value="Atualizar">
                    <input type="button" class="btn-danger" value="Cancelar">
                </div>
            </form>
        </div>
        <div class="campo_atividade">
        </div>
    </div>
</div>
</div>

<?php include 'page_parts/footer.php'; ?>