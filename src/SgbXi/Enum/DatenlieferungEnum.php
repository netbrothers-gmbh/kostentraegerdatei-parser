<?php

declare(strict_types=1);

namespace NetBrothers\KostentraegerParser\SgbXi\Enum;

/**
 * @author Thilo Ratnaweera <thilo.ratnaweera@netbrothers.de>
 * @copyright © 2025 NetBrothers GmbH.
 * @license All rights reserved.
 */
enum DatenlieferungEnum: string
{
	case DIGITALISIERTE_ABRECHNUNGSDATEN = '07';
	case PAPIERRECHNUNG = '21';
	case MASCHINENLESBARE_BELEGE = '24';
	case VERORDNUNG = '26';
	case URBELEGE = '28';
	case MASCHINENLESBARE_BELEGE_UND_URBELEGE = '29';
	case VOLLELEKTRONISCHE_ABRECHNUNG = '30';
}
