@extends('admin.layout')

@section('content')
<div class="card-header">
    Section
    <a class="btn btn-primary float-right" href="{{route('department.create')}}" role="button">Add</a>
</div>

<div class="card-body">
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    <table class="table">
        <tbody>
        @foreach($departments as $department)
        <tr>
            <td>
                <img src="/storage/logo/{{ $department->logo }}" class="img-thumbnail" alt="Responsive image" width="150">
            </td>
            <td>
                <strong>{{ $department->name }}</strong>
                <div>{{ $department->description }}</div>
            </td>
            <td>
                <strong>Users</strong>
                <ul>
                    @foreach($department->users as $user)
                        <li>{{ $user->name }}</li>
                    @endforeach
                </ul>
            </td>
            <td>
                <a class="btn btn-secondary btn-sm" href="{{route('department.edit', $department->id)}}" role="button" style="float: left; margin-right:10px;">Edit</a>
                {{Form::open(['route'=>['department.destroy', $department->id], 'method'=>'delete', 'style' => 'float:left'])}}
                    <button onclick="return confirm('are you sure?')" type="submit" class="btn btn-danger btn-sm delete" style="float: left;">
                        Delete
                    </button>
                {{Form::close()}}
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
    {{$departments->links()}}
</div>

@endsection
