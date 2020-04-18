# Validação de Formulário

Nesse exemplo utilizamos os seguintes recursos:

- Request Class
- Validation Rules
- Migrations

## Passoa a seguir para que o exemplo funcione

1. Crie um banco de dados e atualize o arquivo `env` com as configurações de conexão
2. Ainda no arquivo `env`, atualize a `app.baseURL` para corresponder ao seu ambiente
3. Abra o terminal, acesse o diretório da aplicação e execute o comando `php spark migrate` para que seja criada a estrutura de banco de dados necessária para esse exemplo com base na migration existente em `app/Database/Migrations`

## Particularidades desse exemplo

Você perceberá que no controller `Home` chamamos o método `save()` do model `UsuarioModel`, porém o método não existe explicitamente nesse model. Isso ocorre porque no CodeIgniter 4 os principais métodos do CRUD e diversos outros recursos para trabalhar com operações no banco de dados já foram incorporados como padrão, bastante criar a estrutura do model da forma correta, como é explicado no livro no capítulo 26 e do 28 ao 31.