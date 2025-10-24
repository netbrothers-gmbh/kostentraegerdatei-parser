<?php

declare(strict_types=1);

/**
 * Project: kostentraegerdatei-parser
 *
 * @author Thilo Ratnaweera <thilo.ratnaweera@netbrothers.de>
 * @copyright 2025 NetBrothers GmbH
 * @license All rights reserved.
 */

namespace NetBrothers\KostentraegerParser;

use NetBrothers\KostentraegerParser\Exception\ParseException;
use NetBrothers\KostentraegerParser\SgbXi\Enum\DatenlieferungEnum;
use NetBrothers\KostentraegerParser\SgbXi\Enum\KvBezirkEnum;
use NetBrothers\KostentraegerParser\SgbXi\Enum\LeistungsartEnum;
use NetBrothers\KostentraegerParser\SgbXi\Enum\LeistungserbringergruppeEnum;
use NetBrothers\KostentraegerParser\SgbXi\Institution;
use NetBrothers\KostentraegerParser\SgbXi\Verknuepfung;
use NetBrothers\KostentraegerParser\Shared\Anschrift;
use NetBrothers\KostentraegerParser\Shared\Ansprechpartner;
use NetBrothers\KostentraegerParser\Shared\Datenfernuebertragung;
use NetBrothers\KostentraegerParser\Shared\Enum\AnschriftEnum;
use NetBrothers\KostentraegerParser\Shared\Enum\BundeslandEnum;
use NetBrothers\KostentraegerParser\Shared\Enum\DfueProtokollEnum;
use NetBrothers\KostentraegerParser\Shared\Enum\UebermittlungsmediumEnum;
use NetBrothers\KostentraegerParser\Shared\Enum\UebermittlungszeichensatzEnum;
use NetBrothers\KostentraegerParser\Shared\Enum\VerknuepfungEnum;
use NetBrothers\KostentraegerParser\Shared\Uebermittlungsmedium;

final class PflegeParser extends AbstractParser
{
	protected function parseAssociations(): void
	{
		$currentIkNumber = null;
		foreach ($this->segments as $segment) {
			$segmentId = $segment[0];
			if (!in_array($segmentId, ['IDK', 'VKG'])) {
				continue;
			}
			if ($segmentId === 'IDK') {
				$currentIkNumber = $segment[1];
				if (!array_key_exists($currentIkNumber, $this->institutions)) {
					throw new ParseException(sprintf(
						'IK number "%s" is missing in parsed institutions.',
						$currentIkNumber
					));
				}
				continue;
			}

			// At this point $segmentId must be 'VKG' by definition.
			$ikAbrechnungsstelle = $segment[4] ?? null;
			$this->institutions[$currentIkNumber]->associate(new Verknuepfung(
				VerknuepfungEnum::from($segment[1]),
				$this->institutions[$segment[2]],
				LeistungserbringergruppeEnum::tryFrom($segment[3] ?? ''),
				$ikAbrechnungsstelle
					? $this->institutions[$ikAbrechnungsstelle]
					: null,
				DatenlieferungEnum::tryFrom($segment[5] ?? ''),
				UebermittlungsmediumEnum::tryFrom($segment[6] ?? ''),
				BundeslandEnum::tryFrom($segment[7] ?? ''),
				KvBezirkEnum::tryFrom($segment[8] ?? ''),
				LeistungsartEnum::tryFrom($segment[9] ?? '')
			));
		}
	}

	protected function parseInstitutions(): void
	{
		$currentIk = null;

		foreach ($this->segments as $segment) {
			if ($segment[0] === 'IDK') {
				$ikNumber = $segment[1];
				$this->assertNoDuplicate($ikNumber);
				$this->institutions[$ikNumber] = new Institution($ikNumber, $segment[3]);
				$currentIk = $ikNumber;
				continue;
			}
			if ($segment[0] === 'NAM') {
				$this->institutions[$currentIk]->setLongName(\array_slice($segment, 2));
				continue;
			}
			if ($segment[0] === 'ANS') {
				$this->institutions[$currentIk]->addAddress(new Anschrift(
					AnschriftEnum::from($segment[1]),
					$segment[2],
					$segment[3],
					$segment[4] ?? null
				));
				continue;
			}
			if ($segment[0] === 'ASP') {
				$this->institutions[$currentIk]->addContact(new Ansprechpartner(
					$segment[2] ?? null,
					$segment[3] ?? null,
					$segment[4] ?? null,
					$segment[5] ?? null,
				));
				continue;
			}
			if ($segment[0] === 'DFU') {
				$this->institutions[$currentIk]->addRemoteDataTransmission(
					new Datenfernuebertragung(
						DfueProtokollEnum::from($segment[2]),
						$segment[3] ?? null,
						$segment[7]
					)
				);
				continue;
			}
			if ($segment[0] === 'UEM') {
				$this->institutions[$currentIk]->addTransmissionMedium(
					new Uebermittlungsmedium(
						UebermittlungsmediumEnum::from($segment[1]),
						UebermittlungszeichensatzEnum::from($segment[3]),
					)
				);
				continue;
			}
		}
	}
}
