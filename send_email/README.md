# Envio de Email

Nesse exemplo utilizamos os seguintes recursos:

- Request Class
- Email Class
- Validation
- Tradução das mensagens padrões do sistema

## Aplicando a tradução das mensagens padrões

Para aplicar a tradução das mensagens é necessário fazer o download do pacote oficial de tradução para o idioma desejado disponível em <https://github.com/codeigniter4/translations.>

Após fazer o download,  copie o diretório do idioma desejado para `/app/Language` e depois altere o valor da variável `$defaultLocale` para `pt-BR` em `/app/Config/App.php`.

## Arquivos utilizados nesse exemplo

- `.env`
- `/app/Language`
- `/app/Config/App.php`
- `/app/Config/Validation.php`
- `/app/Controllers/Home.php`
- `/app/Views/welcome_message.php`