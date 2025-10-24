<?php

declare(strict_types=1);

/**
 * Project: kostentraegerdatei-parser
 *
 * @author Thilo Ratnaweera <thilo.ratnaweera@netbrothers.de>
 * @copyright 2025 NetBrothers GmbH
 * @license All rights reserved.
 */

namespace NetBrothers\KostentraegerParser\SgbV;

use NetBrothers\KostentraegerParser\Helper\StringHelper;
use NetBrothers\KostentraegerParser\SgbV\Enum\AbrechnungscodeEnum;
use NetBrothers\KostentraegerParser\SgbV\Enum\DatenlieferungEnum;
use NetBrothers\KostentraegerParser\SgbV\Enum\KvBezirkEnum;
use NetBrothers\KostentraegerParser\SgbV\Enum\LeistungserbringergruppeEnum;
use NetBrothers\KostentraegerParser\SgbV\Enum\TarifkennzeichenTarifbereichEnum;
use NetBrothers\KostentraegerParser\Shared\AbstractVerknuepfung;
use NetBrothers\KostentraegerParser\Shared\Enum\BundeslandEnum;
use NetBrothers\KostentraegerParser\Shared\Enum\UebermittlungsmediumEnum;
use NetBrothers\KostentraegerParser\Shared\Enum\VerknuepfungEnum;
use NetBrothers\KostentraegerParser\Shared\Interface\InstitutionInterface;

final class Verknuepfung extends AbstractVerknuepfung implements \Stringable
{
	/**
	 * @param string|null $sondertarif 000 - 090, A00 - A90: ohne Besonderheiten; 091 - 098, A91 - A98, U00 - ZZZ: nicht besetzt (wird von den Verbänden der Krankenkassen auf Bundesebene belegt)
	 */
	public function __construct(
		public readonly VerknuepfungEnum $art,
		public readonly InstitutionInterface $partner,
		public readonly ?LeistungserbringergruppeEnum $leistungserbringergruppe,
		public readonly ?InstitutionInterface $abrechnungsstelle,
		public readonly ?DatenlieferungEnum $datenart,
		public readonly ?UebermittlungsmediumEnum $medium,
		public readonly ?BundeslandEnum $leStandortBundesland,
		public readonly ?KvBezirkEnum $leStandortKvBezirk,
		public readonly ?AbrechnungscodeEnum $abrechnungscode,
		public readonly ?TarifkennzeichenTarifbereichEnum $tarifbereich,
		public readonly ?string $sondertarif,
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
		if ($this->abrechnungscode) {
			$features .= '🧩 ' . \strtolower($this->abrechnungscode->name) . "\n";
		}
		return $this->partner->humanReadable('🔗') . "\n" . StringHelper::indent(\trim($features));
	}
}
