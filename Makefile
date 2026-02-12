.PHONY: help build install test phpstan phpcs shell clean

help: ## Show this help message
	@echo 'Usage: make [target]'
	@echo ''
	@echo 'Available targets:'
	@awk 'BEGIN {FS = ":.*?## "} /^[a-zA-Z_-]+:.*?## / {printf "  %-15s %s\n", $$1, $$2}' $(MAKEFILE_LIST)

build: ## Build the Docker container
	docker compose build

install: ## Install composer dependencies
	docker compose run --rm php composer install

update: ## Update composer dependencies
	docker compose run --rm php composer update

test: ## Run PHPUnit tests
	docker compose run --rm php ./vendor/bin/phpunit

phpstan: ## Run PHPStan static analysis
	docker compose run --rm php ./vendor/bin/phpstan analyze --no-interaction --no-ansi --no-progress

phpcs: ## Run PHP CodeSniffer
	docker compose run --rm php ./vendor/bin/phpcs

ci: ## Run all CI checks (phpstan, phpcs, test)
	docker compose run --rm php ./vendor/bin/phpstan analyze --no-interaction --no-ansi --no-progress
	docker compose run --rm php ./vendor/bin/phpcs
	docker compose run --rm php ./vendor/bin/phpunit

shell: ## Open an interactive shell in the container
	docker compose run --rm php bash

clean: ## Remove vendor directory and composer.lock
	docker compose run --rm php rm -rf vendor composer.lock
