<?php namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
		$usuarioModel = new \App\Models\UsuarioModel();

		$dados = [
			'validacao' => false,
			'erros'     => [],
			'request'   => []
		];

		if($this->request->getPost()){
			$dtUsuario = $this->request->getPost();
			$dados = [
				'request' => $dtUsuario
			];

			if ($usuarioModel->save($dtUsuario) === false) {
				$dados = [
					'validacao' => true,
					'erros'     => $usuarioModel->errors()
				];
			}
		}

		return view('welcome_message', $dados);
	}

	//--------------------------------------------------------------------

}
