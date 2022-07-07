<?php
function active_left($currect_page)
{
    $url_array =  explode('/', $_SERVER['REQUEST_URI']);
    $url = end($url_array);
    if ($currect_page == $url) {
        echo 'custom_active_left'; //class name in css 
    }
}
?>

<div class="left">
    <div class="left_fixed">
        <ul>
            <li><a class="verperfil" href="perfil.php?username=<?= $userq['username'] ?>"><img class="avatar" src="img/fotos_perfil/<?php echo $userq['profile_image'] ?>" alt="fotoperfil"><?php echo $userq['nome'] ?></a>
            </li>
            <li><a class="<?php active_left('conexoes.php'); ?>" href="conexoes.php"><i class='bx bx-group'></i>Conexões</a></li>
            <li><a class="<?php active_left('marketplace.php'); ?>" href="marketplace.php"><i class='bx bx-store-alt'></i>Marketplace</a></li>
            <li><a class="<?php active_left('empregos.php'); ?>" href="empregos.php"><i class='bx bxs-megaphone'></i>Oferta de Emprego</a></li>
            <li><a class="<?php active_left('eventos.php'); ?>" href="eventos.php"><i class='bx bx-calendar-event'></i>Eventos</a></li>
            <li><a class="<?php active_left('faqs.php'); ?>" href="faqs.php"><i class='bx bx-question-mark'></i>FAQS</a></li>
        </ul>

    </div>
</div>
<div class="footer_left">
    <a href="../Site/faqs.php">Privacidade</a> | <a href="../Site/faqs.php">Termos</a> | <a href="../Site/faqs.php">Publicidade</a> | <a href="../Site/faqs.php">Cookies</a>
    <br>
    Bubble © 2022
</div>