<?php

declare(strict_types=1);

namespace Rhymix\Modules\Example1\Src\Controllers;

use Context;
use Rhymix\Modules\Example1\Src\Models\ConfigModel;
use Rhymix\Modules\Example1\Src\ModuleBase;

class AdminController extends ModuleBase
{
    /**
     * 모듈의 관리페이지 대시보드 페이지의 액션
     *
     * @see \ModuleHandler::procModule()
     */
    public function dispExample1AdminDashboard(): void
    {
        // 템플릿 파일
        $this->setTemplatePath($this->module_path . 'views/admin/');
        $this->setTemplateFile('dashboard');
    }

    public function dispExample1AdminConfig(): void
    {
        Context::set('moduleConfig', new ConfigModel());

        $this->setTemplatePath($this->module_path . 'views/admin/');
        $this->setTemplateFile('config');
    }

    /**
     * 관리자 설정 저장 액션
     *
     * @see \ModuleHandler::procModule()
     * @return void|\BaseObject
     */
    public function procExample1AdminConfig()
    {
        // 사용자 입력 값을 받아서 `$this->saveConfig()`에 전달하여 저장
        $requestVars = Context::getRequestVars();
        $output = $this->saveConfig($requestVars);

        // 설정 저장 실패 등 오류가 발생하면 오류 메시지를 전달하기위해 `saveConfig()`가 반환한 `$output` 데이터를 반환
        if (!$output->toBool()) {
            return $output;
        }

        // 설정 화면으로 리다이렉트
        $this->setMessage('success_saved');
        $this->setRedirectUrl(Context::get('success_return_url'));
    }

    /**
     * 모듈의 설정 저장
     */
    protected function saveConfig(object $vars): \BaseObject
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