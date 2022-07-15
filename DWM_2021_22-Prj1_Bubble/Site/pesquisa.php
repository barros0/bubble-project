<?php include 'page_parts/header.php'; ?>

<?php
$value_search = $_GET['search'];

if (strlen($value_search) <= 0) {
    header('location:feed.php');
    exit;
}

// vai buscar a ultima pesquisa do user
$last_pesquisa = $conn->prepare("select * from historico_pesquisa where id_utilizador = ? order by id_historico desc LIMIT 1");
$last_pesquisa->bind_param("i", $userq['id_user']);
$last_pesquisa->execute();
$val_last_pesquisa = $last_pesquisa->get_result()->fetch_assoc()['pesquisa'];
$last_pesquisa->close();

// se a pesquisa atual for igual a ultima feita pelo user nao inserre no historio -- se for diferente insere
if ($val_last_pesquisa <> $value_search) {
    $addpesquisa = $conn->prepare("insert into historico_pesquisa (id_utilizador, pesquisa) VALUES (?, ?)");
    $addpesquisa->bind_param("is", $userq['id_user'], $value_search);
    $addpesquisa->execute();
    $addpesquisa->close();
}

// separa as palavras da pesquisa por espacos
$search = explode(" ", $value_search);

// aqui nao foram utilizados prepared statements pois seria necesario obter uma forma para colocar diversos termos
//pois isso seria bastante mais facil numa framework mas visto o php base nao facilitar nestas situações tem de ser assim sem grandes algoritomos

// inicia as variaveis fazia para as querys
$description = "";
$s_user = "";
$s_pub = "";
$s_eventos = "";
$s_market = "";

// faz as query para cada tipo de pequisa pretendida
foreach ($search as $s) {
    //2
    $s_user .= "`nome` LIKE '%" . $s . "%' or `username` LIKE '%" . $s . "%' or ";
    //1
    $s_pub .= "`conteudo` LIKE '%" . $s . "%' or ";
    //3
    $s_eventos .= "`titulo` LIKE '%" . $s . "%' or `localizacao` LIKE '%" . $s . "%' or `descricao` LIKE '%" . $s . "%' or";
    //1
    $s_market .= "`titulo` LIKE '%" . $s . "%' or ";
}

// remove os ultimos 3 caracters ou seja " or" no final
$s_user = substr($s_user, 0, -3);
$s_pub = substr($s_pub, 0, -3);
$s_eventos = substr($s_eventos, 0, -3);
$s_market = substr($s_market, 0, -3);


// conta o numero de termos
$n_search_terms = count($search);

// faz a querys para caa tipo de pesquisa: users publicacaoes eventos e marketplace
$users = $conn->query("SELECT * FROM `users` WHERE ($s_user)"); // estado_pub = 1
$publicacoes = $conn->query("SELECT * FROM `publicacoes` WHERE ($s_pub)");
$eventos = $conn->query("SELECT * FROM `eventos` WHERE ($s_eventos)");
$market = $conn->query("SELECT * FROM `marketplace` WHERE ($s_market)");

// inciializa o array para os resultados
$resultados = array();

//cria sub arrays para resultaods de publicacoes
foreach ($publicacoes as $pub) {

    // verifica se a publicaoca tem imagem se tiver  coloca no array se nao mete noimg.png
    $imagem = $conn->query("select * from publicacoes_fotos where publicacao_id =" . $pub['publicacao_id']);
    if ($imagem->num_rows > 0) {
        $img = $imagem->fetch_assoc()['caminho'];
    } else {
        $img = 'noimg.png';
    }
    // cria array com dados do resultado, titulo subtitlo tipo imagem e link o  mesmo acontece com as outras
    $pub_ar = [
        'titulo' => substr($pub['conteudo'], 0, 50),
        'subtitulo' => substr($pub['conteudo'], 0, 80),
        'tipo' => 'publicacao',
        'img' => './img/publicacoes/' . $img,
        'link' => './partilha.php?id_pub=' . $pub['publicacao_id'],
    ];
    array_push($resultados, $pub_ar);
}

//cria sub arrays para resultaods de utilizadores
foreach ($users as $user) {
    $user_arr = [
        'titulo' => $user['username'],
        'subtitulo' => $user['username'],
        'tipo' => 'pessoa',
        'img' => 'img/fotos_perfil/' . $user['profile_image'],
        'link' => './perfil.php?username=' . $user['username'],
    ];
    array_push($resultados, $user_arr);
}

//cria sub arrays para resultaods de eventos
foreach ($eventos as $evento) {
    $eventos_arr = [
        'titulo' => $evento['titulo'],
        'subtitulo' => substr($evento['descricao'], 0, 50),
        'tipo' => 'evento',
        'img' => 'img/eventos/' . $evento['imagem'],
        'link' => './eventos.php?id=' . $evento['id_evento'],
    ];
    array_push($resultados, $eventos_arr);
}
//cria sub arrays para resultaods de marketplace
foreach ($market as $mark) {
    $market_arr = [
        'titulo' => $mark['titulo'],
        'subtitulo' => $mark['categoria'],
        'tipo' => 'marketplace',
        'img' => './img/marketplace/' . $mark['imagem'],
        'link' => './marketplace.php?id=' . $mark['id_produto'],
    ];
    array_push($resultados, $market_arr);
}
// baralha o array de resultados par anao ficar tudo igual e seguido
shuffle($resultados);


?>
<!-- coloca o valor da pesquisa no input de pesquisa | caso fize-se para pareceer quando get 'search' apareceria quando existissse um search em qualquer pagina-->
    <script>
        $(document).ready(function (){
            $('#input_searchbar').val('<?=$value_search?>');
        })
    </script>

    <div class="parts">

<?php include 'page_parts/left.php'; ?>

    <div class="center">
        <div class="filtros">
            <h4>Filtros:</h4>
        </div>
        <div class="actions">
            <a class="bt_op active_bt" href="#" id="todos">
                <div class="white">
                    <p></p>
                    <p>Tudo</p>
                </div>
            </a>
            <a class="bt_op" href="#" id="pessoa">
                <div class="white">
                    <p></p>
                    <p>Pessoas</p>
                </div>
            </a>
            <a class="bt_op" href="#" id="publicacao">
                <div class="white">
                    <p></p>
                    <p>Publicações </p>
                </div>
            </a>

            <a class="bt_op" href="#" id="eventos">
                <div class="white">
                    <p></p>
                    <p>Eventos </p>
                </div>
            </a>

            <a class="bt_op" href="#" id="marketplace">
                <div class="white">
                    <p></p>
                    <p>Marketplace </p>
                </div>
            </a>
        </div>

        <div class="col-12 resultados-para">
            <h1 id="resultados_frase">Resultados para: <?= $value_search ?></h1>
            <hr>
        </div>

        <div class="resultados" id="resultados">
            <?php
            if ($resultados) {
                foreach ($resultados as $resultado) { ?>
                    <div class="resultado" itemtype="<?= $resultado['tipo'] ?>">
                        <a href="<?= $resultado['link'] ?>">
                            <div class="d-flex">
                                <div class="img-radius">
                                    <img src="<?= $resultado['img'] ?>" alt="">
                                </div>
                                <div class="info">
                                    <div class="titulo">
                                        <h2><?= $resultado['titulo'] ?></h2>
                                    </div>
                                    <div class="desc">
                                        <p><?= $resultado['tipo'] ?></p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php }
            } ?>
        </div>
    </div>
    </div>



<?php include 'page_parts/footer.php'; ?>