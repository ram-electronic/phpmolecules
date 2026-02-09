<?php

declare(strict_types=1);

namespace PHPMolecules\DDD\Types;

use PHPUnit\Framework\TestCase;

// phpcs:disable PSR1.Classes.ClassDeclaration.MultipleClasses

/**
 * Test identifier implementation
 */
class AccountId implements Identifier
{
    public function __construct(private string $id)
    {
    }

    public function __toString(): string
    {
        return $this->id;
    }
}

/**
 * Test aggregate root implementation
 */
class Account implements AggregateRoot
{
    public function __construct(private AccountId $id)
    {
    }

    public function getId(): AccountId
    {
        return $this->id;
    }
}

/**
 * Test entity implementation
 */
class Transaction implements Entity
{
    public function __construct(private string $id)
    {
    }

    public function getId(): string
    {
        return $this->id;
    }
}

class DDDTypesTest extends TestCase
{
    public function testIdentifierInterface(): void
    {
        $accountId = new AccountId('ACC-123');
        
        $this->assertInstanceOf(Identifier::class, $accountId);
        $this->assertEquals('ACC-123', (string) $accountId);
    }

    public function testIdentifiableInterface(): void
    {
        $accountId = new AccountId('ACC-123');
        $account = new Account($accountId);
        
        $this->assertInstanceOf(Identifiable::class, $account);
        $this->assertSame($accountId, $account->getId());
    }

    public function testEntityInterface(): void
    {
        $transaction = new Transaction('TXN-456');
        
        $this->assertInstanceOf(Entity::class, $transaction);
        $this->assertInstanceOf(Identifiable::class, $transaction);
        $this->assertEquals('TXN-456', $transaction->getId());
    }

    public function testAggregateRootInterface(): void
    {
        $accountId = new AccountId('ACC-123');
        $account = new Account($accountId);
        
        $this->assertInstanceOf(AggregateRoot::class, $account);
        $this->assertInstanceOf(Entity::class, $account);
        $this->assertInstanceOf(Identifiable::class, $account);
        $this->assertSame($accountId, $account->getId());
    }

    public function testAssociationForAggregate(): void
    {
        $accountId = new AccountId('ACC-123');
        $account = new Account($accountId);
        
        $association = SimpleAssociation::forAggregate($account);
        
        $this->assertInstanceOf(Association::class, $association);
        $this->assertSame($accountId, $association->getId());
    }

    public function testAssociationForId(): void
    {
        $accountId = new AccountId('ACC-123');
        
        $association = SimpleAssociation::forId($accountId);
        
        $this->assertInstanceOf(Association::class, $association);
        $this->assertSame($accountId, $association->getId());
    }

    public function testAssociationPointsToSameAggregate(): void
    {
        $accountId = new AccountId('ACC-123');
        $account = new Account($accountId);
        
        $association1 = SimpleAssociation::forAggregate($account);
        $association2 = SimpleAssociation::forId($accountId);
        
        $this->assertTrue($association1->pointsToSameAggregateAs($association2));
    }

    public function testAssociationPointsToIdentifier(): void
    {
        $accountId = new AccountId('ACC-123');
        $account = new Account($accountId);
        
        $association = SimpleAssociation::forAggregate($account);
        
        $this->assertTrue($association->pointsTo($accountId));
    }

    public function testAssociationPointsToAggregate(): void
    {
        $accountId = new AccountId('ACC-123');
        $account = new Account($accountId);
        
        $association = SimpleAssociation::forAggregate($account);
        
        $this->assertTrue($association->pointsToAggregate($account));
    }

    public function testAssociationToString(): void
    {
        $accountId = new AccountId('ACC-123');
        
        $association = SimpleAssociation::forId($accountId);
        
        $this->assertEquals('ACC-123', (string) $association);
    }

    public function testAssociationDoesNotPointToDifferentAggregate(): void
    {
        $accountId1 = new AccountId('ACC-123');
        $accountId2 = new AccountId('ACC-456');
        $account1 = new Account($accountId1);
        $account2 = new Account($accountId2);
        
        $association = SimpleAssociation::forAggregate($account1);
        
        $this->assertFalse($association->pointsToAggregate($account2));
        $this->assertFalse($association->pointsTo($accountId2));
    }

    public function testAssociationDoesNotPointToSameAggregateForDifferentIds(): void
    {
        $accountId1 = new AccountId('ACC-123');
        $accountId2 = new AccountId('ACC-456');
        
        $association1 = SimpleAssociation::forId($accountId1);
        $association2 = SimpleAssociation::forId($accountId2);
        
        $this->assertFalse($association1->pointsToSameAggregateAs($association2));
    }
}
// phpcs:enable
