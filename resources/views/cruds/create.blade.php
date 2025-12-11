@extends('cruds.layouts')

@section('content')

<div class="card">
    <div class="card-header">
        <h4>Create Item
            <a href="{{ route('cruds.index') }}" class="btn btn-danger float-end">Back</a>
        </h4>
    </div>

    <div class="card-body">
        <form action="{{ route('cruds.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label>Name</label>
                <input type="text" name="name" class="form-control">
                @error('name') <small class="text-danger">{{ $message }}</small>@enderror
            </div>

            <div class="mb-3">
                <label>Description</label>
                <textarea name="description" rows="3" class="form-control"></textarea>
                @error('description') <small class="text-danger">{{ $message }}</small>@enderror
            </div>

            <div class="mb-3">
                <label>Status</label><br>
                <input type="checkbox" name="status" checked> Visible
            </div>

            <button class="btn btn-primary">Save</button>
        </form>
    </div>
</div>

@endsection
