<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title><?= lang('App.headTitulo') ?></title>
	<meta name="description" content="<?= lang('App.headDescricao') ?>">
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
				<h2><?= lang('App.conteudoTitulo') ?></h2>
				<p class="lead"><?= lang('App.conteudoDescricao') ?></p>
			</div>

			<div class="row">
				<div class="col-12 text-center">
					<a href="<?= base_url('pt-BR') ?>" title='<?= lang('App.conteudoLinkPt') ?>' class="btn btn-default"><?= lang('App.conteudoLinkPt') ?></a>
					<a href="<?= base_url('en') ?>" title='<?= lang('App.conteudoLinkEn') ?>' class="btn btn-default"><?= lang('App.conteudoLinkEn') ?></a>
					<a href="<?= base_url('es') ?>" title='<?= lang('App.conteudoLinkEs') ?>' class="btn btn-default"><?= lang('App.conteudoLinkEs') ?></a>
				</div>
			</div>

			<footer class="my-5 pt-5 text-muted text-center text-small">
				<hr />
				<ul class="list-inline">
					<li class="list-inline-item"><a href="https://livrocodeigniter.com.br" target="_blank"><?= lang('App.footerComprarLivro') ?></a></li>
					<li class="list-inline-item"><a href="https://jonathanlamim.com.br" target="_blank"><?= lang('App.footerSiteAutor') ?></a></li>
					<li class="list-inline-item"><a href="https://github.com/jlamim/livro-codeigniter4" target="_blank"><?= lang('App.footerExemplos') ?></a></li>
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