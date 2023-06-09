@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="float-start">
            <h4>Add New Class</h4>
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

<form action="{{ route('lmsclass.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <label>Class Title</label>
                <input type="text" name="title" class="form-control" placeholder="Class Title">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <label for="classtype" class="form-label">Class Type:</label>
                <select class="form-control" name="classtype" id="classtype" onchange="changeInputs()">
                    <option value="Schedule">Class Schedule</option>
                    <option value="Tute">Class Tute</option>
                    <option value="Video">Video Lesson</option>
                </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <label for="paytype" class="form-label">Payement Type:</label>
                <select class="form-control" name="paytype" id="paytype">
                    <option value="Paid">Paid</option>
                    <option value="Free">Free</option>
                </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <label for="teacher_id" class="form-label">Teacher ID:</label>
                <select class="form-control" name="teacher_id" id="teacher_id">
                    @foreach($teacher_data as $data )
                    <option value="{{$data->id}}">{{$data->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <label for="batch_id" class="form-label">Batch Id:</label>
                <select class="form-control" name="batch_id" id="batch_id">
                    @foreach($batch_data as $data )
                    <option value="{{$data->id}}">{{$data->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <label for="course_id" class="form-label">Course Id:</label>
                <select class="form-control" name="course_id" id="course_id">
                    @foreach($course_data as $data )
                    <option value="{{$data->id}}">{{$data->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <label>Class Lesson</label>
                <input type="text" name="lesson" class="form-control" placeholder="Class Lesson">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <label>Class Image</label>
                <input type="file" name="image" class="form-control">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <label>Class Document</label>
                <input type="file" name="doc" class="form-control">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <label>Class Link</label>
                <input type="text" name="link" class="form-control" placeholder="Class Link">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <label>Available Days</label>
                <input type="text" name="available_days" class="form-control" placeholder="Available Days">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <label>Number of Views</label>
                <input type="text" name="no_of_views" class="form-control" placeholder="Number of Views">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <label>Select Level</label>
                <select class="form-control" name="level" id="level">
                    <option value="1">1</option>
                    <option value="2">2</option>
                </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <label>Password</label>
                <input type="text" name="password" class="form-control" placeholder="Password">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <label for="status" class="form-label">Status:</label>
                <select class="form-control" name="status" id="status">
                    <option value="1">Publish</option>
                    <option value="0">Unpublish</option>
                </select>
            </div>
        </div>
        <div id="schedule">
            <p>Class schedule inputs here</p>
        </div>
        <div style="display:none;" id="tute">
            <p>Class tute inputs here</p>
        </div>
        <div style="display:none;" id="video">
            <p>Class video inputs here</p>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-end">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>

</form>

<script>
    function changeInputs() {
        var x = document.getElementById("classtype").value;

        if (x == 'Schedule') {
            document.getElementById("schedule").style.display = "block";
            document.getElementById("tute").style.display = "none";
            document.getElementById("video").style.display = "none";
        } else if (x == 'Tute') {
            document.getElementById("tute").style.display = "block";
            document.getElementById("schedule").style.display = "none";
            document.getElementById("video").style.display = "none";
        } else if (x == 'Video') {
            document.getElementById("video").style.display = "block";
            document.getElementById("tute").style.display = "none";
            document.getElementById("schedule").style.display = "none";
        }
    }
</script>

@endsection