<?php
include('../partials/header.php');
?>

    <div class="filter-bar">

        <div class="filter">
            <input type="text" placeholder="Id">
        </div>

        <div class="filter">
            <input type="text" placeholder="Id">
        </div>

        <div class="filter">
            <input type="text" placeholder="Id">
        </div>

        <div class="filter">
            <input type="text" placeholder="Id">
        </div>

        <div class="filter">
            <input type="text" placeholder="Id">
        </div>


    </div>


    <div class="table-responsive">
        <div class="table-header">
            <h2>fdfd</h2>
        </div>
        <table class="table">
            <caption>Lista de utilizadores</caption>
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Email</th>
                <th scope="col">Estado</th>
                <th scope="col">Editar</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <th scope="row">1</th>
                <td>
                    <img class="user-img" src="https://thispersondoesnotexist.com/image" alt="">
                    <span>aaaaa</span>
                </td>
                <td>aaaaa</td>
                <td>
                <span class="mini-card bg-warning">
                    Bloqueado
                </span>
                </td>
                <td><i class="fa fa-pen"></i></td>
            </tr><tr>
                <th scope="row">1</th>
                <td>
                    <img class="user-img" src="https://thispersondoesnotexist.com/image" alt="">
                    <span>aaaaa</span>
                </td>
                <td>aaaaa</td>
                <td>
                <span class="mini-card bg-warning">
                    Bloqueado
                </span>
                </td>
                <td><i class="fa fa-pen"></i></td>
            </tr><tr>
                <th scope="row">1</th>
                <td>
                    <img class="user-img" src="https://thispersondoesnotexist.com/image" alt="">
                    <span>aaaaa</span>
                </td>
                <td>aaaaa</td>
                <td>
                <span class="mini-card bg-warning">
                    Bloqueado
                </span>
                </td>
                <td><i class="fa fa-pen"></i>
                    <div class="dropdown show">
                        <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Dropdown link
                        </a>

                        <div class="dropdown-menu show" aria-labelledby="dropdownMenuLink">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </div>
                </td>
            </tr>

            </tbody>
        </table>
    </div>


<?php
include('../partials/footer.php');
?>