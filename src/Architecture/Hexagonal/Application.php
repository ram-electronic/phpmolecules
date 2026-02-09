<?php

declare(strict_types=1);

namespace PHPMolecules\Architecture\Hexagonal;

use Attribute;

/**
 * An annotation to assign packages and types the role of core application code. That code must not refer to any
 * {@link Adapter} code but only either expose or depend on functionality through {@link Port}s connecting the
 * application to the outside world.
 *
 * @author Oliver Drotbohm
 * @link https://alistair.cockburn.us/hexagonal-architecture/ Hexagonal Architecture
 */
#[Attribute(Attribute::TARGET_CLASS)]
class Application
{
}
