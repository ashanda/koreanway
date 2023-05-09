@extends('layouts.app')
 
@section('content')
<a href="{{ route('admin.dashboard') }}">Dashboard</a>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Courses</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('course.create') }}"> Create New Course</a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Batch ID</th>
            <th>Teacher</th>
            <th>Course Name</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
        @foreach ($courses as $course)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $course->batch_id }}</td>
            <td>{{ $course->teacher_id }}</td>
            <td>{{ $course->name}}</td>
            <td>{{ $course->status }}</td>
            <td>
                <form action="{{ route('course.destroy',$course->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('course.show',$course->id) }}">Show</a>
    
                    <a class="btn btn-primary" href="{{ route('course.edit',$course->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $courses->links() !!}
      
@endsection