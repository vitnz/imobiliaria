Estrutura do Projeto

Catálogo de Imóveis - Projeto PHP + JSON Server

Este é um sistema simples de cadastro e gerenciamento de imóveis, desenvolvido em PHP com um backend simulado usando o JSON Server (Node.js). O projeto permite:

- Criar, editar e excluir imóveis
- Preencher endereço automaticamente pelo CEP (ViaCEP)
- Exibir notificações com Noty.js
- Interface estilizada com Bootstrap 5 e CSS customizado

Estrutura do Projeto:

├── backend/ → API Fake com JSON Server (Node.js)
│ └── db.json → Banco de dados local
├── assets/ → CSS customizado
│ └── style.css
├── index.php → Página principal (catálogo)
├── form.php → Formulário de criação/edição
├── salvar.php → Lógica de envio (POST/PUT)
├── deletar.php → Confirmação e exclusão
└── README.md

Requisitos:

- [PHP 7.4+](https://www.php.net/downloads)
- [Node.js](https://nodejs.org/)
- Navegador atualizado

Como rodar o projeto:

Clone o repositório

```bash
git clone https://github.com/seu-usuario/seu-repositorio.git
cd seu-repositorio
2. Instale as dependências do backend (JSON Server)

cd backend
npm init -y
npm install json-server
Crie ou edite um arquivo chamado server.js com o seguinte conteúdo:

js
Copiar código
const jsonServer = require('json-server');
const server = jsonServer.create();
const router = jsonServer.router('db.json');
const middlewares = jsonServer.defaults();

server.use(middlewares);
server.use(router);

server.listen(5875, () => {
  console.log('JSON Server is running at http://localhost:5875');
});
3. Crie o arquivo db.json
{
  "imovel": []
}
Coloque-o na pasta backend/.

4. Inicie o backend (JSON Server)
No terminal:

node server.js
Isso iniciará a API fake no endereço: http://localhost:5875

5. Inicie o servidor PHP (frontend)
No diretório raiz do projeto (onde está o index.php):

php -S localhost:8000
Acesse o sistema em: http://localhost:8000

Bibliotecas Utilizadas:

- PHP
- Bootstrap 5 – Estilização
- Noty.js – Notificações de sucesso
- ViaCEP API – Preenchimento automático do endereço por CEP
- JSON Server – Backend simulado em Node.js

Funcionalidades:

- Listagem de imóveis
- Cadastro e edição com validações
- Exclusão com confirmação
- Integração com ViaCEP
- Alertas de ações com Noty.js
- Interface responsiva e estilizada
