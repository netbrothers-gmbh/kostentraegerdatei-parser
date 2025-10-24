<?php

declare(strict_types=1);

namespace NetBrothers\KostentraegerParser\Shared\Enum;

/**
 * @author Thilo Ratnaweera <thilo.ratnaweera@netbrothers.de>
 * @copyright © 2025 NetBrothers GmbH.
 * @license All rights reserved.
 */
enum VerknuepfungEnum: string
{
	case KOSTENTRAEGER = '01';
	case DATENANNAHMESTELLE_OHNE_ENTSCHLUESSELUNGSBEFUGNIS = '02';
	case DATENANNAHMESTELLE_MIT_ENTSCHLUESSELUNGSBEFUGNIS = '03';
	case PAPIERANNAHMESTELLE = '09';
}
