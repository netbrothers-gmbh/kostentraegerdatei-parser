<?php

declare(strict_types=1);

namespace NetBrothers\KostentraegerParser\Shared\Enum;

/**
 * @author Thilo Ratnaweera <thilo.ratnaweera@netbrothers.de>
 * @copyright © 2025 NetBrothers GmbH.
 * @license All rights reserved.
 */
enum DfueProtokollEnum: string
{
	/**
	 * This value is not documented, neither for Pflege- nor for Sonstige
	 * Leistungserbringer, but it is in fact used as a key for X.400 (Message
	 * Handling System, a non-internet e-mail protocol) values.
	 */
	case X400 = '004';

	/**
	 * This value is not documented, neither for Pflege- nor for Sonstige
	 * Leistungserbringer, but it is in fact used as a key for ISDN phone number
	 * values.
	 */
	case ISDN = '011';

	/**
	 * @see Technische Anlage 1 - Anhang 5 (Version 5.1) [SGB XI]
	 * @see Anlage 1 - Anhang 3 vom 23.05.2023 [SGB V]
	 */
	case FTAM_INTERNET = '016';

	/**
	 * @see Technische Anlage 1 - Anhang 5 (Version 5.1)
	 * @see Anlage 1 - Anhang 3 vom 23.05.2023 [SGB V]
	 */
	case SMTP_E_MAIL = '070';

	/**
	 * @see Technische Anlage 1 - Anhang 5 (Version 5.1)
	 */
	case SMTP_KIM_MAIL = '080';
}
