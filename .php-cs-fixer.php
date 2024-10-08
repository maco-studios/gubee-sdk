<?php

declare(strict_types=1);

use Ergebnis\License;
use PhpCsFixer\Config;
use PhpCsFixer\Finder;

$license = License\Type\MIT::text(
    __DIR__ . '/LICENSE',
    License\Range::since(
        License\Year::fromString('2024'),
        new DateTimeZone('UTC')
    ),
    License\Holder::fromString('MACO Studios'),
    License\Url::fromString('https://github.com/maco-studios/gubee-sdk')
);

$license->save();

$finder = Finder::create()->in(__DIR__);

return (new Config())
    ->setFinder($finder)
    ->setRules([
        'header_comment' => [
            'comment_type' => 'PHPDoc',
            'header' => $license->header(),
            'location' => 'after_declare_strict',
            'separate' => 'both',
        ],
    ]);