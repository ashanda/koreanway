@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    Hello Admin!
                </div>
            </div>
        </div>
    </div>
    <div class="navbar">
        <a href="{{ route('batch.index') }}">Batch</a>
        <a href="{{ route('course.index') }}">Course</a>
        <span>Classes</span>
        <ul>
            <li><a href="{{ route('lmsclass.index') }}">Class Schedules</a></li>
            <li><a href="{{ route('lmsclass.index') }}">Class Tutes </a></li>
            <li><a href="{{ route('lmsclass.index') }}">Class Videos</a></li>
        </ul> 
    </div>
</div>
@endsection