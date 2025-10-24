<?php

declare(strict_types=1);

namespace NetBrothers\KostentraegerParser;

use EDI\Parser;
use NetBrothers\KostentraegerParser\Exception\FileNotReadableException;
use NetBrothers\KostentraegerParser\Exception\ParseException;
use NetBrothers\KostentraegerParser\Shared\Interface\InstitutionInterface;

/**
 * @author Thilo Ratnaweera <thilo.ratnaweera@netbrothers.de>
 * @copyright © 2025 NetBrothers GmbH.
 * @license All rights reserved.
 */
abstract class AbstractParser
{
	protected Parser $ediParser;

	/** @var array<string, InstitutionInterface> */
	protected array $institutions = [];

	/** @var string[][] */
	protected array $segments = [];

	public function __construct()
	{
		$this->ediParser = new Parser();
	}

	/**
	 * @return InstitutionInterface[]
	 */
	public function getInstitutions(): array
	{
		return $this->institutions;
	}

	public function parseFile(
		string $pathToKostentraegerDatei,
		string $encoding = 'UTF-8',
	): void {
		$this->reset();
		$this->loadFile($pathToKostentraegerDatei);
		$this->parseSegments($encoding);
		$this->parseInstitutions();
		$this->parseAssociations();
	}

	protected function assertNoDuplicate(string $ikNumber): void
	{
		if (array_key_exists($ikNumber, $this->institutions)) {
			throw new ParseException(sprintf(
				'Multiple IDK segments for IK number "%s".',
				$ikNumber
			));
		}
	}

	protected function loadFile(string $pathToKostentraegerDatei): void
	{
		if (!is_readable($pathToKostentraegerDatei)) {
			throw new FileNotReadableException(sprintf(
				'File "%s" is not readable.',
				$pathToKostentraegerDatei
			));
		}
		try {
			$this->ediParser->load($pathToKostentraegerDatei);
		} catch (\Throwable $t) {
			throw new ParseException(sprintf(
				'The file "%s" is not parseable and might be corrupt.',
				$pathToKostentraegerDatei
			));
		}
	}

	abstract protected function parseAssociations(): void;

	abstract protected function parseInstitutions(): void;

	protected function parseSegments(string $encoding): void
	{
		$this->segments = $this->ediParser->get($encoding); // @phpstan-ignore assign.propertyType
		if (count($errors = $this->ediParser->errors()) > 0) {
			throw new ParseException(sprintf(
				'Errors occured during parsing of EDI file: %s',
				json_encode($errors),
			));
		}
	}

	protected function reset(): void
	{
		$this->institutions = [];
		$this->segments = [];
	}
}
