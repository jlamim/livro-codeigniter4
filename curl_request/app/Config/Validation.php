<?php

namespace Config;

class Validation
{
	//--------------------------------------------------------------------
	// Setup
	//--------------------------------------------------------------------

	/**
	 * Stores the classes that contain the
	 * rules that are available.
	 *
	 * @var array
	 */
	public $ruleSets = [
		\CodeIgniter\Validation\Rules::class,
		\CodeIgniter\Validation\FormatRules::class,
		\CodeIgniter\Validation\FileRules::class,
		\CodeIgniter\Validation\CreditCardRules::class,
	];

	/**
	 * Specifies the views that are used to display the
	 * errors.
	 *
	 * @var array
	 */
	public $templates = [
		'list'   => 'CodeIgniter\Validation\Views\list',
		'single' => 'CodeIgniter\Validation\Views\single',
	];

	//--------------------------------------------------------------------
	// Rules
	//--------------------------------------------------------------------

	// Aqui são criadas as regras de validação o envio de email
	public $emailData = [
		'nome'               => [
			'label' => 'Nome',
			'rules' => 'required'
		],
		'email_remetente'    => [
			'label' => 'Email Remetente',
			'rules' => 'required|valid_email'
		],
		'email_destinatario'    => [
			'label' => 'Email Destinatario',
			'rules' => 'required|valid_email'
		],
		'assunto'    => [
			'label' => 'Assunto',
			'rules' => 'required|min_length[5]'
		],
		'mensagem'    => [
			'label' => 'Mensagem',
			'rules' => 'required'
		]
	];
}
