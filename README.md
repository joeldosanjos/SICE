<p align="center"> <img alt="Logo do softPrice" width="240" src="./img/logo.png"> </p>

### 🧯 S.I.C.E. é uma sigla para Sistema de Inspeção e Controle de Extintores, seu propósito é proporcionar um ambiente em que as informações dos extintores do usuário possam ser administradas, bem como as fichas inspeção de cada extintor e um relatório geral informando o estado dos extintores.

## Features

O sistema possui dois tipos de conta, sendo que a conta comum pode realizar as seguintes operações: 

- [x] Cadastrar, editar e excluir extintores
- [x] Cadastrar e excluir fichas de inspeção
- [x] Editar e excluir o perfil
- [x] Visualizar o relatório

E a conta de administrador pode realizar adicionalmente as seguintes operações:

- [x] Cadastrar usuários
- [x] Cadastrar, editar e excluir empresas

## Pré-requisitos

Para executar o S.I.C.E. localmente, você precisa:

- Servidor MySQL;
- Servidor Apache para acessar o phpMyAdmin;

    **ou então**

- Programa que gerencie o servidor MySQL (como SQLyog).
 
 
Para ativar esses servidores, será preciso:
- Um ambiente para controlar servidores web (XAMPP, WampServer, etc.).

## ▶ Executando o sistema localmente

O seguinte tutorial será feito com base no XAMPP, ou seja, o banco de dados será importado através do phpMyAdmin. Existem outras maneiras possíveis de cumprir o mesmo 
processo, desde que seja importado um banco de dados MySQL com o nome **sice** através do arquivo **database.sql** no diretório raiz desse repositório.

1. Baixe ou clone o atual repositório em seu computador
2. Baixe e instale o XAMPP através do site https://www.apachefriends.org/pt_br/download.html
3. Após a instalação, no painel do XAMPP, inicie os serviços Apache e MySQL pelo botão "Start"

Para configurar o banco de dados e seu servidor:
1. Pelo navegador, entre no phpMyAdmin pelo link **localhost/phpmyadmin**
2. Na barra lateral à esquerda, clique na opção "Novo" e crie um banco de dados com o nome **sice**
3. Na barra superior, clique na opção "Importar" e selecione o arquivo **database.sql** com o botão "Escolher arquivo", este arquivo se encontra no diretório raiz
4. Role a página para baixo e clique no botão "Executar"

Para configurar o servidor Apache:
1. Localize a pasta onde o XAMPP está instalado. Por padrão, é no diretório C:\
2. Navegue até a pasta **htdocs**
3. Crie um pasta chamada **"sice"** e, para dentro dela, mova todos os arquivos do diretório raiz desse repositório
4. No seu navegador, digite **localhost/sice** e acesse a página inicial do sistema

Pronto! Agora você pode utilizar todos os recursos do sistema. Como não há uma forma de se cadastrar sem haver o intermédio de uma conta de administrador, abaixo estão
descritas as credenciais de uma conta de administrador que já vem inserida por padrão no banco de dados.
Lembre-se que, por se tratar de um sistema local, ele só funcionará enquanto os servidores do XAMPP estiverem ligados.

*Obs:* Caso possua alguma configuração diferente no seu servidor MySQL local, o arquivo que estabelece conexão com o banco de dados está na pasta **php/controller/conexao.php**

## ⚠ Como definir uma conta de administrador

O sistema vem por padrão no banco de dados com uma conta de administrador já definida, com as seguintes credenciais:

**E-mail:** admin@admin.com

**Senha:** admin

Somente a conta de administrador pode registrar novas contas comuns no sistema. Para estabelecer uma nova conta de administrador além da indicada acima,
é preciso realizar os seguintes passos:

1. Acessar o banco de dados através do phpMyAdmin ou outro programa que gerencie servidor MySQL;
2. Acessar a tabela **usuario**;
3. Localizar a conta desejada na tabela para realizar a alteração; 
4. Alterar o valor no campo "idempresa" para **1**.

Ao alterar esse valor, a conta selecionada irá se vincular à única empresa que no sistema tem permissão para realizar operações de administrador.

## 🛠 Tecnologias
- [HTML](https://www.w3schools.com/html/)
- [CSS](https://www.w3schools.com/css/)
  - [Bootstrap](https://getbootstrap.com/)
- [PHP](https://www.php.net/)
- [JavaScript](https://www.javascript.com/)
  - [jQuery](https://jquery.com/)
 - [MySQL](https://www.mysql.com/)
