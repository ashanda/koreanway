@extends('layouts.app')
 
@section('content')

<a href="{{ route('admin.dashboard') }}">Dashboard</a>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Classes</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('class.create') }}"> Create New Class</a>
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
            <th>Class Title</th>
            <th>CLass Type</th>
            <th>teacher ID</th>
            <th>Batch Id</th>
            <td>Course Id</td>
            <th>Lesson</th>
            <th>Image</th>
            <th>Doc</th>
            <th>Link</th>
            <th>Available Days</th>
            <th>Number of Views</th>
            <th>Level</th>
            <th>Password</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
        @foreach ($classes as $class)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $class->title }}</td>
            <td>{{ $class->classtype }}</td>
            <td>{{ $class->teacher_id }}</td>
            <td>{{ $class->batch_id }}</td>
            <td>{{ $class->course_id }}</td>
            <td>{{ $class->lesson }}</td>
            <td>{{ $class->image }}</td>
            <td>{{ $class->doc }}</td>
            <td>{{ $class->link }}</td>
            <td>{{ $class->available_days }}</td>
            <td>{{ $class->no_of_views }}</td>
            <td>{{ $class->level }}</td>
            <td>{{ $class->password }}</td>
            <td>{{ $class->status }}</td>
            <td>
                <form action="{{ route('class.destroy',$class->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('class.show',$class->id) }}">Show</a>
    
                    <a class="btn btn-primary" href="{{ route('class.edit',$class->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $classes->links() !!}
      
@endsection