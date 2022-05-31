<?php include 'page_parts/header.php'; ?>

<div class="home">
    <?php include 'page_parts/left.php'; ?>
    <div class="center">

        <div class="caixa-adicionar">
            <button id="botao-adicionar" class="botao-caixacostas" onclick="adicionarevento()"><i
                    class="fa-solid fa-plus"></i> Adicionar Evento</button>

        </div>

        <div id="adicionar-evento">

    
        <form action="insert_evento.php" method="POST" id="post" enctype="multipart/form-data">
        <i onclick="fecharadicionar()" id="botao-cancelar" class='bx bx-x'></i>
                <div class="caixas-texto">
                    <textarea maxlength="50" name="text" id="caixas-texto"
                        placeholder="Nome do Evento"></textarea>
                </div>
                <div class="caixas-texto">
                    <textarea maxlength="50" name="data" id="caixas-texto"
                        placeholder="Data do Evento (Ex.: Terça-feira, 1 de Novembro)"></textarea>
                </div>
             
                <div class="botoes-evento">
                    <div class="upload_img" onchange="previewFile()">
                        <button class="botao-upload"><i class='bx bx-plus'></i></button>
                        <input id="input_file" type="file" name="foto_public">
                    </div>
                    <div class="botao-evento">
                        <button id="eventos-botao" type="submit" name="post">Adicionar</button>
                    </div>
                </div>
            </form>
        

        </div>


        <div class="caixas-eventos1">


            <div class="caixa">
                <div class="caixa-inner">
                    <div class="caixa-frente">
                        <img class="imagens" src="img/eventos/web-summit.jpeg" alt="websummit">
                    </div>
                    <div class="caixa-costas">
                        <h1>Web Summit 2022</h1>
                        <p>Terça-feira, 1 de Novembro</p>
                        <p>Sexta-feira, 4 de Novembro</p>
                        <a href="https://websummit.com/" class="botao-caixacostas">Visitar</a>
                    </div>
                </div>
            </div>

            <div class="caixa">
                <div class="caixa-inner">
                    <div class="caixa-frente">
                        <img class="imagens" src="img/eventos/cisco.png" alt="cisco">
                    </div>
                    <div class="caixa-costas">
                        <h1>Cisco Live</h1>
                        <p>Quarta-feira, 30 de Marco</p>
                        <p>Quinta-feira, 31 de Marco</p>
                        <a href="https://www.ciscolive.com/" class="botao-caixacostas">Visitar</a>
                    </div>
                </div>
            </div>

            <div class="caixa">
                <div class="caixa-inner">
                    <div class="caixa-frente">
                        <img class="imagens" src="img/eventos/ces.jpg" alt="ces">
                    </div>
                    <div class="caixa-costas">
                        <h1>CES | Digital</h1>
                        <p>Terça-feira, 11 de Janeiro</p>
                        <p>Quarta-feira, 12 de Janeiro</p>
                        <a href="https://www.ces.tech/" class="botao-caixacostas">Visitar</a>
                    </div>
                </div>
            </div>


            
            <div class="caixa">
                <div class="caixa-inner">
                    <div class="caixa-frente">
                        <img class="imagens" src="img/eventos/google.png" alt="google">
                    </div>
                    <div class="caixa-costas">
                        <h1>Google Cloud Next | Digital</h1>
                        <p>Terça-feira, 28 de Junho</p>
                        <p>Quarta-feira, 29 de Junho</p>
                        <a href="https://google.com" class="botao-caixacostas">Visitar</a>
                    </div>
                </div>
            </div>

            <div class="caixa">
                <div class="caixa-inner">
                    <div class="caixa-frente">
                        <img class="imagens" src="img/eventos/lisboa.jpg" alt="lisboa">
                    </div>
                    <div class="caixa-costas">
                        <h1>Lisboa Games Week 2022</h1>
                        <p>Quinta-Feira, 17 de Novembro</p>
                        <p>Domingo, 20 de Novembro</p>
                        <a href="https://www.lisboagamesweek.pt/" class="botao-caixacostas">Visitar</a>
                    </div>
                </div>
            </div>
        </div>

        
    </div>
</div>

<script src="js/eventos.js"></script>

<?php include 'page_parts/footer.php'; ?>