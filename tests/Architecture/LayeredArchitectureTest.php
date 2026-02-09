<?php

declare(strict_types=1);

namespace PHPMolecules\Architecture\Layered;

use ReflectionClass;
use PHPUnit\Framework\TestCase;

// phpcs:disable PSR1.Classes.ClassDeclaration.MultipleClasses

#[DomainLayer]
class SampleDomainLayer
{
}

#[ApplicationLayer]
class SampleApplicationLayer
{
}

#[InfrastructureLayer]
class SampleInfrastructureLayer
{
}

#[InterfaceLayer]
class SampleInterfaceLayer
{
}

class LayeredArchitectureTest extends TestCase
{
    public function testDomainLayerAttribute(): void
    {
        $reflector = new ReflectionClass(SampleDomainLayer::class);
        $attributes = $reflector->getAttributes();
        $this->assertCount(1, $attributes);
        $this->assertEquals("PHPMolecules\Architecture\Layered\DomainLayer", $attributes[0]->getName());
    }

    public function testApplicationLayerAttribute(): void
    {
        $reflector = new ReflectionClass(SampleApplicationLayer::class);
        $attributes = $reflector->getAttributes();
        $this->assertCount(1, $attributes);
        $this->assertEquals("PHPMolecules\Architecture\Layered\ApplicationLayer", $attributes[0]->getName());
    }

    public function testInfrastructureLayerAttribute(): void
    {
        $reflector = new ReflectionClass(SampleInfrastructureLayer::class);
        $attributes = $reflector->getAttributes();
        $this->assertCount(1, $attributes);
        $this->assertEquals("PHPMolecules\Architecture\Layered\InfrastructureLayer", $attributes[0]->getName());
    }

    public function testInterfaceLayerAttribute(): void
    {
        $reflector = new ReflectionClass(SampleInterfaceLayer::class);
        $attributes = $reflector->getAttributes();
        $this->assertCount(1, $attributes);
        $this->assertEquals("PHPMolecules\Architecture\Layered\InterfaceLayer", $attributes[0]->getName());
    }
}
// phpcs:enable
