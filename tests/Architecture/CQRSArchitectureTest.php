<?php

declare(strict_types=1);

namespace PHPMolecules\Architecture\CQRS;

use ReflectionClass;
use ReflectionMethod;
use PHPUnit\Framework\TestCase;

// phpcs:disable PSR1.Classes.ClassDeclaration.MultipleClasses

#[Command(namespace: "Banking", name: "CreateAccount")]
class SampleCommand
{
}

#[QueryModel]
class SampleQueryModel
{
}

class SampleCommandHandlers
{
    #[CommandHandler(namespace: "Banking", name: "CreateAccount")]
    public function handleCreateAccount(): void
    {
    }
}

class SampleCommandDispatchers
{
    #[CommandDispatcher(dispatches: "Banking.CreateAccount")]
    public function dispatchCreateAccount(): void
    {
    }
}

class CQRSArchitectureTest extends TestCase
{
    public function testCommandAttribute(): void
    {
        $reflector = new ReflectionClass(SampleCommand::class);
        $attributes = $reflector->getAttributes();
        $this->assertCount(1, $attributes);
        $this->assertEquals("PHPMolecules\Architecture\CQRS\Command", $attributes[0]->getName());

        $instance = $attributes[0]->newInstance();
        $this->assertEquals("Banking", $instance->namespace);
        $this->assertEquals("CreateAccount", $instance->name);
    }

    public function testQueryModelAttribute(): void
    {
        $reflector = new ReflectionClass(SampleQueryModel::class);
        $attributes = $reflector->getAttributes();
        $this->assertCount(1, $attributes);
        $this->assertEquals("PHPMolecules\Architecture\CQRS\QueryModel", $attributes[0]->getName());
    }

    public function testCommandHandlerAttribute(): void
    {
        $reflector = new ReflectionMethod(SampleCommandHandlers::class, 'handleCreateAccount');
        $attributes = $reflector->getAttributes();
        $this->assertCount(1, $attributes);
        $this->assertEquals("PHPMolecules\Architecture\CQRS\CommandHandler", $attributes[0]->getName());

        $instance = $attributes[0]->newInstance();
        $this->assertEquals("Banking", $instance->namespace);
        $this->assertEquals("CreateAccount", $instance->name);
    }

    public function testCommandDispatcherAttribute(): void
    {
        $reflector = new ReflectionMethod(SampleCommandDispatchers::class, 'dispatchCreateAccount');
        $attributes = $reflector->getAttributes();
        $this->assertCount(1, $attributes);
        $this->assertEquals("PHPMolecules\Architecture\CQRS\CommandDispatcher", $attributes[0]->getName());

        $instance = $attributes[0]->newInstance();
        $this->assertEquals("Banking.CreateAccount", $instance->dispatches);
    }
}
// phpcs:enable
