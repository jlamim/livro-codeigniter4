<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CriaTabelaUsuarios extends Migration
{
	public function up()
	{
		// Adicionamos os campos necessários para a criação da tabela usuários
		$this->forge->addField([
			'id' => [
				'type'           => 'INT',
				'constraint'     => 5,
				'unsigned'       => TRUE,
				'auto_increment' => TRUE
			],
			'nome' => [
				'type'           => 'VARCHAR',
				'constraint'     => '100',
				'null'           => false
			],
			'sobrenome' => [
				'type'           => 'VARCHAR',
				'constraint'     => '100',
				'null'           => false
			],
			'nickname' => [
				'type'           => 'VARCHAR',
				'constraint'     => '15',
				'null'           => false
			],
			'email' => [
				'type'           => 'VARCHAR',
				'constraint'     => '120',
				'null'           => false
			],
			'dt_nascimento' => [
				'type'           => 'DATE',
				'null'           => false
			],
			'codigo_seguranca' => [
				'type'           => 'INT',
				'constraint'     => 3,
				'null'           => false
			],
		]);

		// Adicionamos o campo `id` como chave da tabela
		$this->forge->addKey('id', TRUE);
		// Criamos a tabela usuários com os campos e a chave definidos acima
		$this->forge->createTable('usuarios');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		// Removemos a tabela usuários
		$this->forge->dropTable('usuarios');
	}
}
