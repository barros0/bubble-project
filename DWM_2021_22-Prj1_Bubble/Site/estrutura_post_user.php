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
    . $user_perfil_id . " order by publicacoes.created_at DESC";


$result_set = $conn->query($user_posts);
?>


<?php
while ($user_pub = $result_set->fetch_assoc()) {

    $user_posts_fotos = "select * from publicacoes_fotos where publicacao_id =" . $user_pub['publicacao_id'];
    $posts_fotos = $conn->query($user_posts_fotos)->fetch_assoc();

    $num_comentarios = $conn->query("select count(*) from comentarios where publicacao_id =" . $user_pub['publicacao_id'])->fetch_assoc();

    $num_likes = $conn->query("select count(*) from gostos where publicacao_id=" . $user_pub['publicacao_id'])->fetch_assoc();
    $like_check_post = $conn->query("select * from gostos where publicacao_id =" . $user_pub['publicacao_id'] . " and user_id = " . $_SESSION['user']['id_user'] . "")->fetch_row();
    $fav_check_post = $conn->query("select * from publicacoes_fav where id_pub =" . $user_pub['publicacao_id'] . " and id_user = " . $_SESSION['user']['id_user'] . "")->fetch_row();

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
                                <p class="mudar_copiado">Partilhar</p>
                                <input class="publicacao_copiar" style="display:none;" type="text" name="publicacao_partilhada" value="http://localhost/bubble-project/DWM_2021_22-Prj1_Bubble/Site/partilha.php?id_pub=<?= $id_publicacao ?>">
                            </div>
                            <?php
                            if ($user_pub["id_user"] != $userq['id_user']) {
                            ?>
                                <div class="reportar">
                                    <a href="./feed.php?id_pub_report=<?= $id_publicacao ?>"><i class='bx bx-error-alt'></i>Reportar</a>
                                </div>
                            <?php
                            }
                            ?>
                            <?php
                            if ($user_pub["id_user"] === $userq['id_user']) {
                            ?>
                                <form class="remover" action="delete_post_perfil.php?id_pub=<?= $id_publicacao ?>" method="POST">
                                    <i class='bx bxs-trash'></i>
                                    <input type="submit" name="delete" class="btn_remover" value="DELETE">
                                </form>
                            <?php
                            }
                            ?>
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
                    <div style="display:flex;">
                        <i class='bx bxs-heart' style='color:#00ff8a'></i>
                        <p><span class="number_likes"><?php echo implode($num_likes) ?></span></span> Gostos</p>
                    </div>
                    <div>
                        <p class="number_comments"><span><?php echo implode($num_comentarios) ?></span> comentários</p>
                    </div>
                </div>
                <div class="post_like_comment_fav">
                    <a style="color: white; text-decoration:none;" href="./add_like.php?pubid=<?= $user_pub['publicacao_id'] ?>">
                        <div class="liked_bt like">
                            <?php if ($like_check_post == 0) { ?>
                                <i class='bx bx-heart'></i>
                                <p>Gostar</p>
                            <?php } else { ?>
                                <i class='bx bxs-heart' style='color:#00ff8a'></i>
                                <p style="color:#00ff8a;">Gostar</p>
                            <?php } ?>
                        </div>
                    </a>
                    <div class="comment">
                        <i class='bx bx-comment'></i>
                        <p>Comentar</p>
                    </div>
                    <div class="fav">
                        <a href="./add_fav.php?pubid=<?= $user_pub['publicacao_id'] ?>">
                            <?php if ($fav_check_post == 0) { ?>
                                <i class='bx bx-bookmark'></i>
                                <p>Favoritos</p>
                            <?php } else { ?>
                                <i class='bx bxs-bookmark' style='color:#00ff8a'></i>
                                <p style="color:#00ff8a;">Favoritos</p>
                            <?php } ?>
                        </a>
                    </div>
                </div>
                <div class="comment_section">
                    <form class="comentar" action="add_comment.php?id_pub=<?= $id_publicacao ?>" method="POST">
                        <textarea required data-limit=255 maxlength="255" name="textarea" class="comment_textarea" placeholder="Comente Algo"></textarea>
                        <div class="comentar_btn">
                            <input type="submit" value="Comentar">
                        </div>
                    </form>
                    <div class="comment_user">
                        <?php
                        $qcomentarios = "SELECT * FROM comentarios INNER JOIN users ON comentarios.user_id = users.id_user WHERE publicacao_id = $id_publicacao";
                        $result_comentarios = $conn->query($qcomentarios);
                        while ($comentario = $result_comentarios->fetch_assoc()) {
                        ?>
                            <div class="comment_user_avatar">
                                <img src="img/fotos_perfil/<?php echo $comentario['profile_image'] ?>" alt="foto_perfil_user">
                                <div class="comment_text">
                                    <div class="comment_user_name"><?php echo $comentario['nome']; ?> </div>
                                    <?php echo $comentario['comentario']; ?>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>

<?php
    }
}
?>