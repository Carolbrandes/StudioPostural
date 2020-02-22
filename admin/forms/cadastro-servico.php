<!DOCTYPE html>
<html lang="en">

<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Studio Postural</title>
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="../../style/style.css">
</head>

<body>


        <main>
                <?php include '../../components/menu/menu-admin.php'; ?>
                <div class="contexto">
                        <form action="" method="post">

                                <h2 class="titulo-secundario--escuro">Cadastrar Serviço</h2>
                                <div>
                                        <input class="input-text" type="text" name="titulo-servico" autofocus placeholder="Titulo">
                                </div>

                                <div class="coluna-radio">
                                        <div>
                                                <input type="radio" name="categoria-servico" id="">Terapias
                                        </div>
                                        <div>
                                                <input type="radio" name="categoria-servico" id="">Massagens
                                        </div>
                                        <div>
                                                <input type="radio" name="categoria-servico" id="">Estética
                                        </div>
                                        <div>
                                                <input type="radio" name="categoria-servico" id="">Nutrição
                                        </div>
                                        <div>
                                                <input type="radio" name="categoria-servico" id="">Pilates
                                        </div>
                                </div>

                                <div>
                                        <textarea name="descricao-servico" id="" cols="30" rows="10" placeholder="Descrição"></textarea>
                                </div>

                                <div>
                                        <label class="input-file" for="imagem">Escolher Imagem</label>
                                        <input type="file" name="imagem-servico" id="imagem" style="display: none;">
                                </div>

                                <button class="botao-form" type="submit">Enviar</button>

                        </form>
                </div>

        </main>


        <script src="js/menu-responsivo.js"></script>

</body>

</html>