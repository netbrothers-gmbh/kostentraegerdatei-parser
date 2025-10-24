<?php

$finder = (new PhpCsFixer\Finder())
    ->in(__DIR__)
    ->exclude('ignore');

return (new PhpCsFixer\Config())
	->setParallelConfig(PhpCsFixer\Runner\Parallel\ParallelConfigFactory::detect())
    ->setRiskyAllowed(true)
    ->setRules([
        '@Symfony' => true, // https://cs.symfony.com/doc/ruleSets/Symfony.html
        'blank_line_after_opening_tag' => true, // https://cs.symfony.com/doc/rules/php_tag/blank_line_after_opening_tag.html
        'blank_line_before_statement' => false, // https://cs.symfony.com/doc/rules/whitespace/blank_line_before_statement.html
        'concat_space' => ['spacing' => 'one'], // https://cs.symfony.com/doc/rules/operator/concat_space.html
        'declare_strict_types' => true,
        'phpdoc_align' => false, // https://cs.symfony.com/doc/rules/phpdoc/phpdoc_align.html
        'phpdoc_separation' => false, // https://cs.symfony.com/doc/rules/phpdoc/phpdoc_separation.html
        'phpdoc_summary' => false, // https://cs.symfony.com/doc/rules/phpdoc/phpdoc_summary.html
		'single_line_throw' => false, // https://cs.symfony.com/doc/rules/function_notation/single_line_throw.html
        'yoda_style' => false, // https://cs.symfony.com/doc/rules/control_structure/yoda_style.html
    ])
    ->setFinder($finder)
	->setIndent("\t");
