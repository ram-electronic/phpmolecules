#!/bin/bash
# Smoke test for Docker development environment

set -e

echo "==================================="
echo "Docker Development Environment Test"
echo "==================================="
echo ""

echo "1. Testing PHP..."
docker compose run --rm php php -v
echo "✓ PHP is working"
echo ""

echo "2. Testing Composer..."
docker compose run --rm php composer --version
echo "✓ Composer is working"
echo ""

echo "3. Testing Git..."
docker compose run --rm php git --version
echo "✓ Git is working"
echo ""

echo "4. Testing volume mapping..."
docker compose run --rm php ls -la /app/composer.json > /dev/null
echo "✓ Volume mapping is working"
echo ""

echo "==================================="
echo "All tests passed! ✓"
echo "==================================="
echo ""
echo "To install dependencies and run tests:"
echo "  docker compose run --rm php composer install"
echo "  docker compose run --rm php ./vendor/bin/phpunit"
echo "  docker compose run --rm php ./vendor/bin/phpstan analyze"
echo "  docker compose run --rm php ./vendor/bin/phpcs"
