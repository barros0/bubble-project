<style>
    .post {
        margin: auto !important;
        margin-top: 88px !important;
        width: 50% !important;
    }
</style>
<?php
include 'page_parts/header.php';

$id_publicacao = $_GET["id_pub"];

$publicacao = $conn->query("select * from publicacoes INNER JOIN users ON publicacoes.user_id = users.id_user where publicacao_id =" . $id_publicacao)->fetch_assoc();

$imagem = $conn->query("select * from publicacoes_fotos where publicacao_id =" . $id_publicacao)->fetch_assoc();

$estado = $publicacao["estado_pub"];

if ($estado != 2) {
?>
    <div class="post">
        <div class="user_post_info">
            <div class="cabecalho_post">
                <div class="post_user_avatar">
                    <img src="img/fotos_perfil/<?php echo $publicacao['profile_image'] ?>" alt="foto_perfil_user">
                    <div class="post_user_info">
                        <a class="post_user_name" href="perfil.php?username=<?= $publicacao['username'] ?>"><?php echo $publicacao['nome'] ?></a>
                        <p class="post_user_date">Publicado - <?php echo $publicacao['created_at'] ?></p>
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
                        if ($publicacao["id_user"] != $userq['id_user']) {
                        ?>
                            <div class="reportar">
                                <a href="./feed.php?id_pub=<?= $id_publicacao ?>"><i class='bx bx-error-alt'></i>Reportar</a>
                            </div>
                        <?php
                        }
                        ?>
                        <?php
                        if ($publicacao["id_user"] === $userq['id_user']) {
                        ?>
                            <form class="remover" action="delete_post.php?id_pub=<?= $id_publicacao ?>" method="POST">
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
                <?php echo $publicacao['conteudo'] ?>
            </div>
            <?php
            if (!empty($imagem)) {
            ?>
                <div class="post_user_img">
                    <img src="./img/publicacoes/<?php echo $imagem['caminho'] ?>" alt="publicacao_foto">
                </div>
            <?php
            }
            ?>
            <div class="post_number_likes_comments">
                <i class='bx bx-heart liked'></i>
                <p><span class="number_likes"></span> Gostos</p>
            </div>
            <div class="post_like_comment_fav">
                <div class="liked_bt like">
                    <i class='bx bx-heart'></i>
                    <p>Gostar</p>
                </div>
                <div class="comment">
                    <i class='bx bx-comment'></i>
                    <p>Comentar</p>
                </div>
                <div class="fav">
                    <a href="./add_fav.php?pubid=<?= $publicacao['publicacao_id'] ?>">
                        <i class='bx bx-bookmark'></i>
                        <p>Favoritos</p>
                    </a>
                </div>
            </div>
            <div class="comment_section">
                <form class="comentar" action="add_comment.php?id_pub=<?= $id_publicacao ?>" method="POST">
                    <div class="comentar_wrap">
                        <textarea required data-limit=255 maxlength="255" name="textarea" class="comment_textarea" placeholder="Comente Algo"></textarea>
                    </div>
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
include 'page_parts/footer.php';
?>