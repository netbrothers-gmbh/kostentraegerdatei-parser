<?php

declare(strict_types=1);

/**
 * Project: kostentraegerdatei-parser
 *
 * @author Thilo Ratnaweera <thilo.ratnaweera@netbrothers.de>
 * @copyright 2025 NetBrothers GmbH
 * @license All rights reserved.
 */

namespace NetBrothers\KostentraegerParser\SgbXi;

use NetBrothers\KostentraegerParser\Helper\StringHelper;
use NetBrothers\KostentraegerParser\SgbXi\Enum\DatenlieferungEnum;
use NetBrothers\KostentraegerParser\SgbXi\Enum\KvBezirkEnum;
use NetBrothers\KostentraegerParser\SgbXi\Enum\LeistungsartEnum;
use NetBrothers\KostentraegerParser\SgbXi\Enum\LeistungserbringergruppeEnum;
use NetBrothers\KostentraegerParser\Shared\AbstractVerknuepfung;
use NetBrothers\KostentraegerParser\Shared\Enum\BundeslandEnum;
use NetBrothers\KostentraegerParser\Shared\Enum\UebermittlungsmediumEnum;
use NetBrothers\KostentraegerParser\Shared\Enum\VerknuepfungEnum;
use NetBrothers\KostentraegerParser\Shared\Interface\InstitutionInterface;

final class Verknuepfung extends AbstractVerknuepfung implements \Stringable
{
	public function __construct(
		public readonly VerknuepfungEnum $art,
		public readonly InstitutionInterface $partner,
		public readonly ?LeistungserbringergruppeEnum $leistungserbringergruppe,
		public readonly ?InstitutionInterface $abrechnungsstelle,
		public readonly ?DatenlieferungEnum $datenart,
		public readonly ?UebermittlungsmediumEnum $medium,
		public readonly ?BundeslandEnum $leStandortBundesland,
		public readonly ?KvBezirkEnum $leStandortKvBezirk,
		public readonly ?LeistungsartEnum $leistungsart,
	) {
	}

	public function getArt(): VerknuepfungEnum
	{
		return $this->art;
	}

	public function getPartner(): InstitutionInterface
	{
		return $this->partner;
	}

	public function __toString(): string
	{
		$features = '🧩 ' . \strtolower($this->art->name) . "\n";
		if ($this->datenart) {
			$features .= '🧩 ' . \strtolower($this->datenart->name) . "\n";
		}
		if ($this->medium) {
			$features .= '🧩 ' . \strtolower($this->medium->name) . "\n";
		}
		if ($this->leStandortBundesland) {
			$features .= '🧩 ' . \strtolower($this->leStandortBundesland->name) . "\n";
		}
		if ($this->leStandortKvBezirk) {
			$features .= '🧩 ' . \strtolower($this->leStandortKvBezirk->name) . "\n";
		}
		if ($this->leistungsart) {
			$features .= '🧩 ' . \strtolower($this->leistungsart->name) . "\n";
		}
		return $this->partner->humanReadable('🔗') . "\n" . StringHelper::indent(\trim($features));
	}
}
