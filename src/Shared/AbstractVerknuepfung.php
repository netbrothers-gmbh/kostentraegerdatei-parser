<?php

declare(strict_types=1);

namespace NetBrothers\KostentraegerParser\Shared;

use NetBrothers\KostentraegerParser\Shared\Enum\VerknuepfungEnum;
use NetBrothers\KostentraegerParser\Shared\Interface\InstitutionInterface;

/**
 * @author Thilo Ratnaweera <thilo.ratnaweera@netbrothers.de>
 * @copyright © 2025 NetBrothers GmbH.
 * @license All rights reserved.
 */
abstract class AbstractVerknuepfung implements \Stringable
{
	abstract public function getArt(): VerknuepfungEnum;

	abstract public function getPartner(): InstitutionInterface;
}
