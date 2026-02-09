<?php

declare(strict_types=1);

namespace PHPMolecules\Architecture\Layered;

use Attribute;

/**
 * Identifies the {@link InterfaceLayer} in a layered architecture. The interface layer is responsible for handling
 * external requests either from users or other systems.
 *
 * @author Christian Stettler
 * @author Henning Schwentner
 * @author Stephan Pirnbaum
 * @author Martin Schimak
 * @author Oliver Drotbohm
 * @link https://domainlanguage.com/wp-content/uploads/2016/05/DDD_Reference_2015-03.pdf Domain-Driven Design
 *     Reference (Evans) - Layered Architecture
 */
#[Attribute(Attribute::TARGET_CLASS)]
class InterfaceLayer
{
}
