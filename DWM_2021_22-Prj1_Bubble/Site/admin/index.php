<?php
include('./partials/header.php');

$c_users = $conn->query('select count(*) as total from users')->fetch_assoc()['total'];
$c_publicacoes = $conn->query('select count(*) as total from publicacoes')->fetch_assoc()['total'];
$c_users = $conn->query('select count(*) as total from users')->fetch_assoc()['total'];


?>

    <div class="title-page s-container">

        <h1>Dashboard</h1>
    </div>
    <main class="container" id="main">
        <div class="row">
            <h2>Bem vindo, <?php echo($_SESSION['user']['nome']) ?></h2>
        </div>

        <div class="row">
            <div class="col-6">
                <div class="flex-wrap">
                    <div class="flex flex-wrap">
                        <div class="mini-card">
                            <div>
                                <i class="fa fa-user icon"></i>
                                <span class="dots"></span>
                            </div>

                            <h2 class="titulo">Users</h2>
                            <span class="valor"><?= $c_users ?></span>
                        </div>

                        <div class="mini-card">
                            <div>
                                <i class="fa fa-pen-clip icon"></i>
                                <span class="dots"></span>
                            </div>

                            <h2 class="titulo">Publicações</h2>
                            <span class="valor"><?= $c_publicacoes ?></span>
                        </div>

                        <div class="mini-card">
                            <div>
                                <i class="fa fa-user icon"></i>
                                <span class="dots"></span>
                            </div>

                            <h2 class="titulo">Users</h2>
                            <span class="valor"><?= $c_users ?></span>
                        </div>
                    </div>
                    <div class="col-12">
                        <nav>
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">
                                    Mais pesquisado</button>
                                <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">
                                    Topicos populares</button>
                                <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">
                                    Contact</button>
                            </div>
                        </nav>
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                ...
                            </div>
                            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">...</div>
                            <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">...</div>
                        </div>


                    </div>
                </div>

            </div>


            <div class="armazenamento d-flex flex-column col-12 col-lg-6 text-white">
                <div class="header d-flex flex-column">
                    <div class="d-flex justify-content-between align-items-center mb-1">
                        <h4>Armazenamento</h4>
                        <span class="text-swhite" style="font-size: 1rem;"> 4 livres de <span
                                    id="total-value">3</span>GB</span>
                    </div>
                    <div class="progress bg-transparent" style="height: 20px;">
                        <div class="progress-bar bg-transparent" style="width: 20%;" data-bs-toggle="tooltip"
                             title="System">
                            <div class="progress-bar bg-primary bg-gradient bar h-100"></div>
                        </div>
                        <div class="progress-bar bg-transparent" style="width: 20%;" data-bs-toggle="tooltip"
                             title="Files">
                            <div class="progress-bar bg-warning bg-gradient bar h-100"></div>
                        </div>
                        <div class="progress-bar bg-transparent" style="width: 11%;" data-bs-toggle="tooltip"
                             title="Images">
                            <div class="progress-bar bg-success bg-gradient bar h-100"></div>
                        </div>
                        <div class="progress-bar bg-transparent" style="width: 32%;" data-bs-toggle="tooltip"
                             title="Videos">
                            <div class="progress-bar bg-info bg-gradient bar h-100"></div>
                        </div>
                        <div class="progress-bar bg-transparent" style="width: 17%;" data-bs-toggle="tooltip"
                             title="Audios">
                            <div class="progress-bar bg-light bg-gradient bar h-100"></div>
                        </div>
                    </div>
                </div>
                <div class="body d-flex flex-column ">
                    <div class="item-amarzenamento d-flex align-items-center justify-content-between mt-3 border-bottom border-secondary pb-2">
                        <div class="d-flex align-items-center">
                            <div class="bg-primary rounded" style="width: 25px;height: 25px;"></div>
                            <span class="item-titulo fs-5 ms-2">System</span>
                        </div>
                        <span class="text-swhite">
                    <span id="system-value">5</span>GB
                </span>
                    </div>

                    <div class="item-amarzenamento d-flex align-items-center justify-content-between mt-3 border-bottom border-secondary pb-2">
                        <div class="d-flex align-items-center">
                            <div class="bg-warning rounded" style="width: 25px;height: 25px;"></div>
                            <span class="item-titulo fs-5 ms-2">Ficheiros</span>
                        </div>
                        <span class="text-swhite">
                    <span id="files-value">5</span>GB
                </span>
                    </div>

                    <div class="item-amarzenamento d-flex align-items-center justify-content-between mt-3 border-bottom border-secondary pb-2">
                        <div class="d-flex align-items-center">
                            <div class="bg-success rounded" style="width: 25px;height: 25px;"></div>
                            <span class="item-titulo fs-5 ms-2">Imagens</span>
                        </div>
                        <span class="text-swhite">
                    <span id="images-value">2</span>GB
                </span>
                    </div>

                    <div class="item-amarzenamento d-flex align-items-center justify-content-between mt-3 border-bottom border-secondary pb-2">
                        <div class="d-flex align-items-center">
                            <div class="bg-info rounded" style="width: 25px;height: 25px;"></div>
                            <span class="item-titulo fs-5 ms-2">Videos</span>
                        </div>
                        <span class="text-swhite">
                    <span id="videos-value">16</span>GB
                </span>
                    </div>

                    <div class="item-amarzenamento d-flex align-items-center justify-content-between mt-3 border-bottom border-secondary pb-2">
                        <div class="d-flex align-items-center">
                            <div class="bg-light rounded" style="width: 25px;height: 25px;"></div>
                            <span class="item-titulo fs-5 ms-2">Audios</span>
                        </div>
                        <span class="text-swhite">
                    <span id="audios-value">4</span>GB
                </span>
                    </div>

                    <div class="item-amarzenamento d-flex align-items-center justify-content-between mt-3 border-bottom border-secondary pb-2">
                        <div class="d-flex align-items-center">
                            <div class="bg-dark rounded" style="width: 25px;height: 25px;"></div>
                            <span class="item-titulo fs-5 ms-2">Outros</span>
                        </div>
                        <span class="text-swhite">
                    <span id="audios-value">4</span>GB
                </span>
                    </div>
                </div>
            </div>
        </div>


        <div class="row ">


            <div class="card">
                <p>sdsd</p>
                <a href="#">
                    <span class="dots"></span>
                </a>
            </div>


            <div class="title-table">
                <h2>Reports</h2>
            </div>
            <table>
                <thead>
                <tr>
                    <th>header1</th>
                    <th>header2</th>
                    <th>header3</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>text1.1</td>
                    <td>text1.2</td>
                    <td>text1.3</td>
                </tr>
                <tr>
                    <td>text2.1</td>
                    <td>text2.2</td>
                    <td>text2.3</td>
                </tr>
                <tr>
                    <td>text3.1</td>
                    <td>text3.2</td>
                    <td>text3.3</td>
                </tr>
                <tr>
                </tr>
                </tbody>
            </table>
        </div>
    </main>



<?php
include('./partials/footer.php');

?>