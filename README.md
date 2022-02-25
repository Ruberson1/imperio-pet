# Império Pet (Controle de clientes e serviços)

## Da instalação:
- Faça o clone do projeto para seu local
- Na Api execute o comando [composer install](https://getcomposer.org/download/)
- Você pode utilizar um host como servidor ou execute o comando [composer start]
- Pronto dessa forma a Api já pode ser consumida 
- No Front end execute o comando [npm install](https://nodejs.org/en/download/)
- Em seguida execute o comando [npm run serve]

## Api Criada com Lumen 
- Orm Eloquent
### Rotas
- Get, Post, Patch, Delete.
## Data Base Tables:
- Clientes
- Serviços
- Pets
- Tipos de Serviço
- Status 
## Configuração banco de dados:
- Configure seu arquivo .env com os dados locais que ira ultilizar;
- Caso não tenha o arquivo crie na raiz do projeito
APP_NAME=Lumen
APP_ENV=local
APP_KEY=
APP_DEBUG=true
APP_URL=http://localhost
APP_TIMEZONE=UTC

LOG_CHANNEL=stack
LOG_SLACK_WEBHOOK_URL=

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306"
DB_DATABASE= "NOME DO BANCO A SER UTILZADO"
DB_USERNAME= "NOME DO SEU USUARIO"
DB_PASSWORD= "SUA SENHA"

CACHE_DRIVER=file
QUEUE_CONNECTION=sync

## Relacionamentos:

- Cliente -> Pets
- Servicos -> Status -> tipos serviço -> clientes

## Front com Vue + Bootstrap + Axios

# Objetivo:

Esse projeto foi desenvolvido a nível de estudo está passando e irá passar por várias mudanças
no intuito de de alcançar uma arquitetura clean code utilizando o padrão Solid , e quem sabe no 
futuro coloca-la em alta disponibilidade para que pessoas com empreendimentos desse nicho possam
se beneficiar.

Esse repositório é público e você é bem vindo para nos ajudar a melhora-lo !!!
