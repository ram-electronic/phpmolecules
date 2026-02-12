<?php

declare(strict_types=1);

namespace PHPMolecules\DDD\Types;

/**
 * An identifiable type, i.e. anything that exposes an {@link Identifier}.
 *
 * @author Oliver Drotbohm
 *
 * @link https://github.com/xmolecules/jmolecules/blob/main/jmolecules-ddd/src/main/java/org/jmolecules/ddd/types/Identifiable.java jmolecules - Identifiable.java
 *
 * @template ID of Identifier
 */
interface Identifiable
{
    /**
     * Returns the identifier.
     *
     * @return ID
     */
    public function getId(): Identifier;
}
