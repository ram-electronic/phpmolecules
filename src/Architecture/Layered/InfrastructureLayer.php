<?php

declare(strict_types=1);

namespace PHPMolecules\Architecture\Layered;

use Attribute;

/**
 * Identifies the {@link InfrastructureLayer} in a layered architecture. The infrastructure layer supports the other
 * layers by providing technical capabilities such as persistence or message sending. Furthermore, it may also support
 * the other layers in their interactions by providing framework functionalities.
 *
 * Provided infrastructure functionality is layer specific, i.e. functionality provided for the {@link InterfaceLayer}
 * (for example REST) must not be accessed by below layers.
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
class InfrastructureLayer
{
}
