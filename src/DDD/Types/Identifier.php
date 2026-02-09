<?php

declare(strict_types=1);

namespace PHPMolecules\DDD\Types;

/**
 * Marker interface for identifiers. Exists primarily to easily identify types that are supposed to be identifiers
 * within the code base and let the compiler verify the correctness of declared relationships.
 *
 * @author Oliver Drotbohm
 * @see Identifiable
 */
interface Identifier
{
}
