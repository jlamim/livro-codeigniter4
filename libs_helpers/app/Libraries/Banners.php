<?php

namespace App\Libraries;

class Banners
{           
    public function getBanner(string $cor, string $tamanho)
    {
        $banner = $cor."_".$tamanho.".gif";

        return base_url("banners/$banner");
    }
   
}
