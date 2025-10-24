<?php

declare(strict_types=1);

namespace NetBrothers\KostentraegerParser\Shared;

use NetBrothers\KostentraegerParser\Helper\StringHelper;

/**
 * @author Thilo Ratnaweera <thilo.ratnaweera@netbrothers.de>
 * @copyright © 2025 NetBrothers GmbH.
 * @license All rights reserved.
 */
final class Ansprechpartner implements \Stringable
{
	public function __construct(
		public readonly ?string $telefon,
		public readonly ?string $fax,
		public readonly ?string $name,
		public readonly ?string $arbeitsgebiet,
	) {
	}

	public function __toString(): string
	{
		return StringHelper::normaliseWhitespace(\sprintf(
			'🧑 %s %s %s %s',
			$this->name ?? '',
			$this->telefon ?? '',
			$this->fax ?? '',
			$this->arbeitsgebiet ?? '',
		));
	}
}
