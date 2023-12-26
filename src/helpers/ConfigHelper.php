<?php declare(strict_types=1);

namespace VendorName\Example1\Src\Helpers;

use VendorName\Example1\Src\Models\ConfigModel;

class ConfigHelper
{
    protected static ConfigModel $config;

    protected static function loadConfig(): void
    {
        if (!isset(self::$config)) {
            self::$config = new ConfigModel();
        }
    }

    public static function isEnable(): bool
    {
        self::loadConfig();

        return self::$config->isEnable();
    }
}