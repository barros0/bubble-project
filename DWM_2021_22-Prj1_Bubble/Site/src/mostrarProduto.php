<?php

include('bd.php');

$produtos = mysqli_query($conn, "SELECT * FROM marketplace");

$row = mysqli_fetch_array($produtos);

foreach ($produtos as $row => $produto) :

    //mostrar nome do autor do produto
    $id = $produto['id_user'];
    $user = mysqli_query($conn, "SELECT nome FROM users WHERE id_user = '$id'");
    $username = mysqli_fetch_array($user);

    //mostra nome da categoria
    $nrCat = $produto['categoria'];
    include('src/nomeCategoria.php');

?>

    <div class="p-4 w-full light-gray item <?php echo $produto['categoria']; ?>">

        <img alt="ecommerce" class="p-2 object-center w-16 rounded-full shadow-lg shadow-white" src="img/marketplace/CodeFactor.png">

        <div class="mt-4">
            <h3 class="text-gray-500 text-xs tracking-widest mb-1"><?php echo $nrCat; ?></h3>
            <h2 class="text-white text-lg font-medium"><?php echo $produto['titulo'] ?></h2>
            <p class="mt-1">Por: <?php echo $username['nome'] ?></p>
            <p class="mt-1"><?php echo $produto['descricao'] ?></p>
            <p class="mt-1"><?php echo $produto['preco'] ?>€</p>

            <p><span class="mt-1 text-gray-500 mr-3 inline-flex items-center leading-none text-sm pr-3 py-1">
                    5.0
                    <?php for ($j = 0; $j <= 4; $j++) : ?>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                        </svg>
                    <?php endfor; ?>
                </span></p>

            <p>
                <span class="mt-1 text-gray-500 inline-flex items-center leading-none text-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M3 17a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm3.293-7.707a1 1 0 011.414 0L9 10.586V3a1 1 0 112 0v7.586l1.293-1.293a1 1 0 111.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                    1.6k Downloads
                </span>
            </p>
        </div>
    </div>

<?php endforeach; ?>