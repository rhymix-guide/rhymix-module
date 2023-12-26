<?php

declare(strict_types=1);

/** ❗️ 네임스페이스를 적절하게 변경해서 사용 */
namespace VendorName\Example1\Src;

use VendorName\Example1\Src\Helpers\ConfigHelper;

class EventHandler extends Module
{
    /**
     * 트리거를 이용해 관리자 대시보드에 출력하는 예제
     *
     * @uses \ModuleHandler::triggerCall()
     */
    public static function adminDashboard(object $object): void
    {
        if (!ConfigHelper::isEnable()) {
            return;
        }

        $url = getUrl('', 'module', 'admin', 'act', 'dispExample1AdminConfig');
        $html = <<<HTML
        <section style="background-color: #eff6ff;">
            <h2>Example1 모듈</h2>
            <p style="padding: 10px;">Example1 모듈의 `EventHandler::adminDashboard()`에서 출력</p>
            <p style="padding: 10px;">Example1 모듈이 활성화되면 출력됨</p>

            <div class="more">
                <a href="{$url}">설정 바로가기<i class="xi-angle-right"></i></a>
            </div>
        </section>
        HTML;

        array_unshift($object->right, $html);
    }
}
