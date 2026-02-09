<?php

declare(strict_types=1);

namespace PHPMolecules\Architecture\Layered;

use Attribute;

/**
 * Identifies the {@link ApplicationLayer} in a layered architecture. The application layer is coordinating the
 * execution of business flows without containing business rules, but by utilizing the {@link DomainLayer}. It also
 * coordinates flows spanning other systems or bounded contexts and may keep information of the progress of the
 * execution.
 *
 * Therefore, the application layer is a thin layer to enable the system to execute business flows.
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
class ApplicationLayer
{
}
