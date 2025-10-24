<?php

declare(strict_types=1);

namespace NetBrothers\KostentraegerParser\Command;

use NetBrothers\KostentraegerParser\PflegeParser;
use NetBrothers\KostentraegerParser\Shared\Renderer\ConsoleRenderer;
use NetBrothers\KostentraegerParser\SonstigeParser;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

/**
 * @author Thilo Ratnaweera <thilo.ratnaweera@netbrothers.de>
 * @copyright © 2025 NetBrothers GmbH.
 * @license All rights reserved.
 */
abstract class AbstractParserCommand extends Command
{
	protected ConsoleRenderer $renderer;
	protected PflegeParser|SonstigeParser $parser;

	protected function configure()
	{
		$this->addArgument(
			'filePath',
			InputArgument::REQUIRED,
			'Path to a Kostenträgerdatei file, e.g. named AO05Q425.ke0, AO06Q425.ke0 or similar.'
		);
		$this->addArgument(
			'ikNumber',
			InputArgument::REQUIRED,
			'Institutskennzeichen ("IK-Nummer") of the entity which should be printed (e.g. "123456789"). Use "all" to print the parsed contents of the whole file.'
		);
		$this->addOption(
			'cost-bearer',
			'c',
			InputOption::VALUE_NONE,
			'If used, only the cost bearer (Kostenträger) of the given entity will be printed, if available.'
		);
	}

	protected function execute(InputInterface $input, OutputInterface $output): int
	{
		$io = new SymfonyStyle($input, $output);
		$filePath = $input->getArgument('filePath');
		if (!\is_string($filePath)) {
			throw new \RuntimeException('65fa7f9e-83b1-4bc2-9278-11b2786264ae');
		}
		$this->parser->parseFile($filePath);
		$institutions = $this->parser->getInstitutions();
		$ikNumber = $input->getArgument('ikNumber');
		if (!\is_string($ikNumber)) {
			throw new \RuntimeException('c70d8a01-5462-40f0-ab03-2d4de0846682');
		}
		if (\trim(\strtolower($ikNumber)) === 'all') {
			foreach ($institutions as $oneInstitution) {
				echo $this->renderer->render($oneInstitution);
			}
			return Command::SUCCESS;
		}
		if (empty($institutions[$ikNumber])) {
			$io->error(\sprintf(
				'Entity with IK number "%s" is not contained in the file "%s". Are you parsing the right Kostenträgerdatei?',
				$ikNumber,
				$filePath
			));
			return Command::INVALID;
		}
		if ($input->getOption('cost-bearer')) {
			foreach ($institutions[$ikNumber]->getCostBearers() as $oneCostBearer) {
				echo $this->renderer->render($oneCostBearer->getPartner());
			}
			return Command::SUCCESS;
		}
		echo $this->renderer->render($institutions[$ikNumber]);
		return Command::SUCCESS;
	}
}
