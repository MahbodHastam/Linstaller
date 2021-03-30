@extends('linstaller::layouts.main', ['title' => 'Server Requirements', 'step' => 1])
@section('content')
    <div class="grid-item">
        <div class="card">
            <div class="card-header">
                <h3 class="title"><i class="bx bx-server"></i> {!! trans('linstaller::msg.server_requirements') !!}</h3>
            </div>
            <div class="card-body">
                <ul class="list">
                    <li><span>PHP</span><span style="font-size: .8em;">{{ config('linstaller.php_min_version', '^7.4') }}</span></li>
                    @foreach ($requirements['requirements'] as $key => $extensions)
                        @foreach ($extensions as $ext => $enabled)
                            <li>
                                <span>{{ ucfirst($ext) }}</span>
                                <span>{!! print_status($enabled) !!}</span>
                            </li>
                        @endforeach
                    @endforeach
                </ul>
            </div>
            <div class="btn-actions">
                @if(isset($requirements['errors']) && $requirements['errors'])
                    <span class="btn btn-action-error">ERROR</span>
                @else
                    <a href="{{ route('linstaller.step2.permissions') }}" class="btn btn-action-primary">{!! trans('linstaller::msg.next') !!}</a>
                @endif
            </div>
        </div>
    </div>
@endsection
