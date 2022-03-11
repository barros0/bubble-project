<?php include 'header.php'; ?>
    <div class="parts">
        <div class="left">

        </div>
        <div class="center">
            <div  class="post">
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
        </div>
        <div class="right">
            <div class="weather">
                <div class="weather_loca">
                    <h2><span id="location"></span>, <span id="tempo"></span></h2>
                    <div class="weather_info">
                        <img id="icon" src="#" alt="icon">
                        <h4><span id="graus"></span><sup>º</sup>C</h4>
                    </div>
                </div>
            </div>
        </div>

    <?php include 'footer.php'; ?>

    <script src="js/img_post.js"></script>
    <script src="js/weather.js"></script>

</body>

</html>