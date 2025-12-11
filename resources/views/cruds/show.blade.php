@extends('cruds.layouts')

@section('content')

<div class="card">
    <div class="card-header">
        <h4>Item Details
            <a href="{{ route('cruds.index') }}" class="btn btn-danger float-end">Back</a>
        </h4>
    </div>

    <div class="card-body">
        <p><strong>Name:</strong> {{ $crud->name }}</p>
        <p><strong>Description:</strong> {{ $crud->description }}</p>
        <p><strong>Status:</strong> {{ $crud->status ? 'Visible' : 'Hidden' }}</p>
    </div>
</div>

@endsection
