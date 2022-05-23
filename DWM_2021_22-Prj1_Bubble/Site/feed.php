<?php include 'page_parts/header.php'; ?>

<div class="parts">

    <?php include 'page_parts/left.php'; ?>

    <div class="center">
        <div class="post">
            <div class="user_post_info">
                <div class="post_user_avatar">
                    <img src="img/header/download.png" alt="foto_perfil_user">
                    <div class="post_user_info">
                        <p class="post_user_name"><?php echo($_SESSION['user']['nome']) ?></p>
                        <p class="post_user_date">Publicado - 24/10/2022 15:55</p>
                    </div>
                </div>
                <div class="post_text">
                    Boa noite, so queria informar os meus devs que estou a desenvolver um app para todas as igrejas
                    catolicas perto do rio liz.
                </div>
                <div class="post_user_img">
                </div>
                <div class="post_number_likes_comments">
                    <i class='bx bx-heart' id="liked"></i>
                    <p><span id="number_likes">32</span> Gostos</p>
                </div>
                <div class="post_like_comment_share">
                    <div id="like">
                        <i class='bx bx-heart' id="liked_info"></i>
                        <p>Gostar</p>
                    </div>
                    <div class="comment" id="comment">
                        <i class='bx bx-comment'></i>
                        <p>Comentar</p>
                    </div>
                    <div id="share">
                        <i class='bx bx-share'></i>
                        <p>Partilhar</p>
                    </div>
                </div>
                <div class="comment_section">
                    <form action="">
                        <textarea data-limit=255 maxlength="255" name="textarea" class="comment_textarea"
                            placeholder="Comente Algo"></textarea>
                        <p class="comment_limit"> <span class="current_chars">0</span>/255</p>
                    </form>
                </div>
            </div>
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