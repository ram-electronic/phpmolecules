<?php

declare(strict_types=1);

namespace PHPMolecules\Architecture\CQRS;

use Attribute;

/**
 * Identifies a command dispatcher in the context of CQRS, i.e. logic to dispatch a {@link Command}.
 *
 * @author Christian Stettler
 * @author Henning Schwentner
 * @author Stephan Pirnbaum
 * @author Martin Schimak
 * @author Oliver Drotbohm
 * @link http://cqrs.files.wordpress.com/2010/11/cqrs_documents.pdf CQRS Documents by Greg Young - Commands
 */
#[Attribute(Attribute::TARGET_METHOD)]
class CommandDispatcher
{
    public function __construct(
        public string $dispatches = ''
    ) {
    }
}
