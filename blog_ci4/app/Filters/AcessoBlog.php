<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;


class AcessoBlog implements FilterInterface
{
    public function before(RequestInterface $request)
    {
        d('Filtro AcessoBlog "before"');
    }

    //--------------------------------------------------------------------

    public function after(RequestInterface $request, ResponseInterface $response)
    {
        d('Filtro AcessoBlog "after"');
    }
}
