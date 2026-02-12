<?php

declare(strict_types=1);

namespace PHPMolecules\Architecture\Hexagonal;

use Attribute;

/**
 * An {@link SecondaryPort} describes abstractions that describes interfaces to the outside that are driven by the
 * application's core, like a repository (to interact with a database) or a message publisher. Usually
 * {@link SecondaryPort}s are implemented by {@link SecondaryAdapter}s.
 *
 * @author Oliver Drotbohm
 * @author Stephan Pirnbaum
 * @link https://alistair.cockburn.us/hexagonal-architecture/ Hexagonal Architecture
 */
#[Attribute(Attribute::TARGET_CLASS)]
class SecondaryPort
{
    public function __construct(
        public string $name = '',
        public string $description = ''
    ) {
    }
}
