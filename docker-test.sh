#!/bin/bash
# Smoke test for Docker development environment

set -e

IMAGE_NAME="phpmolecules-dev"
USER_ID=$(id -u)
GROUP_ID=$(id -g)

echo "==================================="
echo "Docker Development Environment Test"
echo "==================================="
echo ""

echo "Building Docker image..."
docker build --build-arg USER_ID=$USER_ID --build-arg GROUP_ID=$GROUP_ID -t $IMAGE_NAME . > /dev/null
echo "✓ Docker image built successfully"
echo ""

echo "1. Testing PHP..."
docker run --rm $IMAGE_NAME php -v
echo "✓ PHP is working"
echo ""

echo "2. Testing Composer..."
docker run --rm $IMAGE_NAME composer --version
echo "✓ Composer is working"
echo ""

echo "3. Testing Git..."
docker run --rm $IMAGE_NAME git --version
echo "✓ Git is working"
echo ""

echo "4. Testing volume mapping..."
docker run --rm -v $(pwd):/app $IMAGE_NAME ls -la /app/composer.json > /dev/null
echo "✓ Volume mapping is working"
echo ""

echo "5. Testing user permissions..."
USER_INFO=$(docker run --rm -v $(pwd):/app $IMAGE_NAME id -u)
if [ "$USER_INFO" -eq 0 ]; then
    echo "✗ Container is running as root (UID 0)"
    exit 1
fi
echo "✓ Running as non-root user (UID: $USER_INFO)"
echo ""

echo "==================================="
echo "All tests passed! ✓"
echo "==================================="
echo ""
echo "To install dependencies and run tests:"
echo "  docker run --rm -v \$(pwd):/app $IMAGE_NAME composer install"
echo "  docker run --rm -v \$(pwd):/app $IMAGE_NAME ./vendor/bin/phpunit"
echo "  docker run --rm -v \$(pwd):/app $IMAGE_NAME ./vendor/bin/phpstan analyze"
echo "  docker run --rm -v \$(pwd):/app $IMAGE_NAME ./vendor/bin/phpcs"
echo ""
echo "Or use the Makefile:"
echo "  make install"
echo "  make ci"
