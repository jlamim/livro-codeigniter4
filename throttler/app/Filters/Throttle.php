<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Config\Services;

class Throttle implements FilterInterface
{

    public function before(RequestInterface $request)
    {
        $throttler = Services::throttler();

        // Esse filtro limita as requisições por endereço IP a apenas uma por hora
        // E redireciona o usuário para uma tela informando o bloqueio
        if ($throttler->check($request->getIPAddress(), 1, HOUR) === false) {
            return redirect()->to(base_url('/limite-excedido'));
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response)
    {
    }
}
