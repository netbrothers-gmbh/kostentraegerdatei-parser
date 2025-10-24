<?php

declare(strict_types=1);

namespace NetBrothers\KostentraegerParser\Helper;

/**
 * @author Thilo Ratnaweera <thilo.ratnaweera@netbrothers.de>
 * @copyright © 2025 NetBrothers GmbH.
 * @license All rights reserved.
 */
final class StringHelper
{
	/**
	 * Normalise whitespace in a string: replace any run of whitespace
	 * characters (including newlines and tabs) with a single ASCII space.
	 */
	public static function normaliseWhitespace(string|\Stringable|null $input): string
	{
		return $input
			? trim(preg_replace('/\s+/', ' ', '' . $input)) // @phpstan-ignore argument.type
			: '';
	}

	public static function indent(
		string|\Stringable|null $input,
		string $prefix = '',
		int $indent = 4,
		string $linebreakDelimiter = "\n",
	): string {
		// if input is empty, return an empty string
		if (empty($input)) {
			return '';
		}
		// if the delimiter is empty, disregard line breaks
		if (empty($linebreakDelimiter)) {
			return str_repeat(' ', $indent) . $prefix . $input;
		}
		// indent and prefix each line
		$lines = \explode($linebreakDelimiter, '' . $input);
		$buff = '';
		foreach ($lines as $oneLine) {
			$buff .= str_repeat(' ', $indent) . $prefix . $oneLine . $linebreakDelimiter;
		}
		return \rtrim($buff, $linebreakDelimiter);
	}
}
