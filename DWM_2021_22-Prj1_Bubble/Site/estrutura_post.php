<?php


$query = "select * from publicacoes INNER JOIN users
ON publicacoes.user_id = users.id_user
INNER JOIN publicacoes_fotos
ON publicacoes.publicacao_id = publicacoes_fotos.publicacao_id
 ";
$query_fotos = "select * from publicacoes_fotos";
$result_set = $conn->query($query);
$result_set2 = $conn->query($query_fotos);
?>


<?php
while ($pub = $result_set->fetch_assoc()) { 
    ?>
<div class="post">
    <div class="user_post_info">
        <div class="post_user_avatar">
            <img src="img/header/download.png" alt="foto_perfil_user">
            <div class="post_user_info">
                <p class="post_user_name"> <?php echo($pub['nome']) ?></p>
                <p class="post_user_date">Publicado - 24/10/2022 15:55</p>
            </div>
        </div>
        <div class="post_text">
            <?php echo($pub['conteudo']) ?>
        </div>
        <div class="post_user_img">
            <img src="./img/publicacoes/<?php echo($pub['caminho'])?>" alt="">
        </div>
        <div class="post_number_likes_comments">
            <i class='bx bx-heart' id="liked"></i>
            <p><span id="number_likes"></span> Gostos</p>
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
</div>

<?php
}
?>