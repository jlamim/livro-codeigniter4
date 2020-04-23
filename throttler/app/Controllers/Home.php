<?php

namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
		// Instanciamos a validação como um serviço
		$validacao = \Config\Services::validation();

		$dados = [
			'validacao' => false,
			'erros'     => []
		];

		// Verificamos se o formulário foi submetido
		if ($this->request->getPost()) {
			// Recuperamos os dados enviados pelo formulário
			$dtUsuario = $this->request->getPost();

			// Executamos a validação com base nas regras que foram definidas em
			// /app/Config/Validation.php e analisando os dados enviados através do formulário
			if ($validacao->run($dtUsuario, 'emailData')) {
				// Instanciamos a classe de email como um serviço
				$email = \Config\Services::email();

				// Definimos o remetente
				$email->setFrom($dtUsuario['email_remetente'], $dtUsuario['nome']);
				// Definimos o destinatário
				$email->setTo($dtUsuario['email_destinatario']);
				// Definimos o assunto
				$email->setSubject($dtUsuario['assunto']);
				// Definimos a mensagem
				$email->setMessage($dtUsuario['mensagem']);

				// Executamos o envio dentro do operador ternário de modo a otimizar o código
				// e retornando uma mensagem relativa ao status do envio para ser exibida na view
				$dados = [
					'validacao' => true,
					'erros'     => (!$email->send()) ? ['Não foi possível enviar o email.'] : ['Email enviado com sucesso!']
				];
			}
			// Caso haja algum erro de validação, passamos as informações sobre erros para
			// serem exibidas na view
			else {
				$dados = [
					'validacao' => true,
					'erros'     => $validacao->getErrors()
				];
			}
		}

		// Carregamos a view
		return view('index', $dados);
	}

	public function limiteExcedido()
	{
		// Carregamos a view
		return view('limite_excedido');
	}

}
