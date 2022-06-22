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

[Theme](https://github.com/bad-mushroom/eco/blob/main/docs/screenshots/default_theme.png?raw=true)
[Creating Posts](https://github.com/bad-mushroom/eco/blob/main/docs/screenshots/manage_create_post.png?raw=true)
[Stories](https://github.com/bad-mushroom/eco/blob/main/docs/screenshots/manage_stories.png?raw=true)

# Development Installation

## Requirements

* Docker [Docker Website](http://www.docker.com)
* Git [Git Website](https://git-scm.com/)
* Composer [PHP Composer Website](https://getcomposer.org/)
* NPM [NPM Website](https://www.npmjs.com/)

### Clone this repo locally

```
git clone https://github.com:bad-mushroom/eco.git ./my-website/eco

cd ./eco
```

The remaining installation steps will assume you're in the `eco` directory, or which ever directory you cloned the repo to.

### Install Composer Dependencies

```
composer install
```

### Environemnt Variables

Eco is built on Laravel which uses .env files for environment configuration. You'll first need to copy the example file.

```
cp .env.example .env
```

#### Paths

In your `.env` file there are a few paths that Eco will use to store content that you create - your data, file uploads, custom themes, etc. All of that data needs to be stored outside of Docker otherwise it will be lost each time Docker recreates its containers.

The values should be a relative path from the root Eco directory.

```
# -- Environment

CONTENT_PATH=../eco-content
DATABASE_PATH=../eco-db
THEMES_PATH=../eco-themes
PUBLIC_PATH=../eco-public
```

Let's say you have installed Eco in `/srv/apps/my-website/eco`. When Eco builds, your content files will be placed in `/srv/apps/my-website/eco-content`.

### Docker

With the configuration values in place, we need to spin up Eco's Docker environemnt. This will spin up all the necessary containers to run Eco; MySQL, php-fpm, etc.

```
docker-compose up
```

### Node Packages

There are a handfull of node packages to install and frontend assets to build that Eco requires for the admin page as well as any themes that are installed.

```
npm i
npm run dev
```

### Environment Setup

We'll need to build the database tables, seed them with some initial data, generate an app key, etc... but we can do this all with one command:

```
docker exec -it eco_fpm /var/www/artisan eco:setup
```

# Configuration

### User Account

By default, there isn't a user account created during setup. To do this there is an artisan command you can run:

```
docker exec -it eco_fpm /var/www/artisan eco:make-account <email address> <name> --password=<password>
```

For example:
```
$ docker exec -it eco_fpm /var/www/artisan eco:make-account chris@example.org Chris --password password123
User account created:
 - ID: 8eded58c-6cca-41f8-be73-c79584d767d9
 - Email: chris@example.org
 - Name: Chris
 - Password: password123
```

# Wrapping Up

You should now be able to access Eco in your web browser at http://localhost:8080 to see the main page or the admin page at http://localhost:8300/manage and log in with the email/password you created.
