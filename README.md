# Projeto Laravel - CRUD de Produtos e Categorias

Este é um projeto Laravel que implementa um sistema de gerenciamento de produtos e categorias. Os usuários podem se registrar, fazer login, adicionar, editar e excluir produtos e categorias.

## Tecnologias Utilizadas

- **Laravel**: Framework PHP
- **PHP**: Versão 8.2 ou superior
- **MySQL**: Banco de dados
- **Tailwind CSS**: Framework de CSS para estilização
- **Vite**: Para gerenciamento de ativos

## Requisitos

- PHP >= 8.2
- Composer
- Node.js e npm
- MySQL

## Instalação

1. **Clone o repositório:**

   ```bash
   git clone https://github.com/master198929/teste-back-end.git
   cd seu-repositorio

Instale as dependências do projeto:

composer install
Configure o ambiente:

Copie o arquivo .env.example para .env e configure as credenciais do banco de dados:

cp .env.example .env
Edite o arquivo .env com suas credenciais do MySQL.

Gere a chave de aplicativo:

php artisan key:generate
Migrate as tabelas do banco de dados:

bash
php artisan migrate
Instale as dependências do frontend:

Copiar código
npm install
Compile os ativos:

npm run build
Inicie o servidor de desenvolvimento:

php artisan serve
A aplicação estará disponível em http://127.0.0.1:8000.

Funcionalidades
Registro de Usuário: Os usuários podem se registrar e criar uma conta.
Login e Logout: Os usuários podem fazer login e logout da aplicação.
Gerenciamento de Produtos: CRUD completo para produtos (criação, leitura, atualização e exclusão).
Gerenciamento de Categorias: CRUD completo para categorias.
Interface Responsiva: Utilizando Tailwind CSS para uma melhor experiência de usuário.
Contribuição
Sinta-se à vontade para contribuir! Abra um problema ou um pull request.




