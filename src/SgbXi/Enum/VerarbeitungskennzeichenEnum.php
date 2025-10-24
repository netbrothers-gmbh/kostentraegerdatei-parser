<?php

declare(strict_types=1);

namespace NetBrothers\KostentraegerParser\SgbXi\Enum;

/**
 * @author Thilo Ratnaweera <thilo.ratnaweera@netbrothers.de>
 * @copyright © 2025 NetBrothers GmbH.
 * @license All rights reserved.
 */
enum VerarbeitungskennzeichenEnum: string
{
	case NEUANMELDUNG = '01';
	case AENDERUNG = '02';
	case STORNIERUNG = '03';
	case UNVERAENDERT = '04';
}
