## Requisitos
- PHP 8.0
- Node.js
- git

## Instalação

Faça o clone do repositório através do comando abaixo
```
git clone https://github.com/samuelkoepsel1/market.git
```
## Backend
Primeiros vamos configurar o backend
```
cd market/backend
composer install
```
Você deve copiar o arquivo .env.example, renomear para .env e alterar os dados do exemplo para os dados da sua conexão com o banco de dados.
Após configurar o .env você deve executar o comando para subir as migrations
```
php migrations.php
```
Após finalizar as migrations você pode subir o servidor local com o seguinte comando:
```
cd public
php -S localhost:8080
```
## Frontend
Acesse a pasta do frontend para instalar o ambiente
```
cd market/frontend
npm install
```
Após instalar o ambiente de frontend pode iniciar o servidor
```
npm start
```
## Acessso a aplicação
Para executar a aplicação basta acessar
```
http://localhost:3000
```