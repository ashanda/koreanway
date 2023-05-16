@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="float-start">
            <h4> Show Batch</h4>
        </div>
        <div class="float-end">
            <a class="btn btn-sm btn-primary" href="{{ route('batch.index') }}"> Back to Batch</a>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <label>Batch Name:</label>
            {{ $batch->name }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <label>Details:</label>
            {{ $batch->status }}
        </div>
    </div>
</div>
@endsection