<?php
include('./partials/header.php');


$free = disk_free_space(".");
$total = disk_total_space(".");

$si_prefix = array('B', 'KB', 'MB', 'GB', 'TB', 'EB', 'ZB', 'YB');
$base = 1024;

$class_free = min((int)log($free, $base), count($si_prefix) - 1);
$class_total = min((int)log($total, $base), count($si_prefix) - 1);

$freec = sprintf('%1.2f', $free / pow($base, $class_free)) . ' ' . $si_prefix[$class_free];
$totalc = sprintf('%1.2f', $total / pow($base, $class_total)) . ' ' . $si_prefix[$class_total];


$sp = '<br>' . ($total - $free) / $total * 100;

function folderSize($dir){
    $count_size = 0;
    $count = 0;
    $dir_array = scandir($dir);
    foreach($dir_array as $key=>$filename){
        if($filename!=".." && $filename!="."){
            if(is_dir($dir."/".$filename)){
                $new_foldersize = foldersize($dir."/".$filename);
                $count_size = $count_size+ $new_foldersize;
            }else if(is_file($dir."/".$filename)){
                $count_size = $count_size + filesize($dir."/".$filename);
                $count++;
            }
        }
    }
    return $count_size;
}
$imagens_size = folderSize('public/images');
$videos_size = folderSize('public/images');
$files_size = folderSize('public/images');

?>


    <div class="welcome">

        <div class="flex align-items-center">
            <img class="user-pic" src="https://thispersondoesnotexist.com/image" alt="">
            <p class="text-welcome">Bom dia Joana Castanheira!</p>

        </div>

    </div>


    </div>

<div class="row ">


    <dix class="d-flex flex-wrap col-12 col-lg-6 ">
        <div class="stat-card">
            <div class="icon">
                <i class="fa fa-user"></i>
            </div>

            <div class="text">
                <div>
                    <h2 class="number">100</h2>
                    <div class="line"></div>
                    <p class="desc">Users</p>
                </div>
            </div>
        </div>

        <div class="stat-card">
            <div class="icon">
                <i class="fa fa-user"></i>
            </div>

            <div class="text">
                <div>
                    <h2 class="number">100</h2>
                    <p class="desc">Users</p>
                </div>
            </div>
        </div>

        <div class="stat-card">
            <div class="icon">
                <i class="fa fa-user"></i>
            </div>

            <div class="text">
                <div>
                    <h2 class="number">100</h2>
                    <p class="desc">Users</p>
                </div>
            </div>
        </div>

        <div class="stat-card">
            <div class="icon">
                <i class="fa fa-user"></i>
            </div>

            <div class="text">
                <div>
                    <h2 class="number">100</h2>
                    <p class="desc">Users</p>
                </div>
            </div>
        </div>
    </dix>



    <div class="storage d-flex flex-column col-12 col-lg-6 text-white">
        <div class="header d-flex flex-column">
            <div class="d-flex justify-content-between align-items-center mb-1">
                <h4>Usage</h4>
                <span class="text-muted" style="font-size: 1rem;">  <?php echo($freec) ?> livres de <span
                            id="total-value"><?php echo($totalc) ?></span>GB</span>
            </div>
            <div class="progress bg-transparent" style="height: 20px;">
                <!-- system -->
                <div class="progress-bar bg-transparent" style="width: 20%;" data-bs-toggle="tooltip" title="System">
                    <div class="progress-bar bg-primary bg-gradient bar h-100"></div>
                </div>
                <!-- files -->
                <div class="progress-bar bg-transparent" style="width: 20%;" data-bs-toggle="tooltip" title="Files">
                    <div class="progress-bar bg-warning bg-gradient bar h-100"></div>
                </div>
                <!-- images -->
                <div class="progress-bar bg-transparent" style="width: 11%;" data-bs-toggle="tooltip" title="Images">
                    <div class="progress-bar bg-success bg-gradient bar h-100"></div>
                </div>
                <!-- videos -->
                <div class="progress-bar bg-transparent" style="width: 32%;" data-bs-toggle="tooltip" title="Videos">
                    <div class="progress-bar bg-info bg-gradient bar h-100"></div>
                </div>
                <!-- audios -->
                <div class="progress-bar bg-transparent" style="width: 17%;" data-bs-toggle="tooltip" title="Audios">
                    <div class="progress-bar bg-light bg-gradient bar h-100"></div>
                </div>
            </div>
        </div>
        <div class="body d-flex flex-column ">
            <div class="usage-item d-flex align-items-center justify-content-between mt-3 border-bottom border-secondary pb-2">
                <div class="d-flex align-items-center">
                    <div class="usage-icon bg-primary rounded" style="width: 25px;height: 25px;"></div>
                    <span class="usage-title fs-5 ms-2">System</span>
                </div>
                <span class="text-muted">
                    <span id="system-value">5</span>GB
                </span>
            </div>

            <div class="usage-item d-flex align-items-center justify-content-between mt-3 border-bottom border-secondary pb-2">
                <div class="d-flex align-items-center">
                    <div class="usage-icon bg-warning rounded" style="width: 25px;height: 25px;"></div>
                    <span class="usage-title fs-5 ms-2">Files</span>
                </div>
                <span class="text-muted">
                    <span id="files-value">5</span>GB
                </span>
            </div>

            <div class="usage-item d-flex align-items-center justify-content-between mt-3 border-bottom border-secondary pb-2">
                <div class="d-flex align-items-center">
                    <div class="usage-icon bg-success rounded" style="width: 25px;height: 25px;"></div>
                    <span class="usage-title fs-5 ms-2">Images</span>
                </div>
                <span class="text-muted">
                    <span id="images-value">2</span>GB
                </span>
            </div>

            <div class="usage-item d-flex align-items-center justify-content-between mt-3 border-bottom border-secondary pb-2">
                <div class="d-flex align-items-center">
                    <div class="usage-icon bg-info rounded" style="width: 25px;height: 25px;"></div>
                    <span class="usage-title fs-5 ms-2">Videos</span>
                </div>
                <span class="text-muted">
                    <span id="videos-value">16</span>GB
                </span>
            </div>

            <div class="usage-item d-flex align-items-center justify-content-between mt-3 border-bottom border-secondary pb-2">
                <div class="d-flex align-items-center">
                    <div class="usage-icon bg-light rounded" style="width: 25px;height: 25px;"></div>
                    <span class="usage-title fs-5 ms-2">Audios</span>
                </div>
                <span class="text-muted">
                    <span id="audios-value">4</span>GB
                </span>
            </div>
        </div>
    </div>



