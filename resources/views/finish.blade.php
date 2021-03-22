@extends('linstaller::layouts.main', ['title' => "The End", 'step' => 4])
@section('content')
    <div class="grid-item">
        <div class="card">
            <div class="card-header">
                <h3 class="title"><i class="bx bxl-ok-ru"></i> The End :)</h3>
            </div>
            <div class="card-body">
                <h5 class="text">
                    Installation finished :)
                </h5>
            </div>
            <div class="btn-actions">
                <a href="{{ url('/') }}" class="btn btn-action-primary">Visit Website</a>
            </div>
        </div>
    </div>
@endsection
