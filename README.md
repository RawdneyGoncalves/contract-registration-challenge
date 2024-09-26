# Contract Registration Challenge

Este projeto é uma aplicação desenvolvida em Laravel para o gerenciamento de contratos. Ele permite cadastrar e listar contratos associados a convênios e bancos, facilitando a organização e consulta dessas informações.

## Funcionalidades

- Cadastro de contratos
- Listagem de contratos com detalhes, incluindo banco e verba

## Pré-requisitos

Antes de rodar o projeto, certifique-se de ter os seguintes itens instalados:

- [Docker](https://www.docker.com/get-started)
- [Docker Compose](https://docs.docker.com/compose/)

## Como Rodar o Projeto

1. **Clone o repositório:**

   ```bash
   git clone git@github.com:RawdneyGoncalves/contract-registration-challenge.git
   cd contract-registration-challenge
 ```bash
   crie o arquivo de ambiente
   
   cp .env.example .env
 ```
 ### Gere a chave da aplicação:
  ```bash
  docker-compose exec app php artisan key:generate
  ```

  ### Instale as dependências:
   ```bash
   docker-compose exec app composer install
   ```

   ### Inicie os contêineres:

   
      docker-compose up -d

 ### Rode as migrações do banco de dados:
       docker-compose exec app php artisan migrate


 ## Acesse a aplicação o swagger da aplicação:
 ```bash
http://localhost:8000/api/documentation