<?php

declare(strict_types=1);

/** ❗️ 네임스페이스를 적절하게 변경해서 사용 */
namespace VendorName\Example1\Src;

use Context;
use ModuleObject;
use VendorName\Example1\Src\Controllers\AdminController;
use VendorName\Example1\Src\Models\ConfigModel;

/**
 * 모듈의 액션을 처리하는 클래스
 *
 * `conf/module.xml` 파일에서 `<actions>` 정의된 `class="Src\Module"` 속성이 이 클래스를 가리키고 있습니다.
 * `<classes>` 정의에서도 이 클래스를 가리키고 있으므로 이 클래스는 라이믹스 모듈의 기본 클래스로 사용됩니다.
 * `<actions>`, `<classes>` 정의에서 이 클래스를 가리킨다면 `\ModuleObject` 클래스를 상속해야 합니다.
 */
class Module extends ModuleObject
{
    /**
     * 모듈의 관리페이지 대시보드 페이지의 액션
     *
     * @uses \ModuleHandler::procModule()
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
     * @uses \ModuleHandler::procModule()
     * @return void|\BaseObject
     */
    public function procExample1AdminConfig()
    {
        // 사용자 입력 값을 받아서 `AdminController::saveConfig()`에 전달하여 저장
        $requestVars = Context::getRequestVars();
        $output = AdminController::saveConfig($requestVars);

        // 설정 저장 실패 등 오류가 발생하면 오류 메시지를 전달하기위해 `AdminController::saveConfig()`가 반환한 `$output` 데이터를 반환
        if (!$output->toBool()) {
            return $output;
        }

        // 설정 화면으로 리다이렉트
        $this->setMessage('success_saved');
        $this->setRedirectUrl(Context::get('success_return_url'));
    }
}
