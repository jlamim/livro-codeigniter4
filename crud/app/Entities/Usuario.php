<?php

namespace App\Entities;

use CodeIgniter\Entity;
use CodeIgniter\I18n\Time;

class Usuario extends Entity
{
    // Definimos os atributos de acordo com as colunas existentes na tabela usuarios
    protected $attributes = [
        'nome'             => null,
        'sobrenome'        => null,
        'nickname'         => null,
        'email'            => null,
        'dt_nascimento'    => null,
        'codigo_seguranca' => null,
        'criado_em'        => null,
        'atualizado_em'    => null,
        'removido_em'      => null
    ];

    // Definimos os campos que recebem as informações de data referentes a criação, atualização e exclusão
    protected $dates = ['criado_em', 'atualizado_em', 'removido_em'];

    // Método responsável por executar a formatação do campo data de nascimento
    // Antes de inserir no banco de dados, mantendo assim o padrão "Y-m-d"
    public function setDtNascimento(string $dateString)
    {
        $date = \DateTime::createFromFormat('d/m/Y', $dateString);
        $this->attributes['dt_nascimento'] = $date->format('Y-m-d');
        return $this;
    }

    // Método responsável por formatar a data no padrão "d/m/Y" antes de retornar os dados
    public function getDtNascimento(string $format = 'd/m/Y')
    {
        if(is_null($this->attributes['dt_nascimento'])) {
            return null;
        }

        $this->attributes['dt_nascimento'] = date($format, strtotime($this->attributes['dt_nascimento']));

        return $this->attributes['dt_nascimento'];
    }
}
