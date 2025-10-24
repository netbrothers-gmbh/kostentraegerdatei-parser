<?php

declare(strict_types=1);

namespace NetBrothers\KostentraegerParser\Shared\Enum;

/**
 * @author Thilo Ratnaweera <thilo.ratnaweera@netbrothers.de>
 * @copyright © 2025 NetBrothers GmbH.
 * @license All rights reserved.
 */
enum AnschriftEnum: string
{
	case HAUSANSCHRIFT = '1';
	case POSTFACHANSCHRIFT = '2';
	case GROSSKUNDENANSCHRIFT = '3';
}
