<?php

use classes\Artigo;
use classes\CategoriaBlog;
use classes\Db;


include 'admin/autoload.php';

$pdo = Db::conectar();
$categorias = CategoriaBlog::todasCategorias($pdo);
$todosArtigos = Artigo::todosArtigos($pdo);

?>

<!DOCTYPE html>
<html lang="en">

<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Studio Postural</title>
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="style/style.css">
</head>

<body>
        <?php include 'components/menu/menu.php'; ?>
        <?php include 'components/logo/logo.php'; ?>

        <main>

                <div class="contexto">
                        <div class="flex-row-between">
                                <nav class="filtros">
                                        <a href="servicos.php">Todos</a>
                                        <?php foreach ($categorias as $categoria) { ?>
                                                <a href="servicoCategoria.php?id_categoria=<?php echo $categoria['id_categoria_blog']; ?>"><?php echo $categoria['nome_categoria_blog']; ?></a>
                                        <?php } ?>
                                </nav>

                                <section class="conteudo">
                                        <p class="indicador-categoria">Todos</p>
                                      

                                                <?php foreach ($todosArtigos as  $artigo) { ?>

                                                      <article class="artigo flex-row-between">
                                                              <div class="artigo-img">
                                                                      <img src="imagens-cadastro/<?php echo $artigo['imagem_artigo']; ?>" alt="<?php echo $artigo['titulo_artigo']; ?>">
                                                              </div>

                                                              <div class="artigo-dados">
                                                                      <h1 class= "subtitulo-terciario uppercase centerText">
                                                                              <?php echo $artigo['titulo_artigo'];?>
                                                                      </h1>

                                                                      <p class="artigo-data"><?php echo Artigo::formatarData($artigo['data']);?></p>

                                                                      <p class="artigo-descricao"><?php echo $artigo['descricao_artigo']; ?></p>

                                                                      <a class="botao-3" href="servico.php?<?php echo $artigo['id_artigo']; ?>">Saiba Mais!</a>

                                                              </div>
                                                      </article>
                                                     
                                                <?php } ?>
                                </section>
                        </div>
                </div>

        </main>

        <?php include 'components/footer/footer.php'; ?>

        <script src="js/menu-responsivo.js"></script>

     

</body>

</html>