<?php

declare(strict_types=1);

namespace Rhymix\Modules\Example1\Src\Models;

/**
 * Composer autoload
 *
 * 컴포저 패키지를 사용해야 한다면 아래 autoload.php 파일을 include 해야 한다.
 */
// include_once __DIR__ . '/../../vendor/autoload.php';

use ModuleController;
use ModuleModel;

/**
 * 디버그바 모듈의 설정을 다루는 모델
 */
class ConfigModel
{
    protected string $configKey = 'example1';

    /** @var object */
    protected object $config;

    /**
     * @var array<string, mixed>
     */
    protected array $defaultConfig = [
        'enable' => 'N',
    ];

    public function __construct()
    {
        $moduleConfig = ModuleModel::getModuleConfig($this->configKey);
        if (!is_object($moduleConfig)) {
            $moduleConfig = new \stdClass();
        }

        $this->config = $moduleConfig;
        $this->config->enable ??= $this->defaultConfig['enable'];

        if ($this->config->enable !== 'Y') {
            $this->config->enable = 'N';
        }
    }

    /**
     * 모듈 활성화 여부
     */
    public function isEnable(): bool
    {
        return ($this->config->enable ?? 'N') === 'Y';
    }

    /**
     * 모듈 활성화
     */
    public function enable(): void
    {
        $this->config->enable = 'Y';
    }

    /**
     * 모듈 비활성화
     */
    public function disable(): void
    {
        $this->config->enable = 'N';
    }

    /**
     * 설정 저장
     */
    public function save(): \BaseObject
    {
        $oModuleController = ModuleController::getInstance();
        $output = $oModuleController->insertModuleConfig($this->configKey, $this->config);

        return $output;
    }
}
