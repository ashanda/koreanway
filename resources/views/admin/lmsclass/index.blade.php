@extends('layouts.app')

@section('content')

<div class="container">
    <a href="{{ route('admin.dashboard') }}">Dashboard</a>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="float-start">
                <h3>Classes</h3>
            </div>
            <div class="float-end">
                <a class="btn btn-sm btn-success" href="{{ route('lmsclass.create') }}"> Create New Class</a>
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
            <th>Class Type</th>
            <th>Payement Type</th>
            <th>Teacher ID</th>
            <th>Batch Id</th>
            <td>Course Id</td>
            <th>Lesson</th>
            <th>CLass Image</th>
            <th>Class Doc</th>
            <th>Link</th>
            <th>Available Days</th>
            <th>Number of Views</th>
            <th>Level</th>
            <th>Password</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
        @foreach ($lmsclasses as $lmsclass)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $lmsclass->title }}</td>
            <td>{{ $lmsclass->classtype }}</td>
            <td>{{ $lmsclass->paytype }}</td>
            <td>{{ $lmsclass->teacher_id }}</td>
            <td>{{ $lmsclass->batch_id }}</td>
            <td>{{ $lmsclass->course_id }}</td>
            <td>{{ $lmsclass->lesson }}</td>
            <td><img width="50" src="{{ asset('/kycs/img/' . $lmsclass->image) }}" alt="Class Image"></td>
            <td><a target="_blank" href="{{ asset('/kycs/doc/' . $lmsclass->doc) }}">View</a></td>
            <td>{{ $lmsclass->link }}</td>
            <td>{{ $lmsclass->available_days }}</td>
            <td>{{ $lmsclass->no_of_views }}</td>
            <td>{{ $lmsclass->level }}</td>
            <td>{{ $lmsclass->password }}</td>
            <td>{{ $lmsclass->status }}</td>
            <td>
                <form action="{{ route('lmsclass.destroy',$lmsclass->id) }}" method="POST">

                    <a class="btn btn-sm btn-info" href="{{ route('lmsclass.show',$lmsclass->id) }}">View</a>

                    <a class="btn btn-sm btn-primary" href="{{ route('lmsclass.edit',$lmsclass->id) }}">Edit</a>

                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                </form>
            </td>

        </tr>
        @endforeach
    </table>
</div>


{!! $lmsclasses->links() !!}

@endsection