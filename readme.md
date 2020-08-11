<h1 align="center">
  Backend Ecommerce
</h1>

## :computer: Configure

To run this application i recommend you to install [Docker](https://docs.docker.com/install/) and [configure](https://docs.docker.com/install/linux/linux-postinstall/) it to use with your user system. (If you needed).

First it all, let's go ready the databases.
Postgres SQL

_Change the name of container and/or password_

```sh
$ docker run --name postgres -e POSTGRES_PASSWORD=admin -p 5432:5432 -d postgres
```

_Create a database in postgres_

Now, let's prepare the application

Cloning the repository

```sh
$ mkdir ecommerce
$ cd ecommerce

$ git clone https://github.com/juliosouzam/ecommerce-backend.git backend
$ cd backend
```

With [_composer_](https://getcomposer.org/) installed run...

```sh
$ composer install
# and now
$ cp .env.example .env
```

_Dont forget to configure your database connection in .env_

```sh
# generate the key encryption
$ php artisan key:generate
# run the migrations
$ php artisan migrate
# install the keys to passport
$ php artisan passport:install
# run seed, to populate the database
$ php artisan db:seed
```

_Email: example@mail.com_

_Password: password_

## :video_game: Running

```sh
# in the terminal
$ php artisan serve
```

Developed by [me](https://github.com/juliosouzam) with :coffee: and :heart:
