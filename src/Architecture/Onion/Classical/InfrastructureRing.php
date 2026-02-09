<?php

declare(strict_types=1);

namespace PHPMolecules\Architecture\Onion\Classical;

use Attribute;

/**
 * Identifies the {@link InfrastructureRing} in an onion architecture. The infrastructure ring is the technical
 * implementation of the interfaces defined in the inner layers, such as JPA entities or concrete repository
 * implementations. It takes care of handling external requests and communication with other systems.
 *
 * @author Christian Stettler
 * @author Henning Schwentner
 * @author Stephan Pirnbaum
 * @author Martin Schimak
 * @author Oliver Drotbohm
 * @link https://jeffreypalermo.com/2008/07/the-onion-architecture-part-1/ The Onion Architecture : part 1 (Palermo)
 */
#[Attribute(Attribute::TARGET_CLASS)]
class InfrastructureRing
{
}
