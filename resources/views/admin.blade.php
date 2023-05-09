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
        <a href="{{ route('class.index') }}">Classes</a>
    </div>
</div>
@endsection