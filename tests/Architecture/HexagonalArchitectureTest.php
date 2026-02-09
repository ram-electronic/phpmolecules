<?php

declare(strict_types=1);

namespace PHPMolecules\Architecture\Hexagonal;

use ReflectionClass;
use PHPUnit\Framework\TestCase;

// phpcs:disable PSR1.Classes.ClassDeclaration.MultipleClasses

#[Application]
class SampleApplication
{
}

#[Port(name: "UserPort", description: "Port for user operations")]
class SamplePort
{
}

#[Adapter(name: "UserAdapter", description: "Adapter for user operations")]
class SampleAdapter
{
}

#[PrimaryPort(name: "WebPort", description: "Web interface port")]
class SamplePrimaryPort
{
}

#[SecondaryPort(name: "DatabasePort", description: "Database port")]
class SampleSecondaryPort
{
}

#[PrimaryAdapter(name: "RestAdapter", description: "REST API adapter")]
class SamplePrimaryAdapter
{
}

#[SecondaryAdapter(name: "JpaAdapter", description: "JPA persistence adapter")]
class SampleSecondaryAdapter
{
}

class HexagonalArchitectureTest extends TestCase
{
    public function testApplicationAttribute(): void
    {
        $reflector = new ReflectionClass(SampleApplication::class);
        $attributes = $reflector->getAttributes();
        $this->assertCount(1, $attributes);
        $this->assertEquals("PHPMolecules\Architecture\Hexagonal\Application", $attributes[0]->getName());
    }

    public function testPortAttribute(): void
    {
        $reflector = new ReflectionClass(SamplePort::class);
        $attributes = $reflector->getAttributes();
        $this->assertCount(1, $attributes);
        $this->assertEquals("PHPMolecules\Architecture\Hexagonal\Port", $attributes[0]->getName());

        $instance = $attributes[0]->newInstance();
        $this->assertEquals("UserPort", $instance->name);
        $this->assertEquals("Port for user operations", $instance->description);
    }

    public function testAdapterAttribute(): void
    {
        $reflector = new ReflectionClass(SampleAdapter::class);
        $attributes = $reflector->getAttributes();
        $this->assertCount(1, $attributes);
        $this->assertEquals("PHPMolecules\Architecture\Hexagonal\Adapter", $attributes[0]->getName());

        $instance = $attributes[0]->newInstance();
        $this->assertEquals("UserAdapter", $instance->name);
        $this->assertEquals("Adapter for user operations", $instance->description);
    }

    public function testPrimaryPortAttribute(): void
    {
        $reflector = new ReflectionClass(SamplePrimaryPort::class);
        $attributes = $reflector->getAttributes();
        $this->assertCount(1, $attributes);
        $this->assertEquals("PHPMolecules\Architecture\Hexagonal\PrimaryPort", $attributes[0]->getName());

        $instance = $attributes[0]->newInstance();
        $this->assertEquals("WebPort", $instance->name);
        $this->assertEquals("Web interface port", $instance->description);
    }

    public function testSecondaryPortAttribute(): void
    {
        $reflector = new ReflectionClass(SampleSecondaryPort::class);
        $attributes = $reflector->getAttributes();
        $this->assertCount(1, $attributes);
        $this->assertEquals("PHPMolecules\Architecture\Hexagonal\SecondaryPort", $attributes[0]->getName());

        $instance = $attributes[0]->newInstance();
        $this->assertEquals("DatabasePort", $instance->name);
        $this->assertEquals("Database port", $instance->description);
    }

    public function testPrimaryAdapterAttribute(): void
    {
        $reflector = new ReflectionClass(SamplePrimaryAdapter::class);
        $attributes = $reflector->getAttributes();
        $this->assertCount(1, $attributes);
        $this->assertEquals("PHPMolecules\Architecture\Hexagonal\PrimaryAdapter", $attributes[0]->getName());

        $instance = $attributes[0]->newInstance();
        $this->assertEquals("RestAdapter", $instance->name);
        $this->assertEquals("REST API adapter", $instance->description);
    }

    public function testSecondaryAdapterAttribute(): void
    {
        $reflector = new ReflectionClass(SampleSecondaryAdapter::class);
        $attributes = $reflector->getAttributes();
        $this->assertCount(1, $attributes);
        $this->assertEquals("PHPMolecules\Architecture\Hexagonal\SecondaryAdapter", $attributes[0]->getName());

        $instance = $attributes[0]->newInstance();
        $this->assertEquals("JpaAdapter", $instance->name);
        $this->assertEquals("JPA persistence adapter", $instance->description);
    }
}
// phpcs:enable
