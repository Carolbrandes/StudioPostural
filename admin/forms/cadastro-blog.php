<?php

use classes\Artigo;
use classes\CategoriaBlog;
use classes\Db;
use classes\Servicos;

include '../autoload.php';

$pdo = Db::conectar();
$categorias = CategoriaBlog::todasCategorias($pdo);
$Artigo = new Artigo();

if (isset($_POST['acao'])) {

        $cadastroArtigo = $artigo->cadastrar($pdo, $_POST['titulo_artigo'], $_POST['descricao_artigo'], $_POST['id_categoria_blog'], $_FILES['imagem_artigo']);

?>

        <script>
                alert("<?php echo $cadastroArtigo; ?>")
                location.href = "cadastro-blog.php"
        </script>

<?php } ?>

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
                        <form action="" method="post" enctype="multipart/form-data">

                                <h2 class="titulo-secundario--escuro">Cadastrar Artigo</h2>
                                <div>
                                        <input class="input-text" type="text" name="titulo_artigo" autofocus placeholder="Titulo" required>
                                </div>

                                <div class="coluna-checkbox">
                                        <?php foreach ($categorias as $categoria) { ?>
                                                <div>
                                                        <input type="checkbox" name="id_categoria_blog[]" value="<?php echo $categoria['id_categoria_blog']; ?>"><?php echo $categoria['nome_categoria_blog']; ?>
                                                </div>
                                        <?php } ?>
                                </div>


                                <div>
                                        <textarea required name="descricao_artigo" cols="30" rows="10" placeholder="Descrição"></textarea>
                                </div>

                                <div>
                                        <label class="input-file" for="imagem">Escolher Imagem</label>
                                        <input required type="file" name="imagem_artigo" id="imagem" style="display: none;">
                                </div>

                                <button name="acao" class="botao-form" type="submit">Cadastrar</button>



                        </form>
                </div>

        </main>


        <script src="js/menu-responsivo.js"></script>

</body>

</html>