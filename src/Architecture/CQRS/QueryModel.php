<?php

declare(strict_types=1);

namespace PHPMolecules\Architecture\CQRS;

use Attribute;

/**
 * Identifies a query model element in the context of CQRS, i.e. a (persistent) object optimized for read-access and
 * only only on the Q(uery) part of the architecture. The query model represents the current state or rather
 * materialized view after replaying the events published by the application.
 *
 * @author Christian Stettler
 * @author Henning Schwentner
 * @author Stephan Pirnbaum
 * @author Martin Schimak
 * @author Oliver Drotbohm
 * @link http://cqrs.files.wordpress.com/2010/11/cqrs_documents.pdf CQRS Documents by Greg Young
 */
#[Attribute(Attribute::TARGET_CLASS)]
class QueryModel
{
}
