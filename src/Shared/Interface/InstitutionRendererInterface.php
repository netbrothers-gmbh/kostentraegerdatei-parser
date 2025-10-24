<?php

declare(strict_types=1);

namespace NetBrothers\KostentraegerParser\Shared\Interface;

/**
 * @author Thilo Ratnaweera <thilo.ratnaweera@netbrothers.de>
 * @copyright © 2025 NetBrothers GmbH.
 * @license All rights reserved.
 */
interface InstitutionRendererInterface
{
	/**
	 * @return string a string representation of the given institution
	 */
	public function render(InstitutionInterface $institution): string;
}
