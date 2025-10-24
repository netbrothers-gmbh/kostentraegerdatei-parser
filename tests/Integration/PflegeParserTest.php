<?php

declare(strict_types=1);

namespace NetBrothers\KostentraegerParser\Tests\Integration;

use NetBrothers\KostentraegerParser\PflegeParser;
use NetBrothers\KostentraegerParser\Shared\Renderer\ConsoleRenderer;
use PHPUnit\Framework\TestCase;

/**
 * @author Thilo Ratnaweera <thilo.ratnaweera@netbrothers.de>
 * @copyright © 2025 NetBrothers GmbH.
 * @license All rights reserved.
 */
final class PflegeParserTest extends TestCase
{
	public function testParseBkkAgainstGolden(): void
	{
		// prepare dependencies
		$parser = new PflegeParser();
		$renderer = new ConsoleRenderer();

		// prepare input and output files
		$fixture = __DIR__ . '/../fixtures/integration/BK06Q325.ke0';
		$golden = __DIR__ . '/../fixtures/golden/BK06Q325_104027544.golden';
		$this->assertFileExists($fixture, 'Input fixture is missing: ' . $fixture);
		$this->assertFileExists($golden, 'Output fixture is missing: ' . $golden);

		// perform the test
		$parser->parseFile($fixture);
		$institutions = $parser->getInstitutions();
		$output = $renderer->render($institutions['104027544']);
		$this->assertStringEqualsFile($golden, $output);
	}
}
