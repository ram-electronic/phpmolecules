<?php

declare(strict_types=1);

namespace PHPMolecules\Architecture\CQRS;

use Attribute;

/**
 * Identifies a command handler in the context of CQRS, i.e. logic to process a {@link Command}. The command handler may
 * or may not reject the command. In case of processing, the handler takes care of orchestrating the business logic
 * related to the command.
 *
 * @author Christian Stettler
 * @author Henning Schwentner
 * @author Stephan Pirnbaum
 * @author Martin Schimak
 * @author Oliver Drotbohm
 * @link http://cqrs.files.wordpress.com/2010/11/cqrs_documents.pdf CQRS Documents by Greg Young - Commands
 */
#[Attribute(Attribute::TARGET_METHOD)]
class CommandHandler
{
    public function __construct(
        public string $namespace = '',
        public string $name = ''
    ) {
    }
}
