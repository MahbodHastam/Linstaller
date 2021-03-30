@extends('linstaller::layouts.main', ['title' => 'Permissions', 'step' => 2])
@section('content')
    <div class="grid-item">
        <div class="card">
            <div class="card-header">
                <h3 class="title"><i class="bx bx-server"></i> {!! trans('linstaller::msg.permissions') !!}</h3>
            </div>
            <div class="card-body">
                <ul class="list">
                    @foreach ($permissions['permissions'] as $permission)
                        <li>
                            <span>{{ $permission['directory'] }}</span>
                            <span style="font-size: .8em;">
                                {!! print_status($permission['isSet']) !!}
                                <span style="font-weight: 500">{{ $permission['permission'] }}</span>
                            </span>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="btn-actions">
                @if(isset($permissions['errors']) && $permissions['errors'])
                    <span class="btn btn-action-error">ERROR</span>
                @else
                    <a href="{{ route('linstaller.step3.environment') }}" class="btn btn-action-primary">{!! trans('linstaller::msg.next') !!}</a>
                @endif
            </div>
        </div>
    </div>
@endsection
