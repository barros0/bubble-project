<?php include './src/definicoes/definicoes.php'; ?>
<?php
$reports = $conn->query('SELECT * FROM reports where user_id=' . $_SESSION['user']['id_user']);
?>

</div>
<div class="direita_opcoes">
    <div class="titulo">
        <h4>Denúncias sobre outras pessoas</h4>
    </div>
    <div class="titulo">
        <h4>Os teus avisos</h4>
    </div>
</div>
</div>

<?php include 'page_parts/footer.php'; ?>