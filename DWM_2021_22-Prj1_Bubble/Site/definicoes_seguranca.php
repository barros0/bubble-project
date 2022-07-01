<?php include './src/definicoes/definicoes.php'; ?>
<?php
$ip_sessions = $conn->query('SELECT * FROM ip_sessions where id_user=' . $_SESSION['user']['id_user']);
?>

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
            <form action="./src/definicoes/definicoes_password.php?userid=<?= $userq['id_user'] ?>" method="post">
                <div class="campo_password">
                    <label for="old_password">Password Atual</label>
                    <input type="password" name="old_password" required>
                    <label for="new_password">Password Nova</label>
                    <input type="password" name="new_password" required>
                    <label for="confirm_password">Confirmar Password</label>
                    <input type="password" name="confirm_password" required>
                </div>
                <div class="buttons_atualizar_cancelar">
                    <input type="submit" value="Atualizar">
                    <input type="button" class="btn-danger" value="Cancelar" onclick="location.href='definicoes_seguranca.php';">
                </div>
            </form>
        </div>
        <div class="campotwo">
            <div class="titulo_campo">Atividade de Login</div>
            <div class="editar">Ver</div>
        </div>
        <div id="container-ip" class="atualizar_username campo_atividade s-container container-ip">
            <div class="table-responsive">
                <table class="table" id="sessoes">
                    <div class="cabecalho_table">
                    </div>
                    <caption></caption>
                    <thead>
                        <tr>
                            <th scope="col">Data</th>
                            <th scope="col">localização</th>
                            <th scope="col">IP</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($ip_sessions as $ip_session) {
                        ?>
                            <tr>
                                <th scope="row"><?= $ip_session['data'] ?></th>
                                <td>
                                    <p>Localizacao
                                        <?php //echo $ip_session['localizacao']
                                        ?></p>
                                </td>
                                <td>
                                    <p><?= $ip_session['ip_sessions'] ?></p>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>

<?php include 'page_parts/footer.php'; ?>