<!-- Header -->
<?php include 'page_parts/header.php'; ?>

<!-- Main -->
<div class="container px-5 pt-24 pb-4 mx-auto text-center">
    <!-- Título -->
    <h1 class="sm:text-3xl text-2xl font-medium text-white mb-4">Market Place</h1>
</div>

<div class="container md:px-5 mx-auto flex flex-col sm:flex-row text-gray-400">

    <!-- Lado Esquerdo -->
    <div class="md:w-1/4">
        
        <div class="container px-5 mx-auto md:sticky md:top-0 z-auto">
            <h2 class="pb-4 text-xl">Categorias</h2>

            <nav class="list-none mb-10 z-0">

            <?php

            // chamar base de dados
            include('bd.php');

            // seleciona todas as categorias sem repetir
            $produtos = mysqli_query($conn, "SELECT count(id_produto) as total_produtos FROM marketplace");

            // transforma em array
            $p = mysqli_fetch_array($produtos);

            ?>

                <li class="pb-2">
                    <a class="text-gray-400 hover:text-white">Todos<span class="font-bold"> <?php echo($p['total_produtos']) ?></span></a>
                </li>

            <?php

            // chamar base de dados
            include('bd.php');

            // seleciona todas as categorias sem repetir
            $categorias = mysqli_query($conn, "SELECT distinct categoria FROM marketplace");

            // transforma as categorias em array
            $cat = mysqli_fetch_array($categorias);

            // para cada categoria do array de categorias:
            foreach($categorias as $cat => $categoria):

                // categoria individual
                $c = $categoria['categoria'];

                // soma a quantidade de produtos dentro da categoria
                $somar = mysqli_query($conn, "SELECT count(categoria) as total FROM `marketplace` WHERE categoria = '$c'");

                // transforma em array
                $r = mysqli_fetch_array($somar);

            ?>

                <li class="pb-2">
                    <a class="text-gray-400 hover:text-white"><?php echo($categoria['categoria']) ?><span class="font-bold"> <?php echo($r['total']) ?></span></a>
                </li>

            <?php endforeach; ?>

            </nav>
        </div>
    </div>

    <!-- Lado Direito -->
    <div class="md:w-3/4">
        <div class="container px-5 mx-auto">
            <h2 class="pb-4 text-xl">Todos os produtos</h2>

            <!-- Botão Modal -->
            
                <button type="button" class="mb-4 inline-block px-6 py-2.5 text-white bg-green-400 font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-green-500 hover:shadow-lg focus:shadow-lg focus:outline-none focus:ring-0 active:shadow-lg transition duration-150 ease-in-out" data-bs-toggle="modal" data-bs-target="#modal">
                    Adicionar novo produto
                </button>
            
  
            <!-- Modal -->
            <div class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto" id="modal" tabindex="-1" aria-labelledby="modal" aria-modal="true" role="dialog">
                <div class="modal-dialog modal-dialog-centered relative w-auto pointer-events-none">
                    <div class="modal-content border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-white bg-clip-padding rounded-md outline-none text-current">
                        <!-- Cabeçalho Modal -->     
                        <div class="modal-header flex flex-shrink-0 items-center justify-between p-4 border-b border-gray-200 rounded-t-md">
                            <!-- Título Modal -->    
                            <h5 class="text-xl font-medium leading-normal text-gray-800" id="modalLabel">Adicionar novo produto</h5>
                        
                            <!-- Botão Fechar Modal (X) --> 
                            <button type="button" class="btn-close box-content w-4 h-4 p-1 text-black border-none rounded-none opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-red-700 hover:opacity-75 hover:no-underline"
                                    data-bs-dismiss="modal" aria-label="Close">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </button>
                        </div> <!-- Fim Cabeçalho Modal -->     

                        <!-- Conteúdo Modal (FORM) --> 
                        <form class="modal-body relative" action="src/adicionarProduto.php" method="post">
                            <div class="container py-4 mx-auto">

                                <div class="flex flex-wrap -m-2">

                                    <div class="p-2 w-full relative">
                                        <label for="titulo" class="leading-7 text-sm text-gray-600">Título</label>
                                        <input type="text" id="titulo" name="titulo" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    </div>

                                    <div class="p-2 w-full relative">
                                        <label for="categoria" class="leading-7 text-sm text-gray-600">Categoria</label>
                                        <select id="categoria" name="categoria" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                            <option selected="" value="Aplicações">Aplicações</option>
                                            <option value="Gestão de API">Gestão de API</option>
                                            <option value="Chat">Chat</option>
                                            <option value="Qualidade de Código">Qualidade de Código</option>
                                            <option value="Revisão de Código">Revisão de Código</option>
                                        </select>
                                    </div>

                                    <div class="p-2 w-full relative">
                                        <label for="preco" class="leading-7 text-sm text-gray-600">Preço</label>
                                        <input type="number" min="1" id="preco" name="preco" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    </div>

                                    <div class="p-2 w-full">
                                        <label for="descricao" class="leading-7 text-sm text-gray-600">Descrição</label>
                                        <textarea id="descricao" name="descricao" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out"></textarea>
                                    </div>
                                            
                                </div>
                            </div>

                            <!-- Rodapé Botões Modal --> 
                        <div class="modal-footer flex flex-shrink-0 flex-wrap items-center justify-end px-4 pt-4 border-t border-gray-200 rounded-b-md">
                            <!-- Botão Fechar -->     
                            <button type="button" class="inline-block px-6 py-2.5 bg-gray-400 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-gray-500 hover:shadow-lg focus:shadow-lg focus:outline-none focus:ring-0 active:shadow-lg transition duration-150 ease-in-out"
                                    data-bs-dismiss="modal">Cancelar</button>
                            <!-- Botão Salvar --> 
                            <button type="submit" class="inline-block px-6 py-2.5 bg-green-400 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-green-500 hover:shadow-lg focus:bg-green-400 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-green-400 active:shadow-lg transition duration-150 ease-in-out ml-1">
                                Publicar
                            </button>
                        </div> <!-- Fim Rodapé Botões Modal --> 

                        </form> <!-- Fim Conteúdo Modal (FORM) --> 

                        
                    </div>
                </div>
            </div> <!-- Fim Conteúdo Modal -->

            <div class="grid grid-cols-1 gap-4 lg:grid-cols-4">

            <?php

            include('bd.php');
            
            $produtos = mysqli_query($conn, "SELECT * FROM marketplace");

            $row = mysqli_fetch_array($produtos);

            foreach($produtos as $row => $produto): 

                //mostrar nome do autor do produto
                $id = $produto['id_user'];
                $user = mysqli_query($conn, "SELECT nome FROM users WHERE id_user = '$id'");
                $username = mysqli_fetch_array($user);
                
                
            ?>

            <div class="p-4 w-full light-gray">

                <img alt="ecommerce" class="p-2 object-center w-16 rounded-full shadow-lg shadow-white" src="img/marketplace/CodeFactor.png">
                
                <div class="mt-4">
                    <h3 class="text-gray-500 text-xs tracking-widest mb-1"><?php echo($produto['categoria']) ?></h3>
                    <h2 class="text-white text-lg font-medium"><?php echo($produto['titulo']) ?></h2>
                    <p class="mt-1">Por: <?php echo($username['nome']) ?></p>
                    <p class="mt-1"><?php echo($produto['descricao']) ?></p>
                    <p class="mt-1">$<?php echo($produto['preco']) ?></p>

                    <p><span class="mt-1 text-gray-500 mr-3 inline-flex items-center leading-none text-sm pr-3 py-1">
                        5.0
                        <?php for($j = 0; $j<=4; $j++): ?>
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
            </div>
        </div>

    </div>
</div>


<!-- Footer -->
<?php include 'page_parts/footer.php'; ?>