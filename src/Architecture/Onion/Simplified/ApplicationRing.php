<?php

declare(strict_types=1);

namespace PHPMolecules\Architecture\Onion\Simplified;

use Attribute;

/**
 * Identifies the {@link ApplicationRing} in an onion architecture. The application ring implements and orchestrates
 * business use case. To do so, it only depends on the inner rings, i.e. the {@link DomainRing}.
 *
 * @author Christian Stettler
 * @author Henning Schwentner
 * @author Stephan Pirnbaum
 * @author Martin Schimak
 * @author Oliver Drotbohm
 * @link https://jeffreypalermo.com/2008/07/the-onion-architecture-part-1/ The Onion Architecture : part 1 (Palermo)
 */
#[Attribute(Attribute::TARGET_CLASS)]
class ApplicationRing
{
}
