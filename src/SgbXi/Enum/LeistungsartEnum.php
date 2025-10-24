<?php

declare(strict_types=1);

namespace NetBrothers\KostentraegerParser\SgbXi\Enum;

/**
 * @author Thilo Ratnaweera <thilo.ratnaweera@netbrothers.de>
 * @copyright © 2025 NetBrothers GmbH.
 * @license All rights reserved.
 */
enum LeistungsartEnum: string
{
	case ALLE_LEISTUNGSARTEN = '00';
	case SONDERSCHLUESSEL = '99';
	case AMBULANTE_PFLEGE = '01';
	case TAGESPFLEGE = '02';
	case NACHTPFLEGE = '03';
	case KURZZEITPFLEGE = '04';
	case VOLLSTATIONAERE_PFLEGE = '05';
	case PFLEGEHILFSMITTEL = '06';
	case VERHINDERUNGSPFLEGE = '07';
	case ZUSCHUSS_NACH_PAR_43_ABS_3_SGB_XI = '08';
	case BERATUNGSBESUCH = '09';
	case ENTLASTUNGSLEISTUNG_NACH_PAR_45B_SGB_XI = '10';
	case BERATUNGSGUTSCHEIN_NACH_PAR_7B_SGB_XI = '11';
	case WOHNGRUPPENZUSCHLAG_NACH_PAR_38A_SGB_XI = '12';
	case PFLEGEKURSE_NACH_PAR_45_SGB_XI = '13';
	case LEISTUNGEN_NACH_PAR_43B_SGB_XI = '14';
}