</div>
    <div class="small-card">
        <i class="fa fa-pen"></i>
    </div>

    <div class="mini-card">


        <label  class="switch">
            <input type="checkbox" checked>
            <span class="slider round"></span>
        </label>
    </div>



    <div class="row">




        <div class="stats-br">
            <div class="counter">
                <i class="fa fa-coffee fa-2x icon"></i>
                <h2 class="number">999</h2>
                <div class="line"></div>
                <p class="stats-text">Utilizadores</p>
            </div>
        </div>

        <div class="stats-bar col-8">
            <a href="#" class="info text-decoration-none">
            <span class="icon">
                <i class="fa fa-user"></i>
            </span>

                <span class="numero">
                    30
                </span>

                <div class="legenda">
                    <h3>Utilizadores</h3>
                </div>
            </a>

            <a href="#" class="info text-decoration-none">
            <span class="icon">
                <i class="fa fa-user"></i>
            </span>

                <span class="numero">
                    30
                </span>

                <div class="legenda">
                    <h3>Utilizadores</h3>
                </div>
            </a>

            <a href="#" class="info text-decoration-none">
            <span class="icon">
                <i class="fa fa-user"></i>
            </span>

                <span class="numero">
                    30
                </span>

                <div class="legenda">
                    <h3>Utilizadores</h3>
                </div>
            </a>

            <a href="#" class="info text-decoration-none">
            <span class="icon">
                <i class="fa fa-user"></i>
            </span>

                <span class="numero">
                    30
                </span>

                <div class="legenda">
                    <h3>Utilizadores</h3>
                </div>
            </a>

            <a href="#" class="info text-decoration-none">
            <span class="icon">
                <i class="fa fa-user"></i>
            </span>

                <span class="numero">
                    30
                </span>

                <div class="legenda">
                    <h3>Utilizadores</h3>
                </div>
            </a>
        </div>

        <div class="col-4">
            <h3>Alertas</h3>

            <div class="alerts">

                <div class="alert error">
                    <div class="icon">
                        <i class="fa fa-warning"></i>
                    </div>

                    <span class="info">
                   Denuncia feita por <a href="#">@jjoao23</a>
                </span>
                </div>

                <div class="alert warning">
                    <div class="icon">
                        <i class="fa-solid fa-circle-exclamation"></i>
                    </div>

                    <span class="info">
                   Conta bloqueada de <a href="#">@jjoao23</a>
                </span>
                </div>

                <div class="alert sucess">
                    <div class="icon">
                        <i class="fa-solid fa-check"></i>
                    </div>

                    <span class="info">
                   Conta verificada por <a href="#">@jjoao23</a>
                </span>
                </div>

            </div>
        </div>


    </div>


<?php
include('./partials/footer.php');

?>