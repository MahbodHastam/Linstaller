@extends('linstaller::layouts.main', ['title' => 'Welcome to Linstaller', 'step' => 0])
@section('content')
    <div class="grid-item">
        <div class="card">
            <div class="card-header">
                <h3 class="title"><i class="bx bxl-ok-ru"></i> Welcome to Linstaller</h3>
            </div>
            <div class="card-body">
                <h5 class="text">
                    <b>Welcome to Linstaller</b>, Click "<b>Next</b>" to continue.
                </h5>
            </div>
            <div class="btn-actions">
                <a href="{{ route('linstaller.step1.requirements') }}" class="btn btn-action-primary">Next</a>
            </div>
        </div>
    </div>
@endsection
