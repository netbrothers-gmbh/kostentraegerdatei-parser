<?php

declare(strict_types=1);

namespace NetBrothers\KostentraegerParser\Shared\Enum;

/**
 * @author Thilo Ratnaweera <thilo.ratnaweera@netbrothers.de>
 * @copyright © 2025 NetBrothers GmbH.
 * @license All rights reserved.
 */
enum UebermittlungszeichensatzEnum: string
{
	case ISO_8859_1 = 'I1';
	case ISO_7_BIT = 'I7';
	case DIN_66303_ASCII_8_BIT = 'I8';
	case UTF_8 = 'U8';
	case ALLE_ZEICHENSAETZE = '99';
}
