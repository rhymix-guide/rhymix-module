<?php

declare(strict_types=1);

/**
 * ❗️ 네임스페이스를 적절하게 변경해서 사용
 *
 * 이 클래스를 비롯해 모든 클래스에서 네임스페이스를 변경해야 합니다.
 * `Rhymix\Modules\Example1`에서 `Example1`은 모듈의 폴더명과 같아야 합니다.
 * 단, 폴더는 소문자, 네임스페이스는 첫 글자만 대문자를 사용해야 합니다.
 */
namespace Rhymix\Modules\Example1\Src;

/**
 * Composer autoload
 *
 * 컴포저 패키지를 사용해야 한다면 아래 autoload.php 파일을 include 해야 한다.
 */
// include_once __DIR__ . '/../vendor/autoload.php';

/**
 * 모듈의 액션을 처리하는 클래스
 *
 * `conf/module.xml` 파일에서 `<actions>` 정의된 `class="Src\ModuleBase"` 속성이 이 클래스를 가리키고 있습니다.
 * `<classes>` 정의에서도 이 클래스를 가리키고 있으므로 이 클래스는 라이믹스 모듈의 기본 클래스로 사용됩니다.
 * 기본 클래스는 `\ModuleObject` 클래스를 상속해야 합니다.
 */
class ModuleBase extends \ModuleObject
{
}
