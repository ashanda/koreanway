@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-lg-12">
        <div class="float-start">
            <h4>Batches</h4>
        </div>
        <div class="float-end">
            <a class="btn btn-success btn-sm" href="{{ route('batch.create') }}"> Create New Batch</a>
        </div>
    </div>
</div>

@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif

<div class="table-responsive">
    <table class="table table-bordered table-striped">
        <tr>
            <th>No</th>
            <th>Batch Name</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
        @foreach ($batches as $batch)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $batch->name }}</td>
            <td>{{ $batch->status }}</td>
            <td>
                <form action="{{ route('batch.destroy',$batch->id) }}" method="POST">

                    <a class="btn btn-info btn-sm mb-1" href="{{ route('batch.show',$batch->id) }}">View</a>

                    <a class="btn btn-primary btn-sm mb-1" href="{{ route('batch.edit',$batch->id) }}">Edit</a>

                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</div>

{!! $batches->links() !!}

@endsection