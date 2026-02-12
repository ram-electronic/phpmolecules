<?php

declare(strict_types=1);

namespace PHPMolecules\Architecture\Hexagonal;

use Attribute;

/**
 * A {@link PrimaryAdapter} connects the outside of an application to an {@link PrimaryPort} exposed by the
 * application's core. For example, it could be a component accepting HTTP requests or a listener for a message broker.
 *
 * @author Oliver Drotbohm
 * @author Stephan Pirnbaum
 * @link https://alistair.cockburn.us/hexagonal-architecture/ Hexagonal Architecture
 */
#[Attribute(Attribute::TARGET_CLASS)]
class PrimaryAdapter
{
    public function __construct(
        public string $name = '',
        public string $description = ''
    ) {
    }
}
