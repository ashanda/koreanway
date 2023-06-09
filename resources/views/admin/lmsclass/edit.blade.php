@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="float-start">
            <h4>Edit Class</h4>
        </div>
    </div>
</div>

@if ($errors->any())
<div class="alert alert-danger">
    <label>Error!</label> <br>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="{{ route('lmsclass.update',$lmsclass->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="row">
        @if($lmsclass->classtype == 'Schedule')
        <p>This is Schedule inputs</p>
        @elseif($lmsclass->classtype == 'Tute')
        <p>This is Tute inputs</p>
        @elseif($lmsclass->classtype == 'Video')
        <p>This is Video inputs</p>
        @endif
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <label>Class Title</label>
                <input type="text" name="title" value="{{ $lmsclass->title }}" class="form-control" placeholder="Class Title">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <label for="classtype" class="form-label">Class Type:</label>
                <select class="form-control" name="classtype" id="classtype">
                    <option value="Schedule" {{ $lmsclass->classtype == 'Schedule' ? 'selected' : '' }}>Class Schedule</option>
                    <option value="Tute" {{ $lmsclass->classtype == 'Tute' ? 'selected' : '' }}>Class Tute</option>
                    <option value="Video" {{ $lmsclass->classtype == 'Video' ? 'selected' : '' }}>Video Lesson</option>
                </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <label for="paytype" class="form-label">Payment Type:</label>
                <select class="form-control" name="paytype" id="paytype">
                    <option value="Paid" {{ $lmsclass->paytype == 'Paid' ? 'selected' : '' }}>Paid</option>
                    <option value="Free" {{ $lmsclass->paytype == 'Free' ? 'selected' : '' }}>Free</option>
                </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <label for="teacher_id" class="form-label">Teacher ID:</label>
                <select class="form-control" name="teacher_id" id="teacher_id">
                    @foreach($teacher_data as $data)
                    <option value="{{$data->id}}" {{ $data->id == $lmsclass->teacher_id ? 'selected' : '' }}>{{$data->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <label for="batch_id" class="form-label">Batch Id:</label>
                <select class="form-control" name="batch_id" id="batch_id">
                    @foreach($batch_data as $data)
                    <option value="{{$data->id}}" {{ $data->id == $lmsclass->batch_id ? 'selected' : '' }}>{{$data->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <label for="course_id" class="form-label">Course Id:</label>
                <select class="form-control" name="course_id" id="course_id">
                    @foreach($course_data as $data)
                    <option value="{{$data->id}}" {{ $data->id == $lmsclass->course_id ? 'selected' : '' }}>{{$data->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <label>Class Lesson</label>
                <input type="text" name="lesson" value="{{ $lmsclass->lesson }}" class="form-control" placeholder="Class Lesson">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <label>Class Image</label>
                <input type="file" name="image" class="form-control">
                <img width="100" src="{{ asset('/kycs/img/' . $lmsclass->image) }}" alt="Class Image">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <label>Class Document</label>
                <input type="file" name="doc" class="form-control">
                <a target="_blank" href="{{ asset('/kycs/doc/' . $lmsclass->doc) }}">View</a>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <label>Class Link</label>
                <input type="text" name="link" value="{{ $lmsclass->link }}" class="form-control" placeholder="Class Link">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <label>Available Days</label>
                <input type="text" name="available_days" value="{{ $lmsclass->available_days }}" class="form-control" placeholder="Available Days">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <label>Number of Views</label>
                <input type="text" name="no_of_views" value="{{ $lmsclass->no_of_views }}" class="form-control" placeholder="Number of Views">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <label>Select Level</label>
                <select class="form-control" name="level" id="level">
                    <option value="1" {{ $lmsclass->level == '1' ? 'selected' : '' }}>1</option>
                    <option value="2" {{ $lmsclass->level == '2' ? 'selected' : '' }}>2</option>
                </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <label>Password</label>
                <input type="text" name="no_of_views" value="{{ $lmsclass->password }}" class="form-control" placeholder="Password">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <label for="status" class="form-label">Status:</label>
                <select class="form-control" name="status" id="status">
                    <option value="1" {{ $lmsclass->status == '1' ? 'selected' : '' }}>Publish</option>
                    <option value="0" {{ $lmsclass->status == '0' ? 'selected' : '' }}>Unpublish</option>
                </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-end">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>

</form>
@endsection