Markdown

# CRUD Simples com PHP Orientado a Objetos (POO)

Este é um sistema de gerenciamento de usuários (CRUD) desenvolvido para fins de aprendizado, com o objetivo de praticar a transição de um código procedural para a **Orientação a Objetos (POO)** utilizando o PHP e boas práticas de arquitetura de software.

## 🚀 Tecnologias Utilizadas

- **PHP 8.x** (Estruturado em Classes, Métodos e Propriedades)
- **PDO (PHP Data Objects)** (Para conexões seguras e preparadas contra SQL Injection)
- **MySQL** (Banco de dados)
- **Bootstrap 5** (Para estilização rápida da interface)

## 🏗️ Arquitetura do Projeto

O projeto foi refatorado para separar a lógica de negócios da interface visual e das ações diretas do banco:

```text
📁 CRUD SIMPLES/
│
├── 📁 actions/          # Scripts que processam as requisições (POST/GET)
│   ├── 📄 cadastrar.php
│   ├── 📄 listar.php
│   ├── 📄 atualizar.php
│   └── 📄 deletar.php
│
├── 📁 classes/          # Classes que contêm a lógica e regras do sistema
│   ├── 📄 Database.php  # Conexão centralizada via PDO
│   └── 📄 Usuario.php   # Métodos do CRUD (cadastrar, listar, buscar, atualizar, deletar)
│
├── 📁 css/              # Estilizações customizadas
│   └── 📄 styles.css
│
├── 📄 index.php         # Tela principal (Tabela de listagem e formulário de cadastro)
└── 📄 editar.php        # Tela de edição de dados do usuário
```

## 🛠️ Funcionalidades Implementadas (CRUD)

- **[C]reate** (Cadastrar): Formulário que envia dados via POST e invoca o método $usuario->cadastrar().

- **[R]ead** (Listar/Buscar): \* Listagem geral na página inicial renderizada através de um array de objetos trazidos por $usuario->listar().

\*\*\*\* Busca individual de dados por ID ($usuario->buscar()) para auto-preencher os campos na tela de edição.

- **[U]pdate** (Editar): Processamento de alterações via $usuario->atualizar() de forma isolada e segura.

- **[D]elete** (Excluir): Exclusão de registros do banco de dados disparada via GET com o método $usuario->deletar().
