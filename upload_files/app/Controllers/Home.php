<?php

namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
		$dados = [
			'infoArquivo' => []
		];

		// Verifico se o arquivo foi enviado e armazeno na variável
		$arquivo = ($this->request->getFile('arquivo')) ? $this->request->getFile('arquivo') : null;

		// Verifico se o arquivo foi enviado e se tem algum erro
		// Se tem algum erro que o torna inválido, então armazeno
		// as informações do erro na variável dados
		if ($arquivo && !$arquivo->isValid()) {
			$dados = [
				'status' => false,
				'erro'   => $arquivo->getErrorString()
			];
		}
		// Se o arquivo é válido então eu armazeno as informações delena variável dados
		elseif ($arquivo && $arquivo->isValid()) {
			// Se foi selecionada a opção de salvar o arquivo então salvo no diretório
			// padrão: writable/uploads/YYYYMMDD
			// YYYYMMD: é o formato de data utilizado para nomear o diretório, ou seja
			// os arquivos ficarão organizados em diretórios organizados por data
			if ($this->request->getVar('salvar'))
				$arquivo->store();
			// O objeto foi convertido para array apenas para facilitar a exibição das informações sobre o arquivo na view
			$dados = [
				'infoArquivo' => (array) $arquivo
			];
		}

		// Carregamos a view
		return view('welcome_message', $dados);
	}

	//--------------------------------------------------------------------

}
