@extends('cruds.layouts')

@section('content')

<div class="card">
    <div class="card-header">
        <h4>CRUD List
            <a href="{{ route('cruds.create') }}" class="btn btn-primary float-end">Add New</a>
        </h4>
    </div>

    <div class="card-body">

        @if(session('status'))
            <div class="alert alert-success">{{ session('status') }}</div>
        @endif

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($cruds as $crud)
                <tr>
                    <td>{{ $crud->id }}</td>
                    <td>{{ $crud->name }}</td>
                    <td>{{ $crud->description }}</td>
                    <td>{{ $crud->status ? 'Visible' : 'Hidden' }}</td>
                    <td>
                        <a href="{{ route('cruds.edit', $crud->id) }}" class="btn btn-success">Edit</a>
                        <a href="{{ route('cruds.show', $crud->id) }}" class="btn btn-info">Show</a>

                        <form action="{{ route('cruds.destroy', $crud->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger">Delete</button>
                        </form>

                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>

        {{ $cruds->links() }}

    </div>
</div>

@endsection
