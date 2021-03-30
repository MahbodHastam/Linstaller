@extends('linstaller::layouts.main', ['title' => 'Select Environment Editor', 'step' => 3])
@section('content')
    <div class="grid-item">
        <div class="card">
            <div class="card-header">
                <h3 class="title"><i class="bx bx-cog"></i> {!! trans('linstaller::msg.select_environment_editor') !!}</h3>
            </div>
            <div class="card-body card-body--vertical">
                <h5 class="text">{!! trans('linstaller::msg.continue_setup_using_dotdotdot') !!}</h5>
                <span dir="rtl">
                    <a href="{{ route('linstaller.step3.environment.wizard.show') }}" class="btn btn-block" style="margin-left: .5em;">
                        <i class="bx bx-window-alt"></i>
                        {!! trans('linstaller::msg.form_wizard') !!}
                    </a>
                    <a href="{{ route('linstaller.step3.environment.text_editor.show') }}" class="btn btn-block" style="margin-right: .5em;">
                        <i class="bx bx-message-alt-detail"></i>
                        {!! trans('linstaller::msg.text_editor') !!}
                    </a>
                </span>
            </div>
        </div>
    </div>
@endsection
