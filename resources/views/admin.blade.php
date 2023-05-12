@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-3">
            <div class="sidebar">
                <ul>
                    <li><a href="{{ route('batch.index') }}">Batch</a></li>
                    <li><a href="{{ route('course.index') }}">Course</a></li>
                    <li><span>Classes</span>
                        <ul>
                            <li><a href="{{ route('lmsclass.index', ['type' => 'schedule']) }}">Class Schedules</a></li>
                            <li><a href="{{ route('lmsclass.index', ['type' => 'tute']) }}">Class Tutes </a></li>
                            <li><a href="{{ route('lmsclass.index', ['type' => 'video']) }}">Class Videos</a></li>
                        </ul>
                    </li>
                    <li><a href="{{ route('teacher.index') }}">Teachers</a></li>
                </ul>

            </div>
        </div>
        <div class="col-md-9">
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

</div>
@endsection