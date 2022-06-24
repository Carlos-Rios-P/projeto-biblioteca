## Projeto biblioteca - Laravel

Neste projeto a ideia é um desenvovimento de uma simples aplicação web para o controle admin de uma biblioteca.<br>
Para o rodar o projeto em servidor local é necessário:

```http
php artisan serve
```
<br>

Logo apos será necessário rodar as migrations do projeto.

```http
php artisan migrate
```
<br>

# Usuários

- Routes:
    - [<b>GET</b>] usuario/index        -> Lista todos usuários (clientes) da biblioteca.
    - [<b>GET</b>] usuario/cadastar     -> Redireciona para o form de cadastro de usuário
    - [<b>POST</b>] usuario/store       -> Salva os dados vindo do form
    - [<b>GET</b>] usuario/editar/{id}  ->  Redireciona para o form para editar dados de um usuário
    - [<b>PUT</b>] usuario/{id}         ->  salva os dados vindos do form edit
    - [<b>GET</b>] usuario/{id}         ->  Lista os dados específicos de tal usuário
    - [<b>DELETE</b>] usuario/{id}      ->  Deleta o usuario
    
    

# Livros

- Routes:
    - [<b>GET</b>] livro/index          -> Lista todos livros da biblioteca.
    - [<b>GET</b>] livro/cadastar       -> Redireciona para o form de cadastro de um novo livro
    - [<b>POST</b>] livro/store         -> Salva os dados vindo do form
    - [<b>GET</b>] livro/editar/{id}    ->  Redireciona para o form para editar dados de um livro
    - [<b>PUT</b>] livro/{id}           ->  salva os dados vindos do form edit
    - [<b>GET</b>] livro/{id}           ->  Lista os dados específicos de tal livro
    - [<b>DELETE</b>] livro/{id}        ->  Deleta o livro

# Transações

- Routes:
    - [<b>GET</b>] transacao/index      -> Lista todas transações da biblioteca.
    - [<b>GET</b>] transacao/form       -> Redireciona para o form de cadastro de uma nova transação
    - [<b>POST</b>] transacao/store     -> Salva os dados vindo do form
    - [<b>GET</b>] transacao/edit/{id}  -> Redireciona para o form para editar o status da transacao
    - [<b>PUT</b>] transacao/update/{id}-> salva os dados vindos do form edit

