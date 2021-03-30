<div class="stepper">
    <div class="stepper-item {{ set_stepper_class(0, $step) }}" title="{!! trans('linstaller::msg.welcome') !!}">
        <span class="icon">
            <i aria-label="{!! trans('linstaller::msg.welcome') !!}" class="bx bx-home"></i>
        </span>
    </div>
    <div class="stepper-item {{ set_stepper_class(1, $step) }}" title="{!! trans('linstaller::msg.requirements') !!}">
        <span class="icon">
            <i aria-label="{!! trans('linstaller::msg.requirements') !!}" class="bx bx-category-alt"></i>
        </span>
    </div>
    <div class="stepper-item {{ set_stepper_class(2, $step) }}" title="{!! trans('linstaller::msg.permissions') !!}">
        <span class="icon">
            <i aria-label="{!! trans('linstaller::msg.permissions') !!}" class="bx bx-key"></i>
        </span>
    </div>
    <div class="stepper-item {{ set_stepper_class(3, $step) }}" title="{!! trans('linstaller::msg.environment_settings') !!}">
        <span class="icon">
            <i aria-label="{!! trans('linstaller::msg.environment_settings') !!}" class="bx bx-cog"></i>
        </span>
    </div>
    <div class="stepper-item {{ set_stepper_class(4, $step) }}" title="{!! trans('linstaller::msg.finish') !!}">
        <span class="icon">
            <i aria-label="{!! trans('linstaller::msg.finish') !!}" class="bx bx-check-double"></i>
        </span>
    </div>
</div>
