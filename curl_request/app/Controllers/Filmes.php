<?php

namespace App\Controllers;

class Filmes extends BaseController
{
	// Chave de API que deve ser gerada em http://www.omdbapi.com/apikey.aspx
	private $apiKey = "SUA-CHAVE-DE-API";
	// Informações a serem enviadas para a view
	private $dados  = [
		'resultados' => []
	];
	// Variável que receberá a instância da classe CURLRequest
	private $client;

	public function __construct()
	{
		// Instanciamos a classe CURLRequest
		$this->client = \Config\Services::curlrequest();
	}

	public function index()
	{
		// Verificamos se existe uma requisição POST para processar os dados junto à API
		if ($this->request->getPost()) {
			// Definimos os parâmetros que devem ser passados para a requisição cURL
			$options  = [
				'query'   => [
					// Termo a ser pesquisado
					's'      => $this->request->getPost('titulo'),
					// Página de resultado a ser exibida
					'page'   => 1,
					// Chave da API
					'apiKey' => $this->apiKey
				],
				// Cabeçalhos da requisição
				'headers' => [
					'Accept-Encoding' => ''
				]
			];

			// Executamos a requisição à API
			$response = $this->client->request('GET', 'http://www.omdbapi.com/', $options);

			// Verificamos se o typo de dados retornado é JSON, e se sim recuperamos os dados
			// e adicionamos à variável $dados que é enviado à view
			if (strpos($response->getHeader('content-type'), 'application/json') !== false) {
				$content = json_decode($response->getBody());
				$this->dados = [
					'resultados' => $content->Search
				];
			}
		}

		// Carregamos a view
		return view('index', $this->dados);
	}

	public function detalhes($imdbID = null)
	{
		// Verificamos se o ID do filme foi enviado como parâmetro através da URI
		if ($imdbID) {
			// Definimos os parâmetros que devem ser passados para a requisição cURL
			$options  = [
				'query'   => [
					// ID do filme
					'i'      => $imdbID,
					// Chave da API
					'apiKey' => $this->apiKey
				],
				// Cabeçalhos da requisição
				'headers' => [
					'Accept-Encoding' => ''
				]
			];

			// Executamos a requisição à API
			$response = $this->client->request('GET', 'http://www.omdbapi.com/', $options);

			// Verificamos se o typo de dados retornado é JSON, e se sim recuperamos os dados
			// e adicionamos à variável $dados que é enviado à view
			if (strpos($response->getHeader('content-type'), 'application/json') !== false) {
				$content = json_decode($response->getBody());
				$this->dados = [
					'resultado' => $content
				];
			}
		}

		// Carregamos a view
		return view('detalhes', $this->dados);
	}
}
