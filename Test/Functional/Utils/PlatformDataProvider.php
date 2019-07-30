<?php
declare(strict_types=1);

namespace Frontender\FunctionalTesting\Test\Functional\Utils;

/**
 * Class PlatformDataProvider
 * @package Frontender\FunctionalTesting\Test\Functional\Utils
 */
class PlatformDataProvider
{
    /**
     * @return string[]
     */
    public function getData(): array
    {
        return [
            ['https://development.getfrontender.brickson.kitchen.local', 'development'],
            ['https://staging.getfrontender.brickson.kitchen.local', 'staging']

        ];
    }
}
