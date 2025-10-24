<?php

declare(strict_types=1);

/**
 * Project: kostentraegerdatei-parser
 *
 * @author Thilo Ratnaweera <thilo.ratnaweera@netbrothers.de>
 * @copyright 2025 NetBrothers GmbH
 * @license All rights reserved.
 */

namespace NetBrothers\KostentraegerParser\Shared;

use NetBrothers\KostentraegerParser\Helper\StringHelper;
use NetBrothers\KostentraegerParser\Shared\Enum\VerknuepfungEnum;
use NetBrothers\KostentraegerParser\Shared\Interface\InstitutionInterface;

abstract class AbstractInstitution implements \Stringable, InstitutionInterface
{
	/**
	 * @param Anschrift[] $addresses
	 * @param AbstractVerknuepfung[] $associations
	 * @param Ansprechpartner[] $contacts
	 * @param string[] $longName
	 * @param Datenfernuebertragung[] $remoteDataTransmissions
	 * @param Uebermittlungsmedium[] $transmissionMedia
	 */
	public function __construct(
		public readonly string $ikNumber,
		public readonly string $name,
		public array $addresses = [],
		public array $associations = [],
		public array $contacts = [],
		public array $longName = [],
		public array $remoteDataTransmissions = [],
		public array $transmissionMedia = [],
	) {
	}

	public function addAddress(Anschrift $address): void
	{
		$this->addresses[] = $address;
	}

	public function addContact(Ansprechpartner $contact): void
	{
		$this->contacts[] = $contact;
	}

	public function addRemoteDataTransmission(Datenfernuebertragung $transmission): void
	{
		$this->remoteDataTransmissions[] = $transmission;
	}

	public function addTransmissionMedium(Uebermittlungsmedium $medium): void
	{
		$this->transmissionMedia[] = $medium;
	}

	public function associate(AbstractVerknuepfung $association): void
	{
		$this->associations[] = $association;
	}

	public function getAddresses(): array
	{
		return $this->addresses;
	}

	public function getAssociations(): array
	{
		return $this->associations;
	}

	public function getContacts(): array
	{
		return $this->contacts;
	}

	public function getCostBearers(): array
	{
		return \array_filter(
			$this->associations,
			function ($assoc) {
				return $assoc->getArt() === VerknuepfungEnum::KOSTENTRAEGER
					&& $assoc->getPartner()->getIkNumber() !== $this->getIkNumber();
			}
		);
	}

	public function getIkNumber(): string
	{
		return $this->ikNumber;
	}

	public function getRemoteDataTransmissions(): array
	{
		return $this->remoteDataTransmissions;
	}

	public function getTransmissionMedia(): array
	{
		return $this->transmissionMedia;
	}

	private function getLongName(): string
	{
		return StringHelper::normaliseWhitespace(\implode(' ', $this->longName));
	}

	/**
	 * @param string[] $longName
	 */
	public function setLongName(array $longName): void
	{
		$this->longName = $longName;
	}

	public function humanReadable(string $icon = '🏢'): string
	{
		return StringHelper::normaliseWhitespace(\sprintf(
			$icon . ' %s %s %s',
			$this->ikNumber,
			$this->name,
			$this->getLongName() !== $this->name
				? \sprintf('[%s]', $this->getLongName())
				: ''
		));
	}

	public function __toString(): string
	{
		return $this->humanReadable();
	}
}
