<?php

namespace App\Controllers;

class Blog extends BaseController
{
    protected $helpers = ['filesystem'];

    public function index()
    {
        echo "Meu primeiro controlador com o CodeIgniter 4";
    }

    public function posts($categoria, $quantidade)
    {
        echo "Esse método pode exibir uma lista com $quantidade posts do blog na categoria $categoria";
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
