<?php include 'page_parts/header.php'; ?>
<div class="parts">
    <?php include 'page_parts/left.php'; ?>
    <div class="center">
        <div class="post">
            <div class="user_post_info">
                <div class="post_user_avatar">
                    <img src="img/header/download.png" alt="foto_perfil_user">
                    <div class="post_user_info">
                        <p class="post_user_name">Joãozinho Mineiro</p>
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
        <!-- <div class="weather">
            <div class="weather_loca">
                <h2><span id="location"></span>, <span id="tempo"></span></h2>
                <div class="weather_info">
                    <img id="icon" src="#" alt="icon">
                    <h4><span id="graus"></span><span>º</span>C</h4>
                </div>
            </div>
        </div>-->
        <!--<div class="make_post">
            <div class="header_post">
                <div class="circles one"></div>
                <div class="circles two"></div>
                <div class="circles three"></div>
            </div>
            <form method="POST" id="post">
                <div class="textarea">
                    <textarea maxlength="255" name="textarea" id="textarea"
                        placeholder="O que estás a programar?"></textarea>
                </div>
                <div class="img_post">
                    <img id="img_post" src="#" alt="photo_post">
                    <i id="cancel_btn" class='bx bx-x'></i>
                </div>
                <div class="buttons_post">
                    <div class="upload_img" onchange="previewFile()">
                        <button class="upload_btn"><i class='bx bx-plus'></i></button>
                        <input id="input_file" type="file" accept="image/png,image/jpeg,image/bmp,image/gif"
                            name="myfile">
                    </div>
                    <div class="post_button">
                        <button id="post_btn" type="submit" name="post">Publicar</button>
                    </div>
                </div>
            </form>
        </div>-->
    </div>
</div>
<?php include 'page_parts/footer.php'; ?>
<!--<script src="js/weather.js"></script>-->