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
    <?php while ($row = $result->fetch_assoc()) {
        $publicacao_id = $row['publicacao_id'];

        $user_publi = $conn->query("SELECT user_id FROM publicacoes where publicacao_id =" . $publicacao_id)->fetch_assoc();

        $user_id = $user_publi['user_id'];

        $user_info = $conn->query("SELECT nome FROM users where id_user=" . $user_id)->fetch_assoc();
    ?>
        <div>
            <p>Denunciaste a publicação de <?= $user_info['nome'] ?> por <?= $row['categoria'] ?> </p>
            <p><?= $row['data'] ?></p>
        </div>
    <?php }
    $reports->close(); ?>
</div>

<?php include 'page_parts/footer.php'; ?>