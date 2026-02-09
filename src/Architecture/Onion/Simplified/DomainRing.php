<?php

declare(strict_types=1);

namespace PHPMolecules\Architecture\Onion\Simplified;

use Attribute;

/**
 * Identifies the {@link DomainRing} in an onion architecture. The domain ring is the inner-most ring in the onion
 * architecture and is only coupled to itself. It models the truth of the business domain by consisting of behaviour
 * (logic) and the required state (data). Compared to the 4-ring onion architecture in which the domain is split into
 * domain model and domain services, the 3-ring version combines those 2 rings so that it implements behavior (logic),
 * state (data), and interfaces needed for e.g. storing and retrieving data, i.e. repository interfaces.
 *
 * @author Christian Stettler
 * @author Henning Schwentner
 * @author Stephan Pirnbaum
 * @author Martin Schimak
 * @author Oliver Drotbohm
 * @link https://jeffreypalermo.com/2008/07/the-onion-architecture-part-1/ The Onion Architecture : part 1 (Palermo)
 */
#[Attribute(Attribute::TARGET_CLASS)]
class DomainRing
{
}
