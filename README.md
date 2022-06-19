# Eco - Personal Web Ecosystem

Inspired by @IndieWeb, Eco aims to be a personal hub for your web presence and publishing platform where you own your content.

Built with modern tooling:
- Laravel 9
- Bootstrap 5 & SaSS
- Livewire

Features
- Not a blog platform, a content platform
- Developer friendly
- Extendable themes
- Supports hCard microformat
- Atom syndication

Eco is still very early in development and not recommended for production sites. Pull requests and issues are very much welcome!

## Screenshots

![Theme](https://github.com/bad-mushroom/eco/blob/main/docs/screenshots/default_theme.pngg?raw=true)
![Creating Posts](https://github.com/bad-mushroom/eco/blob/main/docs/screenshots/manage_create_post.png?raw=true)
![Stories](https://github.com/bad-mushroom/eco/blob/main/docs/screenshots/manage_stories.png?raw=true)

# Development Installation

## Requirements

* Docker [Docker Website](http://www.docker.com)
* Git [Git Website](https://git-scm.com/)
* Composer [PHP Composer Website](https://getcomposer.org/)
* NPM [NPM Website](https://www.npmjs.com/)

### Clone this repo locally

```
git clone https://github.com:bad-mushroom/eco.git ./eco

cd ./eco
```

The remaining installation steps will assume you're in the `eco` directory, or which ever directory you cloned the repo to.

### Install Composer Dependencies

```
composer install
```

### Environemnt Variables

Eco is build on Laravel which uses .env files for environment configuration. You'll first need to copy the example file.

```
cp .env.example .env
```

Open `.env` in your editor and update as needed. There is one particular value you may want to manually change, `STORAGE_PATH`. If you want to persist any data outside of Docker you will need to change this value to a path to a value outside of the `eco` directory store your database and content. Otherwise data will be lost each time your docker envirment is recreated.

For example, by default your developer environement will have a `eco/storage` directory which will contain a `content` and `database` folder. To save these folders outside of Docker, change the `STORAGE_PATH` value to a relative or absolute path: `../storage` or `/users/home/chris/eco-data`.

For a development environement, the remaining default values should be fine.

You will however, need to generate an `APP_KEY` value:

```
php artisan key:generate
```


### Docker

With the configuration values in place, we need to spin up Eco's Docker environemnt. This will spin up all the necessary containers to run Eco; MySQL, php-fpm, etc.

```
docker-compose up
```

### Node Packages

There are a handfull of node packages to install and frontend assets to build that Eco requires for the admin page as well as any themes that are installed.

```
npm ci
npm run dev
```

### Database and Seeded Data

We'll need to build the database tables and seed them with some initial data.

```
php artisan migrate --seed
```

The seeders that run will populate some settings and meta data for your content.


# Configuration

### User Account

By default, there isn't a user account created during setup. To do this there is an artisan command you can run:

```
php artisan eco:make-account <email address> <name> <password>
```

For example:
```
$ php artisan eco:make-account chris@chaoscontrol.org Chris
User account created:
 - ID: 8eded58c-6cca-41f8-be73-c79584d767d9
 - Email: chris@chaoscontrol.org
 - Name: Chris
 - Password: password
```

# Wrapping Up

You should now be able to access Eco in your web browser at http://localhost:8080 to see the main page or the admin page at http://localhost:8300/admin and log in with the email/password you created.
