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
	case FTAM_INTERNET = '016';
	case SMTP_E_MAIL = '070';
	case SMTP_KIM_MAIL = '080';
}
