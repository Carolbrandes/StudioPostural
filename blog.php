<?php

use classes\CategoriaServico;
use classes\Db;
use classes\Servicos;

include 'admin/autoload.php';

$pdo = Db::conectar();
$categorias = CategoriaServico::todasCategorias($pdo);
$todosServicos = Servicos::todosServicos($pdo);

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
                                                <a href="servicoCategoria.php?id_categoria=<?php echo $categoria['id_categoria']; ?>"><?php echo $categoria['nome_categoria']; ?></a>
                                        <?php } ?>
                                </nav>

                                <section class="conteudo">
                                        <p class="indicador-categoria">Todos</p>
                                        <div class="flex-row-around borda-colunas">

                                                <?php foreach ($todosServicos as  $servico) { ?>

                                                        <div class="coluna-flex-30 flex-col-center"">
                                                <h3 class=" subtitulo-terciario uppercase centerText"><?php echo $servico['nome_servico']; ?></h3>
                                                                <img src="imagens-cadastro/<?php echo $servico['foto_servico']; ?>" alt="<?php echo $servico['nome_servico']; ?>">
                                                                <a class="botao-3" href="servico.php?<?php echo $servico['id_servico']; ?>">Saiba Mais!</a>
                                                        </div>
                                                <?php } ?>
                                        </div>
                                </section>
                        </div>
                </div>

        </main>

        <?php include 'components/footer/footer.php'; ?>

        <script src="js/menu-responsivo.js"></script>

     

</body>

</html>