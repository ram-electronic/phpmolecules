# Docker Development Environment

This repository includes a Docker-based development environment for running tests and code quality tools.

## Prerequisites

- Docker

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

### Using Docker directly

Alternatively, you can use docker commands directly:

```bash
# Build the container
docker build --build-arg USER_ID=$(id -u) --build-arg GROUP_ID=$(id -g) -t phpmolecules-dev .

# Install dependencies
docker run --rm -v $(pwd):/app phpmolecules-dev composer install

# Run tests
docker run --rm -v $(pwd):/app phpmolecules-dev ./vendor/bin/phpunit

# Run static analysis
docker run --rm -v $(pwd):/app phpmolecules-dev ./vendor/bin/phpstan analyze --no-interaction --no-ansi --no-progress

# Run code sniffer
docker run --rm -v $(pwd):/app phpmolecules-dev ./vendor/bin/phpcs

# Interactive shell
docker run --rm -it -v $(pwd):/app phpmolecules-dev bash
```

## What's included

- **PHP 8.4** (CLI)
- **Composer** (latest version)
- **Git** (required by composer)

## User Permissions

The container runs as a non-root user (www-data) with UID and GID matching your host user. This is configured at build time using build arguments:

- `USER_ID`: Set to your user ID (default: 1000)
- `GROUP_ID`: Set to your group ID (default: 1000)

The Makefile automatically passes your current user and group IDs, ensuring that files created by the container have the correct ownership.

## Volume Mapping

The project directory is mapped to `/app` inside the container using the `-v $(pwd):/app` flag, so any changes you make on your host machine are immediately reflected in the container.

## CI Tools

The container supports all the tools used in the GitHub CI workflow:

- PHPUnit (tests)
- PHPStan (static analysis)
- PHP_CodeSniffer (code style)

## Troubleshooting

### Composer authentication errors

If you encounter GitHub API authentication errors during `composer install`, you can:

1. Authenticate composer with a GitHub token:
   ```bash
   docker run --rm -v $(pwd):/app phpmolecules-dev composer config -g github-oauth.github.com YOUR_GITHUB_TOKEN
   ```

2. Or use source repositories instead of dist:
   ```bash
   docker run --rm -v $(pwd):/app phpmolecules-dev composer install --prefer-source
   ```
