<?php include './src/definicoes/definicoes.php'; ?>
<?php
$reports = $conn->prepare('SELECT * FROM reports where user_id= ?');
$reports->bind_param("i", $userq['id_user']);
$reports->execute();

$result = $reports->get_result();
?>

</div>
<div class="direita_opcoes">
    <div class="titulo">
        <h4>Denúncias sobre outras pessoas</h4>
    </div>
    <div class="wrap_denuncias">
        <?php while ($row = $result->fetch_assoc()) {
            $publicacao_id = $row['publicacao_id'];

            $user_publi = $conn->query("SELECT user_id FROM publicacoes where publicacao_id =" . $publicacao_id)->fetch_assoc();

            $user_id = $user_publi['user_id'];

            $user_info = $conn->query("SELECT nome FROM users where id_user=" . $user_id)->fetch_assoc();
        ?>
            <div class="denuncia">
                <p>Denunciaste a publicação de <?= $user_info['nome'] ?> por <?= $row['categoria'] ?> </p>
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
        $reports->close(); ?>
    </div>
</div>

<?php include 'page_parts/footer.php'; ?>