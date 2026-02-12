<?php

declare(strict_types=1);

namespace PHPMolecules\Architecture\Onion\Simplified;

use ReflectionClass;
use PHPUnit\Framework\TestCase;

// phpcs:disable PSR1.Classes.ClassDeclaration.MultipleClasses

#[DomainRing]
class SampleDomainRing
{
}

#[ApplicationRing]
class SampleApplicationRing
{
}

#[InfrastructureRing]
class SampleInfrastructureRing
{
}

class OnionSimplifiedArchitectureTest extends TestCase
{
    public function testDomainRingAttribute(): void
    {
        $reflector = new ReflectionClass(SampleDomainRing::class);
        $attributes = $reflector->getAttributes();
        $this->assertCount(1, $attributes);
        $this->assertEquals("PHPMolecules\Architecture\Onion\Simplified\DomainRing", $attributes[0]->getName());
    }

    public function testApplicationRingAttribute(): void
    {
        $reflector = new ReflectionClass(SampleApplicationRing::class);
        $attributes = $reflector->getAttributes();
        $this->assertCount(1, $attributes);
        $this->assertEquals("PHPMolecules\Architecture\Onion\Simplified\ApplicationRing", $attributes[0]->getName());
    }

    public function testInfrastructureRingAttribute(): void
    {
        $reflector = new ReflectionClass(SampleInfrastructureRing::class);
        $attributes = $reflector->getAttributes();
        $this->assertCount(1, $attributes);
        $this->assertEquals(
            "PHPMolecules\Architecture\Onion\Simplified\InfrastructureRing",
            $attributes[0]->getName()
        );
    }
}
// phpcs:enable
