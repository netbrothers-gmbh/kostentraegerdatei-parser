<?php

declare(strict_types=1);

namespace NetBrothers\KostentraegerParser\Shared\Renderer;

use NetBrothers\KostentraegerParser\Helper\StringHelper;
use NetBrothers\KostentraegerParser\Shared\Interface\InstitutionInterface;
use NetBrothers\KostentraegerParser\Shared\Interface\InstitutionRendererInterface;

/**
 * @author Thilo Ratnaweera <thilo.ratnaweera@netbrothers.de>
 * @copyright © 2025 NetBrothers GmbH.
 * @license All rights reserved.
 */
final class ConsoleRenderer implements InstitutionRendererInterface
{
	public function render(InstitutionInterface $institution): string
	{
		$buff = $institution . PHP_EOL;
		foreach ($institution->getAddresses() as $address) {
			$buff .= StringHelper::indent($address) . PHP_EOL;
		}
		foreach ($institution->getContacts() as $contacts) {
			$buff .= StringHelper::indent($contacts) . PHP_EOL;
		}
		foreach ($institution->getRemoteDataTransmissions() as $remoteDataTransmission) {
			$buff .= StringHelper::indent($remoteDataTransmission) . PHP_EOL;
		}
		foreach ($institution->getTransmissionMedia() as $transmissionMedia) {
			$buff .= StringHelper::indent($transmissionMedia) . PHP_EOL;
		}
		foreach ($institution->getAssociations() as $associations) {
			$buff .= StringHelper::indent($associations) . PHP_EOL;
		}
		return $buff;
	}
}
