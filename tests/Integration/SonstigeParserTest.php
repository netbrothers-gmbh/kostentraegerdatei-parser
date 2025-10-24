<?php

declare(strict_types=1);

namespace NetBrothers\KostentraegerParser\Tests\Integration;

use NetBrothers\KostentraegerParser\Shared\Renderer\ConsoleRenderer;
use NetBrothers\KostentraegerParser\SonstigeParser;
use PHPUnit\Framework\TestCase;

/**
 * @author Thilo Ratnaweera <thilo.ratnaweera@netbrothers.de>
 * @copyright © 2025 NetBrothers GmbH.
 * @license All rights reserved.
 */
final class SonstigeParserTest extends TestCase
{
	public function testParseErsatzkasseAgainstGolden(): void
	{
		// prepare dependencies
		$parser = new SonstigeParser();
		$renderer = new ConsoleRenderer();

		// prepare input and output files
		$fixture = __DIR__ . '/../fixtures/integration/EK05Q425.ke0';
		$golden = __DIR__ . '/../fixtures/golden/EK05Q425_101575519.golden';
		$this->assertFileExists($fixture, 'Input fixture is missing: ' . $fixture);
		$this->assertFileExists($golden, 'Output fixture is missing: ' . $golden);

		// perform the test
		$parser->parseFile($fixture);
		$institutions = $parser->getInstitutions();
		$output = $renderer->render($institutions['101575519']);
		$this->assertStringEqualsFile($golden, $output);
	}
}
