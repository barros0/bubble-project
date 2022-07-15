<?php
require('./bd.php');
session_start();


if (isset($_REQUEST["term"])) {
    // preparar statement
    $sql = "SELECT * FROM oferta_emprego WHERE titulo LIKE ?";

    if ($stmt = mysqli_prepare($conn, $sql)) {

        mysqli_stmt_bind_param($stmt, "s", $param_term);

        $param_term = $_REQUEST["term"] . '%';

        if (mysqli_stmt_execute($stmt)) {
            $result = mysqli_stmt_get_result($stmt);

            //verificar quantos resultados tem
            if (mysqli_num_rows($result) > 0) {

                while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {


                    $queryfoto = 'SELECT * FROM oferta_emprego INNER JOIN foto_emprego ON oferta_emprego.id_oferta = foto_emprego.id_emprego';
                    $lista_fotos = $conn->query($queryfoto);

                    $imagemq = "SELECT * FROM foto_emprego WHERE id_emprego =" . $row['id_oferta'];
                    $imagem = $conn->query($imagemq)->fetch_assoc();


                    $queryUser =  'SELECT * FROM users WHERE id_user = ' . $row['id_user'];
                    $utilizador = $conn->query($queryUser)->fetch_assoc();

?>
                    <div class="caixa-emprego">
                        <div class="foto-emprego">
                            <?php
                            if (!empty($imagem)) {
                            ?>
                                <img class="ft-emprego" src="./img/empregos/<?= $imagem['foto'] ?>" alt="Emprego">
                            <?php
                            } else {
                                //imagem default para quando não tem emprego
                            ?>
                                <img class="ft-emprego" src="./img/empregos/banner_emprego.jpg" alt="Emprego">
                            <?php
                            }
                            ?>

                        </div>

                        <div class="conteudo-emprego">
                            <div class="wrap-dt-emp">
                                <h3 class="nome-emp"><?= $row['titulo'] ?></h3>
                                <table style="width:100%">
                                    <tr>
                                        <td><span>Qualificações:</span></td>
                                        <td><span><?= $row['qualificacoes'] ?></span></td>
                                    </tr>
                                    <tr>
                                        <td><span>Experiência:</span></td>
                                        <td><span><?= $row['experiencia'] ?></span></td>
                                    </tr>
                                    <tr>
                                        <td><span>Localização:</span></td>
                                        <td> <span><?= $row['localizacao'] ?></span></td>
                                    </tr>
                                    <tr>
                                        <td><span>Categoria:</span></td>
                                        <td><span><?= $row['categoria'] ?></span></td>
                                    </tr>
                                    <tr>
                                        <td><span>Publicado por:</span></td>
                                        <td><span><a class="link-perfil" href="./perfil.php?username=<?= $utilizador['username'] ?>"><?= $utilizador['nome'] ?></a></span></td>
                                    </tr>
                                </table>
                            </div>
                            <div class="btn-wrp">
                                <button onClick="window.location.href='./emprego.php?id_emp=<?= $row['id_oferta'] ?>'" type="button" class="btn-emprego">Ver Emprego</button>
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
