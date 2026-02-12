<?php

declare(strict_types=1);

namespace PHPMolecules\Architecture\Hexagonal;

use Attribute;

/**
 * {@link Adapter}s contain technology specific implementations to either drive (see {@link PrimaryPort}) or implement
 * {@link Port}s (see {@link SecondaryPort}). Adapters must not depend on {@link Application} code other than ports.
 *
 * @author Oliver Drotbohm
 * @author Stephan Pirnbaum
 * @link https://alistair.cockburn.us/hexagonal-architecture/ Hexagonal Architecture
 */
#[Attribute(Attribute::TARGET_CLASS)]
class Adapter
{
    public function __construct(
        public string $name = '',
        public string $description = ''
    ) {
    }
}
