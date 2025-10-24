<?php

declare(strict_types=1);

namespace NetBrothers\KostentraegerParser\Shared;

use NetBrothers\KostentraegerParser\Helper\StringHelper;
use NetBrothers\KostentraegerParser\Shared\Enum\AnschriftEnum;

/**
 * @author Thilo Ratnaweera <thilo.ratnaweera@netbrothers.de>
 * @copyright © 2025 NetBrothers GmbH.
 * @license All rights reserved.
 */
final class Anschrift implements \Stringable
{
	public function __construct(
		public readonly AnschriftEnum $art,
		public readonly string $plz,
		public readonly string $ort,
		public readonly ?string $strasseHausnummerPostfach,
	) {
	}

	public function __toString(): string
	{
		return StringHelper::normaliseWhitespace(\sprintf(
			'📍 %s %s %s',
			$this->strasseHausnummerPostfach ?? '',
			$this->plz,
			$this->ort,
		));
	}
}
