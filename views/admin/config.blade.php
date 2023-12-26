{{-- 상단 탭 메뉴를 출력하는 템플릿 include --}}
@include('_tab-menu')

{{-- 설정 폼 --}}
<form class="x_form-horizontal" action="./" method="post" id="kg-passkeys-admin-config">
    <input type="hidden" name="module" value="example1" />
    <input type="hidden" name="act" value="procExample1AdminConfig" />
    <input type="hidden" name="success_return_url" value="{{ getRequestUriByServerEnviroment() }}" />
    <input type="hidden" name="xe_validator_id" value="{{ sha1(__FILE__) }}" />

    {{-- validator 메시지 --}}
    @if ($XE_VALIDATOR_MESSAGE && $XE_VALIDATOR_ID == sha1(__FILE__))
        <div class="message {{ $XE_VALIDATOR_MESSAGE_TYPE }}">
            <p>{{ $XE_VALIDATOR_MESSAGE }}</p>
        </div>
    @endif

    {{-- 설정 항목 --}}
    <section class="section">
        <div class="x_control-group">
            {{-- 모듈 활성화 --}}
            <label class="x_control-label">{{ $lang->example1_enable_module }}</label>
            <div class="x_controls">
                <label for="use_module_y" class="x_inline">
                    <input type="radio" id="use_module_y" name="use_module" value="Y"
                        @checked($moduleConfig->isEnable()) />
                    {{ $lang->cmd_yes }}
                </label>
                <label for="use_module_n" class="x_inline">
                    <input type="radio" id="use_module_n" name="use_module" value="N"
                        @checked(!$moduleConfig->isEnable()) />
                    {{ $lang->cmd_no }}
                </label>
            </div>
        </div>
    </section>

    <div class="btnArea x_clearfix">
        <button type="submit" class="x_btn x_btn-primary x_pull-right">{{ $lang->cmd_save }}</button>
    </div>
</form>
