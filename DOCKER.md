# Docker Development Environment

This repository includes a Docker-based development environment for running tests and code quality tools.

## Prerequisites

- Docker
- Docker Compose

## Quick Start

### Build the container

```bash
docker compose build
```

### Install dependencies

```bash
docker compose run --rm php composer install
```

### Run tests

```bash
docker compose run --rm php ./vendor/bin/phpunit
```

### Run static analysis

```bash
docker compose run --rm php ./vendor/bin/phpstan analyze --no-interaction --no-ansi --no-progress
```

### Run code sniffer

```bash
docker compose run --rm php ./vendor/bin/phpcs
```

### Interactive shell

To get an interactive shell inside the container:

```bash
docker compose run --rm php bash
```

## What's included

- **PHP 8.4** (CLI)
- **Composer** (latest version)
- **Git** (required by composer)

## Volume Mapping

The entire project directory is mapped to `/app` inside the container, so any changes you make on your host machine are immediately reflected in the container.

## CI Tools

The container supports all the tools used in the GitHub CI workflow:

- PHPUnit (tests)
- PHPStan (static analysis)
- PHP_CodeSniffer (code style)
