<?php include 'page_parts/header.php'; ?>

<div class="parts">

    <?php include 'page_parts/left.php'; ?>

    <div class="center">
        <?php include 'estrutura_post.php'; ?>
    </div>

    <div class="right">
        <div class="right_fixed">
            <div class="evento">
                <?php $eventos = "SELECT * from eventos ORDER BY RAND() LIMIT 2";
                $result_eventos = $conn->query($eventos);
                while ($evento = $result_eventos->fetch_assoc()) {
                ?>
                    <div class="evento_img">
                        <img src="img/eventos/<?php echo $evento['imagem'] ?>" alt="evento">
                        <div class="evento_info">
                            <h2><?php echo $evento['titulo'] ?></h2>
                            <?php echo $evento['localizacao'] ?>
                            <a href="eventos.php">Saber Mais</a>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
            <div class="create_post_button">
                <h5>Cria O Teu Post</h5>
            </div>
            <div class="amigos">
                <ul>
                    <?php $outros_users = 'SELECT * from users where id_user != ' . $_SESSION['user']['id_user'] . ' ORDER BY RAND() LIMIT 5';
                    $result_outros_users = $conn->query($outros_users);
                    while ($outros_user = $result_outros_users->fetch_assoc()) {
                    ?>
                        <li><a class="amigo" href="perfil.php?username=<?= $outros_user['username'] ?>"><img class="amigo_avatar" src="img/fotos_perfil/<?php echo $outros_user['profile_image'] ?>" alt="fotoperfil"><?php echo $outros_user['nome'] ?></a></li>
                    <?php
                    }
                    ?>
                </ul>
            </div>
        </div>
    </div>
</div>

<?php include 'page_parts/footer.php'; ?>