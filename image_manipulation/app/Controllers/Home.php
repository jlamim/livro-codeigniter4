<?php

namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
		$imagem    = \Config\Services::image();
		$imagePath = WRITEPATH . 'uploads';
		$dados     = [
			'status'      => false,
			'erro'        => null,
			'infoArquivo' => []
		];

		// Verifico se o arquivo foi enviado e armazeno na variável
		$arquivo = ($this->request->getFile('arquivo')) ? $this->request->getFile('arquivo') : null;
		// Verifico se a qualidade da imagem foi definida
		$qualidade = ($this->request->getPost('qualidade')) ? $this->request->getPost('qualidade') : 50;

		// Verifico se o arquivo foi enviado e se tem algum erro
		// Se tem algum erro que o torna inválido, então armazeno
		// as informações do erro na variável dados
		if ($arquivo && !$arquivo->isValid()) {
			$dados = [
				'status' => false,
				'erro'   => $arquivo->getErrorString(),
				'infoArquivo' => []
			];
		}
		// Se o arquivo é válido então eu aplico a manipulação da imagem
		elseif ($arquivo && $arquivo->isValid()) {
			$imageName = $arquivo->getRandomName();
			$tmpImage  = $imagePath . "/tmp/";
			$newImage  = $imagePath . "/" . $imageName;

			// Movemos o arquivo enviado para o diretório temporário
			$arquivo->move($tmpImage, $imageName);

			// Executamos a manipulação da imagem
			try {
				// Informa qual o arquivo original
				$imagem->withFile($tmpImage . $imageName);

				// Aplica uma rotação na imagem
				$imagem->rotate($this->request->getPost('rotacao'));

				// Adiciona um texto como marca d'água na imagem
				$imagem->text($this->request->getPost('watermark'), [
					'color'      => '#ffffff',
					'opacity'    => 0.8,
					'withShadow' => false,
					'hAlign'     => 'center',
					'vAlign'     => 'bottom',
					'fontSize'   => 70
				]);

				// Informa qual o arquivo de destino e a qualidade que ele deve ser gerado
				// E salva o novo arquivo
				$imagem->save($newImage, $qualidade);

				// Passa as informações quer serão utilizadas na view
				$dados = [
					'status'      => false,
					'erro'        => null,
					'infoArquivo' => []
				];
			}
			// Caso a manipulação da imagem de erro, exibimos a mensagem
			catch (CodeIgniter\Images\ImageException $e) {
				$dados = [
					'status' => false,
					'erro'   => $e->getMessage(),
					'infoArquivo' => []
				];
			}
		}

		// Carregamos a view
		return view('welcome_message', $dados);
	}

	//--------------------------------------------------------------------

}
