# What is this thing?
Handy boilerplate to get up and running with the following:
- PHP-FPM v7.4.1
- Symfony v5.x
- Nginx
- Docker

# Install

```bash
$ git clone git@github.com:mferly/mferly.git
```

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
$ mkcert example.com "*.example.com" example.test localhost 127.0.0.1 ::1

// or simply

$ mkcert mferly.local
```

Don't forget to edit your `/etc/hosts` file if you're using a host other than `localhost`..

```bash
$ sudo vi /etc/hosts

>> /etc/hosts

// add a line similar to the following..

127.0.0.1       mferly.local
```

Now we..
* Copy those new `.pem` files to `./docker/nginx/certs`
* Update the following to reflect your new certs (if applicable)
    * `./docker-compose-develop.yml`
    * `./Dockerfile-nginx`
    * `./docker/nginx/conf/self-signed.conf`

Alternatively, when you're ready to go *prime time*, you can look into [Let's Encrypt](https://letsencrypt.org/) as a free solution to your SSL needs. Local, self-signed certs (as we have here) won't suffice in production, but they're easy to setup to get the ball rolling.

# Run

## Dev
> Develop is mounted to local app directory for ease of development via volumes.

```bash
$ docker-compose -f docker-compose-develop.yml up
```

## Prod
> For production we don't mount local volumes (obviously).

```bash
$ docker-compose up -d
```

## Swarm
```bash
$ docker stack deploy --compose-file docker-compose.yml mferly
```

## To do
* Docker alpine images
* Tests