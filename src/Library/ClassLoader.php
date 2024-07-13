<?php

declare(strict_types=1);

namespace Gubee\SDK\Library;

use function dirname;

use const PHP_MAJOR_VERSION;

class ClassLoader extends \Composer\Autoload\ClassLoader
{
    /**
     * @param ?string $vendorDir
     */
    public function __construct($vendorDir = null)
    {
        if (PHP_MAJOR_VERSION == 7) {
            $this->addPsr4(
                "Gubee\SDK\Enum\\",
                dirname(
                    dirname(__DIR__)
                ) . "/src/Enum/PHP7"
            );
        } else {
            $this->addPsr4(
                "Gubee\SDK\Enum\\",
                dirname(
                    dirname(__DIR__)
                ) . "/src/Enum/PHP8"
            );
        }
        parent::__construct($vendorDir);
    }
}
