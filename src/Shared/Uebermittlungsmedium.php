<?php

declare(strict_types=1);

namespace NetBrothers\KostentraegerParser\Shared;

use NetBrothers\KostentraegerParser\Shared\Enum\UebermittlungsmediumEnum;
use NetBrothers\KostentraegerParser\Shared\Enum\UebermittlungszeichensatzEnum;

/**
 * @author Thilo Ratnaweera <thilo.ratnaweera@netbrothers.de>
 * @copyright © 2025 NetBrothers GmbH.
 * @license All rights reserved.
 */
final class Uebermittlungsmedium implements \Stringable
{
	public function __construct(
		public UebermittlungsmediumEnum $art,
		public UebermittlungszeichensatzEnum $zeichensatz,
	) {
	}

	public function __toString(): string
	{
		return \sprintf(
			'💾 %s %s',
			\strtolower($this->art->name),
			\strtolower($this->zeichensatz->name)
		);
	}
}
