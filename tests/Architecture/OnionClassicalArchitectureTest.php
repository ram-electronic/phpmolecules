<?php

declare(strict_types=1);

namespace PHPMolecules\Architecture\Onion\Classical;

use ReflectionClass;
use PHPUnit\Framework\TestCase;

// phpcs:disable PSR1.Classes.ClassDeclaration.MultipleClasses

#[DomainModelRing]
class SampleDomainModelRing
{
}

#[DomainServiceRing]
class SampleDomainServiceRing
{
}

#[ApplicationServiceRing]
class SampleApplicationServiceRing
{
}

#[InfrastructureRing]
class SampleInfrastructureRing
{
}

class OnionClassicalArchitectureTest extends TestCase
{
    public function testDomainModelRingAttribute(): void
    {
        $reflector = new ReflectionClass(SampleDomainModelRing::class);
        $attributes = $reflector->getAttributes();
        $this->assertCount(1, $attributes);
        $this->assertEquals("PHPMolecules\Architecture\Onion\Classical\DomainModelRing", $attributes[0]->getName());
    }

    public function testDomainServiceRingAttribute(): void
    {
        $reflector = new ReflectionClass(SampleDomainServiceRing::class);
        $attributes = $reflector->getAttributes();
        $this->assertCount(1, $attributes);
        $this->assertEquals("PHPMolecules\Architecture\Onion\Classical\DomainServiceRing", $attributes[0]->getName());
    }

    public function testApplicationServiceRingAttribute(): void
    {
        $reflector = new ReflectionClass(SampleApplicationServiceRing::class);
        $attributes = $reflector->getAttributes();
        $this->assertCount(1, $attributes);
        $this->assertEquals(
            "PHPMolecules\Architecture\Onion\Classical\ApplicationServiceRing",
            $attributes[0]->getName()
        );
    }

    public function testInfrastructureRingAttribute(): void
    {
        $reflector = new ReflectionClass(SampleInfrastructureRing::class);
        $attributes = $reflector->getAttributes();
        $this->assertCount(1, $attributes);
        $this->assertEquals("PHPMolecules\Architecture\Onion\Classical\InfrastructureRing", $attributes[0]->getName());
    }
}
// phpcs:enable
