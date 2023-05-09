@extends('layouts.app')
 
@section('content')

<a href="{{ route('admin.dashboard') }}">Dashboard</a>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Batches</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('batch.create') }}"> Create New Batch</a>
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
   
                    <a class="btn btn-info" href="{{ route('batch.show',$batch->id) }}">Show</a>
    
                    <a class="btn btn-primary" href="{{ route('batch.edit',$batch->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $batches->links() !!}
      
@endsection