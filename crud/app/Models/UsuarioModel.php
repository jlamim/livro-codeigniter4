<?php

namespace App\Models;

use CodeIgniter\Model;

class UsuarioModel extends Model
{
    // definimos a tabela correspondente ao model
    protected $table          = 'usuarios';
    // definimos qual coluna na tabela `usuarios`corresponde à chave primária
    protected $primaryKey     = 'id';

    protected $returnType     = 'App\Entities\Usuario';

    protected $useSoftDeletes = true;
    protected $allowedFields  = ['nome', 'sobrenome', 'nickname', 'email', 'dt_nascimento', 'codigo_seguranca'];
    protected $useTimestamps  = true;
    protected $createdField   = 'criado_em';
    protected $updatedField   = 'atualizado_em';
    protected $deletedField   = 'removido_em';

    // definimos as regras de validação
    protected $validationRules    = [
        'nome'             => 'required|min_length[3]',
        'sobrenome'        => 'required|min_length[3]',
        'nickname'         => 'required|alpha_numeric_space|min_length[5]|max_length[15]|is_unique[usuarios.nickname]',
        'email'            => 'required|valid_email|is_unique[usuarios.email]',
        'dt_nascimento'    => 'required|valid_date[Y-m-d]',
        'codigo_seguranca' => 'required|integer|min_length[3]|max_length[3]'
    ];

    // definimos as mensagens de validação
    protected $validationMessages = [
        'nome' => [
            'required'   => 'Campo de preenchimento obrigatório.',
            'min_length' => 'O campo precisa ter pelo menos 3 caracteres.'
        ],
        'sobrenome' => [
            'required'   => 'Campo de preenchimento obrigatório.',
            'min_length' => 'O campo precisa ter pelo menos 3 caracteres.'
        ],
        'nickname' => [
            'required'            => 'Campo de preenchimento obrigatório.',
            'alpha_numeric_space' => 'Utilize apenas caracteres alfanuméricos.',
            'min_length'          => 'O campo precisa ter pelo menos 5 caracteres.',
            'max_length'          => 'O campo deve ter no máximo 15 caracteres.',
            'is_unique'           => 'Este nickname já está sendo utilizado por outro usuário.'
        ],
        'email' => [
            'required'    => 'Campo de preenchimento obrigatório.',
            'valid_email' => 'Informe um email válido.',
            'is_unique'   => 'Este email já está sendo utilizado por outro usuário.'
        ],
        'dt_nascimento' => [
            'required'   => 'Campo de preenchimento obrigatório.',
            'valid_date' => 'Informe uma data válida.'
        ],
        'codigo_seguranca' => [
            'required'   => 'Campo de preenchimento obrigatório.',
            'integer'    => 'O campo deve ser um valor numérico',
            'max_length' => 'O campo deve ter no máximo 3 caracteres numéricos.'
        ]
    ];

}