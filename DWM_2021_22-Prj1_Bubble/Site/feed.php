<?php include 'page_parts/header.php'; ?>

<div class="parts">

    <?php include 'page_parts/left.php'; ?>

    <div class="center">
        <?php include 'estrutura_post.php'; ?>
        <div class="comment_user">
            <div class="comment_user_avatar">
                <img src="img/header/download.png" alt="foto_perfil_user">
                <div class="comment_text">
                    <div class="comment_user_name">Rute Baguete</div>
                    HAHAHHAHAHAH MANO, baril mas curtia mais de uma cena para ver a população mosaica.
                </div>
            </div>
        </div>
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
                    <li><a class="amigo" href=""><img class="amigo_avatar" src="img/header/download.png" alt="fotoperfil"><?php echo ($_SESSION['user']['nome']) ?></a>
                    </li>
                    <li><a class="amigo" href=""><img class="amigo_avatar" src="img/header/download.png" alt="fotoperfil"><?php echo ($_SESSION['user']['nome']) ?> </a>
                    </li>
                    <li><a class="amigo" href=""><img class="amigo_avatar" src="img/header/download.png" alt="fotoperfil"><?php echo ($_SESSION['user']['nome']) ?> </a>
                    </li>
                    <li><a class="amigo" href=""><img class="amigo_avatar" src="img/header/download.png" alt="fotoperfil"><?php echo ($_SESSION['user']['nome']) ?> </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<?php include 'page_parts/footer.php'; ?>