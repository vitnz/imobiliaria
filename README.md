Estrutura do Projeto

Catálogo de Imóveis - Projeto PHP + JSON Server

Este é um sistema simples de cadastro e gerenciamento de imóveis, desenvolvido em PHP com um backend simulado usando o JSON Server (Node.js). O projeto permite:

- Criar, editar e excluir imóveis
- Preencher endereço automaticamente pelo CEP (ViaCEP)
- Exibir notificações com Noty.js
- Interface estilizada com Bootstrap 5 e CSS customizado

Requisitos:

- [PHP 7.4+](https://www.php.net/downloads)
- [Node.js](https://nodejs.org/)
- Navegador atualizado

Como rodar o projeto:

Clone o repositório

```
git clone https://github.com/seu-usuario/seu-repositorio.git
cd seu-repositorio
2. Instale as dependências do backend (JSON Server)

cd backend
npm install
json-server --watch db.json --port 5875
Isso iniciará a API fake no endereço: http://localhost:5875

5. Inicie o servidor PHP (frontend)
No diretório raiz do projeto (onde está o index.php):

php -S localhost:8000
Acesse o sistema em: http://localhost:8000
```

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
