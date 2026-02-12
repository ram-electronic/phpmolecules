<?php

declare(strict_types=1);

namespace PHPMolecules\DDD\Types;

use Closure;

/**
 * Simple implementation of {@link Association} to effectively only define {@link equals()} and
 * {@link hashCode()} on {@link Association}'s static factory methods.
 *
 * @author Oliver Drotbohm
 * @see Association::forId()
 * @see Association::forAggregate()
 *
 * @template T of AggregateRoot
 * @template ID of Identifier
 * @implements Association<T, ID>
 */
final class SimpleAssociation implements Association
{
    /** @var Closure(): ID */
    private Closure $identifier;

    /**
     * Creates a new {@link SimpleAssociation} for the given identifier.
     *
     * @param Closure(): ID $identifier must not be null.
     */
    private function __construct(Closure $identifier)
    {
        $this->identifier = $identifier;
    }

    /**
     * Creates an {@link Association} pointing to the {@link Identifier} of the given {@link AggregateRoot}.
     *
     * @template T2 of AggregateRoot
     * @template ID2 of Identifier
     * @param T2 $aggregate must not be null.
     * @return Association<T2, ID2> an {@link Association} pointing to the {@link Identifier} of the given {@link AggregateRoot}, will never be null.
     */
    public static function forAggregate(AggregateRoot $aggregate): Association
    {
        return new self(fn() => $aggregate->getId());
    }

    /**
     * Creates an {@link Association} pointing to the given {@link Identifier}.
     *
     * @template T2 of AggregateRoot
     * @template ID2 of Identifier
     * @param ID2 $identifier must not be null.
     * @return Association<T2, ID2> an {@link Association} pointing to the given {@link Identifier}, will never be null.
     */
    public static function forId(Identifier $identifier): Association
    {
        return new self(fn() => $identifier);
    }

    /**
     * @return ID
     */
    public function getId(): Identifier
    {
        return ($this->identifier)();
    }

    public function __toString(): string
    {
        return (string) $this->getId();
    }

    /**
     * @param Association<mixed, ID> $other must not be null.
     * @return bool
     */
    public function pointsToSameAggregateAs(Association $other): bool
    {
        return $this->getId() == $other->getId();
    }

    /**
     * @return bool
     */
    public function pointsTo(Identifier $identifier): bool
    {
        return $this->getId() == $identifier;
    }

    /**
     * @return bool
     */
    public function pointsToAggregate(AggregateRoot $aggregate): bool
    {
        return $this->pointsTo($aggregate->getId());
    }
}
