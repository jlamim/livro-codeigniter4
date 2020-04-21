<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Exemplos de Código - CodeIgniter 4</title>
    <meta name="description" content="Exemplos de código para apoiar o conteúdo do livro CodeIgniter 4">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="/favicon.ico" />

    <!-- STYLES -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

</head>

<body>

    <body class="bg-light">

        <div class="container">
            <div class="py-5 text-center">
                <!--
				COLOCAR A ILUSTRAÇÃO DA CAPA DO LIVRO AQUI
				<img class="d-block mx-auto mb-4" src="../../assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
				-->
                <h2>Requisições usando cURL</h2>
                <p class="lead">Nesse exemplo você verá como realizar requisições com cURL usando o CodeIgniter 4 e seus recursos nativos.</p>
            </div>

            <form method="POST" action="<?= base_url('busca-filmes') ?>">
                <div class="row">
                    <div class="col-md-10 mb-3">
                        <input type="text" class="form-control" id="titulo" placeholder="Nome do Filme/Série" value="" name="titulo">
                    </div>
                    <div class="col-md-2 mb-3">
                        <input class="btn btn-primary" type="submit" value="Pesquisar">
                    </div>
                </div>
            </form>

            <?php if ($resultado) : ?>
                <div class="card">
                    <div class="row">
                        <div class="col-md-3">
                            <img src="<?= $resultado->Poster ?>" alt="<?= $resultado->Title ?>" class="img-fluid" />
                        </div>
                        <div class="col-md-9">
                            <h2 class="mt-3"><?= $resultado->Title ?></h2>
                            <p><?= $resultado->Genre ?></p>
                            <p><?= $resultado->Plot ?></p>
                            <p><b>Atores:</b> <?= $resultado->Actors ?></p>
                            <p><b>Diretor:</b> <?= $resultado->Director ?></p>
                            <p><b>Produção:</b> <?= $resultado->Production ?></p>
                            <p><b>Ano:</b> <?= $resultado->Year ?></p>
                            <p><b>País:</b> <?= $resultado->Country ?></p>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

            <footer class="my-5 pt-5 text-muted text-center text-small">
                <hr />
                <ul class="list-inline">
                    <li class="list-inline-item"><a href="https://livrocodeigniter.com.br" target="_blank">Comprar Livro</a></li>
                    <li class="list-inline-item"><a href="https://jonathanlamim.com.br" target="_blank">Site do Autor</a></li>
                    <li class="list-inline-item"><a href="https://github.com/jlamim/livro-codeigniter4" target="_blank">Outros Exemplos</a></li>
                </ul>
                <p class="mb-1">&copy; 2020 - Jonathan Lamim</p>
            </footer>
        </div>

        <!-- SCRIPTS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/holder/2.9.6/holder.min.js" crossorigin="anonymous"></script>
        <!-- -->

    </body>

</html>