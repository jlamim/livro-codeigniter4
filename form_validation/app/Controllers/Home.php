<?php namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
		// Criamos uma instância do model
		$usuarioModel = new \App\Models\UsuarioModel();

		$dados = [
			'validacao' => false,
			'erros'     => [],
			'request'   => []
		];

		// Verificamos se o formulário foi submetido
		if($this->request->getPost()){
			// Recuperamos os dados enviados pelo formulário
			$dtUsuario = $this->request->getPost();
			$dados = [
				'request' => $dtUsuario
			];

			// Salvamos os registros na tabela 'usuarios' e em caso de erro
			// retornamos os mesmos para a variável 'dados' para serem exibidos
			// nma view
			if ($usuarioModel->save($dtUsuario) === false) {
				$dados = [
					'validacao' => true,
					'erros'     => $usuarioModel->errors()
				];
			}
		}

		// Carregamos a view
		return view('welcome_message', $dados);
	}

	//--------------------------------------------------------------------

}
