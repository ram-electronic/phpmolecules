FROM php:8.4-cli

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /app

# Install git and unzip (required by composer for some dependencies)
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    && rm -rf /var/lib/apt/lists/*

# Arguments for user configuration
ARG USER_NAME=www-data
ARG USER_GROUP=www-data
ARG USER_ID=1000
ARG GROUP_ID=1000

# Change www-data user's uid and www-data group's gid
RUN usermod --uid $USER_ID $USER_NAME && groupmod --gid $GROUP_ID $USER_GROUP

# Set default user
USER $USER_NAME

# Default command
CMD ["php", "-v"]