@extends('admin.layout')

@section('content')
<div class="card-header">
    Users
    <a class="btn btn-primary float-right" href="{{route('user.create')}}" role="button">Add</a>
</div>

<div class="card-body">
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    <table class="table">
        <tbody>
        @foreach($users as $user)
        <tr>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->created_at }}</td>
            <td>
                <a class="btn btn-secondary btn-sm" href="{{route('user.edit', $user->id)}}" role="button" style="float: left; margin-right:10px;">Edit</a>
                {{Form::open(['route'=>['user.destroy', $user->id], 'method'=>'delete', 'style' => 'float:left'])}}
                    <button onclick="return confirm('are you sure?')" type="submit" class="btn btn-danger btn-sm delete" style="float: left;">
                        Delete
                    </button>
                {{Form::close()}}
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
    {{$users->links()}}
</div>

@endsection
