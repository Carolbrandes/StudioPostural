<?php

use classes\CategoriaServico;
use classes\Db;
use classes\Servicos;

include '../autoload.php';

$pdo = Db::conectar();
$categorias = CategoriaServico::todasCategorias($pdo);
$servico = new Servicos();

if (isset($_POST['acao'])) {

        $cadastroServico = $servico->cadastrar($pdo, $_POST['nome_servico'], $_POST['descricao_servico'], $_POST['id_categoria'], $_FILES['foto_servico']);

?>

        <script>
                alert("<?php echo $cadastroServico; ?>")
                location.href = "cadastro-servico.php"
        </script>

<?php }?>

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

                                <h2 class="titulo-secundario--escuro">Cadastrar Serviço</h2>
                                <div>
                                        <input class="input-text" type="text" name="nome_servico" autofocus placeholder="Titulo" required>
                                </div>

                                <div class="coluna-radio">
                                        <?php foreach ($categorias as $categoria) { ?>
                                                <div>
                                                        <input required type="radio" name="id_categoria" value="<?php echo $categoria['id_categoria']; ?>"><?php echo $categoria['nome_categoria']; ?>
                                                </div>
                                        <?php } ?>
                                </div>


                                <div>
                                        <textarea required name="descricao_servico" cols="30" rows="10" placeholder="Descrição"></textarea>
                                </div>

                                <div>
                                        <label class="input-file" for="imagem">Escolher Imagem</label>
                                        <input required type="file" name="foto_servico" id="imagem" style="display: none;">
                                </div>

                                <button name="acao" class="botao-form" type="submit">Cadastrar</button>



                        </form>
                </div>

        </main>


        <script src="js/menu-responsivo.js"></script>

</body>

</html>