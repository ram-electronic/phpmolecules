.PHONY: help build install test phpstan phpcs shell clean

# Docker image name
IMAGE_NAME=phpmolecules-dev

# Get current user/group IDs
USER_ID=$(shell id -u)
GROUP_ID=$(shell id -g)

# Docker run command with volume mapping
DOCKER_RUN=docker run --rm -v $(CURDIR):/app $(IMAGE_NAME)

help: ## Show this help message
	@echo 'Usage: make [target]'
	@echo ''
	@echo 'Available targets:'
	@awk 'BEGIN {FS = ":.*?## "} /^[a-zA-Z_-]+:.*?## / {printf "  %-15s %s\n", $$1, $$2}' $(MAKEFILE_LIST)

build: ## Build the Docker container
	docker build --build-arg USER_ID=$(USER_ID) --build-arg GROUP_ID=$(GROUP_ID) -t $(IMAGE_NAME) .

install: ## Install composer dependencies
	$(DOCKER_RUN) composer install

update: ## Update composer dependencies
	$(DOCKER_RUN) composer update

test: ## Run PHPUnit tests
	$(DOCKER_RUN) ./vendor/bin/phpunit

phpstan: ## Run PHPStan static analysis
	$(DOCKER_RUN) ./vendor/bin/phpstan analyze --no-interaction --no-ansi --no-progress

phpcs: ## Run PHP CodeSniffer
	$(DOCKER_RUN) ./vendor/bin/phpcs

ci: phpstan phpcs test ## Run all CI checks

shell: ## Open an interactive shell in the container
	docker run --rm -it -v $(CURDIR):/app $(IMAGE_NAME) bash

clean: ## Remove vendor directory
	$(DOCKER_RUN) rm -rf vendor
