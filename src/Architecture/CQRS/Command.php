<?php

declare(strict_types=1);

namespace PHPMolecules\Architecture\CQRS;

use Attribute;

/**
 * Identifies a command in the context of CQRS, i.e. a request to the system for the change of data. Commands are always
 * in imperative tense and thus, unlike an event, do not state that something has already happened, but something is
 * requested to happen. With that, the {@link CommandHandler} which is processing the command has the option reject the
 * command.
 *
 * @author Christian Stettler
 * @author Henning Schwentner
 * @author Stephan Pirnbaum
 * @author Martin Schimak
 * @author Oliver Drotbohm
 * @link http://cqrs.files.wordpress.com/2010/11/cqrs_documents.pdf CQRS Documents by Greg Young - Commands
 */
#[Attribute(Attribute::TARGET_CLASS)]
class Command
{
    public function __construct(
        public string $namespace = '',
        public string $name = ''
    ) {
    }
}
