<?php

namespace App\Controllers;

class Usuario extends BaseController
{
	private $uModel;

	public function __construct()
	{
		// Criamos uma instância do model
		$this->uModel = new \App\Models\UsuarioModel();
	}

	public function index()
	{
		// Estruturamos o array que envia as informações para view
		// Recuperando todos os registros da tabela usuarios
		// Organizados já na estrutura de paginação nativa do CodeIgniter 4
		$dados = [
			'usuarios'  => $this->uModel->paginate(3),
			'paginacao' => $this->uModel->pager, // Estrutura de paginação (links)
			'sessao'    => $this->session
		];

		// Carregamos a view
		return view('index', $dados);
	}

	public function novo()
	{
		// Estruturamos o array que envia as informações para view
		// Recuperando as informações da entidade Usuario
		$dados = [
			'sessao'   => $this->session,
			'sucesso' => ($this->request->getMethod() === 'post') ? true : false,
			'erros'   => [],
			'usuario' => new \App\Entities\Usuario()
		];

		// Verificamos se o formulário foi submetido
		if ($this->request->getPost()) {
			// Criamos uma nova entidade Usuario que receberá os dados enviados
			// através do formulário para que sejam devidamente formatados e estruturados
			// para então serem salvos no banco de dados
			$usuario   = new \App\Entities\Usuario();

			// Recuperamos os dados enviados pelo formulário
			$dtUsuario = $this->request->getPost();

			// Salvamos os registros na tabela 'usuarios' utilizando os recursos da entidade
			// Usuario para estruturar e formatar os dados para então salvar no banco de dados
			// e em caso de erroretornamos os mesmos para a variável 'dados' para serem exibidos
			// na view
			if ($this->uModel->save($usuario->fill($dtUsuario)) === false) {
				$dados['sucesso'] = false;
				$dados['erros']   = $this->uModel->errors();
				$dados['usuario'] = $usuario;
			}
		}

		// Carregamos a view
		return view('novo', $dados);
	}

	public function editar($idUsuario = null)
	{
		// Recuperamos as informações do usuário
		$usuario = $this->uModel->find($idUsuario);

		// Verificamos se foi encontrado um usuário com o ID informado
		// Se não retornou nenhum usuário, então redirecionamos para a página principal
		if (is_null($usuario)) {
			$this->session->setFlashdata('msgWarning', 'Nenhum usuário encontrado para edição.');
			return redirect()->to(base_url());
		}

		// Estruturamos o array que envia as informações para view
		$dados = [
			'sessao'   => $this->session,
			'sucesso' => ($this->request->getMethod() === 'post') ? true : false,
			'erros'   => [],
			'usuario' => $usuario
		];

		// Verificamos se o formulário foi submetido
		if ($this->request->getPost()) {
			// Recuperamos os dados enviados pelo formulário
			$dtUsuario = $this->request->getPost();

			// Salvamos os registros na tabela 'usuarios' e em caso de erro
			// retornamos os mesmos para a variável 'dados' para serem exibidos
			// na view
			if ($this->uModel->save($usuario->fill($dtUsuario)) === false) {
				$dados['sucesso'] = false;
				$dados['erros']   = $this->uModel->errors();
			}
		}

		// Carregamos a view
		return view('editar', $dados);
	}

	public function excluir($idUsuario = null)
	{
		// Recuperamos as informações do usuário
		$usuario = $this->uModel->find($idUsuario);
		// Definimos mensagem padrão para o caso de erro na exclusão do usuário
		$this->session->setFlashdata('msgWarning', 'Não foi possível excluir o usuário.');

		// Verificamos se foi encontrado um usuário com o ID informado
		// Se não retornou nenhum usuário, então redirecionamos para a página principal
		// Com uma mensagem a ser exibida
		if (is_null($usuario)) {
			$this->session->setFlashdata('msgWarning', 'Nenhum usuário encontrado para excluir.');
			return redirect()->to(base_url());
		}

		// Executamos a exclusão do usuário
		// E se executar com sucesso, definimos a mensagem de sucesso
		if ($this->uModel->delete(['id' => $idUsuario])) {
			$this->session->setFlashdata('msgWarning', 'Usuário excluído com sucesso.');
		}

		// Redirecionamos para página principal
		return redirect()->to(base_url());
	}
}
