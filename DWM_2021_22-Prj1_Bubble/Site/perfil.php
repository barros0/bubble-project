<?php
include 'page_parts/header.php';

//USERNAME DO UTILIZADOR
if (!empty($_GET['username'])) {
    $other_profile = true;

    $search_username = $conn->prepare("select * from users where username = ?");
    $search_username->bind_param("s", $_GET['username']);
    $search_username->execute();
    $user_found = ($search_username->get_result())->fetch_assoc();
    $user_perfil_id = $user_found['id_user'];
} else {
    $other_profile = false;
    $user_perfil_id = $_SESSION['user']['id_user'];
}

$user_perfil = $conn->query('select * from users inner join nacionalidades 
    on users.nacionalidade = nacionalidades.nacionalidade_id where users.id_user = ' . $user_perfil_id)->fetch_assoc();

$nacionalidades  = mysqli_query($conn, "select * from nacionalidades");

$count_seguidores = $conn->query('select count(*) from seguir where id_utilizador = ' . $user_perfil_id)->fetch_assoc();

$count_publicacoes = $conn->query('select count(*) from publicacoes where user_id =' . $user_perfil_id . ' and estado_pub != 2')->fetch_assoc();

if ($other_profile) {
    $check_se_segue = $conn->query('select * from seguir where id_seguidor = ' . $userq['id_user'] . ' and id_utilizador = ' . $user_perfil_id);
    if ($check_se_segue->num_rows > 0) {
        $check_se_segue = true;
    } else {
        $check_se_segue = false;
    }
}
?>

<!--PARTE DE CIMA DO PERFIL-->
<div class="pagina_perfil">
    <div class="conteudo_pagina_perfil">
        <div class="fundo_perfil">
            <img src="img/fotos_banner/<?php echo $user_perfil['banner_image'] ?>" alt="imagem_fundo">
            <div class="pagina_foto_perfil">
                <img src="img/fotos_perfil/<?php echo $user_perfil['profile_image'] ?>" alt="foto_perfil">
                <p><?php echo $user_perfil['nome'] ?></p>
            </div>
        </div>
        <div class="espaco_info_buttons">
            <div class="pagina_info">
                <div class="n_posts">
                    <p><?php echo implode($count_publicacoes) ?></p>
                    <p>POSTS</p>
                </div>
                <div class="n_followers">
                    <p><?php echo implode($count_seguidores) ?></p>
                    <p>FOLLOWERS</p>
                </div>
                <div class="bandeira">
                    <span class="fi fi-<?= strtolower($user_perfil['siglapais']) ?>"></span>
                </div>
            </div>
            <div class="pagina_buttons">

                <?php
                if ($other_profile) {
                    if (empty($check_se_segue)) {
                        if ($user_perfil_id != $_SESSION['user']['id_user']) {
                ?>
                            <a class="mandar_mensagem" href="mensagens.php?id_user_msg=<?= $user_perfil_id ?>"><i class='bx bx-paper-plane'></i></a>
                            <div class="pagina_button_adicionar">
                                <a href="./follow_handler.php?follow=<?= $user_perfil['id_user'] ?>">
                                    <input type="button" value="Seguir +" name="adicionar">
                                </a>
                            </div>

                        <?php
                        }
                    } else {
                        ?>
                        <a class="mandar_mensagem" href="mensagens.php?id_user_msg=<?= $user_perfil_id ?>"><i class='bx bx-paper-plane'></i></a>
                        <div class="pagina_button_adicionar">
                            <a href="./follow_handler.php?remove-follow=<?= $user_perfil['id_user'] ?>">
                                <input type="button" value="Deixar de seguir" name="adicionar">
                            </a>
                        </div>
                <?php
                    }
                }
                ?>

                <?php
                if ($user_perfil_id == $_SESSION['user']['id_user']) {
                ?>
                    <div id="button_editar" class="pagina_button_editar">
                        <input id="editar" type="button" value="Editar Perfil" name="Perfil">
                    </div>
                <?php
                }
                ?>
            </div>
        </div>


        <!--PARTE DE BAIXO DO PERFIL-->

        <div class="pagina_perfil_baixo">
            <div class="perfil_esquerda_baixo">
                <div class="perfil_sobre">
                    <p class="titulo_perfil">Sobre Mim</p>
                    <p class="texto_sobre_perfil"><?php echo $user_perfil['sobre'] ?></p>
                    <p class="titulo_perfil">Skills</p>
                    <p class="texto_sobre_perfil"><?php echo $user_perfil['skills'] ?></p>
                    <div class="sobre_alinhado">
                        <p class="titulo_perfil">Membro há</p>
                        <?php
                        $time = strtotime($user_perfil['created_at']);

                        function humanTiming($time)
                        {

                            $time = time() - $time;
                            $time = ($time < 1) ? 1 : $time;
                            $tokens = array(
                                31536000 => 'ano',
                                2592000 => 'mês',
                                604800 => 'semana',
                                86400 => 'dia',
                                3600 => 'hora',
                                60 => 'minuto',
                                1 => 'segundo'
                            );

                            foreach ($tokens as $unit => $text) {
                                if ($time < $unit) {
                                    continue;
                                }
                                $numberOfUnits = floor($time / $unit);
                                return $numberOfUnits . ' ' . $text . (($numberOfUnits > 1) ? 's' : '');
                            }
                        }
                        ?>
                        <p class="texto_sobre_perfil"><?php echo humanTiming($time); ?></p>
                    </div>
                    <div class="sobre_alinhado">
                        <p class="titulo_perfil">Idade</p>
                        <?php
                        $birthdayDate = $user_perfil['data_nascimento'];

                        function age($birthdayDate)
                        {
                            $dob = strtotime(str_replace("/", "-", $birthdayDate));
                            $tdate = time();

                            $age = 0;
                            while ($tdate > $dob = strtotime('+1 year', $dob)) {
                                ++$age;
                            }
                            return $age;
                        }
                        ?>
                        <p class="texto_sobre_perfil"><?php echo age($birthdayDate) ?></p>
                    </div>
                </div>
                <div class="amigos perfil_sobre">
                    <ul>
                        <?php $outros_users = 'SELECT * from users where id_user != ' . $user_perfil['id_user'] . ' ORDER BY RAND() LIMIT 5';
                        $result_outros_users = $conn->query($outros_users);
                        while ($outros_user = $result_outros_users->fetch_assoc()) {
                        ?>
                            <li><a class="amigo" href="perfil.php?username=<?= $outros_user['username'] ?>"><img class="amigo_avatar" src="img/fotos_perfil/<?php echo $outros_user['profile_image'] ?>" alt="fotoperfil"><?php echo $outros_user['nome'] ?></a></li>
                        <?php
                        }
                        ?>
                    </ul>
                </div>
            </div>
            <div class="posts_user">
                <?php
                if (implode($count_publicacoes) == 0) {
                ?>
                    <div class="sem_publicacoes">
                        <p style="color: white; text-align:center;">Este utilizador não tem publicações</p>
                    </div>
                <?php
                }
                ?>
                <?php include 'estrutura_post_user.php'; ?>
            </div>
        </div>
    </div>

    <!--FORM PARA EDITAR O PERFIL   BANNER/ FOTO PERFIL / SOBRE/ LINGUAGENS / nacionalidade -->
    <form id="form_editar_perfil" class="editar_perfil" action="update_perfil.php" method="post" enctype="multipart/form-data">
        <div class="wrap_fechar_tit">
            <p>Editar Perfil:</p>
            <i id="fechar_modal_editar" class='bx bx-x'></i>
        </div>
        <div class="sobre_perfil">
            <label for="sobre_perfil">Sobre ti:</label>
            <textarea name="SobrePerfil" id="sobre_perfil"><?php echo $user_perfil['sobre'] ?></textarea>
        </div>
        <div class="linguagens_perfil">
            <label for="programas_perfil">Trabalhas com o que?</label>
            <textarea name="skills_perfil" id="programas_perfil"><?php echo $user_perfil['skills'] ?></textarea>
        </div>
        <div class="nacionalidade_perfil">
            <label for="nacionalidade">Nacionalidade</label>
            <select name="nacionalidade" class="form_input_nacionalidade" id="nacionalidade">
                <option value="None">Não Mudar</option>
                <?php while ($nacionalidade = mysqli_fetch_array($nacionalidades)) { ?>
                    <option value="<?= $nacionalidade['nacionalidade_id'] ?>"><?php echo $nacionalidade['pais']; ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="inserir_fotos">
            <div class="foto_perfil">
                <label for="foto_perfil">Foto Perfil:</label>
                <input type="file" name="FotoPerfil" id="foto_perfil">
            </div>
            <div class="banner_perfil">
                <label for="banner_perfil">Foto de Capa:</label>
                <input type="file" name="BannerPerfil" id="banner_perfil">
            </div>
        </div>
        <input type="submit" value="Atualizar">
    </form>
</div>
<?php include 'page_parts/footer.php'; ?>