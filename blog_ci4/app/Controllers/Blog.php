<?php

namespace App\Controllers;

class Blog extends BaseController
{
    protected $helpers = ['filesystem'];

    public function index()
    {
        //echo "Meu primeiro controlador com o CodeIgniter 4";

        $parser = \Config\Services::parser();
        
        $dados  = [
            "titulo_da_pagina" => "Livro CodeIgniter 4",
            "mensagem"         => "Minha primeira view com o CodeIgniter 4",
            'conteudos'   =>
                ['titulo' => 'Conteúdo #1', 'texto' => 'Texto para o conteúdo #1'],
                ['titulo' => 'Conteúdo #2', 'texto' => 'Texto para o conteúdo #2'],
                ['titulo' => 'Conteúdo #3', 'texto' => 'Texto para o conteúdo #3']
           
        ];

        echo $parser->setData($dados)->render('Cabecalho');
        echo $parser->setData($dados)->render('Blog/Index', ['cascadeData' => true]);
        echo view('Rodape', [], ['cache' => 60, 'cache_name' => 'rodape_cache']);

        /*
        echo view('Cabecalho', $dados, ['cache' => 60, 'cache_name' => 'cabecalho_cache']);
        echo view('Blog/Index', $dados);
        echo view('Rodape', [], ['cache' => 60, 'cache_name' => 'rodape_cache']);
        */
    }

    public function posts($categoria, $quantidade)
    {
        echo "Esse método pode exibir uma lista com $quantidade posts do blog na categoria $categoria";
    }

    public function ler($postname)
    {
        echo "Essa URI vai carregar a página para a leitura do post '$postname'.";
    }

    public function getPostByUUID($uuid)
    {
        echo "Essa URI vai carregar a página para a leitura de um post com o UUID $uuid que teve a rota criada a partir de um placeholder personalizado.";
    }

    public function autor()
    {
        echo "Essa URI exibe conteúdo do perfil do autor.";
    }

    protected function existe_post()
    {
        // código da verificação
    }

    private function validar_post()
    {
        // código da validação
    }

    /*
     * Trabalhando com o objeto de resposta $this->response
     */
    public function download()
    {
        $data = 'Conteúdo do arquivo a ser disponibilizado para download.';
        $name = 'nome-do-arquivo-para-download.txt';
        //cria um arquivo com o conteúdo da variável $data e o nome definido na variável $name
        //e chama a caixa de diálogo para download
        return $this->response->download($name, $data);
    }

    /*
     * Trabalhando com o objeto de log $this->logger
     * 
     * Resultado no arquivo de log:
     * ALERT - 2020-02-27 09:30:07 --> Usuário #85 logado com o IP 192.168.1.1
     */
    public function log()
    {
        $info = [
            'id'         => 85,
            'ip_address' => '192.168.1.1'
        ];

        $this->logger->alert('Usuário #{id} logado com o IP {ip_address}', $info);
    }

    /*
     * Forçando o HTTPS
     * Redireciona o usuário para a mesma URL, porém sob o protocolo HTTPS
     * caso ele esteja acessando via HTTP          
     */
    public function https()
    {
        if (!$this->request->isSecure()) {
            $this->forceHTTPS();
        }
    }

    /*
     * Usando helpers
     * Faz a leitura do diretório /writable incluindo subdiretórios e arquivos destes
     * Exibe na tela usando o método d da classe Kint, muito útil para debug do código
     */
    public function filesystem()
    {
        $directory = directory_map('../writable');
        d($directory);
    }
}
