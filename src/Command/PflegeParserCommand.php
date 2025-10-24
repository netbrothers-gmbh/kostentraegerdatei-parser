<?php

declare(strict_types=1);

namespace NetBrothers\KostentraegerParser\Command;

use NetBrothers\KostentraegerParser\PflegeParser;
use NetBrothers\KostentraegerParser\Shared\Renderer\ConsoleRenderer;
use Symfony\Component\Console\Attribute\AsCommand;

/**
 * @author Thilo Ratnaweera <thilo.ratnaweera@netbrothers.de>
 * @copyright © 2025 NetBrothers GmbH.
 * @license All rights reserved.
 */
#[AsCommand(
	name: 'netbrothers:kostentraeger-pflege',
	description: 'Parser for GKV Kostenträgerdateien Pflege-Leistungserbringer SGB XI'
)]
final class PflegeParserCommand extends AbstractParserCommand
{
	public function __construct()
	{
		parent::__construct();
		$this->parser = new PflegeParser();
		$this->renderer = new ConsoleRenderer();
	}
}
