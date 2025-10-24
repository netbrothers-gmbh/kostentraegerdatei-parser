<?php

declare(strict_types=1);

namespace NetBrothers\KostentraegerParser\Shared\Interface;

use NetBrothers\KostentraegerParser\Shared\AbstractVerknuepfung;
use NetBrothers\KostentraegerParser\Shared\Anschrift;
use NetBrothers\KostentraegerParser\Shared\Ansprechpartner;
use NetBrothers\KostentraegerParser\Shared\Datenfernuebertragung;
use NetBrothers\KostentraegerParser\Shared\Uebermittlungsmedium;

/**
 * @author Thilo Ratnaweera <thilo.ratnaweera@netbrothers.de>
 * @copyright © 2025 NetBrothers GmbH.
 * @license All rights reserved.
 */
interface InstitutionInterface extends \Stringable
{
	public function addAddress(Anschrift $address): void;

	public function addContact(Ansprechpartner $contact): void;

	public function addRemoteDataTransmission(Datenfernuebertragung $transmission): void;

	public function addTransmissionMedium(Uebermittlungsmedium $medium): void;

	public function associate(AbstractVerknuepfung $association): void;

	public function getIkNumber(): string;

	public function humanReadable(string $icon = '🏢'): string;

	/**
	 * @return Anschrift[]
	 */
	public function getAddresses(): array;

	/**
	 * @return AbstractVerknuepfung[]
	 */
	public function getAssociations(): array;

	/**
	 * @return Ansprechpartner[]
	 */
	public function getContacts(): array;

	/**
	 * @return AbstractVerknuepfung[]
	 */
	public function getCostBearers(): array;

	/**
	 * @return Datenfernuebertragung[]
	 */
	public function getRemoteDataTransmissions(): array;

	/**
	 * @return Uebermittlungsmedium[]
	 */
	public function getTransmissionMedia(): array;

	/**
	 * @param string[] $longName
	 */
	public function setLongName(array $longName): void;
}
