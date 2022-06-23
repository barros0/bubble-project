<?php
if (!empty($_GET['username'])) {
    $search_username = $conn->prepare("select * from users where username = ?");
    $search_username->bind_param("s", $_GET['username']);
    $search_username->execute();
    $user_found = ($search_username->get_result())->fetch_assoc();
    $user_perfil_id = $user_found['id_user'];
} else {
    $other_profile = false;
    $user_perfil_id = $_SESSION['user']['id_user'];
}

$user_posts = "select * from publicacoes INNER JOIN users ON publicacoes.user_id = users.id_user where id_user ="
    . $user_perfil_id;


$result_set = $conn->query($user_posts);
?>


<?php
while ($user_pub = $result_set->fetch_assoc()) {

    $user_posts_fotos = "select * from publicacoes_fotos where publicacao_id =" . $user_pub['publicacao_id'];
    $posts_fotos = $conn->query($user_posts_fotos)->fetch_assoc();
    $id_publicacao = $user_pub['publicacao_id'];
    $estado = $user_pub['estado_pub'];
    if ($estado != 2) {
?>
        <div class="post">
            <div class="user_post_info">
                <div class="cabecalho_post">
                    <div class="post_user_avatar">
                        <img src="img/fotos_perfil/<?php echo $user_pub['profile_image'] ?>" alt="foto_perfil_user">
                        <div class="post_user_info">
                            <p class="post_user_name"> <?php echo $user_pub['nome'] ?></p>
                            <p class="post_user_date">Publicado - <?php echo $user_pub['created_at'] ?></p>
                        </div>
                    </div>
                    <div class="remover_publicacao">
                        <div class="popup_remover_partilhar">
                            <div class="partilhar">
                                <i class='bx bxs-share'></i>
                                <p>Partilhar</p>
                            </div>
                            <form class="remover" action="delete_post_perfil.php?id_pub=<?= $id_publicacao ?>" method="POST">
                                <i class='bx bxs-trash'></i>
                                <input type="submit" name="delete" class="btn_remover" value="DELETE">
                            </form>
                        </div>
                        <i class='bx bx-dots-horizontal-rounded'></i>
                    </div>
                </div>
                <div class="post_text">
                    <?php echo $user_pub['conteudo'] ?>
                </div>
                <?php
                if (!empty($posts_fotos)) {
                ?>
                    <div class="post_user_img">
                        <img src="./img/publicacoes/<?php echo $posts_fotos['caminho'] ?>" alt="publicacao_foto">
                    </div>
                <?php
                }
                ?>
                <div class="post_number_likes_comments">
                    <i class='bx bx-heart' id="liked"></i>
                    <p><span id="number_likes"></span> Gostos</p>
                </div>
                <div class="post_like_comment_fav">
                    <div id="like">
                        <i class='bx bx-heart' id="liked_info"></i>
                        <p>Gostar</p>
                    </div>
                    <div class="comment" id="comment">
                        <i class='bx bx-comment'></i>
                        <p>Comentar</p>
                    </div>
                    <div id="fav">
                        <i class='bx bx-bookmark'></i>
                        <p>Favoritos</p>
                    </div>
                </div>
                <div class="comment_section">
                    <form action="">
                        <textarea data-limit=255 maxlength="255" name="textarea" class="comment_textarea" placeholder="Comente Algo"></textarea>
                        <p class="comment_limit"> <span class="current_chars">0</span>/255</p>
                    </form>
                </div>
            </div>
        </div>

<?php
    }
}
?>