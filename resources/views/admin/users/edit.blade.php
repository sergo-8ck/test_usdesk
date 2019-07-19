@extends('admin.layout')

@section('content')
    <div class="card-header">
        Section
    </div>
    <div class="card-body">
        {{Form::open([
            'route'	=> ['user.update', $user->id],
            'method'	=>	'put'
        ])}}
        @include('admin.errors')
        <div class="col-md-12">
            <div class="form-group">
                <label for="exampleInputEmail1">Name</label>
                <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" name="name" value="{{ $user->name }}">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Email</label>
                <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" name="name" value="{{ $user->email }}">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Password</label>
                <input type="password" class="form-control" id="exampleInputEmail1" placeholder="" name="name">
            </div>
            <div class="box-footer">
                <button class="btn btn-success pull-right">Send</button>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
    <script>
      // Add the following code if you want the name of the file appear on select
      $(".custom-file-input").on("change", function() {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
      });
    </script>
@endsection