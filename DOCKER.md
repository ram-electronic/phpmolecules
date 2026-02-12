# Docker Development Environment

This repository includes a Docker-based development environment for running tests and code quality tools.

## Prerequisites

- Docker
- Docker Compose

## Quick Start

### Using Make (Recommended)

The easiest way to use the Docker environment is with the provided Makefile:

```bash
# Show all available commands
make help

# Build the container
make build

# Install dependencies
make install

# Run all CI checks (phpstan, phpcs, phpunit)
make ci

# Run individual tools
make test      # PHPUnit tests
make phpstan   # Static analysis
make phpcs     # Code style check

# Interactive shell
make shell
```

### Using Docker Compose directly

Alternatively, you can use docker compose commands directly:

```bash
# Build the container
docker compose build

# Install dependencies
docker compose run --rm php composer install

# Run tests
docker compose run --rm php ./vendor/bin/phpunit

# Run static analysis
docker compose run --rm php ./vendor/bin/phpstan analyze --no-interaction --no-ansi --no-progress

# Run code sniffer
docker compose run --rm php ./vendor/bin/phpcs

# Interactive shell
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

## Notes

- The git warning about "dubious ownership" that appears when running composer is expected and can be safely ignored. This is due to how Docker volume mounting works.
- If you're having issues with composer install due to GitHub API rate limits, you can try using `--prefer-source` flag or authenticate composer with a GitHub token.

## Troubleshooting

### Composer authentication errors

If you encounter GitHub API authentication errors during `composer install`, you can:

1. Authenticate composer with a GitHub token:
   ```bash
   docker compose run --rm php composer config -g github-oauth.github.com YOUR_GITHUB_TOKEN
   ```

2. Or use source repositories instead of dist:
   ```bash
   docker compose run --rm php composer install --prefer-source
   ```
