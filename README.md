**BRADESCO WEBAPP**


Bradesco WebApp é uma aplicação feita com Laravel 5.3.


* Clone o repositório para sua máquina local ou remóta, siga os comandos:

```shell
$ git clone git@bitbucket.org:pravy_ti/bradescowebapp.git
$ cd skeleton/
```

* É necessário ter o gerenciador de dependência do PHP [Composer](https://getcomposer.org/) e [Nasty Popsicle Machine (NPM)](https://www.npmjs.com/) e o [Gulp](http://gulpjs.com/). Se ainda não tem instalado use a [Documentação do Composer](https://getcomposer.org/doc/00-intro.md), [Documentação do NPM](https://docs.npmjs.com/) e [Documentação do Gulp](https://github.com/gulpjs/gulp/blob/master/docs/getting-started.md).

* Instalar as dependências do PHP.

```shell
$ composer install
```

* Instalar as dependências do JS.

```shell
$ npm install
```

* Instalar as dependências do JS.

```shell
$ npm install
```

* Automatizar front-end:

```shell
$ gulp admin-deploy && gulp
```

* Criar migrations no banco de dados e dados de acesso:

```shell
$ php artisan migrate && php artisan db:seed
```

* É necessário gerar uma chave encriptografada:

```shell
$ php artisan key:generate
```

* Pronto! Para iniciar um novo servidor local, use o comando:

```shell
$ php artisan serve --host bradescowebapp.dev --port 8080
```

sudo ln -sf /var/www/MagicTech/Gift4US/storage/app/ /var/www/MagicTech/Gift4US/public/