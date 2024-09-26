# Contract Registration Challenge

Este projeto é uma aplicação desenvolvida em Laravel para o gerenciamento de contratos, convênios e bancos. Ele permite cadastrar e listar contratos associados a convênios e bancos, facilitando a organização e consulta dessas informações.

## Funcionalidades

- **Listar Contratos**: Retorna uma lista de contratos com detalhes do banco, verba, código, data de inclusão, valor e prazo.
- **Cadastrar Contrato**: Permite criar um novo contrato associado a um convênio e serviço específico.

## Pré-requisitos

Antes de rodar o projeto, certifique-se de ter os seguintes itens instalados:

- [PHP](https://www.php.net/downloads) (versão 7.4 ou superior)
- [Composer](https://getcomposer.org/download/)
- [Docker](https://www.docker.com/get-started) (opcional, para ambiente containerizado)
- [Docker Compose](https://docs.docker.com/compose/) (opcional)

## Como Rodar o Projeto

### **Usando Docker (Recomendado)**

1. **Clone o Repositório**

    ```bash
    git clone git@github.com:RawdneyGoncalves/contract-registration-challenge.git
    cd contract-registration-challenge
    ```

2. **Crie o Arquivo de Ambiente**

    ```bash
    cp .env.example .env
    ```

3. **Inicie os Containers do Docker**

    ```bash
    docker-compose up -d
    ```

4. **Acesse o Container da Aplicação**

    ```bash
    docker-compose exec app bash
    ```

5. **Instale as Dependências**

    ```bash
    composer install
    ```

6. **Gere a Chave da Aplicação**

    ```bash
    php artisan key:generate
    ```

7. **Execute as Migrações do Banco de Dados**

    ```bash
    php artisan migrate
    ```

8. **Gerar a Documentação Swagger**

    ```bash
    php artisan l5-swagger:generate
    ```

9. **Acesse a Aplicação**

    - **API Listar Contratos:** `http://localhost:8000/api/contratos` (GET)
    - **API Cadastrar Contrato:** `http://localhost:8000/api/contratos` (POST)
    - **Documentação Swagger:** `http://localhost:8000/api/documentation`
    - **Rota de Teste para API:** `http://localhost:8000/api/test`

### **Sem Docker**

1. **Clone o Repositório**

    ```bash
    git clone git@github.com:RawdneyGoncalves/contract-registration-challenge.git
    cd contract-registration-challenge
    ```

2. **Crie o Arquivo de Ambiente**

    ```bash
    cp .env.example .env
    ```

3. **Instale as Dependências**

    ```bash
    composer install
    ```

4. **Gere a Chave da Aplicação**

    ```bash
    php artisan key:generate
    ```

5. **Configure o Banco de Dados**

    Edite o arquivo `.env` para configurar as credenciais do seu banco de dados.

6. **Execute as Migrações do Banco de Dados**

    ```bash
    php artisan migrate
    ```

7. **Gerar a Documentação Swagger**

    ```bash
    php artisan l5-swagger:generate
    ```

8. **Inicie o Servidor de Desenvolvimento**

    ```bash
   docker-compose exec app php artisan serve --host=0.0.0.0 --port=8000
    ```

9. **Acesse a Aplicação**

    - **API Listar Contratos:** `http://localhost:8000/api/contratos` (GET)
    - **API Cadastrar Contrato:** `http://localhost:8000/api/contratos` (POST)
    - **Documentação Swagger:** `http://localhost:8000/api/documentation`
    - **Rota de Teste para API:** `http://localhost:8000/api/test`

## Testes

Para rodar os testes automatizados, utilize o seguinte comando:

```bash
docker-compose exec app php artisan test
