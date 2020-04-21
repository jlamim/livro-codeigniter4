# Multi Idioma

Nesse exemplo utilizamos os seguintes recursos:

- Rotas
- Localizations

## Particularidades do exemplo

Nesse exemplo a maior parte do código está nos arquivos de idioma localizados em `/app/Language` e em `/app/Views/welcome_message.php`, que é ondeé feita a chamada à função `lang()` responsável por recuperar o conteúdo a ser exibido de acordo com o idioma selecionado.

## Arquivos utilizados nesse exemplo

- `.env`
- `/app/Config/App.php`
- `/app/Config/Routes.php`
- `/app/Language/pt-BR/app.php`
- `/app/Language/en/app.php`
- `/app/Language/es/app.php`
- `/app/Controllers/Home.php`
- `/app/Views/welcome_message.php`