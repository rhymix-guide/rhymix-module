<?php

declare(strict_types=1);

namespace VendorName\Example1\Src\Controllers;

use VendorName\Example1\Src\Models\ConfigModel;

class AdminController
{
    /**
     * 모듈의 설정 저장
     */
    public static function saveConfig(\stdClass $vars): \BaseObject
    {
        // 현재 설정 상태 불러오기
        $config = new ConfigModel();

        // 제출받은 데이터 불러오기
        $vars->use_module ??= 'N';

        if ($vars->use_module === 'Y') {
            $config->enable();
        } else {
            $config->disable();
        }

        // 변경된 설정을 저장
        return $config->save();
    }
}