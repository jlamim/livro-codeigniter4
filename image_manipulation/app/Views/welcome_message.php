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
				<h2>Manipulação de Imagens</h2>
				<p class="lead">No exemplo você verá como utilizar alguns recursos de manipulação de imagens nativos do CodeIgniter 4, além de reforçar os conhecimentos relacionados a upload de arquivos.</p>
			</div>

			<div class="row">
				<div class="col-md-4 order-md-2 mb-4">
					<h4 class="d-flex justify-content-between align-items-center mb-3">
						<span class="text-muted">Informações sobre o arquivo</span>
					</h4>
					<ul class="list-group mb-3">
						<?php if ($status) : ?>
							<li class="list-group-item d-flex justify-content-between lh-condensed">
								<div>
									<h6 class="my-0">O arquivo foi processado com sucesso.</h6>
								</div>
							</li>
						<?php else : ?>
							<li class="list-group-item d-flex justify-content-between lh-condensed">
								<div>
									<h6 class="my-0"><?= $erro ?></h6>
								</div>
							</li>
						<?php endif; ?>
					</ul>
				</div>
				<div class="col-md-8 order-md-1">
					<h4 class="mb-3">Informações de processamento</h4>
					<form method="POST" enctype="multipart/form-data">
						<div class="row">
							<div class="col-md-6 mb-3">
								<label>Arquivo</label>
								<input type="file" class="form-control" id="file" name="arquivo">
							</div>
							<div class="col-md-6 mb-3">
								<label for="rotacao">Rotação</label>
								<select name="rotacao" class="form-control">
									<option value="90">90</option>
									<option value="180">180</option>
									<option value="270">270</option>
									<option value="360">360</option>
								</select>
							</div>

						</div>
						<div class="row">
							<div class="col-md-6 mb-3">
								<div class="form-group">
									<label for="formControlRange">Qualidade da Image</label>
									<input type="range" class="form-control-range" id="formControlRange" name="qualidade">
									<span class="float-left">Baixa</span>
									<span class="float-right">Alta</span>
								</div>
							</div>
							<div class="col-md-6 mb-3">
								<label for="rotacao">Texto na imagem</label>
								<input type="text" name="watermark" maxlength="120" class="form-control" />
							</div>
						</div>

						<hr class="mb-4">
						<button class="btn btn-primary btn-lg btn-block" type="submit">Enviar arquivo</button>
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