<?php include './src/definicoes/definicoes.php'; ?>
<?php
$reports = $conn->prepare('SELECT * FROM reports where user_id= ?');
$reports->bind_param("i", $userq['id_user']);
$reports->execute();
$result = $reports->get_result();

$reports_count = $conn->query("select count(*) from reports where user_id = " . $userq['id_user'])->fetch_assoc();
?>

</div>
<div class="direita_opcoes">
    <div class="titulo">
        <h4>Denúncias sobre outras pessoas</h4>
    </div>
    <?php
    if (implode($reports_count) == 0) {
    ?>
        <p style="text-align:center;">Não tens nenhuma denuncia</p>
    <?php
    }
    ?>
    <div class="wrap_denuncias">
        <?php while ($row = $result->fetch_assoc()) {

            $publicacao_id = $row['publicacao_id'];
            $user_publi = $conn->prepare("SELECT user_id FROM publicacoes where publicacao_id =?");
            $user_publi->bind_param("i", $publicacao_id);
            $user_publi->execute();
            $result_user_publi = $user_publi->get_result();
            $result_user_publi = $result_user_publi->fetch_assoc();

            $user_id = $result_user_publi['user_id'];
            $user_info = $conn->prepare("SELECT nome FROM users where id_user= ?");
            $user_info->bind_param("i", $user_id);
            $user_info->execute();
            $result_user_info = $user_info->get_result();
            $result_user_info = $result_user_info->fetch_assoc();

        ?>
            <div class="denuncia">
                <p>Denunciaste a publicação de <?= $result_user_info['nome'] ?> por <?= $row['categoria'] ?> </p>
                <div class="denuncia_ver">
                    <p class="texto_data_denuncia"><?= $row['data'] ?></p>
                    <?php
                    $estado = $row['estado'];
                    if ($estado === 1) {
                        echo "<p style='color:#ffc107;'>Em Análise</p>";
                    } else if ($estado === 2) {
                        echo "<p style='color:#00ff8a;'>Aprovado</p>";
                    } else {
                        echo "<p style='color:red;'>Revogado</p>";
                    }
                    ?>
                </div>
            </div>
        <?php }
        $reports->close();
        ?>
    </div>
</div>

<?php include 'page_parts/footer.php'; ?>