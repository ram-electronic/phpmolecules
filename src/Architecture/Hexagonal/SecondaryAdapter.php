<?php

declare(strict_types=1);

namespace PHPMolecules\Architecture\Hexagonal;

use Attribute;

/**
 * {@link SecondaryAdapter}s implement {@link SecondaryPort} to ultimately link the applications core to some external
 * technology, like a database, message broker, email server or third-party service.
 *
 * @author Oliver Drotbohm
 * @author Stephan Pirnbaum
 */
#[Attribute(Attribute::TARGET_CLASS)]
class SecondaryAdapter
{
    public function __construct(
        public string $name = '',
        public string $description = ''
    ) {
    }
}
