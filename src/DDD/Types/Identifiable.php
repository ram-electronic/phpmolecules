<?php

declare(strict_types=1);

namespace PHPMolecules\DDD\Types;

/**
 * An identifiable type, i.e. anything that exposes an {@link Identifier}.
 *
 * @author Oliver Drotbohm
 * @template ID
 */
interface Identifiable
{
    /**
     * Returns the identifier.
     *
     * @return ID
     */
    public function getId();
}
