# Biolerplate Docker Nginx PHP Symfony 5

## Install

```bash
$ git clone git@github.com:mferly/xx-array.git

$ cd xx-array
```

## Run

### Dev
> Develop is mounted to local app directory for ease of development via volumes.

```bash
$ docker-compose -f docker-compose-develop.yml up
```

### Prod
> For production we don't mount local volumes (obviously).

```bash
$ docker-compose up -d
```

### Swarm
```bash
$ docker stack deploy --compose-file docker-compose.yml mferly
```
