<?php

declare(strict_types=1);

namespace NetBrothers\KostentraegerParser\Tests\Unit\Helper;

use NetBrothers\KostentraegerParser\Helper\StringHelper;
use PHPUnit\Framework\TestCase;

final class StringHelperTest extends TestCase
{
	public function testNormaliseWhitespaceCollapsesAndTrims(): void
	{
		$input = "  foo\tbar \n baz  \n\nqux ";
		$expected = 'foo bar baz qux';

		$this->assertSame($expected, StringHelper::normaliseWhitespace($input));
	}

	public function testNormaliseWhitespaceNullReturnsEmptyString(): void
	{
		$this->assertSame('', StringHelper::normaliseWhitespace(null));
	}

	public function testIndentEmptyInputReturnsEmpty(): void
	{
		$this->assertSame('', StringHelper::indent(''));
		$this->assertSame('', StringHelper::indent(null));
	}

	public function testIndentSingleLineUsesDefaultIndent(): void
	{
		$this->assertSame('    hello', StringHelper::indent('hello'));
	}

	public function testIndentMultilineWithPrefixAndIndent(): void
	{
		$input = "one\ntwo\nthree";
		$expected = '  -> one' . "\n" . '  -> two' . "\n" . '  -> three';

		$this->assertSame($expected, StringHelper::indent($input, '-> ', 2));
	}

	public function testIndentWithEmptyDelimiterDoesNotSplit(): void
	{
		$this->assertSame('  # a b', StringHelper::indent('a b', '# ', 2, ''));
	}
}
