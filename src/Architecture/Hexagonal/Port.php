<?php

declare(strict_types=1);

namespace PHPMolecules\Architecture\Hexagonal;

use Attribute;

/**
 * A {@link Port} defines an entry point into the {@link Application} that can either drive it (see {@link PrimaryPort})
 * or be driven by the application (see {@link SecondaryPort}). They are the interface with which the application
 * interacts with the outside world. {@link Port}s are implemented by {@link Adapter} using particular integration
 * technology.
 *
 * @author Oliver Drotbohm
 * @author Stephan Pirnbaum
 * @link https://alistair.cockburn.us/hexagonal-architecture/ Hexagonal Architecture
 */
#[Attribute(Attribute::TARGET_CLASS)]
class Port
{
    public function __construct(
        public string $name = '',
        public string $description = ''
    ) {
    }
}
