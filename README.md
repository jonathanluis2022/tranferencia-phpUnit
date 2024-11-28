# Sistema de Transferência de Dinheiro

## Descrição
Este sistema simula uma plataforma bancária simples onde dois usuários podem realizar transferências entre si. O sistema utiliza o padrão de projeto MVC (Model-View-Controller) para organizar seu código e garantir a separação de responsabilidades. O objetivo principal é fornecer uma maneira de depositar, sacar e transferir valores entre contas de usuários.

## Objetivo
O sistema foi desenvolvido para:
- Simular uma conta bancária com operações de depósito, saque e transferência.
- Permitir que o usuário realize transferências entre duas contas de forma simples.
- Mostrar os saldos atualizados após cada transação.

## Funcionalidades
- **Depósito:** O usuário pode depositar um valor em sua conta, aumentando o saldo.
- **Saque:** O usuário pode sacar um valor de sua conta, desde que o saldo seja suficiente.
- **Transferência:** O usuário pode transferir um valor de sua conta para a conta de outro usuário.

## Tecnologias Utilizadas
- **PHP** para o desenvolvimento do backend.
- **HTML** e **CSS** para a construção da interface do usuário.
- **PHPUnit** para testes unitários do sistema.

## Como Funciona
1. O sistema começa com dois usuários pré-cadastrados (Jonathan e Drycka).
2. O saldo inicial de cada usuário é de R$1000.
3. Os usuários podem realizar as seguintes ações:
   - **Depositar** um valor.
   - **Sacar** um valor, desde que o saldo seja suficiente.
   - **Transferir** valores entre contas.
4. A página exibe os saldos atualizados de cada usuário após cada operação.

## Testes
O sistema inclui testes unitários para garantir o funcionamento correto das funcionalidades principais, como depósito, saque e transferência.

## Como Rodar
1. Clone o repositório.
2. Instale as dependências via Composer.
3. Inicie o servidor PHP utilizando o comando:
   bash
   php -S localhost:8000
