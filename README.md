<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

[![Github Badge](https://img.shields.io/badge/-Github-000?style=flat-square&logo=Github&logoColor=white&link=https://github.com/fagnerpsantos)](#)
[![Linkedin Badge](https://img.shields.io/badge/-LinkedIn-blue?style=flat-square&logo=Linkedin&logoColor=white&link=https://www.linkedin.com/in/fagnerpsantos/)](#)
[![Twitter Badge](https://img.shields.io/badge/-Twitter-1ca0f1?style=flat-square&labelColor=1ca0f1&logo=twitter&logoColor=white&link=https://twitter.com/fagnerpsantos)](#)
[![Youtube Badge](https://img.shields.io/badge/-YouTube-ff0000?style=flat-square&labelColor=ff0000&logo=youtube&logoColor=white&link=https://www.youtube.com/user/TreinaWeb)](#)
<a href="#"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="#"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="#"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="#"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>


# Sobre
***

# Features

* [x] Crud Produtos
* [x] Crud Usuários
* [x] Crud Pedidos

# Tecnologias utilizadas
* Php / Laravel
* MySql / MariaDB / PostgreSQL / MongoDB / SQLite / Firebird
* Api RestFul / JSON
* Auth JWT
* PDO PHP

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

## Requisitos

- [Node.js and NPM](https://docs.npmjs.com/getting-started/installing-node)
- [Yarn](https://yarnpkg.com/en/docs/install)
- [Node.js](https://nodejs.org/en/download/)
- [composer](https://getcomposer.org/download/)

## Instalação

- Clone o repositório e `cd` acesse o mesmo
- Execute o comando `composer install`
- Copie e Renomei `.env.example` O arquivo `.env`
- Execute `php artisan key:generate`
- Defina suas credenciais de banco de dados no arquivo `.env`
- Execute `php artisan migrate`

### Passo a Passo

1. Clone este projeto ou baixe o arquivo ZIP
`git clone https://github.com/hotwyl/avaliacao_desenvolvedor_php.git` 

2. Em seu terminal (prompt de comando), execute os seguintes comandos:

`cd api-laravel` Acesse o diretório do projeto

`composer install` Instale os pacotes necessários

`npm install` Instale dependências adicionais

`copy .env.example .env` Crie o arquivo .env copiando o arquivo .env.example

`php artisan key:generate` Gerar uma chave Publica laravel, pois este é um projeto clonado

`php artisan jwt:secret` Gerar uma chave do JWT, pois este é um projeto clonado

3. Parametrize as configurações do projeto no arquivo `.env`

4. Crie seu Banco de dados com os parametros definidos no arquivo `.env`

`php artisan migrate` Cria as Tabelas na base de dados 

`php artisan migrate:fresh --seed` Apagar tabelas, recriar as tabelas, popular tabelas com dados aleatórios (Optional)

`npm run watch` Monitor de alteração (Optional)

`php artisan optimize` Limpar cache (Optional)

`php artisan serve` Execute o servidor do Framework

5. Acesse `http://localhost:8000` em seu navegador de Internet ou utilize software para testes de API

## Notas

> È recomendado Utilizar os processos deste projeto ao inicio do seu projeto. 
> Estes procedimentos poderam neutralizar seus designes e ocasionar falhas em seu projeto.

## EndPoints estrutura json

| Verbo  | EndPoint | Parametros | Retorno |
| :------------ |:---------------:| -----:| -----:|
| post | /auth/login | email, password | Token, informação usuario logado |
| post | /auth/user | nome, email, password | usuario cadastrado |
| post | /auth/refresh | email, password | Token, informação usuario logado |
| post | /auth/logout |  | mensagem deslogado |
| post | /auth/me |  | nome, email |
| get | /v1/usuarios/ |  | lista usuarios cadastrados |
| get | /v1/usuarios/{id} | id | informação do usuario solicitado |
| post | /v1/usuarios/ | nome,email,password,status | usuario cadastrado |
| put | /v1/usuarios/{id} | id,nome,email,password,status | informação do usuario Atualizado |
| delete | /v1/usuarios/{id} | id | mensagem confirmação exclusão  Usuario|
| post | /v1/usuarios/search | nome,email,password,status | usuarios correspondentes a termos pesquisado |
| get | /v1/produtos/ |  | lista de Produtos cadastrados |
| get | /v1/produtos/{id} | id | informação do Produto solicitado |
| post | /v1/produtos/ | descricao,valor,status | Produto cadastrado |
| put | /v1/produtos/{id} | id,descricao,valor,status | informação do Produto Atualizado |
| delete | /v1/produtos/{id} | id | mensagem confirmação exclusão Produto |
| post | /v1/produtos/search | descricao,valor,status | produtos correspondentes a termos pesquisado |
| get | /v1/pedidos/ |  | lista de Pedidos registrados |
| get | /v1/pedidos/{id} | id | informação do Pedido solicitado |
| post | /v1/pedidos/ | numero_ped,usuario_id,produto_id | Pedido registrado |
| put | /v1/pedidos/{id} | id,numero_ped,usuario_id,produto_id |informação do Pedido Atualizado |
| delete | /v1/pedidos/{id} | id | mensagem confirmação exclusão Pedido |
| post | /v1/pedidos/search | numero_ped,usuario_id,produto_id,status | Pedidos correspondentes a termos pesquisado |


## Como Utilizar

***

## Ferramentas Sugeridas para uso

- Terminal Texto - [Git](https://gitforwindows.org/)
- Terminal Texto - [Comander](https://cmder.net/)
- IDE Desenvolvimento - [Sublime Text](https://www.sublimetext.com/)
- IDE Desenvolvimento - [Visual Studio Code](https://code.visualstudio.com/)
- IDE Desenvolvimento - [NetBeans](https://netbeans.org/)
- IDE Desenvolvimento - [Atom](https://atom.io/)
- Editor de Código - [Notepad++](https://notepad-plus-plus.org/)
- Emulador de Serviços Web - [Xampp](https://www.apachefriends.org/pt_br/index.html)
- Emulador de Serviços Web - [WampServer](https://www.wampserver.com/en/)
- Gerenciador de Banco de Dados - [phpMyAdmin](https://www.phpmyadmin.net/downloads/)
- Gerenciador de Banco de Dados - [MySQL Workbench](https://dev.mysql.com/downloads/workbench/)
- Gerenciador de Banco de Dados - [TablePlus](https://tableplus.com/)
- Gerenciador de Banco de Dados - [HeidiSQL](https://www.heidisql.com/download.php)
- Gerenciador de Banco de Dados - [Sequel Pro](https://www.sequelpro.com/)
- Software para testes de API - [Postman](https://www.postman.com/)
- Software para testes de API - [Insomnia](https://insomnia.rest/)
- site para testes de API - [REST test](https://resttesttest.com/)
- Dominio Gratuito para aplicações Web para testes - [Freenom](https://www.freenom.com/pt/index.html?lang=pt)
- Hospedagem web gratuita para testes - [Infinity Free](https://www.infinityfree.net/)
- Hospedagem web gratuita para testes - [Webhost](https://br.000webhost.com/)
