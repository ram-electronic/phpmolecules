<?php

declare(strict_types=1);

namespace PHPMolecules\Architecture\Layered;

use Attribute;

/**
 * Identifies the {@link DomainLayer} in a layered architecture. The domain layer is "the heart of business software".
 * It's responsible for representing business concepts including the domain model and the business rules and manages the
 * business state.
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
class DomainLayer
{
}
