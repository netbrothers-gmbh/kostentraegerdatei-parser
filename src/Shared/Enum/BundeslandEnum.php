<?php

declare(strict_types=1);

namespace NetBrothers\KostentraegerParser\Shared\Enum;

/**
 * @author Thilo Ratnaweera <thilo.ratnaweera@netbrothers.de>
 * @copyright © 2025 NetBrothers GmbH.
 * @license All rights reserved.
 */
enum BundeslandEnum: string
{
	case SCHLESWIG_HOLSTEIN = '01';
	case HAMBURG = '02';
	case NIEDERSACHSEN = '03';
	case BREMEN = '04';
	case NORDRHEIN_WESTFALEN = '05';
	case HESSEN = '06';
	case RHEINLAND_PFALZ = '07';
	case BADEN_WUERTTEMBERG = '08';
	case BAYERN = '09';
	case SAARLAND = '10';
	case BERLIN = '11';
	case BRANDENBURG = '12';
	case MECKLENBURG_VORPOMMERN = '13';
	case SACHSEN = '14';
	case SACHSEN_ANHALT = '15';
	case THUERINGEN = '16';
	case ALLE_BUNDESLAENDER = '99';
}
