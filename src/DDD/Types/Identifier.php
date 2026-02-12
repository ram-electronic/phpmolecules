<?php

declare(strict_types=1);

namespace PHPMolecules\DDD\Types;

/**
 * Marker interface for identifiers. Exists primarily to easily identify types that are supposed to be identifiers
 * within the code base and let the compiler verify the correctness of declared relationships.
 *
 * @author Oliver Drotbohm
 *
 * @link https://github.com/xmolecules/jmolecules/blob/main/jmolecules-ddd/src/main/java/org/jmolecules/ddd/types/Identifier.java jmolecules - Identifier.java
 *
 * @see Identifiable
 */
interface Identifier
{
}
