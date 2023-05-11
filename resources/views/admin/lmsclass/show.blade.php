@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2> Show Class</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('lmsclass.index') }}"> Back</a>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <label>Class Title:</label>
            {{ $lmsclass->title }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <label>CLass Type:</label>
            {{ $lmsclass->classtype }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <label>Payement Type:</label>
            {{ $lmsclass->paytype }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <label>Teacher ID:</label>
            {{ $lmsclass->teacher_id }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <label>Batch Id:</label>
            {{ $lmsclass->batch_id }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <label>Course Id:</label>
            {{ $lmsclass->course_id }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <label>Lesson:</label>
            {{ $lmsclass->lesson }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <label>Class Image:</label>
            <img width="100" src="{{ asset('/kycs/img/' . $lmsclass->image) }}" alt="Class Image">
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <label>Class Document:</label>
            <a target="_blank" href="{{ asset('/kycs/doc/' . $lmsclass->doc) }}">View</a>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <label>Link:</label>
            {{ $lmsclass->link }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <label>Available Days:</label>
            {{ $lmsclass->available_days }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <label>Number of Views:</label>
            {{ $lmsclass->no_of_views }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <label>Level:</label>
            {{ $lmsclass->level }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <label>Password:</label>
            {{ $lmsclass->password }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <label>Status:</label>
            {{ $lmsclass->status }}
        </div>
    </div>
</div>
@endsection