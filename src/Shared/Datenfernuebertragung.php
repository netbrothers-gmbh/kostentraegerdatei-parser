<?php

declare(strict_types=1);

namespace NetBrothers\KostentraegerParser\Shared;

use NetBrothers\KostentraegerParser\Helper\StringHelper;
use NetBrothers\KostentraegerParser\Shared\Enum\DfueProtokollEnum;

/**
 * @author Thilo Ratnaweera <thilo.ratnaweera@netbrothers.de>
 * @copyright © 2025 NetBrothers GmbH.
 * @license All rights reserved.
 */
final class Datenfernuebertragung implements \Stringable
{
	public function __construct(
		public readonly DfueProtokollEnum $protokol,
		public ?string $benutzerkennung,
		public string $kommunikationskanal,
	) {
	}

	public function __toString(): string
	{
		return StringHelper::normaliseWhitespace(\sprintf(
			'📨 %s %s %s',
			\strtolower($this->protokol->name),
			\strtolower($this->benutzerkennung ?? ''),
			\strtolower($this->kommunikationskanal),
		));
	}
}
