<?php

declare(strict_types=1);

namespace PHPMolecules\DDD\Types;

/**
 * An association to an {@link AggregateRoot}.
 *
 * @author Christian Stettler
 * @author Henning Schwentner
 * @author Stephan Pirnbaum
 * @author Martin Schimak
 * @author John Sullivan
 * @author Oliver Drotbohm
 * @link https://scabl.blogspot.com/2015/04/aeddd-9.html John Sullivan - Advancing Enterprise DDD - Reinstating
 *       the Aggregate
 * @link https://github.com/xmolecules/jmolecules/blob/main/jmolecules-ddd/src/main/java/org/jmolecules/ddd/types/Association.java jmolecules - Association.java
 *
 * @template T of AggregateRoot
 * @template ID of Identifier
 * @extends Identifiable<ID>
 */
interface Association extends Identifiable
{
    /**
     * Creates an {@link Association} pointing to the {@link Identifier} of the given {@link AggregateRoot}.
     *
     * @template T2 of AggregateRoot
     * @template ID2 of Identifier
     * @param T2 $aggregate must not be null.
     * @return Association<T2, ID2> an {@link Association} pointing to the {@link Identifier} of the given {@link AggregateRoot}, will never be null.
     */
    public static function forAggregate(AggregateRoot $aggregate): Association;

    /**
     * Creates an {@link Association} pointing to the given {@link Identifier}.
     *
     * @template T2 of AggregateRoot
     * @template ID2 of Identifier
     * @param ID2 $identifier must not be null.
     * @return Association<T2, ID2> an {@link Association} pointing to the given {@link Identifier}, will never be null.
     */
    public static function forId(Identifier $identifier): Association;

    /**
     * Returns whether the current {@link Association} points to the same {@link AggregateRoot} as the given one. Unlike
     * {@link equals()} and {@link hashCode()} that also check for type equality of the {@link Association}
     * itself, this only compares the target {@link Identifier} instances.
     *
     * @param Association<mixed, ID> $other must not be null.
     * @return bool whether the current {@link Association} points to the same {@link AggregateRoot} as the given one.
     */
    public function pointsToSameAggregateAs(Association $other): bool;

    /**
     * Returns whether the current {@link Association} points to the {@link AggregateRoot} with the given
     * {@link Identifier}. Unlike {@link equals()} and {@link hashCode()} that also check for type equality of the
     * {@link Association} itself, this only compares the target {@link Identifier} instances.
     *
     * @param ID $identifier
     * @return bool whether the current {@link Association} points to the {@link AggregateRoot} with the given {@link Identifier}.
     */
    public function pointsTo(Identifier $identifier): bool;

    /**
     * Returns whether the current {@link Association} points to the given {@link AggregateRoot}. Unlike
     * {@link equals()} and {@link hashCode()} that also check for type equality of the {@link Association}
     * itself, this only compares the target {@link Identifier} instances.
     *
     * @param T $aggregate must not be null.
     * @return bool whether the current {@link Association} points to the given {@link AggregateRoot}.
     */
    public function pointsToAggregate(AggregateRoot $aggregate): bool;
}
