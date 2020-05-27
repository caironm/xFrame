## O que é

Uma stack para desenvolvimento web usando o composer. 

## O que vem no exemplo

- /qualquercoisa (404)
- / (home)
- /contact (como usar conteúdos html vindo do controller)
- /teste (mostrando como usar a parte de idiomas)
- /todo (uma aplicação simples de usar)
  - /todo
  - /todo/create/Nome da minha nova tarefa (cria)
  - /todo/update/2/Editando a tarefa de ID 2 (edita)
  - /todo/delete/2 (deleta)

## Pré-requisitos

- php 7.1 a 7.3
- mysql
- node e npm
- gulp

## Instalando

- Crie uma base de dados e importe *xframe_todo.sql*
- Edite os arquivo *config/dataBase.php*
  - Todos os aquivos incluidos em config são de configurações e carregados dinamicamente.

## Use o gulp

  ### Sobre
  Roda 3 tarefas: converte scss para css, minifica o css e minifica o js.

  ### Instalação
  - Revise *package.json*, se desejar usar less ao invés de scss:
    - Quero usar less!
      - A. remova "gulp-sass": "^4.1.0", de package.json
      - B. Rode *npm install*
      - C. Rode *npm install gulp-less --save-dev*
      - D. em *gulpefile.js* faça as devidas modificações. [Precisa de ajuda?](https://www.youtube.com/watch?v=vyRLprv12eA);
    - Quero usar sass!
      - A. Rode *npm install*
  
  ### Uso
  - Abra o terminal na pasta do projeto e digite *gulp*

## Bibliotecas principais

- O framework de rotas é [Flight PHP](http://flightphp.com/);

- A ORM de banco de dados é [Medoo](https://medoo.in/);

- O template engine é [Twig](https://twig.symfony.com/);
    
## Regras básicas & Estrutura

- A pasta vendor em assets serve para por libs js ou css de terceiros;

- Em app ficam os controllers que são adicionados dinamicamente, só é permitido até 2 níveis de pasta. Ex.: admin/todo/create.php;

- Basta acessar a pasta públic para entender o que colocar lá dentro;

- Em translates qualquer arquivo criado é carregado automáticamente, a configuração está em Src / Support / Header.php;

- Usamos DDD, em core está literalmente o Core da aplicação são classes que realizam uma interação com o banco (models), somam, multiplica, colocam em um determinado formato e entregam, podem ser usado como o desenvolvedor desejar. O Generic seria para um sistema de busca, chat que o deve venha a criar, seria subsistemas de apio e o Support são classe que dão suporte a aplicação, seja convertendo, renderizando etc.; 

## Recomendamos outras libs úteis
- *composer req cocur/slugify* -> [Criar slugs](https://github.com/cocur/slugify);
- *composer req volnix/csrf* -> [Usar tokens de segurança nos formulários](https://github.com/volnix/csrf);
- *composer req ramsey/uuid* -> [Cria ids únicos, caso deseje tabelas mais contenporâneas onde o id é único e facilita a migração de dados em outra tabela com registros](https://uuid.ramsey.dev/en/latest/quickstart.html).
- *composer req swiftmailer/swiftmailer* -> [Enviar e-mails](https://swiftmailer.symfony.com/docs/introduction.html);
- *composer req sinergi/browser-detector* -> [Detecta navegador, sistema operacional etc.](https://github.com/sinergi/php-browser-detector);
- *composer req respect/validation* -> [Valida dados](https://respect-validation.readthedocs.io/en/2.0/);