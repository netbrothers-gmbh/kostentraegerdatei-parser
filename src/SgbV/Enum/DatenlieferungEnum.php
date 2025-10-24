<?php

declare(strict_types=1);

namespace NetBrothers\KostentraegerParser\SgbV\Enum;

/**
 * @author Thilo Ratnaweera <thilo.ratnaweera@netbrothers.de>
 * @copyright © 2025 NetBrothers GmbH.
 * @license All rights reserved.
 */
enum DatenlieferungEnum: string
{
	case DIGITALISIERTE_ABRECHNUNGSDATEN = '07';
	case RECHNUNG_PAPIER = '21';
	case MASCHINENLESBARE_BELEGE = '24';
	case VERORDNUNG_PAPIER = '26';
	case KOSTENVORANSCHLAG_PAPIER = '27';
	case PAPIERGEBUNDENE_UNTERLAGEN_DIGITALE_ABRECHNUNG = '28';
	case MASCHINENLESBARE_BELEGE_UND_URBELEGE = '29';
}
