@extends('cruds.layouts')

@section('content')

<div class="card">
    <div class="card-header">
        <h4>Edit Item
            <a href="{{ route('cruds.index') }}" class="btn btn-danger float-end">Back</a>
        </h4>
    </div>

    <div class="card-body">
        <form action="{{ route('cruds.update', $crud->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label>Name</label>
                <input type="text" name="name" class="form-control" value="{{ $crud->name }}">
            </div>

            <div class="mb-3">
                <label>Description</label>
                <textarea name="description" rows="3" class="form-control">{{ $crud->description }}</textarea>
            </div>

            <div class="mb-3">
                <label>Status</label><br>
                <input type="checkbox" name="status" {{ $crud->status ? 'checked' : '' }}> Visible
            </div>

            <button class="btn btn-primary">Update</button>

        </form>
    </div>
</div>

@endsection
