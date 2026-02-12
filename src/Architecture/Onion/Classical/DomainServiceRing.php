<?php

declare(strict_types=1);

namespace PHPMolecules\Architecture\Onion\Classical;

use Attribute;

/**
 * Identifies the {@link DomainServiceRing} in an onion architecture. The domain service ring defines the interfaces
 * needed for e.g. storing and retrieving data, i.e. repository interfaces. However, it does not provide the technical
 * implementations. These will be provided by the {@link InfrastructureRing}. Thus, the domain service ring supports the
 * execution of business use cases.
 *
 * @author Christian Stettler
 * @author Henning Schwentner
 * @author Stephan Pirnbaum
 * @author Martin Schimak
 * @author Oliver Drotbohm
 * @link https://jeffreypalermo.com/2008/07/the-onion-architecture-part-1/ The Onion Architecture : part 1 (Palermo)
 */
#[Attribute(Attribute::TARGET_CLASS)]
class DomainServiceRing
{
}
