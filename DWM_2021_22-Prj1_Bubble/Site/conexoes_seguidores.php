<?php 
include 'page_parts/header.php'; 

$count_seguidores = $conn->query('select count(*) from seguir where id_utilizador = ' . $user_perfil_id)->fetch_assoc();
?>

<div class="home">
    <?php include 'page_parts/left.php'; ?>
    <div class="amigos">
        <div class="followers">
            <a class="left_followers" href="conexoes_seguidores.php">
                <div>
                    <p>999</p>
                    <p>Seguidores</p>
                </div>
            </a>
            <a class="right_followers" href="conexoes_aseguir.php">
                <div>
                    <p>999</p>
                    <p>A Seguir</p>
                </div>
            </a>
        </div>
        <div class="listagem_users">

        </div>
    </div>
</div>

<?php include 'page_parts/footer.php'; ?>