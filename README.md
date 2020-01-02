[![Build Status](https://travis-ci.com/mferly/mferly.svg?branch=master)](https://travis-ci.com/mferly/mferly)

# What is this thing?
Handy boilerplate to get up and running with the following:
- PHP-FPM v7.4.1
- Symfony v5.x
- Nginx
- Docker
- jQuery
- Monolog

# Install/Setup

```bash
$ git clone git@github.com:mferly/mferly.git
```

You'll need to edit a few files before you get up and running. They're are:
* ./docker/nginx/conf/app.conf
    * root /path/to/your/project;
    * server_name localhost; # assuming you need to
    * Setup up SSL if you desire.
* ./docker/nginx/Dockerfile
    * Ensure paths are correct
    * Setup SSL if desired
* ./.env
    * Change APP_NAME to whatever you want
        * It's used in:
            * docker-compose
            * docker-compose-develop.yml
* ./docker-compose.yml
    * Not much, if anything, that needs changing in here
* ./docker-compose-develop.yml
    * Changes needed if you want SSL
* ./Dockerfile
    * Add/remove PHP packages as needed
    * Also check that the following are correct for your env:
        * COPY . /var/www/app
        * RUN sh /var/www/app/bin/build.sh

Once all of that is sorted out move on down to the 'Run' section (but first check out 'Certs/SSL' if you want SSL).

## Certs/SSL

> **NOTE**: If you don't want to run over HTTPS then you can skip the following set of instructions. However, I'd strongly encourage you to run over HTTPS at all times, especially since it's such an easy setup. Either way, it's setup for both port 80 and 443.

To create a local self-signed cert I recommend looking into [mkcert](https://github.com/FiloSottile/mkcert). Super simple setup. Eg..

```bash
$ git clone git@github.com:FiloSottile/mkcert.git

$ cd mkcert

$ mkcert -install
```

Then you can create a cert for an array of hosts or simply specify a single one..

```bash
$ mkcert example.local "*.example.local" localhost 127.0.0.1 ::1

// or simply

$ mkcert example.local
```

Don't forget to edit your `/etc/hosts` file if you're using a host other than `localhost`..

```bash
$ sudo vi /etc/hosts

>> /etc/hosts

// add a line similar to the following..

127.0.0.1       example.local
```

Now we..
* Copy those new `.pem` files to `./docker/nginx/certs`
* Update the following to reflect your new certs (if applicable)
    * `./docker-compose-develop.yml`
    * `./Dockerfile-nginx`
    * `./docker/nginx/conf/self-signed.conf`

Alternatively, when you're ready to go *prime time*, you can look into [Let's Encrypt](https://letsencrypt.org/) as a free solution to your SSL needs. Local, self-signed certs (as we have here) won't suffice in production, but they're easy to setup to get the ball rolling.

# Run

## Build our images
```bash
/**
 * Replace PROJECT_NAME with your project name
 *   eg. my_app
 * The following will build and tag your docker images
 *   per PROJECT_NAME
 */
$ sh ./docker-build.sh PROJECT_NAME
```

## Dev
> Develop is mounted to local app directory for ease of development via volumes.

### .env
Update APP_ENV to dev, eg. APP_ENV=dev

### Composer
```bash
// let's use the composer.lock file
$ composer update
```

### Yarn
[Install Yarn](https://yarnpkg.com/en/docs/install) and then run it to install the packages in `package.json`.
```bash
/**
 * Make sure you have yarn installed
 * Yarn will use the provided yarn.lock file
 */
$ yarn
```

```bash
/**
 * This command will watch changes made to your
 * .css and .js files
 */
$ yarn run encore dev --watch
```

### Docker compose
```bash
$ docker-compose -f docker-compose-develop.yml up
```

## Prod
> For production we don't mount local volumes (obviously).

### .env
Update APP_ENV to prod, eg. APP_ENV=prod

```bash
$ docker-compose up -d
```

## Swarm
```bash
$ docker stack deploy --compose-file docker-compose.yml app
```

## Logging
We're using Monolog (more specifically the [symfony/monolog-bundle](https://github.com/symfony/monolog-bundle)).

More resources here:
* https://github.com/symfony/monolog-bundle
* https://symfony.com/doc/current/logging.html
* https://github.com/Seldaek/monolog

## To do
* Docker alpine images
* Tests