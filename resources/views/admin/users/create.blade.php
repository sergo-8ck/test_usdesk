@extends('admin.layout')

@section('content')
    <div class="card-header">
        Users
    </div>
    <div class="card-body">
        {{Form::open([
            'route'	=> 'user.store'
        ])}}
            @include('admin.errors')
            <div class="col-md-12">
                <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" name="name" value="{{old('name')}}">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" name="email" value="{{old('email')}}">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Password</label>
                    <input type="password" class="form-control" id="exampleInputEmail1" placeholder="" name="password">
                </div>

                <div class="box-footer">
                    <button class="btn btn-success pull-right">Send</button>
                </div>
            </div>
        {!! Form::close() !!}
    </div>
@endsection