<?php

declare(strict_types=1);

return (new PhpCsFixer\Config())
    ->setRules([
        '@PSR12' => true,
        '@PSR12:risky' => true,
        '@PhpCsFixer' => true,
        '@PhpCsFixer:risky' => true,
        '@PHP80Migration' => true,
        '@PHP80Migration:risky' => true,
        'final_internal_class' => false,
        'ordered_class_elements' => [
            'sort_algorithm' => 'alpha',
        ],
    ])
    ->setFinder(
        PhpCsFixer\Finder::create()
            ->in(__DIR__.'/src')
    )
;
