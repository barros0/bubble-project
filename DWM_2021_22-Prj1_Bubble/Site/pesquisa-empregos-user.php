<?php
require('./bd.php');
session_start();

$id_user = $_SESSION['user']['id_user'];


if (isset($_REQUEST["term"])) {
    // preparar statement
    $sql = "SELECT * FROM oferta_emprego WHERE id_user = '$id_user' AND titulo LIKE ?";

    if ($stmt = mysqli_prepare($conn, $sql)) {

        mysqli_stmt_bind_param($stmt, "s", $param_term);

        $param_term = $_REQUEST["term"] . '%';

        if (mysqli_stmt_execute($stmt)) {
            $result = mysqli_stmt_get_result($stmt);

            //verificar quantos resultados tem
            if (mysqli_num_rows($result) > 0) {

                while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {

                    //caso o emprego tenha foto, buscar a foto;

                    $queryfoto = 'SELECT * FROM oferta_emprego INNER JOIN foto_emprego ON oferta_emprego.id_oferta = foto_emprego.id_emprego';
                    $lista_fotos = $conn->query($queryfoto);

                    $imagemq = "SELECT * FROM foto_emprego WHERE id_emprego =" . $row['id_oferta'];
                    $imagem = $conn->query($imagemq)->fetch_assoc();

                    //buscar pessoa que publicou o emprego
                    $queryUser =  'SELECT * FROM users WHERE id_user = ' . $row['id_user'];
                    $utilizador = $conn->query($queryUser)->fetch_assoc();

?>

                    <div class="caixa-emprego gerir" onClick="window.location.href='./editarEmprego.php?id_emp=<?= $row['id_oferta'] ?>'">
                        <div class="foto-emprego-gerir clicavel">
                            <?php
                            if (!empty($imagem)) {
                            ?>
                                <img class="ft-emprego-gerir" src="./img/empregos/<?= $imagem['foto'] ?>" alt="Emprego">
                            <?php
                            } else {
                                //imagem default para quando não tem emprego
                            ?>
                                <img class="ft-emprego-gerir" src="./img/empregos/banner_emprego.jpg" alt="Emprego">
                            <?php
                            }
                            ?>

                        </div>
                        <div class="conteudo-emprego-gerir">
                            <div class="wrap-dt-emp-g">
                                <span class="nome-emp-gerir"><?= $row['titulo'] ?></span>
                                <div class="detalhes-gerir">
                                    <div class="texto-detalhes-gerir">
                                        <span style="color:#bdbdbd; font-size:16px;"><?= $utilizador['nome'] ?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="btn-wrp">
                            </div>

                        </div>
                    </div>
<?php

                }
            } else {
                echo '<p class="pesq">A sua pesquisa não obteve resultados</p>';
            }
        } else {
            echo "ERRO: $sql. " . mysqli_error($link);
        }
    }

    // fechar conexao
    mysqli_stmt_close($stmt);
}
