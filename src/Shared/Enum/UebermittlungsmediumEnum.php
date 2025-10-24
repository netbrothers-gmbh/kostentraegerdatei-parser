<?php

declare(strict_types=1);

namespace NetBrothers\KostentraegerParser\Shared\Enum;

/**
 * @author Thilo Ratnaweera <thilo.ratnaweera@netbrothers.de>
 * @copyright © 2025 NetBrothers GmbH.
 * @license All rights reserved.
 */
enum UebermittlungsmediumEnum: string
{
	case DFUE = '1';
	case MAGNETBAND = '2';
	case MAGNETBANDKASSETTE = '3';
	case DISKETTE = '4';
	case MASCHINENLESBARER_BELEG = '5';
	case NICHT_MASCHINENLESBARER_BELEG = '6';
	case CD_ROM = '7';
	case ALLE_DATENTRAEGER = '9';
}
