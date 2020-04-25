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

	<!-- Font Awesome -->
	<script src="https://kit.fontawesome.com/24e6232503.js" crossorigin="anonymous"></script>
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

				<?php if ($sessao->has('msgWarning')) : ?>
					<div class="alert alert-warning" role="alert">
						<?= $sessao->get('msgWarning') ?>
					</div>
				<?php endif; ?>
			</div>

			<div class="row">
				<div class="col-md-12">
					<h4 class="mb-3 float-left">Usuários Cadastrados</h4>
					<a href="<?= base_url('novo') ?>" class="btn btn-success float-right">Novo Usuário</a>
					<?php if (count($usuarios) > 0) : ?>
						<div class="table-responsive">
							<table class="table table-sm">
								<thead>
									<tr>
										<th scope="col">#</th>
										<th scope="col">Nome</th>
										<th scope="col">Sobrenome</th>
										<th scope="col">Nickname</th>
										<th scope="col">Dt. Nascimento</th>
										<th scope="col" class="text-center">Editar</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($usuarios as $usuario) : ?>
										<tr>
											<th scope="row"><?= $usuario->id ?></th>
											<td><?= $usuario->nome ?></td>
											<td><?= $usuario->sobrenome ?></td>
											<td><?= $usuario->email ?></td>
											<td><?= $usuario->dt_nascimento ?></td>
											<td class="text-center">
												<a href="<?= base_url('editar/' . $usuario->id) ?>" class="btn btn-secondary" title="Editar Dados"><i class="fas fa-user-edit"></i></a>
												<a href="<?= base_url('excluir/' . $usuario->id) ?>" class="btn btn-danger" title="Excluir Usuário"><i class="fas fa-user-times"></i></a>
											</td>
										</tr>
									<?php endforeach; ?>
								</tbody>
							</table>
						</div>
						<?= $paginacao->links() ?>
					<?php else : ?>
						<div class="alert alert-info" role="alert">
							Nenhum usuário cadastrado até o momento. <a href="<?= base_url('novo') ?>" title="Novo Usuário">Clique aqui</a> e cadastre o primeiro usuário.
						</div>
					<?php endif; ?>
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