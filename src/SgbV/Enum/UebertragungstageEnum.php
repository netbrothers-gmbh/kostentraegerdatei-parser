<?php

declare(strict_types=1);

namespace NetBrothers\KostentraegerParser\SgbV\Enum;

/**
 * @author Thilo Ratnaweera <thilo.ratnaweera@netbrothers.de>
 * @copyright © 2025 NetBrothers GmbH.
 * @license All rights reserved.
 */
enum UebertragungstageEnum: string
{
	case ALLE_TAGE = '1';
	case WERKTAGE = '2';
	case ARBEITSTAGE = '3';
}
