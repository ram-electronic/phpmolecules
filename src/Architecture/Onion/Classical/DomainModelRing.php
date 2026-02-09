<?php

declare(strict_types=1);

namespace PHPMolecules\Architecture\Onion\Classical;

use Attribute;

/**
 * Identifies the {@link DomainModelRing} in an onion architecture. The domain model ring is the inner-most ring in the
 * onion architecture and is only coupled to itself. It models the truth of the business domain by consisting of
 * behaviour (logic) and the required state (data).
 *
 * @author Christian Stettler
 * @author Henning Schwentner
 * @author Stephan Pirnbaum
 * @author Martin Schimak
 * @author Oliver Drotbohm
 * @link https://jeffreypalermo.com/2008/07/the-onion-architecture-part-1/ The Onion Architecture : part 1 (Palermo)
 */
#[Attribute(Attribute::TARGET_CLASS)]
class DomainModelRing
{
}
