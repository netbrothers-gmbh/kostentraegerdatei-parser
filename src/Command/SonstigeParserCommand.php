<?php

declare(strict_types=1);

namespace NetBrothers\KostentraegerParser\Command;

use NetBrothers\KostentraegerParser\Shared\Renderer\ConsoleRenderer;
use NetBrothers\KostentraegerParser\SonstigeParser;
use Symfony\Component\Console\Attribute\AsCommand;

/**
 * @author Thilo Ratnaweera <thilo.ratnaweera@netbrothers.de>
 * @copyright © 2025 NetBrothers GmbH.
 * @license All rights reserved.
 */
#[AsCommand(
	name: 'netbrothers:kostentraeger-sonstige',
	description: 'Parser for GKV Kostenträgerdateien Sonstige Leistungserbringer SGB V'
)]
final class SonstigeParserCommand extends AbstractParserCommand
{
	public function __construct()
	{
		parent::__construct();
		$this->parser = new SonstigeParser();
		$this->renderer = new ConsoleRenderer();
	}
}
