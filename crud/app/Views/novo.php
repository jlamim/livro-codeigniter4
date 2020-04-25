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
                <h2>CRUD</h2>
                <p class="lead">Nesse exemplo você verá como construir um CRUD usando o CodeIgniter 4 e seus recursos nativos.</p>
            </div>

            <div class="row">
                <div class="col-md-4 order-md-2 mb-4">
                    <?php if ($sucesso) : ?>
                        <div class="alert alert-success" role="alert">
                            Usuário cadastrado com sucesso!
                        </div>
                    <?php endif; ?>
                    <a href="<?= base_url('') ?>" class="btn btn-success block">Ver Usuários</a>
                    <?php if (count($erros) > 0) : ?>
                        <h4 class="d-flex justify-content-between align-items-center mb-3">
                            <span class="text-muted">Status da Validação</span>
                        </h4>
                        <ul class="list-group mb-3">
                            <?php foreach ($erros as $campo => $erro) : ?>
                                <li class="list-group-item d-flex justify-content-between lh-condensed">
                                    <div>
                                        <h6 class="my-0"><?= $campo ?></h6>
                                        <small class="text-muted"><?= $erro ?></small>
                                    </div>
                                </li>
                            <?php endforeach ?>
                        </ul>
                    <?php endif; ?>
                    <h4 class="d-flex justify-content-between align-items-center mb-3 mt-3">
                        <span class="text-muted">Regras da Validação</span>
                    </h4>
                    <ul class="list-group mb-3">
                        <li class="list-group-item d-flex justify-content-between lh-condensed">
                            <div>
                                <h6 class="my-0">Nome</h6>
                                <small class="text-muted">Obrigatório, mínimo de 3 caracteres</small>
                            </div>
                        </li>
                        <li class="list-group-item d-flex justify-content-between lh-condensed">
                            <div>
                                <h6 class="my-0">Sobrenome</h6>
                                <small class="text-muted">Obrigatório, mínimo de 3 caracteres</small>
                            </div>
                        </li>
                        <li class="list-group-item d-flex justify-content-between lh-condensed">
                            <div>
                                <h6 class="my-0">Nickname</h6>
                                <small class="text-muted">Obrigatório, letras e números, entre 5 e 15 caracteres, único</small>
                            </div>
                        </li>
                        <li class="list-group-item d-flex justify-content-between lh-condensed">
                            <div>
                                <h6 class="my-0">Email</h6>
                                <small class="text-muted">Obrigatório, email válido, único</small>
                            </div>
                        </li>
                        <li class="list-group-item d-flex justify-content-between lh-condensed">
                            <div>
                                <h6 class="my-0">Data de Nascimento</h6>
                                <small class="text-muted">Obrigatório, data válida no formato <?= date('d/m/Y') ?></small>
                            </div>
                        </li>
                        <li class="list-group-item d-flex justify-content-between lh-condensed">
                            <div>
                                <h6 class="my-0">Código de Segurança</h6>
                                <small class="text-muted">Obrigatório, número inteiro, 3 caracteres</small>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="col-md-8 order-md-1">
                    <h4 class="mb-3">Dados Pessoais</h4>
                    <form method="POST">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="primeiroNome">Nome</label>
                                <input type="text" class="form-control" id="nome" placeholder="" value="<?= $usuario->nome ?>" name="nome">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="sobrenome">Sobrenome</label>
                                <input type="text" class="form-control" id="sobrenome" placeholder="" value="<?= $usuario->sobrenome ?>" name="sobrenome">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="nickname">Nickname</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">@</span>
                                    </div>
                                    <input type="text" class="form-control" id="nickname" placeholder="Nickname" name="nickname" value="<?= $usuario->nickname ?>">
                                </div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" placeholder="fulano@exemplo.com" name="email" value="<?= $usuario->email ?>">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3 mb-3">
                                <label for="cc-expiracao">Data de Nascimento</label>
                                <input type="text" class="form-control" id="dt_nascimento" placeholder="" value="<?= $usuario->dt_nascimento ?>" name="dt_nascimento">
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="cc-cvv">Código de Segurança</label>
                                <input type="text" class="form-control" id="codigo_seguranca" placeholder="" name="codigo_seguranca" value="">
                            </div>
                        </div>

                        <hr class="mb-4">
                        <button class="btn btn-primary btn-lg btn-block" type="submit">Cadastrar Usuário</button>
                    </form>
                </div>
            </div>

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