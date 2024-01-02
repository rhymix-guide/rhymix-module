{{-- 탭 메뉴를 출력하는 템플릿 --}}

@php
    $moduleConfig = new Rhymix\Modules\Example1\Src\Models\ConfigModel();
@endphp

<div class="x_page-header">
    <h1>
        {{ $lang->example1_module }}
        <small>({{ $moduleConfig->isEnable() ? '활성화 됨' : '비활성화' }})</small>
    </h1>
</div>

{{-- 상단 메뉴 탭 --}}
<ul class="x_nav x_nav-tabs">
    <li @class([
        'x_active' => $act === 'dispExample1AdminDashboard',
    ])>
        <a href="{{ getUrl('', 'module', 'admin', 'act', 'dispExample1AdminDashboard') }}">대시보드</a>
    </li>
    <li @class([
        'x_active' => $act === 'dispExample1AdminConfig',
    ])>
        <a href="{{ getUrl('', 'module', 'admin', 'act', 'dispExample1AdminConfig') }}">설정</a>
    </li>
</ul>
