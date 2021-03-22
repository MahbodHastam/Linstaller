@extends('linstaller::layouts.main', ['title' => 'Environment Settings Wizard', 'step' => 3])
@section('content')
    <div class="grid-item">
        <div class="card">
            <form action="{{ route('linstaller.step3.environment.wizard.post') }}" id="envForm" method="POST">
                @csrf
                <div class="card-header">
                    <h3 class="title"><i class="bx bx-cog"></i> Environment Settings Wizard</h3>
                </div>
                <div class="card-body card-body--vertical">

                    @if($msg = session('error'))
                        <div class="alert alert-error">
                            {{ $msg }}
                        </div>
                    @endif

                    <div class="form-group">
                        <label for="runSeeds">Run database seeders?</label>
                        <input type="checkbox" name="runSeeds" id="runSeeds">
                    </div>

                    @foreach($envVars['allowed'] as $variable)
                        <div class="form-group form-group--vertical">
                            <label for="variable[{{ $variable[0] }}]">
                                @if(string_contains($variable[0], 'APP_'))
                                    <i class="bx bx-expand-alt"></i>
                                @elseif(string_contains($variable[0], 'LOG_'))
                                    <i class="bx bx-comment-error"></i>
                                @elseif(string_contains($variable[0], 'DB_'))
                                    <i class="bx bx-data"></i>
                                @elseif(string_contains($variable[0], 'SESSION_'))
                                    <i class="bx bx-sticker"></i>
                                @elseif(string_contains($variable[0], 'MAIL_'))
                                    <i class="bx bx-mail-send"></i>
                                @endif
                                {{ str_replace('_', ' ', $variable[0]) }}
                            </label>
                            @if(in_array($variable[0], ['LOG_LEVEL', 'SESSION_DRIVER', 'DB_CONNECTION']))
                                @switch($variable[0])
                                    @case('LOG_LEVEL')
                                        <select name="variable[{{ $variable[0] }}]" id="variable[{{ $variable[0] }}]">
                                            <option value="debug" selected>Debug</option>
                                            <option value="info">Info</option>
                                            <option value="notice">Notice</option>
                                            <option value="warning">Warning</option>
                                            <option value="error">Error</option>
                                            <option value="critical">Critical</option>
                                            <option value="alert">Alert</option>
                                            <option value="emergency">Emergency</option>
                                        </select>
                                        @break
                                    @case('SESSION_DRIVER')
                                        <select name="variable[{{ $variable[0] }}]" id="variable[{{ $variable[0] }}]">
                                            <option value="file">File</option>
                                            <option value="database">Database</option>
                                        </select>
                                        @break
                                    @case('DB_CONNECTION')
                                        <select name="variable[{{ $variable[0] }}]" id="variable[{{ $variable[0] }}]">
                                            <option value="mysql">MySQL</option>
                                            <option value="sqlsrv">SQLSRV</option>
                                            <option value="pgsql">PGSQL</option>
                                            <option value="sqlite">SQLite</option>
                                        </select>
                                    @break
                                @endswitch
                            @else
                                <input type="text" id="variable[{{ $variable[0] }}]" name="variable[{{ $variable[0] }}]" value="{{ $variable[1] ?? '' }}">
                            @endif
                        </div>
                    @endforeach

                    @foreach($envVars['notAllowed'] as $variable)
                            <input type="hidden" name="variable[{{ $variable[0] }}]" value="{{ $variable[1] ?? '' }}">
                    @endforeach

                </div>
                <div class="btn-actions">
                    <a onclick="document.getElementById('envForm').submit()" class="btn btn-action-primary">Next</a>
                </div>
            </form>
        </div>
    </div>
@endsection
