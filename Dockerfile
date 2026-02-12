FROM php:8.4-cli

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /app

# Install git (required by composer for some dependencies)
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    && rm -rf /var/lib/apt/lists/*

# Set composer to allow running as root
ENV COMPOSER_ALLOW_SUPERUSER=1

# Default command
CMD ["php", "-v"]