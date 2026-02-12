<?php

declare(strict_types=1);

namespace PHPMolecules\DDD\Types;

/**
 * Identifies an {@link Entity}. Entities represent a thread of continuity and identity, going through a lifecycle,
 * though their attributes may change. Means of identification may come from the outside, or it may be an arbitrary
 * identifier created by and for the system, but it must correspond to the identity distinctions in the model. The model
 * must define what it means to be the same thing.
 *
 * @author Christian Stettler
 * @author Henning Schwentner
 * @author Stephan Pirnbaum
 * @author Martin Schimak
 * @author John Sullivan
 * @author Oliver Drotbohm
 * @link https://domainlanguage.com/wp-content/uploads/2016/05/DDD_Reference_2015-03.pdf Domain-Driven Design
 *       Reference (Evans) - Entities
 * @link https://scabl.blogspot.com/2015/04/aeddd-9.html John Sullivan - Advancing Enterprise DDD - Reinstating
 *       the Aggregate
 *
 * @link https://github.com/xmolecules/jmolecules/blob/main/jmolecules-ddd/src/main/java/org/jmolecules/ddd/types/Entity.java jmolecules - Entity.java
 *
 * @template T of AggregateRoot
 * @template ID of Identifier
 * @extends Identifiable<ID>
 */
interface Entity extends Identifiable
{
}
