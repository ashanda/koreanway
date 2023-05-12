@extends('layouts.app')

@section('content')

<div class="container">
    <a href="{{ route('admin.dashboard') }}">Dashboard</a>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="float-start">
                <h3>Teachers</h3>
            </div>
            <div class="float-end">
                <a class="btn btn-sm btn-success" href="{{ route('teacher.create') }}"> Create New Teacher</a>
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
            <th>Teacher Name</th>
            <th>Teacher Email</th>
            <th>Password</th>
            <th>Action</th>
        </tr>
        @foreach ($teachers as $teacher)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $teacher->name }}</td>
            <td>{{ $teacher->email }}</td>
            <td>{{ $teacher->password }}</td>
            <td>
                <form action="{{ route('teacher.destroy',$teacher->id) }}" method="POST">

                    <a class="btn btn-sm btn-info" href="{{ route('teacher.show',$teacher->id) }}">View</a>

                    <a class="btn btn-sm btn-primary" href="{{ route('teacher.edit',$teacher->id) }}">Edit</a>

                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</div>

{!! $teachers->links() !!}

@endsection