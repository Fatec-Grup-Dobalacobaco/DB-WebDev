# 🛠️ AutoCheck - Gestão Inteligente Automotiva

O **AutoCheck** é um sistema completo de gestão para oficinas mecânicas, focado em organização, agilidade e excelência no atendimento ao cliente.

## 🎯 Identidade Organizacional
* **Missão**: Proporcionar soluções eficientes na gestão de serviços automotivos.
* **Visão**: Ser referência em tecnologia para otimização de oficinas no estado de São Paulo.
* **Valores**: Transparência, precisão técnica e compromisso com o cliente.

## 🚀 Funcionalidades Principais
* **Dashboard Executivo**: Resumo de metas e produtividade da oficina.
* **Módulo de Triagem**: Diagnóstico detalhado para evitar erros no orçamento inicial.
* **Gestão de O.S.**: Controle de status e valores de serviços em tempo real.

## 💻 Stack Tecnológica

* **Front-end**: HTML5, CSS3 (com variáveis e Grid/Flexbox) e JavaScript modular (ES6).
* **Banco de Dados**: MySQL (Script SQL estruturado com Primary e Foreign Keys).
* **Documentação Técnica**: Dicionário de dados, MER (Modelo Entidade-Relacionamento) e Relatório de Normalização.

## 📂 Estrutura do Projeto

| Arquivo/Pasta | Descrição |
| :--- | :--- |
| `index.html` | Tela de login com validação e acesso ao sistema. |
| `abas/dashboard.html` | Painel principal com indicadores e modais de cadastro rápido. |
| `css/style.css` | Definições globais de cores, temas e navegação. |
| `BancodedadosT2.sql` | Script para criação de tabelas e relacionamentos. |
| `merdiagramt2.pdf` | Diagrama visual da arquitetura do banco de dados. |

---
## Desenvolvido por: 

### Carlos Dias Responsavel por:

**Arquitetura de Interface: Criação de telas semânticas para Login, Dashboard, Clientes, Veículos, Funcionários, Triagem e Ordens de Serviço.**

**Design Responsivo e UI: Estilização modular utilizando variáveis CSS para garantir que o sistema funcione bem tanto em desktops quanto em dispositivos móveis.**

**Lógica de Navegação: Implementação de módulos JavaScript para controlar o fluxo entre páginas e o funcionamento de modais de cadastro.**

**Validação de Formulários: Garantir que dados como CPF e Telefone sigam os padrões corretos antes do envio.**

**Documentação Técnica: Elaboração do Dicionário de Dados para catalogar tipos de campos (inteiros, strings, datas) e restrições de nulidade.**

**Normalização de Dados: Aplicação de regras para evitar redundância e garantir a integridade das informações no banco.**

**Modelagem Relacional: Criação do Modelo Entidade-Relacionamento (MER) para definir como Clientes, Veículos e Ordens de Serviço se conectam.**

**Documentação do Projeto: Escrita do README.md e relatórios técnicos para facilitar a colaboração e apresentação do portfólio.**

---

### Claudio Costa Responsavel por:

**CRUD Completo: Funções para Criar, Ler, Atualizar e Deletar registros de todas as tabelas mapeadas no seu script SQL.**

**Autenticação: Lógica para verificar o usuário e senha enviados pelo index.html.**

**Processamento de Triagem: Uma função que receba os dados do formNovaTriagem e os salve associando o ID do funcionário e a placa do veículo.**

**Cálculo de O.S.: Lógica para somar valores de peças e mão de obra e atualizar o status da ordem de serviço para "Concluído".**

**Implementação de Banco de Dados: Desenvolvimento do script SQL para criação de tabelas, chaves primárias e estrangeiras.**

---

### Fernando de Melo:

**CRUD Completo: Funções para Criar, Ler, Atualizar e Deletar registros de todas as tabelas mapeadas no seu script SQL.**

**Autenticação: Lógica para verificar o usuário e senha enviados pelo index.html.**

**Processamento de Triagem: Uma função que receba os dados do formNovaTriagem e os salve associando o ID do funcionário e a placa do veículo.**

**Cálculo de O.S.: Lógica para somar valores de peças e mão de obra e atualizar o status da ordem de serviço para "Concluído".**

**Normalização de Dados: Aplicação de regras para evitar redundância e garantir a integridade das informações no banco.**

---

## Kauan de Oliveira:

**CRUD Completo: Funções para Criar, Ler, Atualizar e Deletar registros de todas as tabelas mapeadas no seu script SQL.**

**Autenticação: Lógica para verificar o usuário e senha enviados pelo index.html.**

**Processamento de Triagem: Uma função que receba os dados do formNovaTriagem e os salve associando o ID do funcionário e a placa do veículo.**

**Cálculo de O.S.: Lógica para somar valores de peças e mão de obra e atualizar o status da ordem de serviço para "Concluído".**

**Normalização de Dados: Aplicação de regras para evitar redundância e garantir a integridade das informações no banco.**

---

**Feito como projeto acadêmico de Desenvolvimento de Software Multiplataforma.**
