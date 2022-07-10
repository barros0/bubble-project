<?php
include 'page_parts/header.php';

$user_perfil_id = $_SESSION['user']['id_user'];
$count_seguidores = $conn->query('select count(*) from seguir where id_utilizador = ' . $user_perfil_id)->fetch_assoc();
$count_seguir = $conn->query('select count(*) from seguir where id_seguidor = ' . $user_perfil_id)->fetch_assoc();

$list_seguidores = $conn->query('select * from seguir where id_utilizador = ' . $user_perfil_id);


?>

<div class="home">
    <?php include 'page_parts/left.php'; ?>
    <div class="amigos">
        <div class="followers">
            <a class="left_followers active_left" href="conexoes_seguidores.php">
                <div class="color" style="color:#00ff8a !important;">
                    <p><?php echo implode($count_seguidores) ?></p>
                    <p>Seguidores</p>
                </div>
            </a>
            <a class="right_followers" href="conexoes_aseguir.php">
                <div class="color">
                    <p><?php echo implode($count_seguir) ?></p>
                    <p>A Seguir</p>
                </div>
            </a>
        </div>
        <div class="listagem_users">
            <?php if (implode($count_seguidores) == 0) { ?>
                <p style="color: white; text-align:center;">Ainda não tens seguidores</p>
            <?php } ?>
            <?php
            foreach ($list_seguidores as $list_seguidor) {
                $user_segue = $list_seguidor['id_seguidor'];
                $user = $conn->query("select * from users where id_user=" . $user_segue)->fetch_assoc();
            ?>
                <a class="amigo" href="perfil.php?username=<?= $user['username'] ?>">
                    <div>
                        <img class="amigo_avatar" src="img/fotos_perfil/<?php echo $user['profile_image'] ?>" alt="fotoperfil">
                        <span><?php echo $user['nome'] ?></span>
                    </div>
                    <span>Ver Perfil</span>
                </a>
            <?php
            }
            ?>
        </div>
    </div>
</div>

<?php include 'page_parts/footer.php'; ?>