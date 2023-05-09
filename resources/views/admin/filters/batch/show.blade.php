@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show Batch</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('batch.index') }}"> Back</a>
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