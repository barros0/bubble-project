<?php include 'header.php'; ?>
<div class="parts">
    <div class="left">
        <ul>
            <li><a class="verperfil" href="perfil.php"><img class="avatar" src="img/header/download.png"
                        alt="fotoperfil">Joãozinho Mineiro</a>
            </li>
            <li><a href=""><i class='bx bx-group'></i>Amigos</a></li>
            <li><a href=""><i class='bx bx-comment-dots'></i>Tópicos</a></li>
            <li><a href=""><i class='bx bx-buildings'></i>Empresas</a></li>
            <li><a href=""><i class='bx bxs-megaphone'></i>Oferta de Emprego</a></li>
            <li><a href=""><i class='bx bx-calendar-event'></i>Eventos</a></li>
            <li><a href=""><i class='bx bx-question-mark'></i>FAQS</a></li>
        </ul>
    </div>
    <div class="center">
        <div class="make_post">
            <div class="header_post">
                <div class="circles one"></div>
                <div class="circles two"></div>
                <div class="circles three"></div>
            </div>
            <form method="POST" id="post">
                <div class="textarea">
                    <textarea name="textarea" id="textarea" placeholder="O que estás a programar?"></textarea>
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
        </div>
        <div class="post">
            <div class="post_info">
                
            </div>
        </div>
    </div>
    <div class="right">
        <div class="weather">
            <div class="weather_loca">
                <h2><span id="location"></span>, <span id="tempo"></span></h2>
                <div class="weather_info">
                    <img id="icon" src="#" alt="icon">
                    <h4><span id="graus"></span><span>º</span>C</h4>
                </div>
            </div>
        </div>
    </div>

    <?php include 'footer.php'; ?>

    <script src="js/img_post.js"></script>
    <script src="js/weather.js"></script>

    </body>

    </html>