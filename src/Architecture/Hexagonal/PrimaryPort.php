<?php

declare(strict_types=1);

namespace PHPMolecules\Architecture\Hexagonal;

use Attribute;

/**
 * In Hexagonal Architecture an {@link PrimaryPort} describes an interface into an application's core that is exposed to
 * the outside to drive the application. A {@link PrimaryAdapter} would refer to those ports in its implementation.
 *
 * @author Oliver Drotbohm
 * @author Stephan Pirnbaum
 * @link https://alistair.cockburn.us/hexagonal-architecture/ Hexagonal Architecture
 */
#[Attribute(Attribute::TARGET_CLASS)]
class PrimaryPort
{
    public function __construct(
        public string $name = '',
        public string $description = ''
    ) {
    }
}
