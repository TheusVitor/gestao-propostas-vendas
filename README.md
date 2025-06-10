# Gestão de Propostas de Venda

Aplicação Laravel para gerenciar propostas de venda.

## Pré-requisitos

* Docker
* Docker Compose

## Como rodar

1. Clone o repositório e acesse a pasta:

   ```bash
   git clone https://github.com/TheusVitor/gestao-propostas-vendas.git
   cd gestao-propostas-vendas
   ```
2. Copie o arquivo de ambiente:

   ```bash
   cp .env.example .env
   ```
3. Suba os containers:

   ```bash
   docker compose up -d --build
   ```
4. Rode migrations e seeders:

   ```bash
   docker compose exec app php artisan migrate:fresh --seed
   ```
5. Acesse no navegador:

   ```
   http://localhost:8000/login
   ```

## Usuários de teste

* **Alice ADM** — [alice@example.com](mailto:alice@example.com) / teste123
* **Bob TI** — [bob@example.com](mailto:bob@example.com) / teste123
* **Carol RH** — [carol@example.com](mailto:carol@example.com) / teste123
