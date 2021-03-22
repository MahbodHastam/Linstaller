@extends('linstaller::layouts.main', ['title' => 'Environment Settings', 'step' => 3])
@section('content')
<div class="grid-item">
    <div class="card">
        <form action="{{ route('linstaller.step3.environment.text_editor.post') }}" id="envForm" method="POST">
            @csrf
            <div class="card-header">
                <h3 class="title"><i class="bx bx-cog"></i> Environment Settings</h3>
            </div>
            <div class="card-body card-body--vertical">

                @if($msg = session('message'))
                    <div class="alert alert-error">
                        {{ $msg }}
                    </div>
                @endif

                <textarea name="envContent" id="envContent" rows="10">{{ $envContent }}</textarea>

                <div class="form-group">
                    <label for="runSeeds">Run database seeders?</label>
                    <input type="checkbox" name="runSeeds" id="runSeeds">
                </div>

            </div>
            <div class="btn-actions">
                <a onclick="document.getElementById('envForm').submit()" class="btn btn-action-primary">Next</a>
            </div>
        </form>
    </div>
</div>
@endsection
