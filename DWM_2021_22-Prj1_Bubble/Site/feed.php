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
                <div class="evento_img">
                    <img src="img/eventos/lisboa.jpg" alt="evento">
                    <div class="evento_info">
                        <h2>Lisboa Games Week</h2>
                        Hoje
                        <a href="">Saber Mais</a>
                    </div>
                </div>
                <div class="evento_img">
                    <img src="img/eventos/google.png" alt="evento">
                    <div class="evento_info">
                        <h2>Google Gaz</h2>
                        12 - 15 Abril
                        <a href="">Saber Mais</a>
                    </div>
                </div>
            </div>
            <div class="create_post_button">
                <h5>Cria O Teu Post</h5>
            </div>
            <div class="amigos">
                <ul>
                    <li><a class="amigo" href=""><img class="amigo_avatar" src="img/header/download.png"
                                alt="fotoperfil"><?php echo($_SESSION['user']['nome']) ?></a>
                    </li>
                    <li><a class="amigo" href=""><img class="amigo_avatar" src="img/header/download.png"
                                alt="fotoperfil"><?php echo($_SESSION['user']['nome']) ?> </a>
                    </li>
                    <li><a class="amigo" href=""><img class="amigo_avatar" src="img/header/download.png"
                                alt="fotoperfil"><?php echo($_SESSION['user']['nome']) ?> </a>
                    </li>
                    <li><a class="amigo" href=""><img class="amigo_avatar" src="img/header/download.png"
                                alt="fotoperfil"><?php echo($_SESSION['user']['nome']) ?> </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<?php include 'page_parts/footer.php'; ?>
<!--<script src="js/weather.js"></script>-->